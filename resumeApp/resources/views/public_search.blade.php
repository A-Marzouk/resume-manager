@extends('layouts.client-app')

@section('content')
    <div class="container">
    <div style="text-align: left; padding-bottom: 25px;">
        <div class="pageHeading">
            List of freelancers
        </div>
        <div class="pageSubHeading">
            {{$search_name}}
        </div>
    </div>
        <? $i=0 ;?>
        @foreach($freelancers as $freelancer)
            <? $i++; ?>
            <div class="freelancerCard">
                <div class="row">
                    <div class="col-lg-5 col-md-12 freelancerCardLeft">
                        <div class="row">
                            <div class="col-lg-6 col-6 imageContainer">
                                <img src="{{$freelancer->userData->photo}}" alt="freelancer" class="freelancerImg" width="100" height="100">

                            </div>
                            <div class="col-lg-6 col-6">
                                <div id="name">
                                    {{$freelancer->firstName}} {{$freelancer->lastName}}
                                </div>
                                <div class="buttonMain" style=" margin-top: 10px;">
                                    <a class="hireBtn btn-block" href="/{{$freelancer->username}}" style="font-weight:normal; padding: 7px 5px 7px 5px; ">Visit profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 freelancerCardRight">
                        <div class="panelFormLabel" style=" color: #0290D8;"><b>{{$freelancer->profession}}</b></div>
                        <div class="panelFormLabel" style="	color: #697786;">
                            <b>Key skills :</b>
                            <span style="font-weight: normal;">
                                                                {{$freelancer->userData->design_skills_checkbox}}
                                                            </span>
                        </div>
                        <div class="panelFormLabel" style="	color: #697786;">
                            <b>Rate: </b>
                            <span style="font-weight: normal;">
                                                                ${{$freelancer->userData->salary}}/hour
                                                            </span>
                        </div>
                        <div class="panelFormLabel" style="	color: #697786;">
                            <b>No.hours/week available: </b>
                            <span style="font-weight: normal;">
                                                                {{$freelancer->userData->availableHours}}
                                                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @if($i < count($freelancers))
                <hr>
            @endif
        @endforeach
    </div>
@endsection