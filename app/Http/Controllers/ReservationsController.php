<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Reservation;
use Carbon\Carbon;
use App\Schedule;
use App\User;
use App\Alert;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $id = input::get('operator_id');
       $schedule = Schedule::where('id', $id)->get()[0]; // get particular schedule for itinerary
       $operator = User::where('id', $schedule->client_id)->get()[0]; // get corresponding transport company
       //return $operator;
       $ticket_count = input::get('ticket_count');
       $schedule->fare = $ticket_count * $schedule->fare; //calculate fare from number of tickets selected
       $processing_fee = 8/100 * $schedule->fare; //processing fee is 8% of ticket fare
       $total_amount = $processing_fee + $schedule->fare;
       return view('reservations.create', compact('schedule', 'operator', 'ticket_count', 'processing_fee', 'total_amount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store customer details
        $date = Carbon::now(); //get the current date
        $reservation = new Reservation;
        $reservation->operator_id = $request->input('operator_id');
        $reservation->full_name = $request->input('full_name');
        $reservation->contact = $request->input('contact');
        $reservation->email = $request->input('email');
        $reservation->operator = $request->input('operator');
        $reservation->e_contact = $request->input('e_contact');
        $reservation->from = $request->input('from');
        $reservation->to = $request->input('to');
        $reservation->bus_type = $request->input('bus_type');
        $reservation->reporting = $request->input('reporting');
        $reservation->departure = $request->input('departure');
        $reservation->ticket_count = $request->input('ticket_count');
        $reservation->total_amount = $request->input('total_amount');
        $reservation->date = $date->toDateString();
        $reservation->seat_number = 0;
        $reservation->ticket_number = 0;
        $reservation->cancel_flag = 0;
        $reservation->save();
        //$reservation->transaction_id = $request->input('transaction_id');
        $first = explode(' ',$request->input('full_name'))[0];

        $message = 'Dear '. $first
        .",\nYour reservation details are below;"
        ."\nBus company: ". strtoupper($request->input('operator'))
        ."\nNo of tickets: ".$request->input('ticket_count')
        ."\nFrom: ".$request->input('from')
        ."\nTo: ".$request->input('to')
        ."\nDeparture time: ".$request->input('departure')
        ."\nAmount: GHC ".$request->input('total_amount')
        ."\nKindly pay GHC ".$request->input('total_amount')." to MTN Mobile Money number 0550635126 (Abdulai Antigba) to confirm your reservation.
          \nThank you for using ticketafriq.com";

        // echo $message;
        // echo strlen($message);

        $sms = new Alert;
        $phone = $sms->formatNumber($request->input('contact')); //format phone number from input. Prepend with 233
        $sms->Sender("121.241.242.114","8080","grn-dbridge","digitalb","TICKETAFRIQ",$message,$phone,"0","1");
        $sms->Submit();
        //return 'Message sent to '. $phone;
    }

    public function summary()
    {
      $transaction_summary = array(
        'operator_id' => input::get('operator_id'),
        'full_name' => input::get('full_name'),
        'contact' => input::get('contact'),
        'e_contact' => input::get('e_contact'),
        'email' => input::get('email'),
        'operator' => input::get('operator'),
        'bus_type' => input::get('bus_type'),
        'from' => input::get('from'),
        'to' => input::get('to'),
        'date' => input::get('date'),
        'reporting' => input::get('reporting'),
        'departure' => input::get('departure'),
        'ticket_count' => input::get('ticket_count'),
        'total_fare' => input::get('total_fare'),
        'processing_fee' => input::get('processing_fee'),
        'total_amount' => input::get('total_amount'),
      );

       //return $transaction_summary;
       return view('reservations.summary', compact('transaction_summary'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $reservations = Reservation::where('operator_id', $id)->get();
      return view('reservations.index', compact('reservations'));
      //return $reservations;
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