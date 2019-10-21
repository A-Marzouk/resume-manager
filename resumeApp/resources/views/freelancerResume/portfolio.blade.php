@extends('layouts.client-app')
{{-- variables : $data -> freelancer userdata  and $owners --}}
<?

$clientID = '865ff2s2qvpkzb' ;
$redirectURL = 'https://123workforce.com/freelancer/linkedin';
if(!isset($value['id'])){
    $value['id'] = '';
}

?>

@section('content')

    <? if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>
    <div class="row container">
        <div class="col-3 alert-success alert"  style="margin-left: 15px;">
            Viewing as admin
        </div>
    </div>

    <div class="row container">
        <div class="col-6">
            <div class="form-group">
                <label class="panelFormLabel">Assigned owner</label>
                <select class="custom-select" style="@if($errors->has('jobTitle')) border:1px solid red; @endif padding-top: 12px !important; padding-bottom: 12px !important; height: auto!important;" id="ownerEmail" name="ownerEmail">
                    <option value="" disabled selected>-- Owner's Email --</option>
                    <? foreach($affiliates as $affiliate):?>
                    <option value="{{$affiliate->id}}"<?if($freelancer->affiliate['email'] == $affiliate->email):?>selected<?endif;?>>{{$affiliate->email}}</option>
                    <? endforeach;?>
                </select>
                <a href="javascript:void(0)" id="saveOwner" class="btn btn-outline-primary d-none" style="margin-top: 6px;">Save</a>
            </div> <!-- owner assignment -->
        </div>
    </div>
    <? endif;?>
    <div id="agent_terms_bar">
        <agent-terms-bar></agent-terms-bar>
    </div>
    <div class="row container">
        <? if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>
        <div class="col-md-2">
            <a target="_blank" class="btn btn-outline-primary" href="/v2/{{Auth::user()->username}}">Link to resume </a>
        </div>

        <div class="col-md-2">
            <a class="btn btn-outline-primary" href="{{route('show.old_form')}}">Old form</a>
        </div>
        <? endif; ?>
    </div>
    <br/>


    <div id="freelancerPortfolio" class="d-flex justify-content-center">
        <freelancer-portfolio :freelancer="{{$freelancer}}"></freelancer-portfolio>
    </div>
@endsection
