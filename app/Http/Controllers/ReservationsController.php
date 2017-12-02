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
       $id = input::get('schedule_id');
       $schedule = Schedule::where('id', $id)->get()[0]; // get particular schedule for itinerary
       $operator = User::where('id', $schedule->client_id)->get()[0]; // get corresponding transport company
       //return $operator;
       $ticket_count = input::get('ticket_count');
       $schedule->fare = $ticket_count * $schedule->fare; //calculate fare from number of tickets selected
       $processing_fee = 0.08 * $schedule->fare; //processing fee is 8% of ticket fare
       $total_amount = $processing_fee + $schedule->fare;
       return view('reservations.create', compact('schedule', 'seat_count', 'operator', 'ticket_count', 'processing_fee', 'total_amount'));
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
        //$date = Carbon::now(); //get the current date
        $reservation = new Reservation;
        $reservation->operator_id = $request->input('operator_id');
        $reservation->full_name = $request->input('full_name');
        $reservation->contact = $request->input('contact');
        $reservation->email = $request->input('email');
        //$reservation->operator = $request->input('operator');
        $reservation->e_contact = $request->input('e_contact');
        $reservation->from = $request->input('from');
        $reservation->to = $request->input('to');
        $reservation->bus_type = $request->input('bus_type');
        $reservation->reporting = $request->input('reporting');
        $reservation->departure = $request->input('departure');
        $reservation->ticket_count = $request->input('ticket_count');
        $reservation->total_amount = $request->input('total_amount');
        $reservation->date = $request->input('date');
        $reservation->seat_number = 0;
        $reservation->ticket_number = 0;
        $reservation->cancel_flag = 0;
        $reservation->invoice_number = 0;
        $reservation->transaction_id = 0;
        $reservation->save();

        /**reduce available seats by 1 and increase seats sold by 1**/
        $id = input::get('schedule_id');
        $schedule = Schedule::where('id', $id)->get()[0];
        $schedule->seat_count = $schedule->seat_count - $request->input('ticket_count');
        $schedule->seats_sold = $schedule->seats_sold + $request->input('ticket_count');
        $schedule->save();

        // $message = "Dear ". $first
        // .", Your reservation details;"
        // ." Operator: ". strtoupper($request->input('operator'))
        // ." Tickets: ".$request->input('ticket_count')
        // ." From: ".$request->input('from')
        // ." To: ".$request->input('to')
        // ." Departure: ".$request->input('departure')
        // ." Amt: GHC ".$request->input('total_amount')
        // ." Kindly pay GHC ".$request->input('total_amount')." to MTN Mobile Money number 0550635126 (Abdulai Antigba) to complete your reservation.
        //    Thank you for using ticketafriq.com";
        //
        // // echo strlen($message);
        //  $test = "Dear ";
        // ." Operator: ". strtoupper($request->input('operator'))
        // ." Tickets: ".$request->input('ticket_count')
        // ." From: ".$request->input('from')
        // ." To: ".$request->input('to')
        // ." Departure: ".$request->input('departure')
        // ." Amt: GHC ".$request->input('total_amount')
        // ." Kindly pay GHC ".$request->input('total_amount')
        //." to MTN Mobile Money number 0550635126 (Abdulai Antigba) to complete your reservation.";
        //Thank you for using ticketafriq.com;S

        //echo $test;
        //$sms = new Alert;

        $obj = new Alert;
        $CustomerPhone = $obj->formatNumber($request->input('contact'));
        $first_name = explode(' ',$request->input('full_name'))[0];
        $customerMessage = 'Dear '. $first_name
        .",\nYour reservation details;"
        ."\nOperator: ". strtoupper($request->input('operator'))
        ."\nTickets: ".$request->input('ticket_count')
        ."\nFrom: ".$request->input('from')
        ."\nTo: ".$request->input('to')
        ."\nDeparture: ".$request->input('departure')
        ."\nAmt: GHC ".$request->input('total_amount')
        ."\nKindly pay GHC ".$request->input('total_amount')." to MTN Mobile Money number 0550635126 (Abdulai Antigba) to complete your reservation.
          \nThank you for using ticketafriq.com";

        $obj = new Alert;
        $obj->Sender("121.241.242.114","8080","grn-dbridge","digitalb","TICKETAFRIQ",$customerMessage,$CustomerPhone,"0","1");
        $obj->Submit();

        /*send message to admin*/
        //$adminPhone = '233542873229';
        $adminPhone = '233207024947';
        $adminMessage = "Ticket purchase alert"
        ."\nName: ". $request->input('full_name')
        ."\nContact: ". $request->input('contact')
        ."\nOperator: ". strtoupper($request->input('operator'))
        ."\nTickets: ".$request->input('ticket_count')
        ."\nFrom: ".$request->input('from')
        ."\nTo: ".$request->input('to')
        ."\nDeparture: ".$request->input('departure')
        ."\nAmt: GHC ".$request->input('total_amount');

        sleep(2);
        $obj_2 = new Alert;
        $obj_2->Sender("121.241.242.114","8080","grn-dbridge","digitalb","TICKETALERT",$adminMessage,$adminPhone,"0","1");
        $obj_2->Submit();




        // $phone = $sms->formatNumber($request->input('contact')); //format phone number from input. Prepend with 233
        // $sms->Sender("121.241.242.114","8080","grn-dbridge","digitalb","TICKETAFRIQ",$message,$phone,"0","1");
        // $sms->Submit();
        //echo 'Message sent to '. $phone . $message;
    }

    public function summary()
    {
      $transaction_summary = array(
        'operator_id' => input::get('operator_id'),
        'schedule_id' => input::get('schedule_id'),
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
