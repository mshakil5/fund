
@component('mail::message')

<h3>Dear Mr {{$array['name']}},</h3> 
     
<p>We are happy to confirm your booking for the upcoming event<strong>{{$array['eventname']}}</strong>. Here is the details:</p>



@component('mail::table')
|          |           |
|:------:  |:---------:|

Event: {{$array['eventname']}}, <br>
Date: {{$array['start']}}, <br>
Venue: {{$array['vanue']}}, <br>
Quantity: {{$array['quantity']}}, <br>
Total Amount: {{$array['amount']}}, <br>

Payment Details: <br>
Reference ID: {{$array['tranNo']}}, <br>
@endcomponent


Thanks,<br>
<a href="https://www.gogiving.co.uk" target="blank">GoGiving</a>

@endcomponent