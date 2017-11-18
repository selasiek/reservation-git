<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Schedule;
use App\User;
use Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        return view('schedules.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $schedule = new Schedule;
        $schedule->client_id = Auth::id();
        $schedule->bus_type = $request->input('bus_type');
        $schedule->from = $request->input('from');
        $schedule->to = $request->input('to');
        $schedule->date = $request->input('date');
        $schedule->fare = $request->input('fare');
        $schedule->seat_count = $request->input('seat_count');
        $schedule->reporting = $request->input('reporting');
        $schedule->departure = $request->input('departure');
        $schedule->save();

        return redirect('/schedules/' . Auth::id());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedules = Schedule::where('client_id', $id)->get();
        return view('schedules.index', compact('schedules'));
        //return $schedule;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::find($id);

        //return dd($schedule);
        return view('schedules.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $schedule = Schedule::find($id);
        $schedule->client_id = Auth::id();
        $schedule->bus_type = $request->input('bus_type');
        $schedule->from = $request->input('from');
        $schedule->to = $request->input('to');
        $schedule->date = $request->input('date');
        $schedule->fare = $request->input('fare');
        $schedule->seat_count = $request->input('seat_count');
        $schedule->reporting = $request->input('reporting');
        $schedule->departure = $request->input('departure');
        $schedule->save();

        return redirect('/schedules/' . Auth::id());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();

        return redirect('/schedules/'. Auth::id());
    }
}
