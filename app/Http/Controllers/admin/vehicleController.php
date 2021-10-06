<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\Vehicle;
use App\models\VehicleDetail;
use Illuminate\Http\Request;

class vehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('admin.vehicle.index', compact('vehicles'));
    }

    public function create()
    {
        return view('admin.vehicle.create');
    }

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'total_seat' => 'required',
        ]);

        try {
            $vehicle = new Vehicle();
            $vehicle->vehicle_name = $request->name;
            $vehicle->total_seats = $request->total_seat;
            if ($request->is_active) {
                $vehicle->is_active = 1;
            }
            $vehicle->save();

            if ($vehicle) {
                for ($i = 1; $i <= $request->total_seat; $i++) {
                    $detail = new VehicleDetail();
                    $detail->vehicle_id = $vehicle->id;
                    $detail->number_of_seat = $i;
                    $detail->status = 1;
                    $detail->save();
                }

                return redirect()->route('admin.vehicle.index')->with('success', 'Tambah data kendaraan berhasil');
            }

            return redirect()->back()->with('failed', 'Tambah data kendaraan gagal');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Tambah data kendaraan gagal');
        }
    }

    public function detail($id)
    {
        $vehicle = Vehicle::find($id);
        if ($vehicle) {
            $seats = VehicleDetail::where('vehicle_id', $id)->get();

            return view('admin.vehicle.detail', compact('seats', 'vehicle'));
        }
    }

    public function deleteSeat(Request $request)
    {

        try {

            VehicleDetail::where('id', $request->id)->delete();

            return response()->json([
                "status" => 1,
                "message" => 'Data kursi berhasil dihapus',
            ]);
        } catch (\Throwable $err) {
            return response()->json([
                "status" => 0,
                "message" => 'Data kursi gagal dihapus',
            ]);
        }
    }

    public function addSeat($id)
    {
        $details = VehicleDetail::where('vehicle_id', $id)->get();
        $vehicle = Vehicle::find($id);
        if ($vehicle) {
            if ($details->count() > 0) {
                $list = array();

                foreach ($details as $detail) {
                    array_push($list, $detail->number_of_seat);
                }


                $minNumber = min($list);
                $maxNumber = max($list);

                $missingNumber = null;

                for ($x = $minNumber; $x <= $maxNumber; $x++) {
                    if (!in_array($x, $list)) {
                        $missingNumber = $x;
                        break;
                    }
                }

                if ($missingNumber) {
                    $new = new VehicleDetail();
                    $new->vehicle_id = $vehicle->id;
                    $new->number_of_seat = $missingNumber;
                    $new->status = 1;
                    $new->save();
                } else {
                    $new = new VehicleDetail();
                    $new->vehicle_id = $vehicle->id;
                    $new->number_of_seat = $maxNumber + 1;
                    $new->status = 1;
                    $new->save();
                }

                return redirect()->back()->with('success', 'Tambah data kursi berhasil');
            }
        }
    }
}
