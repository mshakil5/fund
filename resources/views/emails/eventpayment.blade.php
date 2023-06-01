
@component('mail::message')

<h3>Dear Mr {{$array['name']}},</h3> 
     
<p>Thank you for choosing to attend <strong>{{$array['eventname']}}</strong> We are delighted to confirm your ticket purchase. This email serves as your official confirmation and contains important details regarding the event. Please review the information below:</p>



@component('mail::table')
|          |           |
|:------:  |:---------:|

Event: {{$array['eventname']}}, <br>
Date: {{$array['start']}}, <br>
Venue: {{$array['vanue']}}, <br>
Quantity: {{$array['quantity']}}, <br>
Total Amount: {{$array['amount']}}, <br>

Payment Details: <br>
Transaction ID: {{$array['tranNo']}}, <br>
@endcomponent


Thanks,<br>
GoGiving
@endcomponent