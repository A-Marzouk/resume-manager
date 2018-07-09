<div role="tabpanel" class="panel tab-pane fade" id="multimedia">
    <div class="panelHeading">
        <ul>
            <li>
                Multimedia (Audio)
            </li>
        </ul>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label for="audio_intro" class="panelFormLabel">Audio introduction
                <?
                $valid = true;
                $notValidText = 'NOT-VALID-LINK';
                if ($audio == $notValidText) {
                    $valid = false;
                }
                ?>
                <? if($valid):?>
                    <span id="tickMarkaudio" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span>
                <? endif;?>
            </label>

            <br/><label class="panelFormLabel">Link from Google drive :</label>
            <input type="text" class="form-control panelFormInput" id="audio_intro" name="audio"
                   value="https://drive.google.com/file/d/{{$audio}}/view"><br/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label class="panelFormLabel">Or Upload an audio file :</label>
        </div>
    </div>
    <div class="row" style="opacity: 0; height: 3px; padding: 0;">
        <div class="col-md-10">
            <div class="custom-file" style="padding-top: 5px;">
                <input type="file" id="audioFile" class="custom-file-input panelFormInput" name="audioFile">
                <label class="custom-file-label" id="audioLabel" for="">
                    <?
                        $audioSrc = "";
                        if(!empty(trim($audioFile))){
                            $audioSrc = $audioFile;
                            $audioFile = str_replace('resumeApp/uploads/',"",$audioFile);
                        }
                        else{
                          $audioFile = 'Upload Audio';
                        }
                        if($valid){
                            $audioSrc = "https://drive.google.com/uc?export=download&id=".$audio."&key=AIzaSyC0bK_7ASw3QylYDzs_Pqo_TeoI7jfFj8M";
                        }
                    ?>
                </label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <input type="text" class="form-control panelFormInput" id="audioText" value="{{$audioFile}}" disabled style="background: white;">
        </div>
        <div class="col-md-2 col-6">
            <a href="javascript:void(0)" id="browseBtn" class="btn btn-block btn-outline-primary browseBtn">Browse</a>
        </div>
        <div class="col-md-2 col-6">
            <a href="javascript:void(0)" id="deleteAudio" class="btn btn-block btn-outline-danger deleteBtn">Delete</a>
        </div>

        <div id="loadingText" class="d-none" style="color:lightseagreen; padding: 10px;">
            Processing audio...
        </div>
    </div>
    <div class="row" style="padding-top: 30px;">
        <div class="col-md-4 offset-md-4">
            <audio id="audioIntro" controls style="padding-bottom: 10px;">
                <source src="{{$audioSrc}}" type="audio/ogg" id="audioIntroForm">
                Your browser does not support the audio element.
            </audio><!--/.video-container-->
        </div>
    </div>
    <small style="padding-top: 20px;">Please paste above a link to your audio introduction of self. 2min to 3min is the ideal recording length. Kindly introduce yourself and answer these questions: Why did you become a  <? if($profession == 'Developer'):?>developer<?else:?>designer<?endif;?>?, Were you able to acquire a formal  <? if($profession == 'Developer'):?>development<?else:?>design<?endif;?> education? What do you love most about your work?, What tools do you use for  <? if($profession == 'Developer'):?>development<?else:?>design<?endif;?>?, What inspires you to do your work?</small>
    <hr>

    {{-- video --}}
    <div class="row">
        <div class="panelHeading">
            <ul>
                <li>
                    Multimedia (Video)
                </li>
            </ul>
        </div>
    </div>
    <?php
    $src         = $video;
    $youtubeSrc  = 'https://www.youtube.com/embed/';
    $videoID     = substr($src, strpos($src, "=") + 1);
    $youtubeSrc .= substr($videoID, 0, 11);

    ?>
    <div class="row">
        <div class="col-md-12">
            <label class="panelFormLabel">Link from Youtube :</label><span id="tickMarkvideo" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span>
            <input type="text" class="form-control panelFormInput" id="video" name="video"
                   value="{{$video}}"><br/>
            <div class="text-center col-md-6">
                <iframe src="{{$youtubeSrc}}" frameborder="0" allow="encrypted-media" allowfullscreen id="videoFrame" width="100%" height="220px"></iframe>
            </div>
        </div>
    </div><br/>
    <div class="row">
        <div class="col-md-12">
            <label class="panelFormLabel">Or Upload a video file :</label>
        </div>
    </div>
    <div style="opacity: 0; height: 1px;" class="row">
        <div class="col-md-10">
            <div class="custom-file" style="padding-top: 5px;">
                <input type="file" id="video_file" class="custom-file-input panelFormInput" name="video_file">
                <label class="custom-file-label" id="videoLabel" for="">
                    <?
                    $videoSrc = "";
                    ?>
                    <? if(!empty(trim($video_file))):?>
                    <?
                    $videoSrc = $video_file;
                    $video_file = str_replace('resumeApp/uploads/videos/',"",$video_file);
                    ?>
                    {{$video_file}}
                <?else:?>
                        <? $video_file = 'Upload Video'; ?>
                <? endif;?>
                </label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <input type="text" class="form-control panelFormInput" id="videoText" value="{{$video_file}}" disabled style="background: white;">
        </div>
        <div class="col-md-2 col-6">
            <a href="javascript:void(0)" id="browseBtnVideo" class="btn btn-block btn-outline-primary browseBtn">Browse</a>
        </div>
        <div class="col-md-2 col-6">
            <a href="javascript:void(0)" id="deleteVideo" class="btn btn-block btn-outline-danger deleteBtn">Delete</a>
        </div>
    </div><br/>


    <div class="row">
        <div class="col-md-6">
            <div class="text-center">
                <video width="100%" id="videoFileFrame" height="auto" controls>
                    <source src="{{$videoSrc}}">
                </video>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="buttonMain col-md-3 offset-md-9">
            <a class="btn-block hireBtn nextBtn"  href="#career">Next</a>
        </div>
    </div>
</div>
