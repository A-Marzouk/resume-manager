{{-- Skills section --}}
<div id="skills" class="skills">
    <div class="row">
        <div class="col-md-5 offset-md-1">
            <img src="resumeApp/resources/views/customTheme/images/newResume/skills.png" alt="aboutImg" width="30px;">
            <span class="aboutText">SKILLS</span>
        </div>
    </div>
    <div class="row">
        <? $design_skills_checkBoxes = explode(',',$user->design_skills_checkbox)?>
        <? $counter = count($design_skills_checkBoxes);
        if($counter > 6 ){
            $counter = 6 ;
        }
        ?>
        <? if($counter > 0):?>
            <div class="col-md-10 offset-md-1">
                <div class="row aboutSubText skillBars">
                    @for($i=0; $i<$counter; $i++)
                        <div class="col-md-6">
                            <p class="skill">{{$design_skills_checkBoxes[$i]}}<div class="bar"></div></p>
                        </div>
                    @endfor
                </div>
            </div>
        <? endif;?>
    </div>
</div>
<hr style="width: 1200px;">

{{-- more skills section --}}
<div id="about">
    <div class="row">
        <div class="col-md-5 offset-md-1">
            <img src="resumeApp/resources/views/customTheme/images/newResume/more_skills.png" alt="aboutImg" width="30px;">
            <span class="aboutText">MORE SKILLS</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 offset-md-1 moreSkills">
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