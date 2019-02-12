@extends('layouts.client-app')

@section('content')
    <? if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>
    <div class="row container">
        <div class="col-md-3 alert-success alert"  style="margin-left: 15px;">
            Viewing as admin
        </div>
    </div>
    <? endif;?>
    <div class="container" id="campaign">
        <div class="row mainHeader">
            <div class="col-md-4">
                <b>Client : </b> {{$campaign->client->name}}
            </div>
            <div class="col-md-4">
                <b>Campaign :</b> {{$campaign->title}}
            </div>
            <div class="col-md-4">
                <b>Client Manager :</b> Conor
            </div>
        </div>
        <div class="campaignTeam" id="content">
            <div class="row">
                <div class="offset-md-1 col-md-4 campaignText">
                    CAMPAIGN TEAM
                </div>
            </div>
            <div class="row" id="freelancers">
                <div class="col-md-10 offset-md-1">
                    <section class="freelancers">
                        <div class="slickSlide">
                            @foreach($campaign->members as $freelancer)
                                <div class="col-md-12 freelancerBox">
                                    <div class="freelancerItem">
                                        <? $image = $freelancer->userData->photo; ?>
                                        @if(!$image || $image == null)
                                            <img src="/resumeApp/resources/views/customTheme/images/user.png"
                                                 alt="freelancer" class="slickFreelancerImg">
                                        @else
                                            <img src="/{{$image}}"
                                                 alt="freelancer" class="slickFreelancerImg">
                                        @endif

                                        <div class="freelancerData">
                                            <div class="freelancerName nohover">
                                                {{$freelancer->firstName}}
                                            </div>
                                            <div class="freelancerJob">
                                                {{$freelancer->profession}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <div id="nav-taps-resume">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link text-center active" href="#timeTable" role="tab" data-toggle="tab">
                        TIMETABLE
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" href="#activityLog" role="tab" data-toggle="tab">
                        ACTIVITY LOG
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" href="#faq" role="tab" data-toggle="tab">
                        FAQ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" href="#script" role="tab" data-toggle="tab">
                        SCRIPT
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" href="#webForm" role="tab" data-toggle="tab">
                       WEB FORM
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" href="#dialler" role="tab" data-toggle="tab">
                        DIALLER
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" href="#messages" role="tab" data-toggle="tab">
                        MESSAGES
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="timeTable">
                    time table
                </div>
                <div role="tabpanel" class="tab-pane fade" id="activityLog">
                    <activity-logs campaign_id="{{$campaign->id}}"  @if(auth()->user()) user_id="{{auth()->user()->id}}" @endif></activity-logs>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="faq">
                    faq
                </div>
                <div role="tabpanel" class="tab-pane fade" id="script">
                    script
                </div>
                <div role="tabpanel" class="tab-pane fade" id="webForm">
                    web form
                </div>
                <div role="tabpanel" class="tab-pane fade" id="dialler">
                    dialler
                </div>
                <div role="tabpanel" class="tab-pane fade" id="messages">
                    messages
                </div>
            </div>
        </div>
    </div>

@endsection