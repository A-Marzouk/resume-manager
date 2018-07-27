{{-- About me Section --}}
<div id="about">
    <div class="row">
        <div class="offset-lg-1 col-lg-5 col-md-6 aboutLeftSideContainer">
            <img src="resumeApp/resources/views/customTheme/images/newResume/about_me.png" style="padding-bottom: 10px;" alt="aboutImg" width="30px;">
            <span class="aboutText">ABOUT ME</span>
            <div class="aboutText mobile">
                <div class="aboutSubText info">
                    <div class="row">
                        <div class="col-lg-3 col-4">Lang:</div>
                        <div class="col-lg-6 col-8">  {{$user->languages}}</div>
                    </div><br/>
                    <div class="row">
                        <div class="col-lg-3 col-4">Email:</div>
                        <div class="col-lg-6 col-8">riz@123workforce.com</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-5">
            <img src="resumeApp/resources/views/customTheme/images/newResume/what_i_do.png" style="padding-bottom: 10px;" alt="aboutImg" width="30px;">
            <span class="aboutText">Technologies I use</span>
            <div class="aboutText mobile">
                <div class="row">
                    <div class="col-md-6 col-6 aboutSubText skillBullets">
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