<?php

namespace App\Http\Controllers\landing;

use App\BankPayment;
use App\Http\Controllers\Controller;
use App\models\City;
use App\models\Route;
use App\models\Vehicle;
use App\Reservation;
use App\Schedule;
use App\Ticket;
use App\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

class travelController extends Controller
{
    public function index()
    {
        $cities = City::get();
        return view('shuttle.index', compact('cities'));
    }

    public function search()
    {
        $route_id = request()->route;
        $date = request()->date;
        $option = request()->option;

        if (!$route_id && !$date) {
            return redirect()->back()->with('failed', 'Silahkan pilih rute dan tanggal');
        }

        $cities = City::get();
        $now = Carbon::now()->addHour(1);
        $currentTime = $now->format('H:i:m');

        // check jika ada option PP
        if (!$option) {
            $schedules = Schedule::with(
                'routeRef',
                'vehicleRef',
                'routeRef.cityDepartureRef',
                'routeRef.cityArrivalRef'
            )->where([
                ['route_id', '=', $route_id],
                ['date', '=', $date],
                ['departure_time', '>', $currentTime]
            ])->get();

            $route = Route::with('cityDepartureRef', 'cityArrivalRef')->find($route_id);

            return view('shuttle.search', compact('schedules', 'cities', 'route', 'date'));
        } else {

            // OPTION PP ON
            $dateHome = request()->date_home;
            $route = Route::with('cityDepartureRef', 'cityArrivalRef')->find($route_id);
            $dateFormat = \Carbon\Carbon::parse($date);
            $dateFormatHome = \Carbon\Carbon::parse($date);

            $reverseRoute = Route::where(
                [
                    ['departure', '=', $route->arrival],
                    ['arrival', '=', $route->departure]
                ]
            )->first();

            $reverseSchedules = collect();
            if ($reverseRoute) {
                $reverseSchedules = Schedule::with(
                    'routeRef',
                    'vehicleRef',
                    'routeRef.cityDepartureRef',
                    'routeRef.cityArrivalRef'
                )->where([
                    ['route_id', '=', $reverseRoute->id],
                    ['date', '=', $dateHome],
                ])->get();
            }

            $schedules = Schedule::with(
                'routeRef',
                'vehicleRef',
                'routeRef.cityDepartureRef',
                'routeRef.cityArrivalRef'
            )->where([
                ['route_id', '=', $route_id],
                ['date', '=', $date],
            ])->get();

            return view('shuttle.pp.search', compact(
                'schedules',
                'reverseSchedules',
                'cities',
                'route',
                'reverseRoute',
                'date',
                'option',
                'dateHome',
                'dateFormat',
                'dateFormatHome'
            ));
        }
    }

    public function createReservation()
    {
        $code = Str::random(20);
        return redirect()->route('landing.shuttle.reservation.index', $code);
    }

    public function reservation()
    {
        $code = request()->code;
        $id = request()->scheduleId;

        $schedule = Schedule::with(
            'routeRef',
            'vehicleRef',
            'routeRef.cityDepartureRef',
            'routeRef.cityArrivalRef'
        )->where([
            ['id', '=', $id],
        ])->first();



        if ($schedule) {
            return view('shuttle.reservation', compact('code', 'schedule', 'id'));
        }

        return redirect()->route('landing.shuttle.index')->with('failed', 'Jadwal tidak tersedia');
    }

    public function reservationPp()
    {
        $roundScheduleId = request()->round_schedule_id;
        $tripScheduleId = request()->trip_schedule_id;

        $roundSchedule = Schedule::with(
            'routeRef',
            'vehicleRef',
            'routeRef.cityDepartureRef',
            'routeRef.cityArrivalRef'
        )->where([
            ['id', '=', $roundScheduleId],
        ])->first();

        $tripSchedule = Schedule::with(
            'routeRef',
            'vehicleRef',
            'routeRef.cityDepartureRef',
            'routeRef.cityArrivalRef'
        )->where([
            ['id', '=', $tripScheduleId],
        ])->first();

        if ($roundSchedule && $tripSchedule) {
            return view('shuttle.pp.reservation', compact('roundSchedule', 'tripSchedule'));
        }

        return redirect()->route('landing.shuttle.index')->with('failed', 'Jadwal tidak tersedia');
    }

    public function saveReservation(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required',
            'email' => 'required',
            'wa_number' => 'required',
            'email' => 'required',
            'total_seat' => 'required',
            'price' => 'required',
        ]);


        try {

            $check = Reservation::latest()->first();
            if ($check) {
                $parts =  preg_split("/[-]/", $check->code);
                (string)$new_number = sprintf("%07d", (int)$parts[1] + 1);
                $new_code = "ODR-" . $new_number;
            } else {
                $new_code = "ODR-0000001";
            }

            $order = new Reservation();
            $order->code = $new_code;
            $order->schedule_id = $request->schedule_id;
            $order->fullname = $request->full_name;
            $order->email = $request->email;
            $order->wa_number = $request->wa_number;
            $order->total_seats = $request->total_seat;
            $order->subtotal = $request->price;
            $order->save();

            if ($order) {
                $schedule = Schedule::find($request->schedule_id);

                foreach ($request->seat_number as $key => $item) {
                    $check_ticket = Ticket::latest('ticket_code')->first('ticket_code');

                    if ($check_ticket) {
                        $ticket_parts =  preg_split("/[-]/", $check_ticket->ticket_code);
                        (string)$new_number = sprintf("%07d", (int)$ticket_parts[1] + 1);
                        $ticket_code = "TST-" . $new_number;
                    } else {
                        $ticket_code = "TST-0000001";
                    }

                    $ticket = new Ticket();
                    $ticket->ticket_code = $ticket_code;
                    $ticket->reservation_code = $order->code;
                    $ticket->seat_number = $item;
                    $ticket->price = $schedule->price;
                    $ticket->save();
                }
            }

            return redirect()->route('landing.shuttle.reservation.payment', $order->code);
        } catch (\Throwable $th) {
            dd($th);
            // return redirect()->back()->with('failed', 'Reservasi gagal');
        }
    }

    public function seatList()
    {
        try {
            $scheduleId = request()->scheduleId;

            $vehicle = Vehicle::with('detailRef')->whereHas('scheduleRef', function ($query) use ($scheduleId) {
                $query->where('id', $scheduleId);
            })->first();

            $tickets = Ticket::whereHas('reservationRef', function ($query) use ($scheduleId) {
                $query->where('schedule_id', $scheduleId);
            })->where('status', 1)->get();

            return response()->json([
                "code" => 200,
                "status" => 1,
                "message" => 'Get data success',
                "vehicle" => $vehicle,
                "tickets" => $tickets
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "code" => 500,
                "status" => 0,
                "message" => 'Get data failed',
                "vehicle" => null,
                "tickets" => null
            ]);
        }
    }

    public function payment($code)
    {
        $banks = BankPayment::where('status', '1')->get();
        $order = Reservation::with(
            'scheduleRef',
            'ticketRef',
            'scheduleRef.routeRef',
            'scheduleRef.vehicleRef',
            'scheduleRef.routeRef.cityDepartureRef',
            'scheduleRef.routeRef.cityArrivalRef'
        )->find($code);

        return view('shuttle.payment', compact('code', 'order', 'banks'));
    }

    public function savePayment(Request $request, $code)
    {
        if (!$request->bank_payment || $request->bank_payment == null) {
            return redirect()->back()->with('failed', 'Pilih bank terlebih dahulu');
        }

        try {
            $order = Reservation::find($code);
            if ($order) {
                $check_ts = Transaction::latest()->first();
                if ($check_ts) {
                    $ts_parts =  preg_split("/[-]/", $check_ts->bill_code);
                    (string)$new_number = sprintf("%07d", (int)$ts_parts[1] + 1);
                    $ts_code = "TAG-" . $new_number;
                } else {
                    $ts_code = "TAG-0000001";
                }
                $ts = new Transaction();
                $ts->bill_code = $ts_code;
                $ts->reservation_code = $code;
                $ts->bank_payment_id = $request->bank_payment;
                $ts->total = $order->subtotal;
                $ts->status = 0;
                $ts->save();

                return redirect()->route('landing.shuttle.reservation.uploadTransfer', $code);
            }

            return redirect()->route('landing.shuttle.reservation.uploadTransfer')->with('failed', 'Data reservasi tidak tersedia');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function paymentSingle($code)
    {
        return view('shuttle.payment_single', compact('code'));
    }

    public function uploadTransfer($code)
    {
        $transaction = Transaction::where('reservation_code', $code)->first();
        if ($transaction) {
            return view('shuttle.upload_transfer', compact('code', 'transaction'));
        }
    }

    public function uploadTransferPost(Request $request, $code)
    {
        if ($request->file('bukti_image')) {
            $resorcePhoto = $request->file('bukti_image');
            $namePhoto  = "butki_transfer_" . rand(00000, 99999) . "." . $resorcePhoto->getClientOriginalExtension();
            $resorcePhoto->move(\base_path() . "/public/assets/bukti-transfer/", $namePhoto);

            $transac = Transaction::where('reservation_code', $code)->first();
            if ($transac) {
                $transac->bill_photo = $namePhoto;
                $transac->status = 1;
                $transac->save();

                return "berhasil";
            }
        }
    }

    public function checkReservation()
    {
        $code = request()->code;

        if ($code) {
            $order = Reservation::with(
                'scheduleRef',
                'ticketRef',
                'scheduleRef.routeRef',
                'scheduleRef.vehicleRef',
                'scheduleRef.routeRef.cityDepartureRef',
                'scheduleRef.routeRef.cityArrivalRef',
                'transactionRef'
            )->find($code);

            if ($order) {
                return view('shuttle.check_reservation', compact('code', 'order'));
            }

            return redirect()->route('landing.shuttle.index')->with('failed', 'Data reservasi tidak tersedia');
        }

        return redirect()->route('landing.shuttle.index')->with('failed', 'Harap isi kode  reservasi dengan benar');
    }

    public function getRouteByDeparture(Request $request)
    {
        try {
            $routes = Route::with('cityArrivalRef')->where('departure', $request->id)->get();
            return response()->json([
                'code' => 200,
                'datas' => $routes,
                'message' => 'Get routes success',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 500,
                'datas' => null,
                'message' => 'Get routes failed',
            ]);
        }
    }

    public function updateStatusReservation($code)
    {
        try {
            $order = Reservation::find($code);

            if ($order) {
                if ($order->status == 1) {
                    $order->status = 0;
                    $order->save();

                    $tickets = Ticket::where('reservation_code', $code)->get();

                    foreach ($tickets as $ticket) {
                        $ticket->status = 0;
                        $ticket->save();
                    }

                    return response()->json([
                        'code' => 200,
                        'status' => 1
                    ]);
                } else {
                    return response()->json([
                        'code' => 200,
                        'status' => 2
                    ]);
                }
            }

            return response()->json([
                'code' => 404,
                'status' => 0
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 500,
                'status' => 0
            ]);
        }
    }
}
