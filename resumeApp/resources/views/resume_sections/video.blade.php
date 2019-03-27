<div id="video">
    <div class="row">
        <div class="col-md-5 offset-md-1 videoHeading">
            <img src="/resumeApp/public/images/newResume/videoIcon.png" alt="video">
            <span class="quoteText">
                Video Introduction
            </span>
        </div>
    </div>
    @if($user->video_file !== null)
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="text-center">
                    <video width="80%" id="videoResume" height="auto" controls>
                        <source src="{{$user->video_file}}">
                    </video>
                </div>
            </div>
        </div>
    @elseif($user->video !== null)
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="text-center">
                    <iframe src="{{$user->video}}" frameborder="1" allow="encrypted-media" allowfullscreen width="80%" height="auto">

                    </iframe>
                </div>
            </div>
        </div>
    @endif
</div>
