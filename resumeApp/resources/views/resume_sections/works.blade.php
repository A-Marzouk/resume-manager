{{-- Works section --}}
<div id="work" class="worksSection">
    <div class="row firstPart">
        <div class="offset-lg-1 col-lg-5 col-md-6">
            <img id="workTextImg" src="resumeApp/resources/views/customTheme/images/newResume/works.png" alt="aboutImg" width="30px;">
            <span class="aboutText" style="color: white;">WORKS</span>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-12">
                <div class="row">
                    <div class="col-md-3">
                        <? if(isset($clearWorks[0]) && !empty($clearWorks[0]) ):?>
                            <div class="workCard">
                            <div class="workImg">
                                <img src="{{$clearWorks[0]}}" alt="work img" width="260" height="150">
                            </div>
                            <div class="workTitle">
                                <div class="row">
                                    <div class="col-md-10">
                                        {{$user->workDesc0}}
                                    </div>
                                    <a class="col-md-2" href="javascript:void(0)" data-toggle="modal" data-target="#works0Modal" style="outline: none;">
                                        <img src="resumeApp/resources/views/customTheme/images/newResume/link.png" alt="view work">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <? endif;?>
                    </div>
                    <div class="col-md-3">
                        <? if(isset($clearWorks[1]) && !empty($clearWorks[1]) ):?>
                            <div class="workCard">
                                <div class="workImg">
                                    <img src="{{$clearWorks[1]}}" alt="work img" width="260"height="150">
                                </div>
                                <div class="workTitle">
                                    <div class="row">
                                        <div class="col-md-10">
                                            {{$user->workDesc1}}
                                        </div>
                                        <a class="col-md-2" href="javascript:void(0)" data-toggle="modal" data-target="#works1Modal" style="outline: none;">
                                            <img src="resumeApp/resources/views/customTheme/images/newResume/link.png" alt="view work">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <? endif;?>
                    </div>
                    <div class="col-md-3">
                        <? if(isset($clearWorks[2]) && !empty($clearWorks[2]) ):?>
                            <div class="workCard">
                                <div class="workImg">
                                    <img src="{{$clearWorks[2]}}" alt="work img" width="260"height="150">
                                </div>
                                <div class="workTitle">
                                    <div class="row">
                                        <div class="col-md-10">
                                            {{$user->workDesc2}}
                                        </div>
                                        <a class="col-md-2" href="javascript:void(0)" data-toggle="modal" data-target="#works2Modal" style="outline: none;">
                                            <img src="resumeApp/resources/views/customTheme/images/newResume/link.png" alt="view work">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <? endif;?>
                    </div>
                    <div class="col-md-3">
                        <? if(isset($clearWorks[3]) && !empty($clearWorks[3]) ):?>
                            <div class="workCard">
                                <div class="workImg">
                                    <img src="{{$clearWorks[3]}}" alt="work img" width="260"height="150">
                                </div>
                                <div class="workTitle">
                                    <div class="row">
                                        <div class="col-md-10">
                                            {{$user->workDesc3}}
                                        </div>
                                        <a class="col-md-2" href="javascript:void(0)" data-toggle="modal" data-target="#works3Modal" style="outline: none;">
                                            <img src="resumeApp/resources/views/customTheme/images/newResume/link.png" alt="view work">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <? endif;?>
                    </div>


                    <div class="col-md-3">
                        <? if(isset($clearWorks[4]) && !empty($clearWorks[4]) ):?>
                        <div class="workCard">
                            <div class="workImg">
                                <img src="{{$clearWorks[4]}}" alt="work img" width="260" height="150">
                            </div>
                            <div class="workTitle">
                                <div class="row">
                                    <div class="col-md-10">
                                        {{$user->workDesc4}}
                                    </div>
                                    <a class="col-md-2" href="javascript:void(0)" data-toggle="modal" data-target="#works4Modal" style="outline: none;">
                                        <img src="resumeApp/resources/views/customTheme/images/newResume/link.png" alt="view work">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <? endif;?>
                    </div>
                    <div class="col-md-3">
                        <? if(isset($clearWorks[5]) && !empty($clearWorks[5]) ):?>
                        <div class="workCard">
                            <div class="workImg">
                                <img src="{{$clearWorks[5]}}" alt="work img" width="260" height="150">
                            </div>
                            <div class="workTitle">
                                <div class="row">
                                    <div class="col-md-10">
                                        {{$user->workDesc5}}
                                    </div>
                                    <a class="col-md-2" href="javascript:void(0)" data-toggle="modal" data-target="#works5Modal" style="outline: none;">
                                        <img src="resumeApp/resources/views/customTheme/images/newResume/link.png" alt="view work">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <? endif;?>
                    </div>
                    <div class="col-md-3">
                        <? if(isset($clearWorks[6]) && !empty($clearWorks[6]) ):?>
                        <div class="workCard">
                            <div class="workImg">
                                <img src="{{$clearWorks[6]}}" alt="work img" width="260"height="150">
                            </div>
                            <div class="workTitle">
                                <div class="row">
                                    <div class="col-md-10">
                                        {{$user->workDesc6}}
                                    </div>
                                    <a class="col-md-2" href="javascript:void(0)" data-toggle="modal" data-target="#works6Modal" style="outline: none;">
                                        <img src="resumeApp/resources/views/customTheme/images/newResume/link.png" alt="view work">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <? endif;?>
                    </div>
                    <div class="col-md-3">
                        <? if(isset($clearWorks[7]) && !empty($clearWorks[7]) ):?>
                        <div class="workCard">
                            <div class="workImg">
                                <img src="{{$clearWorks[7]}}" alt="work img" width="260"height="150">
                            </div>
                            <div class="workTitle">
                                <div class="row">
                                    <div class="col-md-10">
                                        {{$user->workDesc7}}
                                    </div>
                                    <a class="col-md-2" href="javascript:void(0)" data-toggle="modal" data-target="#works7Modal" style="outline: none;">
                                        <img src="resumeApp/resources/views/customTheme/images/newResume/link.png" alt="view work">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <? endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr style="width: 85%">