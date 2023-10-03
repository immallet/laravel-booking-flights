<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dateNow = Carbon::now()->toDateTimeString();
        $flights = Flight::with('users')->where('departure_time', '>=', $dateNow)->get();
        return view('flights', ['flights' => $flights]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flight = Flight::findOrFail($id);
        return view('flights/show', ['flight' => $flight]);
    }
}
