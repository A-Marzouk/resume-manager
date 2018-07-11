{{-- About me Section --}}
<div id="about">
    <div class="row">
        <div class="offset-md-1 col-md-5">
            <img src="resumeApp/resources/views/customTheme/images/newResume/about_me.png" style="padding-bottom: 10px;" alt="aboutImg" width="30px;">
            <span class="aboutText">ABOUT ME</span>
            <div class="aboutText">
                <div class="aboutSubText info">
                    <div class="row">
                        <div class="col-md-3">Language:</div>
                        <div class="col-md-6">  {{$user->languages}}</div>
                    </div><br/>
                    <div class="row">
                        <div class="col-md-3">Email:</div>
                        <div class="col-md-6">riz@123workforce.com</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <img src="resumeApp/resources/views/customTheme/images/newResume/what_i_do.png" style="padding-bottom: 10px;" alt="aboutImg" width="30px;">
            <span class="aboutText">WHAT I DO?</span>
            <div class="aboutText">
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