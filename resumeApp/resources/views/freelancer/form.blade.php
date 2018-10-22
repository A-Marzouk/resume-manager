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
                    <a href="javascript:void(0)">Behance </a> &nbsp; | &nbsp;
                    <a href="javascript:void(0)"> linkedIn</a>
                </div>
                <div class="importBtn NoDecor" style="width: 228px;">
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
@endsection

