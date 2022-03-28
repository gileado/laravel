<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(): View
    {
        $data['flights'] = Flight::query()
            ->where('user_id', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->paginate(5);
        return view('flights.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function booking(): View
    {
        return view('flights.booking');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request): RedirectResponse
    {
        //dd($request->all());
        $request->validate([
            'ticket_id' => 'required',
            'flight_id' => 'required',
            'flight_destination' => 'required',
            'ticket_cost' => 'required',
        ]);
        $flight = new Flight;
        $flight->ticket_id = $request->ticket_id;
        $flight->flight_id = $request->flight_id;
        $flight->flight_destination = $request->flight_destination;
        $flight->ticket_cost = $request->ticket_cost;
        $flight->user_id = auth()->user()->id;
        $flight->save();
        return redirect()->route('flights.index')
            ->with('success', 'Flight has been booked successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight): View
    {
        return view('flights.show', compact('flight'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight): RedirectResponse
    {
        $flight->delete();
        return redirect()->route('flights.index')
            ->with('success', 'Flight has been cancelled successfully.');
    }
}
