<template>
    <div class="d-flex align-items-center flex-column">
        <nav class="navbar navbar-light fixed-top dashboard_navbar">
            <div class="backBtn">
                <a href="/admin-front/agents">
                    <img src="/images/client/arrow_back.png" alt="back-icon">
                </a>
                JASON MORGENSTERN PROFILE
            </div>
        </nav>
        <!--navbar-->

        <div class="account-info-edit dashboard-box mt-2">
            <div class="account-info-edit-heading dashboard-box-heading mr-0 ml-0">
                <div class="left">
                    <img src="/images/admin/applicant-profile/main_40px.svg" alt=""  class="icon-margin small-image">
                    <span>
                        PERSONAL INFORMATION
                    </span>
                </div>
                <div class="blue-text no-decoration right">
                    <a href="#">EDIT</a>
                </div>
            </div>
            <div class="account-info-content-wrapper pb-2">
                <div class="account-info-content ">
                    <div class="acc-info-content-heading">
                        <div class="acc-info-item">
                            <img src="/images/client/dummy.png" alt="name icon" style="width:58px; height:56px;">
                            <span>
                                Edward Norton
                            </span>
                            <img src="/images/admin/male.png" alt="" class="ml-2">
                        </div>
                        <div class="acc-info-timezone">
                            GMT - 8
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/client/my_account/phone_number.png" alt="phone icon">
                        <div>
                            00442037000685
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/client/my_account/email.png" alt="email icon">
                        <div>
                            email@gmail.com
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/admin/applicant-profile/place_24px.svg" alt="email icon">
                        <div>
                            Dublin, Ireland
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/admin/applicant-profile/paypal.svg" alt="email icon">
                        <div>
                            PayPal account: 2018150859
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="account-info-edit dashboard-box mt-2">
            <div class="account-info-edit-heading dashboard-box-heading mr-0 ml-0">
                <div class="left">
                    <img src="/images/admin/applicant-profile/prof_info_40px.svg" alt=""  class="icon-margin small-image">
                    <span>
                        PROFESSIONAL INFORMATION
                    </span>
                </div>
                <div class="blue-text no-decoration right">
                    <a href="#">EDIT</a>
                </div>

            </div>
            <div class="account-info-content-wrapper  pb-2">
                <div class="account-info-content ">
                    <div class="acc-info-content-item">
                        <img src="/images/admin/applicant-profile/job_title.svg" alt="phone icon">
                        <div>
                            <b>Primary job title:</b> Telemarketing
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/admin/applicant-profile/experience.svg" alt="phone icon">
                        <div>
                            <b>Sector experience:</b> Real estate, Investement, Insurance
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/admin/applicant-profile/software.svg" alt="phone icon">
                        <div>
                            <b>Technologies, software:</b> Microsoft Excel
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/admin/applicant-profile/hours.svg" alt="phone icon">
                        <div>
                            <b>No. hours per week:</b> 30-40 hours
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/admin/applicant-profile/voice.svg" alt="phone icon">
                        <div>
                            <b>Voice character:</b> Friendly
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/admin/applicant-profile/languages.svg" alt="phone icon">
                        <div>
                            <b>Languages</b> English
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="account-info-edit dashboard-box mt-2">
            <div class="account-info-edit-heading dashboard-box-heading mr-0 ml-0">
                <div class="left">
                    <img src="/images/admin/applicant-profile/recording_resume_40px.svg" alt=""  class="icon-margin small-image">
                    <span>
                        RECORDING AND RESUME
                    </span>
                </div>
                <div class="blue-text no-decoration right">
                    <a href="#">EDIT</a>
                </div>
            </div>
            <div class="account-info-content-wrapper  pb-2">
                <div class="account-info-content pt-0 ">
                    <div class="acc-info-content-item">
                        <div>
                            <b>Recording of the applicant’s voice</b>
                        </div>
                    </div>
                    <div class="recorder-bar justify-content-between">
                        <div class="d-flex align-items-center ml-2">
                            <img src="/images/admin/applicant-profile/pause.svg" alt="" style="margin-top: -3px; margin-right: 8px;" >
                            <div style="font-size: 12px;">
                                Title_of_the_record...
                            </div>
                        </div>
                        <div class="d-flex align-items-center mr-2">
                            <div class="time mr-4">
                                25:15
                            </div>
                            <img src="/images/admin/applicant-profile/download.svg" style="margin-top: -3px; margin-right: 8px;" >
                        </div>
                    </div>
                </div>
            </div>

            <div class="account-info-content-wrapper pt-0 pb-2">
                <div class="account-info-content pt-0 ">
                    <div class="acc-info-content-item">
                        <div>
                            <b>Applicant’s resume</b>
                        </div>
                    </div>
                    <div class="acc-info-content-item d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <img src="/images/admin/applicant-profile/resume.svg" alt="phone icon" style="    margin-top: -3px; margin-right: 8px;" >
                            <div style="font-size: 12px;">
                                Title_of_the_resumeffgjkj...df.pdf
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="open-resume-text mr-4">
                                OPEN RESUME
                            </div>
                            <img src="/images/admin/applicant-profile/download.svg" style="    margin-top: -3px; margin-right: 8px;" >
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        data(){
            return{
                selection: 'disapprove',
                disapproveStatus: 'process',
            }
        },
        methods:{
            disapproveApplicant(){
                this.selection = 'disapprove';
            },

            disapproveAndBlockApplicant(){
                this.selection = 'disapprove_and_block';
            }
        }
    }
</script>

<style scoped>

</style>