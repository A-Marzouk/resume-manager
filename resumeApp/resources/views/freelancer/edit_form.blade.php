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
    <div class="row" style="height:69px; background-color: #4367D3; ">
        <a href="#" id="saveChanges">Save data</a>
    </div>
@endsection

