<?
    $skillsDesigner = [
    // designer
    // 1-
    'ui design' => '/images/skills_icons/user_interface.png',
    'ux design' => '/images/skills_icons/user_experience.png',
    'logo design' => '/images/skills_icons/logo_design.png',
    'animation' => '/images/skills_icons/animation.jpg',
    'motion graphics' => '/images/skills_icons/motion_graphics.png',
    'illustration' => '/images/skills_icons/illustration.png',
    'advertising' => '/images/skills_icons/advertising.png',
    'branding'=> '/images/skills_icons/branding.png',
    'brochure Design'=> '/images/skills_icons/brochure_design.png',
    'website design'=> '/images/skills_icons/web_design.png',
    'game designer'=> '/images/skills_icons/game_designer.png',
    'character design'=> '/images/skills_icons/character_design.png',
    'digital painting'=> '/images/skills_icons/digital_painting.png',
    'creative director'=> '/images/skills_icons/creative_director.png',
    'html / css'=> '/images/skills_icons/HTML.png',
    // 2-

    'adobe after effects'=>'/images/skills_icons/AE.png',
    'sketch'=>'/images/skills_icons/Sketch.png',
    'adobe illustrator'=>'/images/skills_icons/Illustrator.png',
    'adobe xd'=>'/images/skills_icons/AdobeXD.png',
    'photoshop'=>'/images/skills_icons/Photoshop.png',
    'autocad'=>'/images/skills_icons/autocad.png',
    'solidworks'=>'/images/skills_icons/solid_works.png',
    'adobe flash'=>'/images/skills_icons/adobe_flash.png',
    'digital drawing Tablet'=>'/images/skills_icons/digital_drawing_tablet.png',
    'adobe indesign'=>'/images/skills_icons/indesign.png',
    'coreldraw'=>'/images/skills_icons/corel_draw.png',
    '3d max'=>'/images/skills_icons/3d_max.png',

    // developer :
    // 1-
    'javascript' =>'/images/skills_icons/javascript.png',
    'sql'=>'/images/skills_icons/mysql.png',
    'java'=>'/images/skills_icons/java.png',
    'c#'=>'/images/skills_icons/c#.png',
    'python'=>'/images/skills_icons/python.png',
    'php'=>'/images/skills_icons/php.png',
    'c++'=>'/images/skills_icons/c_language.png',
    'c'=>'/images/skills_icons/c_language.png',
    'typescript'=>'/images/skills_icons/typescript.png',
    'ruby'=>'/images/skills_icons/ruby.png',
    'objective-C'=>'/images/skills_icons/objective_c.png',
    'swift'=>'/images/skills_icons/swift.png',
    'vb.net'=>'/images/skills_icons/vb_net.png',
    'go'=>'/images/skills_icons/go.png',
    'perl'=>'/images/skills_icons/perl.png',
    'scala'=>'/images/skills_icons/scala.png',
    'groovy'=>'/images/skills_icons/groovy.png',
    'assembly'=>'/images/skills_icons/assembly.png',
    'coffeescript'=>'/images/skills_icons/coffeeScript.png',
    'vba'=>'/images/skills_icons/vba.png',
    'r'=>'/images/skills_icons/r_lang.png',
    'matlab'=>'/images/skills_icons/matlab.png',
    'visual basic 6'=>'/images/skills_icons/matlab.png',
    'lua'=>'/images/skills_icons/lua.png',
    'haskell'=>'/images/skills_icons/haskell.png',
    'html'=>'/images/skills_icons/HTML.png',
    'css'=>'/images/skills_icons/CSS.png',

    //2-
    'angularjs' => '/images/skills_icons/Angularjs.png',
    'node.js' => '/images/skills_icons/node_js.png',
    '.net Core' => '/images/skills_icons/netcore.png',
    'react' => '/images/skills_icons/react.png',
    'cordova' => '/images/skills_icons/cordava.png',
    'firebase' => '',
    'xamarin' => '',
    'hadoop' => '/images/skills_icons/hadoop.png',
    'spark' => '/images/skills_icons/spark.png',
    'mysql' => '/images/skills_icons/mysql.png',
    'sql server' => '/images/skills_icons/sql server.png',
    'postgresql' => '/images/skills_icons/postgreSQL.png',
    'sqlite' => '/images/skills_icons/SQLite.png',
    'mongodb' => '/images/skills_icons/mongoDB.png',
    'oracle' => '/images/skills_icons/Oracle.png',
    'redis' => '/images/skills_icons/redis.png',
    'cassandra' => '/images/skills_icons/cassandra.png'
];
?>

<div id="nav-taps-resume">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link text-center active" href="#languagesTab<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" role="tab" data-toggle="tab">
                Programming Languages
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-center" href="#databases<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" role="tab" data-toggle="tab">
                Frameworks / Databases
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-center" href="#skillsTab<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" role="tab" data-toggle="tab">
                Design Skills
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-center" href="#software<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" role="tab" data-toggle="tab">
                Software
            </a>
        </li>
    </ul>
    <?
    $freelancerSkills = $freelancer->skills;
    $i=0;
    ?>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active firstItem" id="languagesTab<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
            <div class="row" style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                <div class="col-md-12  text-center">
                    <span class="skillsCard">
                        <? $i= 0 ;?>
                        <?php $__currentLoopData = $freelancerSkills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <? if($i<6 && $skill->type == 'programming'):?>
                                    <?
                                    $imgSrc = '/images/skills_icons/skill.png' ;
                                    if(isset($skillsDesigner[strtolower($skill->skill_title)]) && !empty($skillsDesigner[strtolower($skill->skill_title)])){
                                        $imgSrc = $skillsDesigner[strtolower($skill->skill_title)] ;
                                    }
                                    ?>
                                    <span id="skillContainer<?php echo e($i); ?>" class="highlightSkill">
                                        <img style="width: 17px;padding-bottom: 3px;" src="<?php echo e($imgSrc); ?>" alt="skill" id="skillImage<?php echo e($i); ?>">
                                        <?php echo e($skill->skill_title); ?> &nbsp;&nbsp;
                                    </span>
                                <?$i++;?>
                            <? endif;?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </span>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="databases<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
            <div class="text-center panelFormLabel" style="padding-top: 17px; padding-bottom: 17px;">
                <? $i=10 ;?>
                <?php $__currentLoopData = $freelancerSkills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <? if($i<16 && $skill->type == 'frameworks'):?>
                    <?
                    $imgSrc = '/images/skills_icons/skill.png' ;
                    if(isset($skillsDesigner[strtolower($skill->skill_title)]) && !empty($skillsDesigner[strtolower($skill->skill_title)])){
                        $imgSrc = $skillsDesigner[strtolower($skill->skill_title)] ;
                    }
                    ?>
                    <span id="skillContainer<?php echo e($i); ?>" class="highlightSkill">
                                        <img style="width: 17px;padding-bottom: 3px;" src="<?php echo e($imgSrc); ?>" alt="skill" id="skillImage<?php echo e($i); ?>">
                        <?php echo e($skill->skill_title); ?> &nbsp;&nbsp;
                    </span>
                    <?$i++;?>
                    <? endif;?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="skillsTab<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
            <div class="row" style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                <div class="col-md-12  text-center">
                    <span class="skillsCard">
                        <?$i=20;?>
                      <?php $__currentLoopData = $freelancerSkills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <? if($i<26 && $skill->type == 'design'):?>
                            <?
                            $imgSrc = '/images/skills_icons/skill.png' ;
                            if(isset($skillsDesigner[strtolower($skill->skill_title)]) && !empty($skillsDesigner[strtolower($skill->skill_title)])){
                                $imgSrc = $skillsDesigner[strtolower($skill->skill_title)] ;
                            }
                            ?>
                            <span id="skillContainer<?php echo e($i); ?>" class="highlightSkill">
                                        <img style="width: 17px;padding-bottom: 3px;" src="<?php echo e($imgSrc); ?>" alt="skill" id="skillImage<?php echo e($i); ?>">
                                <?php echo e($skill->skill_title); ?> &nbsp;&nbsp;
                                    </span>
                                <?$i++;?>
                            <? endif;?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </span>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="software<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
            <div class="text-center panelFormLabel" style="padding-top: 17px; padding-bottom: 17px;">
                <?$i=30;?>
                <?php $__currentLoopData = $freelancerSkills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <? if($i<36 && $skill->type == 'software'):?>
                    <?
                    $imgSrc = '/images/skills_icons/skill.png' ;
                    if(isset($skillsDesigner[strtolower($skill->skill_title)]) && !empty($skillsDesigner[strtolower($skill->skill_title)])){
                        $imgSrc = $skillsDesigner[strtolower($skill->skill_title)] ;
                    }
                    ?>
                    <span id="skillContainer<?php echo e($i); ?>" class="highlightSkill">
                                        <img style="width: 17px;padding-bottom: 3px;" src="<?php echo e($imgSrc); ?>" alt="skill" id="skillImage<?php echo e($i); ?>">
                        <?php echo e($skill->skill_title); ?> &nbsp;&nbsp;
                                    </span>
                        <?$i++;?>
                    <? endif;?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
