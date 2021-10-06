<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\City;
use App\models\Route;
use Illuminate\Http\Request;

class routeController extends Controller
{
    public function index()
    {
        $routes = Route::all();
        return view('admin.routecity.index', compact('routes'));
    }

    public function create()
    {
        $cities = City::get();
        return view('admin.routecity.create', compact('cities'));
    }

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'departure' => 'required',
            'arrival' => 'required',
            'price' => 'required',
        ]);


        try {
            $route = new Route();
            $route->departure = $request->departure;
            $route->arrival = $request->arrival;
            $route->price = $request->price;
            if ($request->is_active) {
                $route->is_active = 1;
            }
            $route->save();

            return redirect()->route('admin.route.index')->with('success', 'Data rute berhasil ditambahkan');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function edit($id)
    {
        $route = Route::find($id);
        if ($route) {
            $cities = City::get();
            return view('admin.routecity.edit', compact('cities', 'route'));
        }

        return redirect()->back()->with('failed', 'Data rute tidak ada');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'departure' => 'required',
            'arrival' => 'required',
            'price' => 'required',
        ]);


        try {
            $route = Route::find($request->id);
            if ($route) {
                $route->departure = $request->departure;
                $route->arrival = $request->arrival;
                $route->price = $request->price;
                if ($request->is_active) {
                    $route->is_active = 1;
                } else {
                    $route->is_active = 0;
                }
                $route->save();

                return redirect()->route('admin.route.index')->with('success', 'Data rute berhasil ditambahkan');
            }

            return redirect()->back()->with('failed', 'Data rute tidak ada');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function delete(Request $request)
    {

        try {

            Route::where('id', $request->id)->delete();

            return response()->json([
                "status" => 1,
                "message" => 'Data rute berhasil dihapus',
            ]);
        } catch (\Throwable $err) {
            return response()->json([
                "status" => 0,
                "message" => 'Data rute gagal dihapus',
            ]);
        }
    }
}
