@extends('layouts.app')
{{-- variables : $data . freelancer userdata --}}
<?
    extract($data);
    $currFreelancer = auth()->user();
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
<div class="container">
    <div class="row tabsArea fixed-top d-sm-block d-xs-block d-md-block d-lg-none" id="tabsMobile" style="margin-top: 50px;   background: linear-gradient(0deg, #FFFFFF 0%, #FCFCFC 100%);">
        <div class="col-md-12 text-center">
            <ul class="nav nav-tabs" id="mytabs" role="tablist">
                <li class="nav-item" id="tap1phone">
                    <a class="nav-link active text-center tabText" href="#overview" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">1</div>
                        Overview and
                        Personal info
                    </a>
                </li>
                <li class="nav-item" id="tap2">
                    <a class="nav-link text-center tabText" href="#pay" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">2</div>
                        Availability and
                        Pay
                    </a>
                </li>
                <li class="nav-item" id="tap3">
                    <a class="nav-link text-center tabText" href="#multimedia" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">3</div>
                        Multimedia
                        (Audio/Video)
                    </a>
                </li>
                <li class="nav-item" id="tap4phone">
                    <a class="nav-link text-center tabText" href="#career" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">4</div>
                        Career overview
                        (Edu/Training)
                    </a>
                </li>
                <li class="nav-item" id="tap5">
                    <a class="nav-link text-center tabText" href="#portfolio" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">5</div>
                        Portfolio / Previous work
                    </a>
                </li>
                <li class="nav-item" id="tap6">
                    <a class="nav-link text-center tabText" href="#skills" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">6</div>
                        Professional skills
                    </a>
                </li>
                <li class="nav-item" id="tap7phone">
                    <a class="nav-link text-center tabText" href="#attributes" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">7</div>
                        Personal attributes
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="text-center">
        <div class="pageHeading" id="tabMainHeading">1.Overview and personal info</div>
        <div class="pageSubHeading">
            It is important to keep your available hours that you can work updated.
        </div>
        <div class="pageSubHeading2 col-md-8 offset-md-2">
            Once your page here is completed & approved, our team will start to promote your Resume to companies seeking to hire.
            Once selected, you will then be asked for Skype interviews.
        </div>
    </div>
            {{-- tabs section first on phone --}}
    <div class="row tabsArea d-none d-lg-block">
        <div class="col-md-12 text-center">
            <ul class="nav nav-tabs" id="mytabs" role="tablist">
                <li class="nav-item" id="tap1">
                    <a class="nav-link active text-center tabText" href="#overview" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">1</div>
                        Overview and
                        Personal info
                    </a>
                </li>
                <li class="nav-item" id="tap2phone">
                    <a class="nav-link text-center tabText" href="#pay" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">2</div>
                        Availability and
                        Pay
                    </a>
                </li>
                <li class="nav-item" id="tap3phone">
                    <a class="nav-link text-center tabText" href="#multimedia" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">3</div>
                        Multimedia
                        (Audio/Video)
                    </a>
                </li>
                <li class="nav-item" id="tap4">
                    <a class="nav-link text-center tabText" href="#career" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">4</div>
                        Career overview
                        (Edu/Training)
                    </a>
                </li>
                <li class="nav-item" id="tap5phone">
                    <a class="nav-link text-center tabText" href="#portfolio" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">5</div>
                        Portfolio / Previous work
                    </a>
                </li>
                <li class="nav-item" id="tap6phone">
                    <a class="nav-link text-center tabText" href="#skills" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">6</div>
                        Professional skills
                    </a>
                </li>
                <li class="nav-item" id="tap7">
                    <a class="nav-link text-center tabText" href="#attributes" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">7</div>
                        Personal attributes
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Success Messages  -->
    <div style="padding-top: 20px;">
        @if(session()->has('successMessage'))
            <div class="alert alert-success">
                {{ session()->get('successMessage') }}
            </div>
        @endif
    </div>
<!-- Display Errors  -->
    <?
        $requiredFields = [
            '1. Overview and personal info'=>[
                'link'=>'overview',
                'name', 'city','jobTitle','email'
            ],
            '2. Availability and pay' => [
                'link'=>'pay',
                'salary','availableHours'
            ],
            '6. Professional skills'=>['link'=>'skills','primarySkills','design_skills_checkbox']
        ];


        $errorTab = '';
    ?>
    <div style="padding-top: 20px;">
        <? foreach($errors->getMessages() as $key => $error):?>
            <div class="form-group col-md-8">
                <div class="alert alert-danger" style="font-size: small;">
                    <?
                        foreach ($requiredFields as $tab => $errorFields){
                            if(in_array($key,$errorFields)){
                                $errorTab = $tab;
                            }
                        }

                    ?>
                    <? if(isset($error[0]) && isset($errorTab) && isset($requiredFields[$errorTab]['link'])):?>
                        {{$error[0]}} <a class="nextBtn" href="#{{$requiredFields[$errorTab]['link']}}">({{$errorTab}})</a>
                    <? endif;?>
                </div>
            </div>
        <? endforeach;?>
    </div>

    <form method="post" action="{{route('freelancer.data.store')}}" enctype="multipart/form-data" class="container freelancerForm">
        {{csrf_field()}}
        <!-- Tab panes -->
            <div class="tab-content" id="tabsContent">
                @include('includes.overview')
                @include('includes.pay')
                @include('includes.multimedia')
                @include('includes.career')
                @include('includes.portfolio')
                @include('includes.skills')
                @include('includes.attributes')
            </div>
        <br/>
    </form>
</div>
<script>

</script>
@endsection
