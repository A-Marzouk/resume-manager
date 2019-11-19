@extends('freelancer.layouts.freelancer_frame')

{{-- variables : $data . freelancer userdata --}}
<?
extract($data);
$freelancer = auth()->user();
?>
@section('content')

    <nav class="navbar navbar-light fixed-top dashboard_navbar" id="sideNav">

        <a href="javascript:void(0)" class="js-menu-open menu-open" id="menu-open-icon">
            <img src="/images/client/Group.png" alt="menu">
        </a>

        <a href="javascript:void(0)" class="js-menu-close d-none">
            <img src="/images/client/close.png" alt="menu">
        </a>

        <a class="navbar-brand" href="/freelancer/dashboard">
            <img src="/images/client/logo_123.png" alt="logout" style="width: 177px;">
        </a>
        <div class="form-inline my-2 my-lg-0">

        </div>
        <div class="form-inline my-2 my-lg-0 name">
            <div class="logoutButton">
                <a href="/logout">
                    <img src="/images/client/log_out.png" alt="logout">
                </a>
            </div>
            <div class="NoDecor">
                <a href="/freelancer/dashboard">
                    {{$freelancer->userData->first_name}} {{$freelancer->userData->last_name}}
                </a>
            </div>
            <div class="avatar">
                <img src="/{{$freelancer->userData->profile_picture}}" alt="logout">
            </div>
        </div>
    </nav>

    <div class="js-side-nav-container side-nav-container">
        <div class="js-side-nav side-nav">
            <a href="javascript:void(0)" class="js-menu-close menu-close" id="close-menu"></a>
            <div class="welcome-box border-0 d-flex justify-content-start align-items-center">
                <img src="/images/client/dummy.png" alt="profile">
                <div class="d-flex flex-column">
                    <div>
                        Welcome,
                    </div>
                    <div style="font-weight: 500">
                        {{$freelancer->userData->first_name}} {{$freelancer->userData->last_name}}
                    </div>
                </div>
            </div>

            <div class="logoutBtn border-0">
                <a href="/logout">
                    LOG OUT
                </a>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column align-items-center">
        <div class="marginMobile-0">
            <div class="freelancerCard m-0 freelancerCard_updated" style="background: none;">
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
        <div  class="marginMobile-0">
            <div class="freelancerCard ml-0 mr-0 freelancerCard_updated" style="margin-bottom:-3px">
                <div class="row actionRow">
                    <div class="importBtn NoDecor">
                        <span>Import : </span>&nbsp;
                        <a href="javascript:void(0)"id="importBehanceData" data-toggle="modal" data-target="#behanceDataModal">Behance </a> &nbsp; | &nbsp;
                        <a href="javascript:void(0)"> linkedIn</a>
                    </div>
                    <div class="importBtn importBtn_upload NoDecor">
                        <a href="javascript:void(0)" id="uploadReferences{{$freelancer->id}}" class="uploadReferences">
                            Upload References / Testimonials
                        </a>
                    </div>
                    <div class="col-md-2">

                    </div>
                    <div class="progressBtn NoDecor">
                        <a href="javascript:void(0)">
                       <span>
                            70% Complete
                       </span>
                        </a>
                    </div>
                    {{--<div class="editBtn NoDecor" style="width: 97px;">--}}
                    {{--<a href="{{route('show.new_form')}}">--}}
                    {{--<img src="/images/close_24px.png" alt="edit profile">--}}
                    {{--Discard--}}
                    {{--</a>--}}
                    {{--</div>--}}
                    <div class="editBtn NoDecor" style="margin-left: 10px;">
                        <a href="/freelancer/developer-card">
                            <img src="/images/check_24px.png" alt="edit profile">
                            Finish editing
                        </a>
                    </div>
                </div>
            </div>
            <div>
                @include('freelancer_card_includes.edit_freelancer_card')
            </div>
        </div>
    </div>

@endsection

