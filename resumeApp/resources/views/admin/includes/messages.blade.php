<!-- Success Messages  -->
@if(session()->has('successMessage'))
    <div class="alert alert-success" style="margin-top: 30px;">
        {{ session()->get('successMessage') }}
    </div>
@endif

@if (session()->has('errorMessage'))
    <div class="alert alert-danger" style="margin-top: 30px;">
        {{ session()->get('errorMessage') }}
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
    <source src="/resumeApp/resources/views/customTheme/sounds/slow-spring-board.mp3" type="audio/ogg">
    Your browser does not support the audio element.
</audio>