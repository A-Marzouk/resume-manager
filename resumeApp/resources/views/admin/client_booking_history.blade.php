@extends('layouts.app')

@section('content')
    <!-- Success Messages  -->
    <div style="padding-top: 20px;">
        @if(session()->has('successMessage'))
            <div class="alert alert-success" id="successMessage">
                {{ session()->get('successMessage') }}
            </div>
        @endif
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageSubHeading text-left">
                    Information about client
                </div><br/>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-2">
                        Name:
                    </div>
                    <div class="col-8">
                        <strong>{{$client->name}}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Email:
                    </div>
                    <div class="col-8">
                        <strong>{{$client->email}}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Total bookings:
                    </div>
                    <div class="col-8">
                        <strong>{{count($client->bookings)}}#</strong>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <? $i=1;?>
                @foreach($client->bookings as $booking)
                    <div class="text-center pageSubHeading">
                        Booking {{$i}}
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <span class="panelFormLabel">Booking Date :</span>
                        </div>
                        <div class="col-8">
                            {{$booking->created_at->format('M d, Y')}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <span class="panelFormLabel">Freelancer booked :</span>
                        </div>
                        <div class="col-8">
                            <? $freelancerBooked = \App\User::find($booking->user_id);?>
                            {{$freelancerBooked->firstName}} {{$freelancerBooked->lastName}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <span class="panelFormLabel">Hours per week :</span>
                        </div>
                        <div class="col-8">
                            {{$booking->hours}} Hours
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <span class="panelFormLabel">Weeks booked :</span>
                        </div>
                        <div class="col-8">
                            {{$booking->weeks}} Weeks
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <span class="panelFormLabel">Amount per week :</span>
                        </div>
                        <div class="col-8">
                            {{intval($booking->amount_paid)/100}} USD
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <span class="panelFormLabel">Status:</span>
                        </div>
                        <div class="col-8">
                            @if($booking->canceled)
                                <span class="panelFormLabel" style="color: red">Canceled</span>
                            @else
                                <span class="panelFormLabel" style="color: lawngreen; font-weight: bold;">On going</span>
                            @endif
                        </div>
                    </div>
                    <div>
                        <hr width="85%">
                    </div>
                    <? $i++;?>
                @endforeach
            </div>
        </div>
    </div>

@endsection