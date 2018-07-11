{{-- Skills section --}}
<div id="skills" class="skills">
    <div class="row">
        <div class="col-md-5 offset-md-1">
            <div class="row">
                <div class="col-md-1 col-1">
                    <img src="resumeApp/resources/views/customTheme/images/newResume/skills.png" alt="aboutImg" width="30px;">
                </div>
                <div class="col-md-10 col-10">
                    <div class="aboutText">
                        SKILLS<br>
                        <div class="row">
                            <div class="col-md-12 aboutSubText">
                                <? $design_skills_checkBoxes = explode(',',$user->design_skills_checkbox)?>
                                <? $counter = count($design_skills_checkBoxes);
                                if($counter > 6 ){
                                    $counter = 6 ;
                                }
                                ?>
                                <? if($counter > 0):?>
                                @for($i=0; $i<$counter/2; $i++)
                                    <p class="skill">{{$design_skills_checkBoxes[$i]}}<div class="bar"></div></p>
                                @endfor
                                <? endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-10 offset-1">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    <div class="aboutText">
                        <br>
                        <div class="row">
                            <div class="col-md-12 aboutSubText">
                                <? if($counter > 3):?>
                                @for($i=$counter-1; $i>($counter/2)-1; $i--)
                                    <p class="skill">{{$design_skills_checkBoxes[$i]}}<div class="bar"></div></p>
                                @endfor
                                <? endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
{{-- more skills section --}}
<div id="about" class="moreSkills">
    <div class="row">
        <div class="col-md-5 offset-md-1">
            <div class="row">
                <div class="col-md-1 col-1">
                    <img src="resumeApp/resources/views/customTheme/images/newResume/more_skills.png" alt="aboutImg" width="30px;">
                </div>
                <div class="col-md-10 col-10">
                    <div class="aboutText">
                        MORE SKILLS<br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 offset-md-1 offset-1 moreSkills">
            <div class="row">
                <?
                $counter = count($charSkills);
                if($counter > 10 ){
                    $counter = 10 ;
                }
                ?>
                <? if($counter > 1):?>
                <? for($i=0; $i<$counter;$i++): ?>
                <div class="">
                    <div class="skillBox">{{substr($charSkills[$i], 0, strpos($charSkills[$i], ":"))}}</div>
                </div>
                <?endfor;?>
                <? endif;?>
            </div>

        </div>
    </div>
</div>