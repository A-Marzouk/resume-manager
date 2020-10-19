<!-- Modals -->
{{-- login modal --}}
<div class="modal fade" style="background-color:rgba(255, 255, 255, 0.95);" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="row">
        <div class="col-md-12 text-center" style="padding-top: 20px;">
            <img src="/images/newResume/123wf_logo.png" alt="logo" width="250">
        </div>
    </div>
    <div class="modal-dialog" role="document" style="max-width: 400px;">
        <div class="modal-content">
            <div class="modal-body">
                @include('auth.login_tabs')
            </div>
        </div>
    </div>


</div>
