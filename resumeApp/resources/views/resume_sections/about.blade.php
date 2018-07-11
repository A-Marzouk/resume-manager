{{-- About me Section --}}
<div id="about">
    <div class="row">
        <div class="col-md-5 offset-md-1">
            <div class="row">
                <div class="col-md-1 col-1">
                    <img src="resumeApp/resources/views/customTheme/images/newResume/about_me.png" alt="aboutImg" width="30px;">
                </div>
                <div class="col-md-10 col-10">
                    <div class="aboutText">
                        ABOUT ME<br>
                        <div class="row">
                            <div class="col-12 aboutSubText">
                                <p>Lang: {{$user->languages}}</p>
                            </div>
                            <div class="col-12 aboutSubText">
                                <p>Email: riz@123workforce.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-1 col-1">
                    <img src="resumeApp/resources/views/customTheme/images/newResume/what_i_do.png" alt="aboutImg" width="30px;">
                </div>
                <div class="col-md-10 col-10">
                    <div class="aboutText">
                        WHAT I DO?<br> {{-- 6 primary skills --}}
                        <div class="row">
                            <div class="col-md-6 col-6 aboutSubText">
                                <? $counter = count($primarySkills);
                                if($counter > 6 ){
                                    $counter = 6 ;
                                }
                                ?>
                                <? if($counter > 1):?>
                                <? for($i=0; $i < $counter/2;$i++): ?>
                                <p><span class="circle"></span>{{$primarySkills[$i]}}</p>
                                <? endfor;?>
                            </div>
                            <div class="col-md-6 col-6 aboutSubText">
                                <? for($i= $counter-1; $i > ($counter/2) -1 ;$i--): ?>
                                <p><span class="circle"></span>{{$primarySkills[$i]}}</p>
                                <? endfor;?>
                            </div>
                            <? endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>