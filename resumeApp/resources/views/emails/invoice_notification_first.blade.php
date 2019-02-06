@extends('layouts.email')

@section('content')
    <div class="greeting" >Hello!</div>
    <hr>
    <div class="mailText">
        You have been provisionally selected to work for {{$clientName}} <br/>

        On these dates and times. <br/>

        Date : {{$weekDate}}<br/>
        Time : From: {{$start_time}}  To: {{$end_time}}<br/>

        To view the campaign details please login to the campaign page via this link.


        <div class="buttonMain col-md-4 offset-4" style="margin-bottom: 20px;">
            <a href="123workforce.magictimeapps.com/workforce/campaign_briefs/{{$id}}" class="hireBtn btn-block" target="_blank">
                View campaign
            </a>
        </div>


    </div>
    <br/>
    <div class="mailText">
        Kindest Regards,<br/><b>123 Workforce</b>
    </div>
@endsection