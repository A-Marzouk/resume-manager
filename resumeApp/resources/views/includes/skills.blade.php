<div role="tabpanel" class="panel tab-pane fade" id="skills">
    <div class="panelHeading">
        <ul>
            <li>
                Professional skills
            </li>
        </ul>
    </div>
    <div class="form-group col-md-12">
        <hr>
        <label for="spec_design_skills" class="panelFormLabel">Specific design skills <span id="tickMarkdesign_skills" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
        <textarea class="form-control" rows="3" id="spec_design_skills" name="design_skills">{{$design_skills}}</textarea>
    </div> <!-- design skills -->

    <div class="form-group col-md-8">
        <hr>
        <label style="border-bottom:1px lightgray solid ; padding: 2px;">
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

    <div class="form-group col-md-8">
        <hr>
        <label  style="border-bottom:1px lightgray solid ; padding: 2px;">
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

        <label style="border-bottom:1px lightgray solid ; padding: 2px;">Please choose 6 character skills</label>
        <?
        $charSkills = ['Adventurous:  I take risks.', 'Ambitious:  I am driven to succeed.', 'Approachable:  I work well with others.',
            'Articulate:  I can express myself well in front of groups.','Autonomous:  I use initiative.', 'Calm:  I stay level headed in a crisis.', 'Charismatic:  I can be a leader when need be.',
            'Cheerful:  I develop a positive work environment.', 'Clever:  I can juggle multiple tasks.', 'Competitive:   I thrive under pressure.',
            'Confident:  I am not afraid to ask questions.', 'Cooperative:  I get along well in a team setting.', 'Courteous:  I care about workplace atmosphere.',
            'Creative:  I think outside the box.',
            'Curiosity:  I am eager to learn.',
            'Determined:   I am self-motivated.',
            'Devoted:  I am committed to the company’s success.',
            'Diligent:   I always work my hardest.',
            'Easygoing:  I easily adapt to new situations.',
            'Educated:  I possess formal training.',
            'Efficient:  I have very quick turnover time.',
            'Eloquent:  I have strong communication skills.',
            'Energetic: I am able to work long and hard hours.',
            'Enthusiastic:  I put my all into every project.',
            'Flexible:  I am able to adapt my priorities.',
            'Focused:  I am goal-oriented.',
            'Friendly:   I am easy to work with.',
            'Honest:  I value integrity.',
            'Imaginative:  I am inventive in my work process.',
            'Independent:  I need little direction.',
            'Inexperienced:  I am a blank pallet.',
            'Inquisitive:  I am excellent at gathering information.',
            'Insightful:  I can read between the lines.',
            'Intuitive:  I can sense when there is a problem.',
            'Meticulous:  I pay attention to the small details.',
            'Neurotic:  I am a perfectionist.',
            'Open-minded:  I take constructive criticism well.',
            ' Opinionated:  I am comfortable voicing opinions.',
            'Organized:  I am a meticulous planner.',
            'Patient:  I am not easily ruffled.',
            'Perceptive:  I can read people effortlessly.',
            'Persuasive:  I am a natural salesperson.',
            'Procedural:  I work best with structure.',
            'Punctual:  I have great time management skills.',
            'Quiet:  I am a great listener.',
            'Relaxed:  I do not stress easily.',
            'Resourceful:  I use every tool at hand.',
            'Responsible:  I always finish a task on time.',
            'Talkative:  I am comfortable initiating a dialogue.',
            'Technological:  I am industrially savvy.',
        ] ;
        ?>
        <div class="form-check">
            @foreach($charSkills as $skill)
                <label class="form-check-label col-md-5 checkBoxText checkBoxContainer">
                    <input class="form-check-input" type="checkbox" name="charSkills[]" value="{{$skill}}"
                           <? if(in_array($skill,$charSkillsCheckBox)): ?> checked <?endif;?> >
                    {{$skill}}
                    <span class="checkmark"></span>
                </label>
            @endforeach
        </div>
    </div> <!-- char skills -->

    <div class="row">
        <div class="buttonMain col-md-3 offset-md-9">
            <a class="btn-block hireBtn nextBtn"  href="#attributes">Next</a>
        </div>
    </div>
</div>
