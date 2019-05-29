<template>
    <div>
        <nav class="navbar navbar-light fixed-top dashboard_navbar">
            <div class="backBtn">
                <a href="#">
                    <img src="/images/client/arrow_back.png" alt="back-icon">
                </a>
                JASON MORGENSTERN APPLICATION
            </div>
        </nav>
        <!--navbar-->
        <div class="d-flex justify-content-center">
            <div class="main-grid">
                <div class="header-text">
                    <img src="/images/admin/main_40px" alt=""  class="icon-margin small-image">
                    PROFILE OF THE APPLICANT (BUSINESS SUPPORT)
                </div>
                <!--title-->
                <hr />
                <div class="action-buttons-bar mt-5">
                    <div class="disapprove-btn no-decoration">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#disapprove-agent">
                            DISAPPROVE APPLICANT
                        </a>
                    </div>
                    <div class="approve-btn no-decoration">
                        <a href="javascript:void(0)">
                            APPROVE APPLICANT
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ApplicantProfile"
    }
</script>

<style scoped>

</style>