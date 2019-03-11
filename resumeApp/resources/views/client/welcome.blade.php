@extends('layouts.client-app')
@section('content')
    <? use Illuminate\Support\Facades\Auth;
       $client = Auth::guard('client')->user();
    ?>

    <? if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>
    <div class="row container">
        <div class="col-md-3 alert-success alert"  style="margin-left: 15px;">
            Viewing as admin
        </div>
    </div>

    <div class="row container">
        <div class="col-6">
            <div class="form-group">
                <label class="panelFormLabel">Assigned owner</label>
                <select class="custom-select" style="@if($errors->has('jobTitle')) border:1px solid red; @endif padding-top: 12px !important; padding-bottom: 12px !important; height: auto!important;" id="ownerEmail_client" name="ownerEmail">
                    <option value="" disabled selected>-- Owner's Email --</option>
                    <? foreach($affiliates as $affiliate):?>
                    <option value="{{$affiliate->id}}"<?if($client->affiliate['email'] == $affiliate->email):?>selected<?endif;?>>{{$affiliate->email}}</option>
                    <? endforeach;?>
                </select>
                <a href="javascript:void(0)" id="saveOwner_client" class="btn btn-outline-primary d-none" style="margin-top: 6px;">Save</a>
            </div> <!-- owner assignment -->
        </div>
    </div>
    <hr>
    <? endif;?>

   <div class="container">
       <!-- Success Messages  -->
       <div style="padding-top: 20px;">
           @if(session()->has('successMessage'))
               <div class="alert alert-success" id="successMessage">
                   {{ session()->get('successMessage') }}
               </div>
           @endif
       </div>

       <?
            $searchesArr = [];
       ?>
       <div class="row">
           <div class="col-6">
               <h3 class="pageHeading text-left">
                   Hi {{$client->name}},
               </h3>
               <div class="pageSubHeading text-left">
                   Welcome to 123 Workforce. Here you can manage your campaigns , track payments and search for agents.

                   We are currently working on our system and these features will be available as soon as possible. <br/>
                   <br/>For the moment please send all communication about your account to :
                   <br/> <a href="mailto:conor@123workforce.com">conor@123workforce.com</a> ( email)
                   <br/> <a href="skype:conor@123workforce.com">conor@123workforce.com</a>  (Skype id)

                   <br/><br/>Thank-you Kindly
               </div>
           </div>
       </div>

   </div>

    <div id="terms_bar">
        <terms-bar></terms-bar>
    </div>


@endsection