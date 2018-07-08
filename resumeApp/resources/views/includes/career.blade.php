<div role="tabpanel" class="panel tab-pane fade" id="career">
    <div class="panelHeading">
        <ul>
            <li>
                Career overview (Education / Training)
            </li>
        </ul>
    </div>

    <div class="form-group col-md-12">
        <label for="careerObjective" class="panelFormLabel">Career objective <span id="tickMarkcareerObjective" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
        <textarea class="form-control" rows="3" id="careerObjective" name="careerObjective">{{$careerObjective}}</textarea>
        <small class="panelFormLabel">20-50 Words</small>
    </div> <!-- c.objective -->
    <hr>
    <div class="form-group col-md-12">
        <label style="border-bottom:1px lightgray solid ; padding: 5px;" class="panelFormLabel">Education</label>
        <div class="row">
            <div class="col-md-6 col-lg-4" style="padding: 0!important;">
                <div class="row">
                    <div class="col-md-6">
                        <label for="education" class="panelFormLabel">Title<span id="tickMarkeduTitle1" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                        <input type="text" class="form-control" name="eduTitle1" value="{{$eduTitle1}}">
                    </div>
                    <div class="col-md-6">
                        <label for="education" class="panelFormLabel">Year<span id="tickMarkeduYear1" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                        <input type="text" name="eduYear1" value="{{$eduYear1}}" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="education" class="panelFormLabel">Description <span id="tickMarkeduDesc1" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                        <textarea class="form-control" rows="4" id="education" name="eduDesc1">{{$eduDesc1}}
                            </textarea><br/>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" style="padding: 0!important;">

                <div class="row">
                    <div class="col-md-6">
                        <label for="education" class="panelFormLabel">Title<span id="tickMarkeduTitle2" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                        <input type="text" class="form-control" name="eduTitle2" value="{{$eduTitle2}}">
                    </div>
                    <div class="col-md-6">
                        <label for="education" class="panelFormLabel">Year<span id="tickMarkeduYear2" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                        <input type="text" name="eduYear2" value="{{$eduYear2}}" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="education" class="panelFormLabel">Description <span id="tickMarkeduDesc2" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                        <textarea class="form-control" rows="4" id="education" name="eduDesc2">{{$eduDesc2}}
                                 </textarea><br/>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" style="padding: 0!important;">
                <div class="row">
                    <div class="col-md-6">
                        <label for="education" class="panelFormLabel">Title<span id="tickMarkeduTitle3" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                        <input type="text" class="form-control" name="eduTitle3" value="{{$eduTitle3}}">
                    </div>
                    <div class="col-md-6">
                        <label for="education" class="panelFormLabel">Year<span id="tickMarkeduYear3" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                        <input type="text" name="eduYear3" value="{{$eduYear3}}" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="education" class="panelFormLabel">Description <span id="tickMarkeduDesc3" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                        <textarea class="form-control" rows="4" id="education" name="eduDesc3">{{$eduDesc3}}
                                </textarea>
                    </div>
                </div>
            </div>
        </div>
        <small class="panelFormLabel">Please include all relevant   <? if($profession == 'Developer'):?>development<?else:?>design<?endif;?> schools and/or  <? if($profession == 'Developer'):?>development<?else:?>design<?endif;?> courses you have taken. Include the COURSE NAME & UNIVERSITY NAME</small>
    </div> <!-- Edu -->


    <hr>

    <div class="form-group col-md-12">
        <label style="border-bottom:1px lightgray solid ; padding: 5px;" class="panelFormLabel">Trainings</label>
        <div class="row">
            <div class="col-md-6 col-lg-4" style="padding: 0!important;">
                <div class="row">
                    <div class="col-md-6">
                        <label for="education" class="panelFormLabel">Title<span id="tickMarktrnTitle1" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                        <input type="text" class="form-control" name="trnTitle1" value="{{$trnTitle1}}">
                    </div>
                    <div class="col-md-6">
                        <label for="education" class="panelFormLabel">Year<span id="tickMarktrnYear1" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                        <input type="text" name="trnYear1" value="{{$trnYear1}}" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="education" class="panelFormLabel">Description <span id="tickMarktrnDesc1" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                        <textarea class="form-control" rows="4" id="education" name="trnDesc1">{{$trnDesc1}}
            </textarea><br/>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" style="padding: 0!important;">
                <div class="row">
                    <div class="col-md-6">
                        <label for="education" class="panelFormLabel">Title<span id="tickMarktrnTitle2" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                        <input type="text" class="form-control" name="trnTitle2" value="{{$trnTitle2}}">
                    </div>
                    <div class="col-md-6">
                        <label for="education" class="panelFormLabel">Year<span id="tickMarktrnYear2" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                        <input type="text" name="trnYear2" value="{{$trnYear2}}" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="education" class="panelFormLabel">Description <span id="tickMarktrnDesc2" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                        <textarea class="form-control" rows="4" id="education" name="trnDesc2">{{$trnDesc2}}
            </textarea><br/>
                    </div>

                </div>

            </div>
            <div class="col-md-6 col-lg-4" style="padding: 0!important;">
                <div class="row">
                    <div class="col-md-6">
                        <label for="education" class="panelFormLabel">Title<span id="tickMarktrnTitle3" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                        <input type="text" class="form-control" name="trnTitle3" value="{{$trnTitle3}}">
                    </div>
                    <div class="col-md-6">
                        <label for="education" class="panelFormLabel">Year<span id="tickMarktrnYear3" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                        <input type="text" name="trnYear3" value="{{$trnYear3}}" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="education" class="panelFormLabel">Description <span id="tickMarktrnDesc3" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
                        <textarea class="form-control" rows="4" id="education" name="trnDesc3">{{$trnDesc3}}
            </textarea>
                    </div>

                </div>
            </div>
            <small class="panelFormLabel">Please include all relevant  <? if($profession == 'Developer'):?>development<?else:?>design<?endif;?> trainings attended in the past 3 years. Include the TRAINING NAME/TITLE, & the LOCATION where the training was held</small>
        </div>
    </div>
    <!-- trainings -->

    <hr>

    <div class="form-group col-md-12">
        <label for="" class="panelFormLabel">Work Experience <span id="tickMarkworkExperience" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
        <textarea class="form-control" rows="3" id="work_experience" name="workExperience">{{$workExperience}}
     </textarea>
    </div> <!-- work exp -->

    <div class="row">
        <div class="buttonMain col-md-3 offset-md-9">
            <a class="btn-block hireBtn nextBtn"  href="#portfolio">Next</a>
        </div>
    </div>
</div>
