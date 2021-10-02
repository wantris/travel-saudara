<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class travelController extends Controller
{
    public function index()
    {
        return view('shuttle.index');
    }

    public function search()
    {
        return view('shuttle.search');
    }

    public function createReservation()
    {
        $code = Str::random(20);

        return redirect()->route('landing.shuttle.reservation.index', $code);
    }

    public function reservation($code)
    {
        return view('shuttle.reservation', compact('code'));
    }
}
