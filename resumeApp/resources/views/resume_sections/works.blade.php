{{-- Works section --}}
<?
$works = explode(',',$user->works);
foreach ($works as $work){
    if(!empty($work)){
        $clearWorks[] = $work;
    }
}
?>
<div id="work" class="worksSection">
    <div class="row firstPart">
        <? if(isset($clearWorks[0]) && !empty($clearWorks[0]) ):?>
        <div class="col-md-5 offset-md-1">
            <div class="row">
                <div class="col-md-1">
                    <img src="resumeApp/resources/views/customTheme/images/newResume/works.png" alt="aboutImg" width="30px;">
                </div>
                <div class="col-md-11">
                    <div class="aboutText">
                        <span class="worksText">WORKS</span><br>
                        <div class="row">
                            <div class="col-md-12 aboutSubText">
                                <div class="workCard">
                                    <div class="workImg">
                                        <img src="{{$clearWorks[0]}}" alt="work img" width="260" height="300">
                                    </div>
                                    <div class="workTitle">
                                        <div class="row">
                                            <div class="col-md-10">
                                                {{$user->workDesc0}}
                                            </div>
                                            <div class="col-md-2">
                                                <img src="resumeApp/resources/views/customTheme/images/newResume/link.png" alt="view work">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <? endif;?>
        <? if(isset($clearWorks[1]) && !empty($clearWorks[1]) ):?>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-11">
                    <div class="aboutText">
                        <br>
                        <div class="row">
                            <div class="col-md-12 aboutSubText">
                                <div class="workCard">
                                    <div class="workImg">
                                        <img src="{{$clearWorks[1]}}" alt="work img" width="260" height="300">
                                    </div>
                                    <div class="workTitle">
                                        <div class="row">
                                            <div class="col-md-10">
                                                {{$user->workDesc1}}
                                            </div>
                                            <div class="col-md-2">
                                                <img src="resumeApp/resources/views/customTheme/images/newResume/link.png" alt="view work">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <? endif;?>
    </div>
    <div class="row">
        <? if(isset($clearWorks[2]) && !empty($clearWorks[2]) ):?>
        <div class="col-md-5 offset-md-1">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-11">
                    <div class="aboutText">
                        <br>
                        <div class="row">
                            <div class="col-md-12 aboutSubText">
                                <div class="workCard">
                                    <div class="workImg">
                                        <img src="{{$clearWorks[2]}}" alt="work img" width="260" height="300">
                                    </div>
                                    <div class="workTitle">
                                        <div class="row">
                                            <div class="col-md-10">
                                                {{$user->workDesc2}}
                                            </div>
                                            <div class="col-md-2">
                                                <img src="resumeApp/resources/views/customTheme/images/newResume/link.png" alt="view work">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <? endif;?>
        <? if(isset($clearWorks[3]) && !empty($clearWorks[3]) ):?>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-11">
                    <div class="aboutText">
                        <br>
                        <div class="row">
                            <div class="col-md-12 aboutSubText">
                                <div class="workCard">
                                    <div class="workImg">
                                        <img src="{{$clearWorks[3]}}" alt="work img" width="260" height="300">
                                    </div>
                                    <div class="workTitle">
                                        <div class="row">
                                            <div class="col-md-10">
                                                {{$user->workDesc3}}
                                            </div>
                                            <div class="col-md-2">
                                                <img src="resumeApp/resources/views/customTheme/images/newResume/link.png" alt="view work">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <? endif;?>
    </div>
</div>