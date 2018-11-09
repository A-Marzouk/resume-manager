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

    <div class="text-center">
        <div class="row">
            <div class="col-12">
                <div class="pageSubHeading">
                    Information about owner
                </div><br/>
            </div>
            <div class="col-6" style="border-right: 1px solid lightgray">
                <div class="pageSubHeading">
                    Personal info
                </div><br/>
                <div class="text-left">
                    Name : <strong>{{$owner->name}}</strong><br/>
                    Email: <strong>{{$owner->email}}</strong><br/>
                    Unique Code : <strong> {{$owner->code}}</strong>  <br/>
                </div>
            </div>
            <div class="col-6">
                <div class="pageSubHeading">
                    Earnings according to owned clients' bookings
                </div><br/>
                <div class="text-left">
                    <? $totalBookings = 0 ;
                        foreach($owner->clients as $client){
                            foreach($client->bookings as $booking){
                                if(!$booking->canceled){
                                    $totalBookings += $booking->amount_paid;
                                }
                            }
                        }
                    ?>
                    Total earnings : <strong>{{$totalBookings/100}} $</strong><br/>
                    Percent - 5% : <strong>{{ ($totalBookings/100) * (5/100) }} $</strong>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="pageSubHeading">
                    Assigned users
                </div><br/>
            </div>
            <div class="col-6" style="border-right: 1px lightgray solid;">
                <div class="pageSubHeading">
                    Owner assigned freelancers : #{{count($owner->freelancers)}}
                </div><br/>
                <div class="container text-left">
                    @foreach($owner->freelancers as $freelancer)
                        <p class="jobTitle">
                            <div  style="display: list-item;">
                                Name : <strong>{{$freelancer->firstName}}{{$freelancer->lastName}}</strong>
                            </div>
                            <div >
                                <a href="/{{$freelancer->username}}" target="_blank" class="btn btn-outline-primary btn-sm">Open resume</a>
                            </div>
                        </p>
                        <hr>
                    @endforeach
                </div>
            </div>
            <div class="col-6">
                <div class="pageSubHeading">
                    Owner assigned clients : #{{count($owner->clients)}}
                </div>
                <br/>
                <div class="container text-left">
                    @foreach($owner->clients as $client)
                        <p class="jobTitle">
                        <div  style="display: list-item;">
                            Name : <strong>{{$client->name}}</strong>
                        </div>
                        <div>
                            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#clientDetails{{$client->id}}">
                                Details
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="clientDetails{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{$client->name}} - details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6"> Name :</div>
                                                <div class="col-md-6"> {{$client->name}}</div>

                                                <div class="col-md-6"> Email :</div>
                                                <div class="col-md-6"> {{$client->email}}</div>

                                                <div class="col-md-6"> Agency :</div>
                                                <div class="col-md-6"> {{$client->agency}}</div>

                                                <div class="col-md-6"> Email Dept :</div>
                                                <div class="col-md-6"> {{$client->emailDept}}</div>

                                                <div class="col-md-6"> Time zone :</div>
                                                <div class="col-md-6"> {{$client->timeZone}}</div>

                                                <div class="col-md-6"> Signing up date :</div>
                                                <div class="col-md-6"> {{ $client->created_at->format('d M Y - H:i:s') }}</div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </p>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection