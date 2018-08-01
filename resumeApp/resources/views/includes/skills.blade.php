<div role="tabpanel" class="panel tab-pane fade" id="skills" style="padding-top: 0;">
    <div class="panelHeading">
        <ul>
            <li>
                Professional skills
            </li>
        </ul>
    </div>

    <div class="form-group col-lg-8 col-md-12">
        <label style="padding: 2px;" class="panelFormLabel">
            <? if($profession == 'Designer'):?>
            Top 6 Design skills
            <? else: ?>
            Top 6 Development Skills
            <? endif;?>

            <span id="tickMarkdesign_skills_checkbox" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span>

        </label>
        <? $skillsDesigner = [
            'UI design','UX design','Logo design','Animation','Motion Graphics','Illustration',
            'Advertising','Branding','Brochure Design','Website Design','Game Designer',
            'Character Design','Digital Painting','Creative Director',' HTML / CSS'
        ];
        $skillsDeveloper = ['JavaScript','SQL','Java','C#','Python','PHP',
            'C++','C','TypeScript','Ruby','Objective-C','Swift','VB.NET','Go',
            'Perl','Scala','Groovy','Assembly','CoffeeScript','VBA','R','Matlab','Visual Basic 6','Lua',
            'Haskell','HTML','CSS'];
        ?>
        <div class="form-check">
            <? if($profession == 'Designer'):?>
            @foreach($skillsDesigner as $skill)
                <label class="form-check-label col-md-3 checkBoxText checkBoxContainer">
                    <input class="form-check-input" style="@if($errors->has('design_skills_checkbox')) border:1px solid red; @endif" type="checkbox" name="design_skills_checkbox[]" value="{{$skill}}"
                           <? if(in_array($skill,$skillsCheckBox)): ?> checked <?endif;?> >
                    {{$skill}}
                    <span class="checkmark"></span>
                </label>
            @endforeach
            <? else:?>
            @foreach($skillsDeveloper as $skill)
                <label class="form-check-label col-md-3 checkBoxText checkBoxContainer">
                    <input class="form-check-input" type="checkbox" style="@if($errors->has('design_skills_checkbox')) border:1px solid red; @endif" name="design_skills_checkbox[]" value="{{$skill}}"
                           <? if(in_array($skill,$skillsCheckBox)): ?> checked <?endif;?> >
                    {{$skill}}
                    <span class="checkmark"></span>
                </label>
            @endforeach
            <? endif;?>
        </div>
    </div> <!-- design skills checkbox -->

    <div class="form-group col-lg-8 col-md-12">
        <hr>
        <label  style=" padding: 2px;" class="panelFormLabel">
            <? if($profession == 'Designer'):?>
            6 Primary Skills *
            <? else: ?>
            6 Frameworks/ Libraries / Databases you can use most proficiently <span style="font-size:small;">*</span>
            <? endif;?>
        </label>

        <?
        $designSkills = [
            'Adobe After Effects', 'Sketch', 'Adobe Illustrator', 'Adobe XD', 'Photoshop', 'Autocad',
            'Solidworks', 'Adobe Flash', 'Digital Drawing Tablet', 'Adobe Indesign', 'CorelDraw', '3d Max'
        ];
        $developSkills = [
            'AngularJS','Node.js','.NET Core','React','Cordova','Firebase','Xamarin',
            'Hadoop','Spark','MySQL','SQL Server','PostgreSQL','SQLite','MongoDB','Oracle','Redis',
            'Cassandra'
        ];
        ?>
        <div class="form-check">
            <? if($profession == 'Designer'):?>
            @foreach($designSkills as $skill)
                <label class="form-check-label col-md-4 checkBoxText checkBoxContainer">
                    <input class="form-check-input" style="@if($errors->has('primarySkills')) border:1px solid red; @endif" type="checkbox" name="primarySkills[]" value="{{$skill}}"
                           <? if(in_array($skill,$PrimarySkillsCheckBox)): ?> checked <?endif;?>>
                    {{$skill}}
                    <span class="checkmark"></span>
                </label>
            @endforeach
            <? else: ?>
            @foreach($developSkills as $skill)
                <label class="form-check-label col-md-4 checkBoxText checkBoxContainer">
                    <input class="form-check-input" type="checkbox" name="primarySkills[]" value="{{$skill}}"
                           <? if(in_array($skill,$PrimarySkillsCheckBox)): ?> checked <?endif;?>>
                    {{$skill}}
                    <span class="checkmark"></span>
                </label>
            @endforeach
            <? endif;?>
        </div>
    </div> <!-- primary skills -->

    <div class="form-group col-md-12">
        <hr>
        <label for="spec_design_skills" class="panelFormLabel">Please list any other skills that you have, separated by comma <span id="tickMarkdesign_skills" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
        <textarea class="form-control" rows="3" id="spec_design_skills" name="design_skills">{{$design_skills}}</textarea>
    </div> <!-- design skills -->

    <hr>
    <div class="form-group col-md-12">
        <label for="design_styles" class="panelFormLabel"> Please talk in greater detail about your specific skills and <? if($profession == 'Developer'):?>Development<?else:?>Design<?endif;?> style <span id="tickMarkdesign_styles" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
        <textarea class="form-control" rows="5" id="design_skills" name="design_styles">{{$design_styles}}</textarea>
        <small class="panelFormLabel">50-200 Words</small>
    </div> <!-- design style -->
    <hr>
    <div class="form-group col-md-12">
        <label for="design_styles" class="panelFormLabel">
            <? if($profession == 'Developer'):?>
               Please tell us what languages frameworks most interest you at the moment for future learning and career development.
            <?else:?>
               Please tell us what design styles and tools you are interested in for future learning and career development.
            <?endif;?>
            <span id="tickMarkfuture_plan" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span>
            </label>
            <textarea class="form-control" rows="3" id="future_plan" name="future_plan">{{$future_plan}}</textarea>
    </div> <!-- Future plan -->
    <div class="row">
        <div class="buttonMain col-md-3 offset-md-9">
            <a class="btn-block hireBtn nextBtn"  href="#attributes">Next</a>
        </div>
    </div>
</div>
