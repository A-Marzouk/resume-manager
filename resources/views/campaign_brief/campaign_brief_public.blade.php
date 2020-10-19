@extends('layouts.app')

@section('content')
    <div class="container" id="invoice">
        <div class="row">
            <div class="offset-md-2 col-md-8" style="background: white; padding: 20px;">
                <div class="row">
                    <div class="col-md-6 col-12" style="padding-top: 20px;">
                        <div>
                            <img src="/images/newResume/123wf_logo.png" alt="logo" width="100%">
                        </div>
                        <div style="padding-top: 20px;">
                            <img src="/images/invoice/camp_brief_word.png" alt="word" width="100%">
                        </div>
                    </div>
                    <div class="col-md-4 offset-md-2 d-none d-md-block">
                        <div>
                            <img src="/images/invoice/circle_logo.png" alt="word" width="auto" height="120px">
                        </div>
                    </div>
                </div>
                <div class="row clientInfo" style="margin-top: 35px;">
                    <div class="col-4">
                        CLIENT NAME
                    </div>
                    <div class="col-4">
                        COMPANY WEBSITE
                    </div>
                    <div class="col-4">
                        CLIENT CONTACT
                    </div>
                </div>

                <div class="blueLine"></div>

                <div class="row clientInfo_detail_cBrief">
                    <div class="col-4">
                        {{$cBrief->client_name}}
                    </div>
                    <div class="col-4">
                        {{$cBrief->company_website}}
                    </div>
                    <div class="col-4" style="word-break: break-word;">
                        {!! nl2br($cBrief->client_contact) !!}
                    </div>
                </div>

                <div class="row campaignRow">
                    <div class="col-md-4 campaignInfo">
                        CAMPAIGN OBJECTIVE
                    </div>
                    <div class="col-md-8 campaignData">
                        {{$cBrief->objective}}
                    </div>
                </div>
                <div class="row campaignRow">
                    <div class="col-md-4 campaignInfo">
                        COMPANY VALUES / DESCRIPTION
                    </div>
                    <div class="col-md-8 campaignData">
                        {!! nl2br($cBrief->company_values) !!}
                    </div>
                </div>

                <div class="row campaignRow">
                    <div class="col-md-4 campaignInfo">
                        EMAIL PITCH
                    </div>
                    <div class="col-md-8 campaignData">
                        {!! nl2br($cBrief->email_pitch) !!}
                    </div>
                </div>

                <div class="row campaignRow">
                    <div class="col-md-4 campaignInfo">
                        PHONE PITCH
                    </div>
                    <div class="col-md-8 campaignData">
                        {!! nl2br($cBrief->phone_pitch) !!}
                    </div>
                </div>
                <div class="row campaignRow">
                    <div class="col-md-4 campaignInfo">
                        PHONE / EMAIL / DATA / CRM SYSTEMS
                    </div>
                    <div class="col-md-8 campaignData">
                        {!! nl2br($cBrief->data_systems) !!}
                    </div>
                </div>

                @foreach($cBrief->services as $service)
                    <div class="row clientInfo" style="margin-top: 35px;">
                        <div class="col-2">
                            SERVICE REQUIRED
                        </div>
                        <div class="col-2">
                            HOURLY RATE
                        </div>
                        <div class="col-1">
                            NO. OF HOURS
                        </div>
                        <div class="col-2">
                            LANGUAGE NEEDED
                        </div>
                        <div class="col-2">
                            AGENT LOCATION / ACCENT
                        </div>
                        <div class="col-1">
                            NO. OF AGENTS
                        </div>
                        <div class="col-2">
                            AGENT CHARACTER AND EXPERIENCE REQUIREMENT
                        </div>
                    </div>

                    <div class="blueLine"></div>

                    <div class="row clientInfo_detail_cBrief">
                        <div class="col-2">
                            {{$service->service_required}}
                        </div>
                        <div class="col-2">
                            {{$service->hourly_rate}} USD
                        </div>
                        <div class="col-1">
                            {{$service->hours}}
                        </div>
                        <div class="col-2">
                            {{$service->language}}
                        </div>
                        <div class="col-2">
                            {{$service->agent_location}}
                        </div>
                        <div class="col-1">
                            {{$service->number_of_agents}}
                        </div>
                        <div class="col-2">
                            {!! nl2br($service->agent_experience) !!}
                        </div>
                    </div>
                @endforeach


                <div class="row clientInfo" style="margin-top: 35px;">
                    <div class="col-3">
                        ESTIMATED DURATION OF CAMPAIGN
                    </div>
                    <div class="col-2">
                        TIME ZONE
                    </div>
                    <div class="col-2">
                        SPECIFIC TIMES NEEDED
                    </div>

                    <div class="col-2">
                        START DATE
                    </div>

                    <div class="col-3">
                        CONTRACT TERM
                    </div>
                </div>

                <div class="blueLine"></div>

                <div class="row clientInfo_detail_cBrief">
                    <div class="col-3">
                        {!! nl2br($cBrief->estimated_duration) !!}
                    </div>
                    <div class="col-2">
                        {!! nl2br($cBrief->time_zone) !!}
                    </div>
                    <div class="col-2">
                        {!! nl2br($cBrief->time_needed) !!}
                    </div>

                    <div class="col-2">
                        {{$cBrief->start_date}}
                    </div>

                    <div class="col-3">
                        {{$cBrief->contract_terms}}
                    </div>
                </div>

                <div class="row clientInfo" style="margin-top: 35px;">
                    <div class="col-4">
                        TOTAL HOURS WORKING PER WEEK
                    </div>
                    <div class="col-4">
                        TOTAL WEEKLY RATE
                    </div>
                    <div class="col-4">
                        PAYMENT METHOD
                    </div>
                </div>

                <div class="blueLine"></div>

                <div class="row clientInfo_detail_cBrief">
                    <div class="col-4">
                        {{$cBrief->hours_per_week}}
                    </div>
                    <div class="col-4">
                        {{$cBrief->weekly_rate}}
                    </div>
                    <div class="col-4" style="word-break: break-word;">
                        {!! nl2br($cBrief->payment_method) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="termsText" style="font-size: 15px;">
                            <br>
                            Campaign Manager (for reporting) - <span style="color: grey;">{{$cBrief->campaign_manager}}</span> <br/>
                            Report Requirement - <span style="color: grey;">{{$cBrief->report_requirement}}</span>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding-top:15px; ">
                    <div class="col-12" style="padding-top: 25px;">
                        <a href="{{route('cBrief.to.pdf',$cBrief->id)}}"  target="_blank" class="btn btn-primary">Export as PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection