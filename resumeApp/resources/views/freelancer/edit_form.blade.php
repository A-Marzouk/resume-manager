@extends('layouts.app')

{{-- variables : $data . freelancer userdata --}}
<?
extract($data);
$freelancer = auth()->user();
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
    <div style="margin-left: 8.07%">
        <div class="freelancerCard" style="margin-bottom: -3px;">
            <div class="row actionRow">
                <div class="importBtn NoDecor" style="margin-left: 29px; width: 205px;">
                    <span>Import : </span>&nbsp;
                    <a href="javascript:void(0)"id="importBehanceData" data-toggle="modal" data-target="#behanceDataModal">Behance </a> &nbsp; | &nbsp;
                    <a href="javascript:void(0)"> linkedIn</a>
                </div>
                <div class="importBtn NoDecor" style="width: 228px;">
                    <a href="javascript:void(0)">
                        Upload References / Testimonials
                    </a>
                </div>
                <div class="col-md-1">

                </div>
                <div class="progressBtn" style="margin-left: -10px; margin-right: 10px;">
                    <a href="javascript:void(0)">
                       <span>
                            70% Complete
                       </span>
                    </a>
                </div>
                <div class="editBtn NoDecor" style="width: 97px;">
                    <a href="/freelancer">
                        <img src="/resumeApp/resources/assets/images/close_24px.png" alt="edit profile">
                        Discard
                    </a>
                </div>
                <div class="editBtn NoDecor" style="margin-left: 10px;">
                    <a href="javascript:void(0)" id="saveChanges">
                        <img src="/resumeApp/resources/assets/images/check_24px.png" alt="edit profile">
                        Save changes
                    </a>
                </div>
            </div>
        </div>
        <div>
            @include('freelancer_card_includes.edit_freelancer_card')
        </div>
    </div>
@endsection

