@extends('layouts.affiliate-app')

@section('content')
    <div class="container" id="affiliateDashboard">
        <div class="pageHeading">
             Personal info
        </div><br/>
        <div class="row">
            <div class="col-md-3 col-12 affiliatePhoto text-center">
                <div class="form-group">
                    <div class="input-group" style="opacity: 0; height: 3px;">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="affiliatePhoto" id="affiliatePhotoInput">
                        </div>
                    </div>
                    <? $src = '/resumeApp/resources/views/customTheme/images/user.png';
                    if(!empty($affiliate->photo)){
                        $src = $affiliate->photo;
                    }
                    ?>
                </div>
                <img id="affiliatePhotoPreview" src="{{$src}}" height="100px">
            </div>
            <div class="col-md-8 col-12 affiliateInfo">
                <div class="text-left pageSubHeading">

                </div>
                <div class="row">
                    <div class="col-3">
                        <span class="panelFormLabel">
                            Name :
                        </span>
                    </div>
                    <div class="col-9">
                        {{$affiliate->name}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                         <span class="panelFormLabel">
                            Email :
                        </span>
                    </div>
                    <div class="col-9">
                        {{$affiliate->email}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <span class="panelFormLabel">
                            Unique Code :
                        </span>
                    </div>
                    <div class="col-9">
                        {{$affiliate->code}}
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="pageSubHeading">
                Earnings according to owned clients' bookings
            </div>
            <div class="col-12" style="padding-top: 15px;">
                <?
                $totalBookings = 0 ;
                $bookingsCount = 0 ;
                foreach($affiliate->clients as $client){
                    foreach($client->bookings as $booking){
                        if(!$booking->canceled){
                            $totalBookings += $booking->amount_paid;
                            $bookingsCount++;
                        }
                    }
                }
                ?>
                <div class="row">
                    <div class="col-3">
                    <span class="panelFormLabel">
                        Total number of bookings :
                    </span>
                    </div>
                    <div class="col-9">
                        <strong>{{$bookingsCount}} #</strong><br/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <span class="panelFormLabel">
                            Total earnings :
                        </span>
                    </div>
                    <div class="col-9">
                        <strong>{{$totalBookings/100}} $</strong><br/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                <span class="panelFormLabel">
                    Percent (5%) :
                </span>
                    </div>
                    <div class="col-9">
                        <strong>{{ ($totalBookings/100) * (5/100) }} $</strong>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="pageSubHeading">
                    Assigned clients : #{{count($affiliate->clients)}}
                </div>
                <br/>
                <div class="container text-left">
                    @foreach($affiliate->clients as $client)
                        <p class="jobTitle">
                        <div  style="display: list-item;">
                            <strong>{{$client->name}}</strong>
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

                    @endforeach
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="pageSubHeading">
                    Assigned freelancers : {{count($affiliate->freelancers)}} #
                </div><br/>
                <div class="container text-left">
                    @foreach($affiliate->freelancers as $freelancer)
                        <p class="jobTitle">
                        <div  style="display: list-item;">
                            <strong>{{$freelancer->firstName}}{{$freelancer->lastName}}</strong>
                        </div>
                        <div >
                            <a href="/{{$freelancer->username}}" target="_blank" class="btn btn-outline-primary btn-sm">Open resume</a>
                        </div>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection