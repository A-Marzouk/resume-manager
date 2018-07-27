<div role="tabpanel" class="panel tab-pane fade" id="attributes">
    <div class="panelHeading">
        <ul>
            <li>
                Personal attributes
            </li>
        </ul>
    </div>
    <div class="form-group col-md-12">
        <hr>

        <label style=" padding: 2px;" class="panelFormLabel">Please choose 6 character skills</label>
        <?
        $charSkills = ['Adventurous:  I take risks.', 'Ambitious:  I am driven to succeed.', 'Approachable:  I work well with others.',
            'Articulate:  I can express myself well in front of groups.','Autonomous:  I use initiative.', 'Calm:  I stay level headed in a crisis.', 'Charismatic:  I can be a leader when need be.',
            'Cheerful:  I develop a positive work environment.', 'Competitive:   I thrive under pressure.',
            'Confident:  I am not afraid to ask questions.', 'Cooperative:  I get along well in a team setting.', 'Courteous:  I care about workplace atmosphere.',
            'Creative:  I think outside the box.',
            'Curiosity:  I am eager to learn.',
            'Determined:   I am self-motivated.',
            'Devoted:  I am committed to the company’s success.',
            'Diligent:   I always work my hardest.',
            'Easygoing:  I easily adapt to new situations.',
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
            'Inquisitive:  I am excellent at gathering information.',
            'Insightful:  I can read between the lines.',
            'Meticulous:  I pay attention to the small details.',
            'Open-minded:  I take constructive criticism well.',
            'Organized:  I am a meticulous planner.',
            'Patient:  I am not easily ruffled.',
            'Perceptive:  I can read people effortlessly.',
            'Procedural:  I work best with structure.',
            'Punctual:  I have great time management skills.',
            'Quiet:  I am a great listener.',
            'Relaxed:  I do not stress easily.',
            'Responsible:  I always finish a task on time.',
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

    <div class="form-group col-md-12">
        <label for="personal_interests" class="panelFormLabel">Outside of work , what are your hobbies and interests?<span id="tickMarkpersonal_interests" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
        <textarea class="form-control" rows="3" id="personal_interests" name="personal_interests">{{$personal_interests}}</textarea>
    </div> <!-- interests -->

    <div class="form-group col-md-12">
        <label for="professional_attributes" class="panelFormLabel">Please talk in greater detail about your character skills and personal attributes that you have ticked above or other character skills you have.
            <span id="tickMarkprofessional_attributes" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
        <textarea class="form-control" rows="3" id="professional_attributes" name="professional_attributes">{{$professional_attributes}}</textarea>
    </div> <!-- attributes -->

    <div class="row">
        <div class="buttonMain col-md-4 offset-md-4">
            <button type="submit" class="btn-block hireBtn" style="border: 0!important;">Apply Now</button>
        </div>
    </div>
</div>
