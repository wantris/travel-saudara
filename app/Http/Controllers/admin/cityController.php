<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\City;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Throwable;

class cityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('admin.city.index', compact('cities'));
    }

    public function create()
    {
        $cities = RajaOngkir::kota()->all();
        return view('admin.city.create', compact('cities'));
    }

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'city' => 'required',
        ]);

        $city_inp =  $request->city;

        try {
            $city = new City();
            $city->name = $city_inp;
            $city->save();
            return redirect()->route('admin.city.index')->with('success', 'Tambah kota berhasil');
        } catch (\Throwable $err) {
            return redirect()->back()->with('failed', 'Tambah kota gagal');
        }
    }

    public function delete(Request $request)
    {
        $city_id = $request->city_id;

        try {

            City::where('id', $city_id)->delete();

            return response()->json([
                "status" => 1,
                "message" => 'Kota rute berhasil dihapus',
            ]);
        } catch (Throwable $err) {
            return response()->json([
                "status" => 0,
                "message" => 'Kota rute gagal dihapus',
            ]);
        }
    }
}
