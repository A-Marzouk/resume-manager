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
            <div class="alert alert-success" id="successMessage">
                {{ session()->get('successMessage') }}
            </div>
        @endif
    </div>
<!-- Display Errors  -->
    <?
        $requiredFields = [
            '1. Overview and personal info'=>[
                'link'=>'overview',
                'name', 'city','jobTitle','email','languages','intro','photo'
            ],
            '2. Availability and pay' => [
                'link'=>'pay',
                'salary','availableHours','freeDate','availableHours','currency','timeZone',
            ],
            '3. Multimedia' => [
                'link'=>'multimedia',
                'audio','audioFile','video','video_file'
            ],
            '4. Career overview' => [
                'link'=>'career','eduTitle1','eduTitle2','eduTitle3','eduYear1','eduYear2','eduYear3',
                'eduDesc1','eduDesc2','eduDesc3','trnTitle1','trnTitle2','trnTitle3','careerObjective',
                'trnYear1','trnYear2','trnYear3','trnDesc1','trnDesc2','trnDesc3'
            ],
            '5. Portfolio' => [
                'link'=>'portfolio',
                'githubLink','stackoverflowLink','behanceLink','instagramLink','dribbleLink',
                'personalSite'
            ],
            '6. Professional skills'=>['link'=>'skills','primarySkills',
                'design_skills_checkbox','primarySkills','design_styles'
            ],
            '7. Personal attributes' => [
                'link'=>'attributes',
                'personal_interests','professional_attributes','charSkills'
            ]
        ];


        $errorTab = '';
    ?>
    <div style="padding-top: 20px;">
        <? if(count($errors->getMessages()) > 0):?>
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

                        <? else:?>
                            Something went wrong.
                        <? endif;?>
                    </div>
                </div>
            <? endforeach;?>
        <? endif; ?>
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
