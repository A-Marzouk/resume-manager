<template>
    <div class="d-flex justify-content-center">
        <nav class="navbar navbar-light fixed-top dashboard_navbar">
            <div class="backBtn">
                <a href="#">
                    <img src="/images/client/arrow_back.png" alt="back-icon">
                </a>
                JASON MORGENSTERN APPLICATION
            </div>
        </nav>
        <!--navbar-->

        <div class="account-info-edit dashboard-box">
            <div class="account-info-edit-heading dashboard-box-heading mr-0 ml-0">
                <div class="left">
                    <img src="/images/admin/main_40px.svg" alt=""  class="icon-margin small-image">
                    <span>
                        PROFILE OF THE APPLICANT (BUSINESS SUPPORT)
                    </span>
                </div>
            </div>
            <div class="action-buttons-bar mt-5 mb-5">
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
            <div class="d-flex  justify-content-center w-100">
                <div class="stages-list-container">
                    <div class="mb-4">
                        History of stages
                    </div>
                    <div class="stages-list">
                        <div class="stage-item d-flex justify-content-between">
                            <div>
                                14.05.19
                            </div>
                            <div style="font-weight: 500;">
                                Stage:v1
                            </div>
                            <div>
                                Application received
                            </div>
                            <div style="color:#27AE60; font-weight: 500;">
                                E-mail sent
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="account-info-content-wrapper pb-2">
                <div class="account-info-content">
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

            <div class="account-info-content-wrapper pt-0 pb-2">
                <div class="account-info-content">
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

            <div class="account-info-content-wrapper pt-0 pb-2">
                <div class="account-info-content pt-0">
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
                <div class="account-info-content pt-0">
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

        <!-- modals -->
        <div class="modal fade"
             id="disapprove-agent"
             tabindex="-1"
             role="dialog"
             aria-labelledby="remove-modal"
             aria-hidden="true">
            <div class="modal-dialog"
                 role="document">
                <div class="modal-content border-0"
                     style="margin-top: 30%;">
                    <div class="modal-body campaign-team-modal">
                        <div v-show="disapproveStatus === 'process'">
                            <div class="modal-question">
                                Are you sure you want to disapprove this applicant ?
                            </div>
                            <div class="modal-answer">
                                <div class="col-12">
                                    <label class="form-check-label checkBoxContainer disapprove-text" @click="disapproveApplicant">
                                        <input class="form-check-input" type="radio" name="disapprove">
                                        <span class="checkmark make-circle"></span> disapprove
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="form-check-label checkBoxContainer disapprove-text" @click="disapproveAndBlockApplicant">
                                        <input class="form-check-input" type="radio" name="disapprove">
                                        <span class="checkmark make-circle"></span> disapprove and block
                                    </label>
                                </div>
                            </div>
                            <div class="modal-note">
                           <span v-show="selection === 'disapprove'">
                                Disapproved agent will be able to apply again
                           </span>
                                <span v-show="selection === 'disapprove_and_block'">
                                Disapproved and blocked agent will not be able to apply again
                           </span>
                            </div>
                            <div class="modal-btn-wrapper">
                                <div class="button-base white-button-a">
                                    <a href="javascript:void(0)" data-dismiss="modal">CANCEL</a>
                                </div>
                                <div class="button-base blue-button-a">
                                    <a href="javascript:void(0)" @click="disapproveStatus = 'disapproved' ">DISAPPROVE AGENT</a>
                                </div>
                            </div>
                        </div>
                        <div v-show="disapproveStatus === 'disapproved' && selection === 'disapprove'">
                            <div class="modal-question">
                                The agent was disapproved
                            </div>
                            <div class="modal-answer">
                                Agent will be able to apply again
                            </div>
                            <div class="modal-btn-wrapper d-flex justify-content-end">
                                <div class="button-base blue-button-a">
                                    <a href="javascript:void(0)" data-dismiss="modal" style="width: 83px;">OK</a>
                                </div>
                            </div>
                        </div>
                        <div v-show="disapproveStatus === 'disapproved' && selection === 'disapprove_and_block'">
                            <div class="modal-question">
                                The agent was disapproved and blocked
                            </div>
                            <div class="modal-answer">
                                Agent will not be able to apply again
                            </div>
                            <div class="modal-btn-wrapper d-flex justify-content-end">
                                <div class="button-base blue-button-a">
                                    <a href="javascript:void(0)" data-dismiss="modal" style="width: 83px;">OK</a>
                                </div>
                            </div>
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