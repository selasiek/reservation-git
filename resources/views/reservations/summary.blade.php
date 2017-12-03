@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">

          <!-- reservation form -->

            <div class="panel panel-default">
                <div class="panel-heading">
                  <h3>TRANSACTION SUMMARY</h3>
                </div>
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/reservations/store/') }}" target="hiddenFrame">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                      <input type="hidden" name="operator_id" value="{{$transaction_summary["operator_id"]}}">
                      <input type="hidden" name="schedule_id" value="{{$transaction_summary["schedule_id"]}}">
                      <input type="hidden" name="full_name" value="{{$transaction_summary["full_name"]}}">
                      <input type="hidden" name="contact" value="{{$transaction_summary["contact"]}}">
                      <input type="hidden" name="e_contact" value="{{$transaction_summary["e_contact"]}}">
                      <input type="hidden" name="email" value="{{$transaction_summary["email"]}}">
                      <input type="hidden" name="operator" value="{{$transaction_summary["operator"]}}">
                      <input type="hidden" name="bus_type" value="{{$transaction_summary["bus_type"]}}">
                      <input type="hidden" name="from" value="{{$transaction_summary["from"]}}">
                      <input type="hidden" name="to" value="{{$transaction_summary["to"]}}">
                      <input type="hidden" name="date" value="{{$transaction_summary["date"]}}">
                      <input type="hidden" name="reporting" value="{{$transaction_summary["reporting"]}}">
                      <input type="hidden" name="departure" value="{{$transaction_summary["departure"]}}">
                      <input type="hidden" name="ticket_count" value="{{$transaction_summary["ticket_count"]}}">
                      <input type="hidden" name="total_fare" value="{{$transaction_summary["total_fare"]}}">
                      <input type="hidden" name="processing_fee" value="{{$transaction_summary["processing_fee"]}}">
                      <input type="hidden" name="total_amount" value="{{$transaction_summary["total_amount"]}}">

                    <div class="">
                      <table class="table table-striped" width="400">
                        <tbody>
                          <tr>
                            <th>Full Name:</th>
                            <td>{{$transaction_summary["full_name"]}}</td>
                          </tr>
                          <tr>
                            <th>Contact:</th>
                            <td>{{$transaction_summary["contact"]}}</td>
                          </tr>
                          <tr>
                            <th>Emergency Contact:</th>
                            <td>{{$transaction_summary["e_contact"]}}</td>
                          </tr>
                          <tr>
                            <th>Email:</th>
                            <td>{{$transaction_summary["email"]}}</td>
                          </tr>
                          <tr>
                            <th>Bus Operator:</th>
                            <td>{{$transaction_summary["operator"]}}</td>
                          </tr>
                          <tr>
                            <th>Bus Type:</th>
                            <td>{{$transaction_summary["bus_type"]}}</td>
                          </tr>
                          <tr>
                            <th>Journey:</th>
                            <td>From <strong>{{$transaction_summary["from"]}}</strong>  to <strong>{{$transaction_summary["to"]}}</strong> </td>
                          </tr>
                          <tr>
                            <th>Travel Date:</th>
                            <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($transaction_summary["date"]))->toFormattedDateString()}}</td>
                          </tr>
                          <tr>
                            <th>Reporting Time:</th>
                            <td>{{$transaction_summary["reporting"]}}</td>
                          </tr>
                          <tr>
                            <th>Departure Time:</th>
                            <td>{{$transaction_summary["departure"]}}</td>
                          </tr>
                          <tr>
                            <th>No. of Tickets:</th>
                            <td>{{$transaction_summary["ticket_count"]}}</td>
                          </tr>
                          <tr>
                            <th>Total Bus Fare:</th>
                            <td>GHC {{$transaction_summary["total_fare"]}}.00</td>
                          </tr>
                          <tr>
                            <th>Our Charge:</th>
                            <td>GHC {{$transaction_summary["processing_fee"]}}</td>
                          </tr>
                          <tr>
                            <th>Total Amount:</th>
                            <th>GHC {{$transaction_summary["total_amount"]}}</th>
                          </tr>
                      <tbody>
                    </table>

                    <hr>
                    <p align="center"><input type="checkbox" name="" value="" onchange="document.getElementById('checkout').disabled = !this.checked;">&nbsp; Please accept our <a href="#" data-toggle="modal" data-target=".bs-tnc-modal-lg">terms and conditions</a> and proceed to checkout</p>

                    <!-- terms and conditions modal -->

                    <div class="modal fade bs-tnc-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel"><b> Terms and Conditions</b> </h4>
                        </div>
                        <div class="modal-body">

<b><u>Important Points</u></b>
</br>
</br>
<b>1. TicketAfriq*</b> is an online marketplace. It does not operate bus services of its own. In order to provide a comprehensive choice of bus operators, departure times and prices to customers, it has tied up with many bus operators.
<br></br>
<b>2. TicketAfriq's</b> advice to customers is to choose bus operators they are aware of and whose service they are comfortable with.
<br></br>
<b>3. TicketAfriq’s</b> responsibilities include:
<br>
    <ul>
         <li>Issuing a valid ticket (a ticket that will be accepted by the bus operator) for its’ network of bus operators</li>
         <li>Providing refund and support in the event of cancellation</li>
         <li>Providing customer support and information in case of any delays / inconvenience</li>
   </ul>

<b>4. TicketAfriq’s</b> responsibilities do NOT include:

  <ul>
        <li>The bus operator’s bus not departing / reaching on time</li>
        <li>The bus operator’s employees being rude</li>
        <li>The bus operator’s bus seats etc not being up to the customer’s expectation</li>
        <li>The bus operator cancelling the trip due to unavoidable reasons</li>
        <li>The baggage of the customer getting lost / stolen / damaged</li>
        <li>The bus operator changing a customer’s seat at the last minute to accommodate child/person with disability/aged person, etc.</li>
        <li>The customer waiting at the wrong boarding point (please call the bus operator to find out the exact boarding point if you are not a regular traveller on that particular bus)</li>
</ul>

<b>* TicketAfriq means to include TicketAfriq and its partner outlets (iPay, MTN Mobile Money, Tigo Cash, Airtel Money and Vodafone Cash,  etc)</b>
<br/>
<br/>
<b>5.</b> The <b>arrival</b> and <b>departure</b> times mentioned on the ticket are only estimated times. However the bus will not leave the source before the time that is mentioned on the ticket.
</br>
</br>
<b>6.</b> Passengers are required to furnish the following at the time of boarding the bus:
<ul>
        <li>A copy of the ticket (A print out of the ticket or the print out of the ticket e-mail).</li>
        <li>Identity proof (Driving license, Student ID card, Company ID card, Passport or Voter ID card).</li>
</ul>
Failing to do so, they may not be allowed to board the bus.

</br>
</br>
<b>7. Change of bus:</b> In case the bus operator changes the type of bus due to some reason, TicketAfriq will refund the differential amount to the customer upon being intimated by the customers in 24 hours of the journey.
</br>
</br>

<b>8. Cancellation Policy:</b> The tickets booked through TicketAfriq are cancellable.
The following is the cancellation fee: Between 24 hours to 3 days before journey the cancellation charge is 10%. Between 3 days to 1 week before journey the cancellation charge is 5%.
Please note that the cancellation fee and cancellation period may differ from one bus operator to another. Please contact any of our executives for complete details or enter your ticket number on the print ticket tab to read the cancellation policy for your ticket.
</br>
</br>
<b>9.</b> In case one needs the refund to be credited back to his/her bank account, please write your  account details to support@ticketafriq.com
</br>
* The transaction charges or the home delivery charges, will not be refunded in the event of ticket cancellation.
</br>
</br>
<b>10.</b> In case a booking confirmation e-mail and sms gets delayed or fails because of technical reasons or as a result of incorrect e-mail ID / phone number provided by the user etc, a ticket will be considered 'booked' as long as the ticket shows up on the confirmation page of www.ticketafriq.com.
</br>
</br>
<b>11.</b> TicketAfriq does not warrant or make any representations regarding the use of or the result of the use of the material on the site in terms of their correctness, accuracy, reliability, or otherwise, insofar as such material is derived from other service providers.

TicketAfriq will not be liable to you or to any other person for any direct, indirect, incidental, punitive or consequential loss, damage, cost or expense of any kind whatsoever and howsoever caused from out of the information derived by you through your usage of this Site. In no event shall TicketAfriq be liable for any direct, indirect, punitive, incidental, special, or consequential damages arising out of information provided on the website in so far as such information is derived from other service providers.
<br/>
<br/>
<b><u>Communication Policy</u></b>
</br>
</br>
<b>1.</b>	By accepting the terms and conditions the customer accepts that TicketAfriq may send the alerts to the mobile phone number provided by the customer while registering for the service or to any such number replaced and informed by the customer. The customer acknowledges that the alerts will be received only if the mobile phone is in ‘On’ mode to receive the SMS. If the mobile phone is in ‘Off’’ mode then the customer may not get / get after delay any alerts sent during such period.
</br>
</br>
<b>2.</b>	TicketAfriq will make best efforts to provide the service and it shall be deemed that the customer shall have received the information sent from TicketAfriq as an alert on the mobile phone number provided during the course of ticket booking and TicketAfriq shall not be under any obligation to confirm the authenticity of the person(s) receiving the alert. The customer cannot hold TicketAfriq liable for non-availability of the service in any manner whatsoever.
</br>
</br>

<b>3.</b>	The customer acknowledges that the SMS service provided by TicketAfriq is an additional facility provided for the customer’s convenience and that it may be susceptible to error, omission and/ or inaccuracy. In the event the customer observes any error in the information provided in the alert, TicketAfriq shall be immediately informed about the same by the customer and TicketAfriq will make best possible efforts to rectify the error as early as possible. The customer shall not hold TicketAfriq liable for any loss, damages, claim, expense including legal cost that may be incurred/ suffered by the customer on account of the SMS facility.
</br>
</br>
<b>4.</b>	The customer acknowledges that the clarity, readability, accuracy, and promptness of providing the service depend on many factors including the infrastructure, connectivity of the service provider. TicketAfriq shall not be responsible for any non-delivery, delayed delivery or distortion of the alert in any way whatsoever.
</br>
</br>

<b>5.</b>	The customer agrees to indemnify and hold harmless TicketAfriq and the SMS service provider including its officials from any damages, claims, demands, proceedings, loss, cost, charges and expenses whatsoever including legal charges and attorney fees which TicketAfriq and the SMS service provider may at any time incur, sustain, suffer or be put to as a consequence of or arising out of (i) misuse, improper or fraudulent information provided by the customer, (ii) the customer providing incorrect number or providing a number that belongs to that of an unrelated third party, and/or (iii) the customer receiving any message relating to the reservation number, travel itinerary information, booking confirmation, modification to a ticket, cancellation of ticket, change in bus schedule, delay, and/or rescheduling from TicketAfriq and/or the SMS service provider.
</br>
</br>
<b>6.</b>	By accepting the terms and conditions the customer acknowledges and agrees that TicketAfriq may call the mobile phone number provided by the customer while registering for the service or to any such number replaced and informed by the customer, for the purpose of collecting feedback from the customer regarding their travel, the bus facilities and/or services of the bus operator.
</br>
</br>

<b>7.</b>	Grievances and claims related to the bus journey should be reported to TicketAfriq support team within 10 days of your travel date.
</br>
</br>

<b><u>Disclaimer</u></b>
</br>
</br>
Subject to the limitations set out in these terms and conditions and to the extent permitted by law, we shall only be liable for direct damages actually suffered, paid or incurred by you due to an attributable shortcoming of our obligations in respect to our services, up to an aggregate amount of the aggregate cost of your reservation as set out in the confirmation email (whether for one event or series of connected events).
However and to the extent permitted by law, neither we nor any of our officers, directors, employees, representatives, subsidiaries, affiliated companies, distributors, affiliate (distribution) partners, licensees, agents or others involved in creating, sponsoring, promoting, or otherwise making available the site and its contents shall be liable for (i) any punitive, special, indirect or consequential loss or damages, any loss of production, loss of profit, loss of revenue, loss of contract, loss of or damage to goodwill or reputation, loss of claim, (ii) any inaccuracy relating to the (descriptive) information (including rates, availability and ratings) of the buses as made available on our website, (iii) the services rendered or the products offered by the bus provider, (iv) any (direct, indirect, consequential or punitive) damages, losses or costs suffered, incurred or paid by you, pursuant to, arising out of or in connection with the use, inability to use or delay of our website, or (v) for any (personal) injury, death, property damage, or other (direct, indirect, special, consequential or punitive) damages, losses or costs suffered, incurred or paid by you, whether due to (legal) acts, errors, breaches, (gross) negligence, wilful misconduct, omissions, non-performance, misrepresentations, tort or strict liability by or (wholly or partly) attributable to the accommodation (its employees, directors, officers, agents, representatives or affiliated companies), including any (partial) cancellation, overbooking, strike, force majeure or any other event beyond our control.
</br>
</br>
<b><u>Intellectual property rights</u></b>
</br>
</br>
Unless stated otherwise, the software required for our services or available on or used by our website and the intellectual property rights (including the copyrights) of the contents and information of and material on our website are owned by TicketAfriq.com.
</br>
</br>
<b><u>Miscellaneous</u></b>
</br>
</br>
To the extent permitted by law, these terms and conditions and the provision of our services shall be governed by and construed in accordance with Ghanaian law and any dispute arising out of these general terms and conditions and our services shall exclusively be submitted to the competent courts in Ghana.
If any provision of these terms and conditions is or becomes invalid, unenforceable or non-binding, you shall remain bound by all other provisions hereof. In such event, such invalid provision shall nonetheless be enforced to the fullest extent permitted by applicable law, and you will at least agree to accept a similar effect as the invalid, unenforceable or non-binding provision, given the contents and purpose of these terms and conditions.

It is mandatory for passengers to present valid ticket for identification at the time of boarding.

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                        </div>
                      </div>
                    </div>

                    <!-- terms and conditions modal -->


                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-5 col-xs-6 col-xs-offset-4">
                              <!-- <button type="submit" class="btn btn-warning">
                                  CHECK OUT
                              </button> -->




                              <!-- Large modal -->
                                <button  id="checkout" disabled type="submit" class="btn btn-warning" data-toggle="modal" data-target=".bs-example-modal-lg">CHECK OUT</button>

                                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                  <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="myModalLabel">Reservation almost complete</h4>
                                    </div>
                                    <div class="modal-body">
                                      You will receive your ticket details via SMS shortly.
                                      <br>
                                      In order to finalise your reservation, kindly proceed to pay the
                                      cost to the number specified in the message.
                                      <br>
                                      Please call our customer care on 0550635126
                                      if you do not receive the SMS in less than 10 minutes.
                                      <br>
                                      <br>
                                      Thank you for using our service. Have a safe trip.
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                    </div>
                                  </div>
                                </div>
                            <!-- /Large modal -->



                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
<iframe name="hiddenFrame" width="0" height="0" border="0" style="display: none;"></iframe>
@endsection
