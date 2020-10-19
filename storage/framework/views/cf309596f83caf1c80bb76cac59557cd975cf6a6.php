<div role="tabpanel" class="panel tab-pane fade" id="portfolio">
    <div class="panelHeading">
        <ul>
            <li>
                Portfolio
            </li>
        </ul>
    </div>
    <div class="row">
        <? if($profession == 'Developer'):?>
        <div class="form-group col-md-6">
            <label for="birth_date" class="panelFormLabel">Github link <span id="tickMarkgithubLink" class="d-none"><img src="/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="text" class="form-control panelFormInput" name="githubLink" value="<?php echo e($github); ?>">
        </div> <!-- git link -->
        <div class="form-group col-md-6">
            <label for="birth_date" class="panelFormLabel">Stack overflow Link <span id="tickMarkstackoverflowLink" class="d-none"><img src="/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="text" class="form-control panelFormInput" name="stackoverflowLink" value="<?php echo e($stackoverflow); ?>">
        </div> <!-- stack link -->
        <?else:?>
        
        <div class="form-group col-md-6">
            <label for="behanceLink" class="panelFormLabel"> Behance Link <span id="tickMarkbehanceLink" class="d-none"><img src="/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="text" class="form-control panelFormInput" name="behanceLink" value="<?php echo e($behanceLink); ?>" id="behanceLinkInput">
        </div> <!-- Behance Link -->
        <div class="form-group col-md-6">
            <label for="birth_date" class="panelFormLabel"> Instagram Link <span id="tickMarkinstagramLink" class="d-none"><img src="/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="text" class="form-control panelFormInput" name="instagramLink" value="<?php echo e($instagramLink); ?>" id="instagramLink">
        </div> <!-- Instagram Link -->
        <div class="form-group col-md-6">
            <label for="birth_date"class="panelFormLabel"> Dribble Link <span id="tickMarkdribbleLink" class="d-none"><img src="/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="text" class="form-control panelFormInput" name="dribbleLink" value="<?php echo e($dribbleLink); ?>" id="dribbleLink">
        </div> <!-- Dribble link -->
        <? endif;?>
        <div class="form-group col-md-6">
            <label for="birth_date" class="panelFormLabel"> Personal Website Link <span id="tickMarkpersonalSite" class="d-none"><img src="/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="text" class="form-control panelFormInput" name="personalSite" value="<?php echo e($personalSite); ?>">
        </div> <!-- site link -->
    </div> <hr>
    <div class="col-md-12">
        <label for="work_overview" class="panelFormLabel">Work overview</label>
        <div  id="work_overview">
            <works-list></works-list>
        </div>
    </div> <!-- work exp -->
    <hr>
    <div class="col-md-12">
        <label for="freelancer_works" class="panelFormLabel">Examples of your  <? if($profession == 'Developer'):?>development<?else:?>design<?endif;?> work </label>
        <div id="freelancer_works">
            <projects-list></projects-list>
        </div>
    </div> <!-- freelancer_works -->

    <div class="row">
        <div class="buttonMain col-md-3 offset-md-9">
            <a class="btn-block hireBtn nextBtn"  href="#skills">Next</a>
        </div>
    </div>
</div>
