@extends('layouts.app')

{{-- variables : $data . freelancer userdata --}}
<?
extract($data);
$freelancer = auth()->user();
$clientID = '865ff2s2qvpkzb' ;
$redirectURL = 'https://123workforce.com/freelancer/linkedin';
?>
@section('content')
    <? if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>
    <div class="container alert alert-success">
        You are viewing as Admin
    </div>
    <? endif;?>
    <div class="container m-auto infoBar container">
        <? if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>
        <div class="col-md-2 offset-md-10">
            <a target="_blank" href="{{$username}}">Link to resume </a>
        </div>
        <? endif; ?>
    </div>

    {{-- include the freelancer card + the new edit row--}}
    <div style="margin-left: 8.07%" class="marginMobile-0">
        <div class="freelancerCard" style="margin-bottom: -3px;">
            <div class="row actionRow">
                <div class="importBtn NoDecor">
                    <span>Import : </span>&nbsp;
                    <a href="javascript:void(0)" id="importBehanceData" data-toggle="modal" data-target="#behanceDataModal">Behance </a> &nbsp; | &nbsp;
                    <a href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id={{$clientID}}&redirect_uri={{$redirectURL}}&state=987654321&scope=r_basicprofile"> linkedIn</a>
                </div>
                <div class="importBtn importBtn_upload NoDecor">
                    <a href="javascript:void(0)">
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
                <div class="editBtn NoDecor">
                    <a href="{{route('show.edit_form')}}">
                        <img src="/resumeApp/resources/assets/images/edit_profile.png" alt="edit profile">
                        Edit profile
                    </a>
                </div>

            </div>
        </div>
        <div>
            @include('freelancer_card')
        </div>
    </div>

    {{-- modals : modal of import behance --}}

    <!-- Modal -->
    <div class="modal fade" id="behanceDataModal" tabindex="-1" role="dialog" aria-labelledby="behanceDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border: none;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeBehanceModal" style="outline: none;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBody">
                    <form method="post" action="" id="behanceDataForm">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="userName" class="panelFormLabel">Your Behance profile link :</label>
                            <input type="text" class="form-control panelFormInput" id="behanceLink" name="behanceLink"  value="" required>
                            <p id="behanceLinkError" class="d-none" style="color: red;">Link is not correct.</p>
                            <p id="behanceLinkWait" class="d-none" style="color: gray;">
                                Please wait, importing your data from Behance..
                            </p>
                        </div>

                        <div class="modal-footer" style="border: none;">
                            <div class="buttonMain col-md-3 offset-md-9" style="margin-top: 0;">
                                <button type="submit" class="btn-block hireBtn" id="importBtn">Import</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
