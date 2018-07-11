{{-- Education and Trainings section --}}
<div id="about" class="education">
    <div class="row">
        <div class="col-md-5 offset-md-1">
            <div class="row">
                <div class="col-md-1 col-1">
                    <img src="resumeApp/resources/views/customTheme/images/newResume/education.png" alt="aboutImg" width="30px;">
                </div>
                <div class="col-md-10 col-10">
                    <div class="aboutText">
                        Education<br>
                        <? if(!empty($user->eduTitle1)):?>
                        <div class="row">
                            <div class="col-md-12 aboutSubText">
                                <div class="year"><span class="circle"></span> {{$user->eduYear1}}</div>
                                <div class="title">{{$user->eduTitle1}}</div>
                                <div class="desc">{{$user->eduDesc1}}</div>
                            </div>
                        </div><br/>
                        <? endif; ?>
                        <? if(!empty($user->eduTitle2)):?>
                        <div class="row">
                            <div class="col-md-10 aboutSubText">
                                <div class="year"><span class="circle"></span> {{$user->eduYear2}}</div>
                                <div class="title">{{$user->eduTitle2}}</div>
                                <div class="desc">{{$user->eduDesc2}}</div>
                            </div>
                        </div><br/>
                        <? endif; ?>
                        <? if(!empty($user->eduTitle3)):?>
                        <div class="row">
                            <div class="col-md-10 aboutSubText">
                                <div class="year"><span class="circle"></span> {{$user->eduYear3}}</div>
                                <div class="title">{{$user->eduTitle3}}</div>
                                <div class="desc">{{$user->eduDesc3}}</div>
                            </div>
                        </div>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-1 col-1">
                    <img src="resumeApp/resources/views/customTheme/images/newResume/trainings.png" alt="aboutImg" width="30px;">
                </div>
                <div class="col-md-10 col-10">
                    <div class="aboutText">
                        TRAININGS<br>
                        <? if(!empty($user->trnTitle1)):?>
                        <div class="row">
                            <div class="col-md-12 aboutSubText">
                                <div class="year"><span class="circle"></span> {{$user->trnYear1}}</div>
                                <div class="title">{{$user->trnTitle1}}</div>
                                <div class="desc">{{$user->trnDesc1}}</div>
                            </div>
                        </div><br/>
                        <? endif; ?>
                        <? if(!empty($user->trnTitle3)):?>
                        <div class="row">
                            <div class="col-md-10 aboutSubText">
                                <div class="year"><span class="circle"></span> {{$user->trnYear2}}</div>
                                <div class="title">{{$user->trnTitle2}}</div>
                                <div class="desc">{{$user->trnDesc2}}</div>
                            </div>
                        </div><br/>
                        <? endif; ?>
                        <? if(!empty($user->trnTitle3)):?>
                        <div class="row">
                            <div class="col-md-10 aboutSubText">
                                <div class="year"><span class="circle"></span> {{$user->trnYear3}}</div>
                                <div class="title">{{$user->trnTitle3}}</div>
                                <div class="desc">{{$user->trnDesc3}}</div>
                            </div>
                        </div>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>