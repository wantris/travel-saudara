<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\models\City;
use App\models\Route;
use App\models\Vehicle;
use App\Reservation;
use App\Schedule;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class travelController extends Controller
{
    public function index()
    {
        $cities = City::get();
        return view('shuttle.index', compact('cities'));
    }

    public function postSearch(Request $request)
    {
        $validatedData = $request->validate([
            'route_id' => 'required',
            'date' => 'required',
        ]);

        $schedules = Schedule::where([
            ['route_id', '=', $request->route_id],
            ['date', '=', $request->date],
        ])->get();

        $this->search($schedules);
    }

    public function search()
    {
        $route = request()->route;
        $date = request()->date;
        $option = request()->option;

        $cities = City::get();

        $schedules = Schedule::with(
            'routeRef',
            'vehicleRef',
            'routeRef.cityDepartureRef',
            'routeRef.cityArrivalRef'
        )->where([
            ['route_id', '=', $route],
            ['date', '=', $date],
        ])->get();

        $route = Route::with('cityDepartureRef', 'cityArrivalRef')->find($route);


        return view('shuttle.search', compact('schedules', 'cities', 'route', 'date'));
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
                    $check_ticket = Ticket::latest()->first();
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
            return redirect()->back()->with('failed', 'Reservasi gagal');
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
            })->get();

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
        $order = Reservation::with('scheduleRef', 'ticketRef')->find($code);

        return view('shuttle.payment', compact('code', 'order'));
    }

    public function paymentSingle($code)
    {
        return view('shuttle.payment_single', compact('code'));
    }

    public function uploadTransfer($code)
    {
        return view('shuttle.upload_transfer', compact('code'));
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
}
