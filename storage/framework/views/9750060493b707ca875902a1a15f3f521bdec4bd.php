
<div class="portfolioRow" id="tapsArea<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
    <div class="row" id="portfolioContent<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">
    <?php if($freelancer->profession == 'businessSupport'): ?>
            <? $i=1;?>
            <?php $__currentLoopData = $freelancer->recordings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-12 aboutSubText">
                    <div class="title work">
                        <span class="circle"></span>
                        <?php echo e($record->title); ?>

                    </div>
                    <div class="desc"><?php echo e($record->transcription); ?></div>
                    <?
                        // getting the record source right:
                        $source = $record->src;
                        if (strpos($record->src, 'drive.google.com') !== false) {
                            // it is link from google. get the ID
                            $explodedData= explode("/", $record->src);
                            foreach ($explodedData as $id){
                                if(strlen($id) > 20 ){
                                    $source = "https://drive.google.com/uc?export=download&id=".$id."&key=AIzaSyC0bK_7ASw3QylYDzs_Pqo_TeoI7jfFj8M";

                                }
                            }
                        }

                    ?>
                    <div class="row" style="padding-top: 30px;">
                        <div class="offset-md-4 col-md-4">
                            <audio controls style="padding-bottom: 10px;" preload="auto">
                                <source src="<?php echo e($source); ?>">
                                Your browser does not support the audio element.
                            </audio><!--/.audio-container-->
                        </div>
                    </div>
                    <?php if($i < count($freelancer->recordings)): ?>
                        <hr>
                    <?php endif; ?>
                </div>
                <? $i++;?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <?
        $workExamples_all = $freelancer->projects ;

        $workExamples = [] ;
        foreach ($workExamples_all as $work){
            if( $work->isActive == true ||  $work->isActive == 'true'){
                $workExamples[] = $work;
            }
        }
        $i = 0;
        $numberOfSlides = ceil(count($workExamples) / 2);
        $maxNumberOfWorks = 12;
        $slides=[];

        for ($j=0; $j <= $numberOfSlides+1; $j+=2){
            // each slide has 2 works
            if(isset($workExamples[$j])){
                $slides[$j][] = $workExamples[$j];
            }
            if(isset($workExamples[$j+1])){
                $slides[$j][] = $workExamples[$j+1];
            }
        }
        ?>

        
        <?php if($workExamples): ?>
            <? foreach ($workExamples as $workExample):?>
            <div class="modal fade" id="works<?php echo e($workExample->id); ?>Modal" tabindex="-1"

                 role="dialog"
                 aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document" style="">
                    <div class="modal-content modal-mobile-resume" data-dismiss="modal"
                         aria-label="Close">
                        <div class="modal-body" style="padding: 0;">
                            <div class="row">
                                <div class="col-md-9" style="padding: 0;">
                                    <?
                                    $photoSrc = $workExample->mainImage ;
                                    if ($photoSrc[0] !== '/' && $photoSrc[0] !== 'h') {
                                        $photoSrc = '/' . $photoSrc;
                                    }
                                    ?>
                                    <img src="<?php echo e($photoSrc); ?>" alt=""
                                         width="100%" height="auto">
                                    <?
                                    // more images
                                    $moreImagesArr = explode(',', $workExample->images);
                                    foreach($moreImagesArr as $image){
                                    if(!empty(trim($image))){
                                    ?>
                                    <?php if(strpos($image, 'embed') !== false): ?>
                                        <iframe height="400" width="100%" src="<?php echo e($image); ?>?bgcolor=%23191919" allowfullscreen autoplay style="margin: 0px auto; display: block;"></iframe>
                                    <?php else: ?>
                                        <img src="<?php echo e($image); ?>" alt="" width="100%" height="auto">
                                    <?php endif; ?>

                                    <?}
                                    }?>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group" style="padding-top: 25px;">
                                        <label class="panelFormLabel"> Description
                                            <hr>
                                        </label><br/>
                                        <div class="panelFormLabel">
                                            <?php echo e($workExample->projectDesc); ?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="panelFormLabel"> Link
                                            <hr>
                                        </label><br/>
                                        <?php if(!empty($workExample->link)): ?>
                                            <?php if(!strpos($workExample->link, 'www.behance.net')): ?>
                                                
                                                <a href="<?php echo e($workExample->link); ?>" onclick="javascript:window.location='<?php echo e($workExample->link); ?>'">
                                                    Project Link
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <? endforeach; ?>
        <?php endif; ?>
        <div class="">
            
            <div id="portfolioCarousel<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" class="carousel slide d-md-block" data-ride="carousel"
                 data-interval="false">
                <div class="carousel-inner" style="background: #fdfdfd;">
                    <?php if(!empty($workExamples)): ?>
                        <? $i=1;?>
                        <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="carousel-item <?php if($i===1): ?> active <?php endif; ?>">
                                <div class="row">
                                    <?php $__currentLoopData = $slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workExample): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-6">
                                            <div class="workCard" style="margin-left: 0">
                                                <div class="workImg">
                                                    <a href="javascript:void(0)"
                                                       <?php if(!isset($portfolioModal)): ?>
                                                       data-toggle="modal" style="outline: none;"
                                                       data-target="#works<?php echo e($workExample->id); ?>Modal"
                                                            <?php endif; ?>
                                                    >
                                                        <?
                                                        $photoSrc = $workExample->mainImage ;
                                                        if ($photoSrc[0] !== '/' && $photoSrc[0] !== 'h') {
                                                            $photoSrc = '/' . $photoSrc;
                                                        }
                                                        ?>
                                                        <img src="<?php echo e($photoSrc); ?>" alt="work img"
                                                             width="260" >
                                                    </a>
                                                </div>
                                                <div class="workTitle">
                                                    <div class="row">
                                                        <div class="col-md-10 col-9">
                                                            <?php echo e($workExample->projectName); ?>

                                                        </div>
                                                        <a class="col-md-1 col-1" href="javascript:void(0)"
                                                           data-toggle="modal"
                                                           data-target="#works<?php echo e($workExample->id); ?>Modal"
                                                           style="outline: none; margin-left: 16px;">
                                                            <img src="/images/newResume/link.png"
                                                                 alt="view work">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <? $i++ ;?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
            

            
            <div class="row carouselControls" style="width: 100%;">
                <div class=" col-12 text-center NoDecor">
                    <a href="javascript:void(0)" id="prevSlide<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>"  data-target="#portfolioCarousel<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" data-slide-to="<?php echo e($numberOfSlides); ?>" role="button" data-slide="prev" class="cardLabel_interviews noScroll prevSlide"
                       style="color:#697786;">
                        <img src="/images/left_arrow.png"
                             alt="prev" width="15px">
                    </a>

                    <span class="jobTitle" style="padding: 0 5px 0 5px"> <span id="slideNumber<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>">1</span>/<span id="maxNumSlide<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>"><?php echo e($numberOfSlides); ?></span></span>

                    <a href="javascript:void(0)" id="nextSlide<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" data-target="#portfolioCarousel<?php echo e($freelancer->id); ?><?php echo e($value['id']); ?>" data-slide-to="<?php echo e($numberOfSlides); ?>" role="button" data-slide="next" class="cardLabel_interviews noScroll nextSlide"
                       style="color:#697786;">
                        <img src="/images/right_arrow.png"
                             alt="next" width="15px">
                    </a>
                </div>
            </div>
            
            </div>

        </div>

    <?php endif; ?>
</div>

