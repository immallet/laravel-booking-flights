<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserFlightRequest;
use Illuminate\Support\Facades\Auth;

class UserFlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $flights = $user->flights;
        return view('userflights/index', ['flights' => $flights]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUserFlightRequest  $request
     * @param  int  $flight_id
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserFlightRequest $request, $flight_id)
    {
        $userId = Auth::id();
        $flight = Flight::find($flight_id);
        $amount = $request->tickets;
        if($amount > $flight->tickets_available){
            return view('flights/show', ['flight' => $flight])->withErrors(['tickets' => 'No hay tickets suficientes']);
        }
        $flight->tickets_available = $flight->tickets_available - $amount;
        $flight->save();
        $flight->users()->attach($userId, ['amount' => $amount]);
        return redirect('vuelos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userFlightid)
    {
        $user = Auth::user();
        $flight = $user->flights()->where('users_flights.id', $userFlightid)->first();
        return view('userflights/show', ['flight' => $flight]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserFlightRequest $request, $userflight_id)
    {
        $user = Auth::user();
        $flight = $user->flights()->where('users_flights.id', $userflight_id)->first();
        $amount = $request->tickets;
        $flight->tickets_available = $flight->tickets_available + $flight->pivot->amount;
        if($amount > $flight->tickets_available){
            return back()->withErrors(['tickets' => 'No hay tickets suficientes']);
        }
        $flight->tickets_available = $flight->tickets_available - $amount;
        $flight->save();
        $flight->users()->update(['amount' => $amount]);
        return redirect('vuelos-usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userflight_id)
    {
        $user = Auth::user();
        $flight = $user->flights()->where('users_flights.id', $userflight_id)->first();
        $flight->tickets_available = $flight->tickets_available + $flight->pivot->amount;
        $flight->save();
        $flight->users()->detach();
        return redirect('vuelos-usuario');
    }
}
