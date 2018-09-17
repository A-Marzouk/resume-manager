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