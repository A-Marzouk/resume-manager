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
    <div class="d-xs-block d-sm-block d-md-none carouselTabs fixed-top" style="margin-top: 50px; background:linear-gradient(0deg, #FFFFFF 0%, #FCFCFC 100%);">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active text-center">
                    <a class="tabsArea nextBtn" href="#overview">
                        <div class="tabText text-center">
                            <span class="tabCircle" style="padding:2px 5px 2px 5px;">1</span><br/>
                            Overview and<br/>
                            personal info
                        </div>
                    </a>
                </div>
                <div class="carousel-item text-center">
                    <a class="tabsArea nextBtn" href="#pay">
                        <div class="tabText text-center">
                            <span class="tabCircle" style="padding:2px 5px 2px 5px;">2</span><br/>
                            Availablity and<br>
                            pay
                        </div>
                    </a>
                </div>
                <div class="carousel-item text-center">
                    <a class="tabsArea nextBtn" href="#multimedia">
                        <div class="tabText text-center">
                            <span class="tabCircle" style="padding:2px 5px 2px 5px;">3</span><br/>
                            Multimedia <br/>
                            ( Voice recording / Video )
                        </div>
                    </a>
                </div>
                <div class="carousel-item text-center">
                    <a class="tabsArea nextBtn" href="#career">
                        <div class="tabText text-center">
                            <span class="tabCircle" style="padding:2px 5px 2px 5px;">4</span><br/>
                            Career overview and <br/>
                            ( Education / Training )
                        </div>
                    </a>
                </div>
                <div class="carousel-item text-center">
                    <a class="tabsArea nextBtn" href="#portfolio">
                        <div class="tabText text-center">
                            <span class="tabCircle" style="padding:2px 5px 2px 5px;">5</span><br/>
                            Portfolio<br/>Previous work
                        </div>
                    </a>
                </div>
                <div class="carousel-item text-center">
                    <a class="tabsArea nextBtn" href="#skills">
                        <div class="tabText text-center">
                            <span class="tabCircle" style="padding:2px 5px 2px 5px;">6</span><br/>
                            Professional skills<br/>
                            personal info
                        </div>
                    </a>
                </div>
                <div class="carousel-item text-center">
                    <a class="tabsArea nextBtn" href="#attributes">
                        <div class="tabText text-center">
                            <span class="tabCircle" style="padding:2px 5px 2px 5px;">7</span><br/>
                            Personal<br/>
                            attributes
                        </div>
                    </a>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon carouselArrows" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon carouselArrows" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
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


    <div class="row tabsArea d-none d-md-block">
        <div class="col-md-12 text-center">
            <ul class="nav nav-tabs" id="mytabs" role="tablist">
                <li class="nav-item" id="tap1">
                    <a class="nav-link active text-center tabText" href="#overview" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">1</div>
                        Overview and
                        personal info
                    </a>
                </li>
                <li class="nav-item" id="tap2">
                    <a class="nav-link text-center tabText" href="#pay" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">2</div>
                        Availability and
                        pay
                    </a>
                </li>
                <li class="nav-item" id="tap3">
                    <a class="nav-link text-center tabText" href="#multimedia" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">3</div>
                        Multimedia
                        ( Voice recording / Video )
                    </a>
                </li>
                <li class="nav-item" id="tap4">
                    <a class="nav-link text-center tabText" href="#career" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">4</div>
                        Career overview and
                        (Education / Training)
                    </a>
                </li>
                <li class="nav-item" id="tap5">
                    <a class="nav-link text-center tabText" href="#portfolio" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">5</div>
                        Portfolio Previous work
                    </a>
                </li>
                <li class="nav-item" id="tap6">
                    <a class="nav-link text-center tabText" href="#skills" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">6</div>
                        Professional skills
                    </a>
                </li>
                <li class="nav-item" id="tap7">
                    <a class="nav-link text-center tabText" href="#attributes" role="tab" data-toggle="tab">
                        <div class="col-md-6 offset-md-4 tabCircle">7</div>
                        personal attributes
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
                    {{$error[0]}} <a class="nextBtn" href="#{{$requiredFields[$errorTab]['link']}}">({{$errorTab}})</a>
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
