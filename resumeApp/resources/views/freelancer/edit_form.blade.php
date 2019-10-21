@extends('layouts.app')

{{-- variables : $data . freelancer userdata --}}
<?
extract($data);
$clientID = '865ff2s2qvpkzb' ;
$redirectURL = 'https://123workforce.com/freelancer/linkedin';
$freelancer = auth()->user();
?>
@section('content')
    <? if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>
    <div class="container alert alert-success">
        You are viewing as Admin
    </div>
    <? endif;?>
    <div id="agent_terms_bar">
        <agent-terms-bar></agent-terms-bar>
    </div>
    <div class="container m-auto infoBar container">
        <? if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>
        <div class="col-md-2 offset-md-10">
            <a target="_blank" href="/v2/{{$username}}">Link to resume </a>
        </div>
        <? endif; ?>
    </div>

    <div style="margin-left: 8.07%; " class="marginMobile-0">
        <div class="freelancerCard" style="background: none;">
            <div id="loadingText" class="d-none" style="color:lightseagreen; padding: 10px;">
        <span id="spanTextAudio">
            Processing audio...
        </span>
                <span id="progressAudio"></span>
            </div>
            <div id="loadingTextVideo" class="d-none" style="color:lightseagreen; padding: 10px;">
        <span id="spanTextVideo">
            Processing video...
        </span>
                <span id="progress"></span>
            </div>
        </div>
    </div>

    {{-- include the freelancer card + the new edit row--}}
    <div style="margin-left: 8.07%" class="marginMobile-0">
        <div class="freelancerCard" style="margin-bottom: -3px;">
            <div class="row actionRow">
                <div class="importBtn NoDecor">
                    <span>Import : </span>&nbsp;
                    <a href="javascript:void(0)"id="importBehanceData" data-toggle="modal" data-target="#behanceDataModal">Behance </a> &nbsp; | &nbsp;
                    <a
                            href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id={{$clientID}}&redirect_uri={{$redirectURL}}&state=987654321&scope=r_basicprofile"
                            id="importBehanceData">
                        LinkedIn
                    </a>
                </div>
                <div class="importBtn importBtn_upload NoDecor">
                    <a href="javascript:void(0)" id="uploadReferences{{$freelancer->id}}" class="uploadReferences">
                        Upload References / Testimonials
                    </a>
                </div>
                <div class="col-md-2">

                </div>
                <div class="progressBtn">
                    <a href="javascript:void(0)">
                       <span>
                            70% Complete
                       </span>
                    </a>
                </div>
                {{--<div class="editBtn NoDecor" style="width: 97px;">--}}
                    {{--<a href="{{route('show.new_form')}}">--}}
                        {{--<img src="/resumeApp/resources/assets/images/close_24px.png" alt="edit profile">--}}
                        {{--Discard--}}
                    {{--</a>--}}
                {{--</div>--}}
                <div class="editBtn NoDecor" style="margin-left: 10px;">
                    <a href="{{route('freelancer.dashboard')}}">
                        <img src="/resumeApp/resources/assets/images/check_24px.png" alt="edit profile">
                        Finish editing
                    </a>
                </div>
            </div>
        </div>
        <div>
            @include('freelancer_card_includes.edit_freelancer_card')
        </div>
    </div>
@endsection

