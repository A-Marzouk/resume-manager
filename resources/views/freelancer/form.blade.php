@extends('freelancer.layouts.freelancer_frame')

{{-- variables : $data -> freelancer userdata  and $owners --}}
<?
extract($data);
$freelancer = auth()->user();
$clientID = '865ff2s2qvpkzb' ;
$redirectURL = 'https://123workforce.com/freelancer/linkedin';
if(!isset($value['id'])){
    $value['id'] = '';
}

?>
@section('content')

    <div class="row container">
        <? if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>
        <div class="col-md-2">
            <a target="_blank" class="btn btn-outline-primary" href="/{{$username}}">Link to resume </a>
        </div>

        <div class="col-md-2">
            <a class="btn btn-outline-primary" href="{{route('show.old_form')}}">Old form</a>
        </div>
        <? endif; ?>
    </div>
    <br/>
    {{-- include the freelancer card + the new edit row--}}
    <div style="margin-left: 8.07%" class="marginMobile-0">
        <div class="freelancerCard" style="margin-bottom: -3px;">
            <div class="row actionRow">
                <div class="importBtn importBtn_upload NoDecor">
                    <a href="javascript:void(0)" id="{{$freelancer->id}}{{$value['id']}}_open_references" style="outline: none;" class="openReferences">
                        References / Testimonials
                    </a>
                </div>
                <div class="col-md-5">

                </div>
                <div class="progressBtn">
                    <a href="javascript:void(0)">
                   <span>
                        70% Complete
                   </span>
                    </a>
                </div>
                <div class="editBtn NoDecor">
                    <a href="/freelancer/developer-card/edit">
                        <img src="/images/edit_profile.png" alt="edit profile">
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
