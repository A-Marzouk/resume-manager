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
        <div class="col-md-5 offset-md-1">
            <img src="resumeApp/resources/views/customTheme/images/newResume/works.png" alt="aboutImg" width="30px;">
            <span class="aboutText" style="color: white;">WORKS</span>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row">
                    <div class="col-md-6">
                        <? if(isset($clearWorks[0]) && !empty($clearWorks[0]) ):?>
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
                        <? endif;?>
                    </div>
                    <div class="col-md-6">
                        <? if(isset($clearWorks[1]) && !empty($clearWorks[1]) ):?>
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
                        <? endif;?>
                    </div>
                    <div class="col-md-6">
                        <? if(isset($clearWorks[2]) && !empty($clearWorks[2]) ):?>
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
                        <? endif;?>
                    </div>
                    <div class="col-md-6">
                        <? if(isset($clearWorks[3]) && !empty($clearWorks[3]) ):?>
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
                        <? endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr style="width: 1200px;">