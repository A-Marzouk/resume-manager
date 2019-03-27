<!-- Success Messages  -->
@if(session()->has('successMessage'))
    <div class="row container">
        <div class="col-md-6">
            <div class="alert alert-success" style="margin-top: 30px;">
                {{ session()->get('successMessage') }}
            </div>
        </div>
    </div>

@endif
@if (session()->has('errorMessage'))
    <div class="row container">
        <div class="col-md-6">
            <div class="alert alert-danger" style="margin-top: 30px;">
                {{ session()->get('errorMessage') }}
            </div>
        </div>
    </div>
@endif

{{-- Changes saved --}}
<div class="changesSavedText d-none" id="changesSaved">
    <span class="alert alert-success">
        Changes saved
    </span>
</div>

{{-- Copied --}}
<div class="changesSavedText d-none" id="copied">
    <span class="alert alert-success">
        Copied
    </span>
</div>

{{-- chat audio message --}}
<audio id="chatAudio" class="d-none">
    <source src="/resumeApp/public/sounds/slow-spring-board.mp3" type="audio/ogg">
    Your browser does not support the audio element.
</audio>