{{-- audio introduction section --}}
<div id="audio">
    <div class="row">
        <div class="col-md-5 offset-md-1 audioHeading">
            <img src="/resumeApp/public/images/newResume/audio.png" alt="audio">
            <span class="quoteText">
                Audio Introduction
            </span>
        </div>
        <?
        $valid = true;
        $notValidText = 'NOT-VALID-LINK';
        if ($user->audio == $notValidText) {
            $valid = false;
        }
        $audioSrc = "";
        if(!empty(trim($user->audioFile))){
            $audioSrc = $user->audioFile;
        }else{
            if($valid){
                $audioSrc = "https://drive.google.com/uc?export=download&id=".$user->audio."&key=AIzaSyC0bK_7ASw3QylYDzs_Pqo_TeoI7jfFj8M";
            }else{
                $audioSrc = "" ;
            }
        }
        ?>
        <div class="col-md-5 text-center">
            <audio id="audioIntro" controls>
                <source src="{{$audioSrc}}" type="audio/ogg">
                Your browser does not support the audio element.
            </audio>
        </div>
    </div>
</div>