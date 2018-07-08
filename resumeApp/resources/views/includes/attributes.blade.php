<div role="tabpanel" class="panel tab-pane fade" id="attributes">
    <div class="panelHeading">
        <ul>
            <li>
                Personal attributes
            </li>
        </ul>
    </div>
    <div class="form-group col-md-12">
        <label for="personal_interests" class="panelFormLabel">Professional interests <span id="tickMarkpersonal_interests" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
        <textarea class="form-control" rows="3" id="personal_interests" name="personal_interests">{{$personal_interests}}</textarea>
        <small class="panelFormLabel">Your hobbies and/or things you’d personally like to do in the future / How do you spend your free time. </small>
    </div> <!-- interests -->
    <div class="form-group col-md-12">
        <label for="professional_attributes" class="panelFormLabel">Personal attributes <span id="tickMarkprofessional_attributes" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
        <textarea class="form-control" rows="3" id="professional_attributes" name="professional_attributes">{{$professional_attributes}}</textarea>
        <small class="panelFormLabel">Kindly describe yourself in the workplace. Are you a team player, detail oriented, organized, etc.?</small>
    </div> <!-- attributes -->
    <div class="form-group col-md-12">
        <label for="design_styles" class="panelFormLabel">Professional Skills and <? if($profession == 'Developer'):?>Development<?else:?>Design<?endif;?> style <span id="tickMarkdesign_styles" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
        <textarea class="form-control" rows="5" id="design_skills" name="design_styles">{{$design_styles}}</textarea>
        <small class="panelFormLabel">50-200 Words</small>
    </div> <!-- design style -->
    <div class="row">
        <div class="buttonMain col-md-4 offset-md-4">
            <button type="submit" class="btn-block hireBtn" style="border: 0!important;">Apply Now</button>
        </div>
    </div>
</div>
