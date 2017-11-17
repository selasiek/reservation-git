<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use \Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;
use App\Schedule;
use App\User;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function main()
    {
      return view('welcome.main-landing');
    }
    public function index()
    {
        //$schedules = Schedule::all();
        $schedules = DB::table('schedules')
                      ->join('users', 'schedules.client_id', '=', 'users.id')
                      ->select('schedules.*', 'users.company_name')
                      ->get();

        //return response();
        // $current = Carbon::now();
        // return $current->toFormattedDateString();
        return view('welcome.landing-page', compact('schedules'));
    }

    public function search(Request $request)
    {

      if ($request->input('date') == null){
        $date = "";
      }else{
        $date = Carbon::createFromTimeStamp(strtotime($request->input('date')))->toFormattedDateString();
      }

      $fromTo = array('from' => $request->input('from'),
                      'to' => $request->input('to'),
                      'date' => $date);

      if ($request->input('date') == null){
        $schedules = DB::table('schedules')
                      ->where('from', '=', $request->input('from'))
                      ->where('to', '=', $request->input('to'))
                      ->join('users', 'schedules.client_id', '=', 'users.id')
                      ->select('schedules.*', 'users.company_name')
                      ->get();
        return view('welcome.searched-routes', compact('schedules', 'fromTo'));
      }else{
        $schedules = DB::table('schedules')
                      ->where('from', '=', $request->input('from'))
                      ->where('to', '=', $request->input('to'))
                      ->where('date', '=', $request->input('date'))
                      ->join('users', 'schedules.client_id', '=', 'users.id')
                      ->select('schedules.*', 'users.company_name')
                      ->get();
        return view('welcome.searched-routes', compact('schedules', 'fromTo'));
      }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
