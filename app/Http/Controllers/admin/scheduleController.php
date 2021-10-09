<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\Route;
use App\models\Vehicle;
use App\Schedule;
use Illuminate\Http\Request;

class scheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with(
            'routeRef',
            'vehicleRef',
            'routeRef.cityDepartureRef',
            'routeRef.cityArrivalRef'
        )->get();

        return view('admin.schedule.index', compact('schedules'));
    }

    public function create()
    {
        $vehicles = Vehicle::get();
        $routes = Route::with('cityDepartureRef', 'cityArrivalRef')->get();
        return view('admin.schedule.create', compact('routes', 'vehicles'));
    }

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'route' => 'required',
            'vehicle' => 'required',
            'date' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'price' => 'required',
        ]);

        try {
            $vehicle = Vehicle::find($request->vehicle);
            if ($vehicle) {
                $item = new Schedule();
                $item->route_id = $request->route;
                $item->vehicle_id = $request->vehicle;
                $item->date = $request->date;
                $item->departure_time = $request->departure_time;
                $item->arrival_time = $request->arrival_time;
                $item->price = $request->price;
                $item->seats_filled = 0;
                $item->remaining_seats = $vehicle->total_seats;
                $item->save();

                return redirect()->route('admin.schedule.index')->with('success', 'Data jadwal berhasil ditambahkan');
            }

            return redirect()->back()->with('failed', 'Kendaraan tidak ada');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function edit($id)
    {
        $schedule = Schedule::find($id);
        if ($schedule) {
            $vehicles = Vehicle::get();
            $routes = Route::with('cityDepartureRef', 'cityArrivalRef')->get();
            return view('admin.schedule.edit', compact('routes', 'vehicles', 'schedule'));
        }

        return redirect()->back()->with('failed', 'Data jadwal travel tidak ada');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'route' => 'required',
            'vehicle' => 'required',
            'date' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'price' => 'required',
        ]);

        try {
            $vehicle = Vehicle::find($request->vehicle);
            if ($vehicle) {
                $item = Schedule::find($request->id);
                if ($item->vehicle_id != $request->vehicle) {
                    $item->route_id = $request->route;
                    $item->vehicle_id = $request->vehicle;
                    $item->date = $request->date;
                    $item->departure_time = $request->departure_time;
                    $item->arrival_time = $request->arrival_time;
                    $item->price = $request->price;
                    $item->seats_filled = 0;
                    $item->remaining_seats = $vehicle->total_seats;
                    $item->save();
                } else {
                    $item->route_id = $request->route;
                    $item->vehicle_id = $request->vehicle;
                    $item->date = $request->date;
                    $item->departure_time = $request->departure_time;
                    $item->arrival_time = $request->arrival_time;
                    $item->price = $request->price;
                    $item->save();
                }

                return redirect()->route('admin.schedule.index')->with('success', 'Data jadwal berhasil ditambahkan');
            }

            return redirect()->back()->with('failed', 'Kendaraan tidak ada');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function delete(Request $request)
    {
        try {

            Schedule::where('id', $request->id)->delete();

            return response()->json([
                "status" => 1,
                "message" => 'Jadwal travel berhasil dihapus',
            ]);
        } catch (\Throwable $err) {
            return response()->json([
                "status" => 0,
                "message" => 'Jadwal travel gagal dihapus',
            ]);
        }
    }
}
