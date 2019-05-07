<template>
    <div>
        <nav class="navbar navbar-light fixed-top client_navbar">
            <div class="backBtn" v-show="status === 'update'">
                <a href="/client/dashboard/payments">
                    <img src="/resumeApp/public/images/client/arrow_back.png" alt="back-icon">
                </a>
                SUBSCRIPTION PLAN UPDATE
            </div>
            <div class="backBtn" v-show="status === 'finish'">
                <a href="javascript:void(0)" @click="status='update'">
                    <img src="/resumeApp/public/images/client/arrow_back.png" alt="back-icon">
                </a>
                SUBSCRIPTION PLAN UPDATE
            </div>
        </nav>
        <div class="update-sub-plan">
            <div class="subscriptions">
                <div class="subs-heading">
                    <div class="left">
                        <img src="/resumeApp/public/images/client/payments/agents_40px.png" alt="subs icon">
                        <span>
                        SUBSCRIPTION PLAN UPDATE
                    </span>
                    </div>
                </div>
                <div v-show="status==='update'" class="subs-list">
                    <div class="blue-text pt-4 pb-4">
                        CURRENT SUBSCRIPTION PLAN
                    </div>

                    <div class="sub-item">
                        <div class="sub-info">
                            <div class="sub-info-box">
                                <img src="/resumeApp/public/images/client/payments/time.png" alt="time icon">
                                <div class="right">
                                    <div class="sub-info-box-heading">
                                        60 HOURS
                                    </div>
                                    <div class="sub-info-box-note">
                                        per week
                                    </div>
                                </div>
                            </div>
                            <div class="sub-info-box">
                                <img src="/resumeApp/public/images/client/payments/amount.png" alt="time icon">
                                <div class="right">
                                    <div class="sub-info-box-heading">
                                        $ 600
                                    </div>
                                    <div class="sub-info-box-note">
                                        weekly amount
                                    </div>
                                </div>
                            </div>
                            <div class="sub-info-box">
                                <img src="/resumeApp/public/images/client/payments/week.png" alt="time icon">
                                <div class="right">
                                    <div class="sub-info-box-heading">
                                        14 WEEKS
                                    </div>
                                    <div class="sub-info-box-note">
                                        10 used / 4 left
                                    </div>
                                </div>
                            </div>
                            <div class="sub-info-box">
                                <img src="/resumeApp/public/images/client/payments/period.png" alt="time icon">
                                <div class="right">
                                    <div class="sub-info-box-heading">
                                        4.04.19 - 4.01.20
                                    </div>
                                    <div class="sub-info-box-note">
                                        start date - finish date
                                    </div>
                                </div>
                            </div>
                            <div class="sub-info-box">
                                <img src="/resumeApp/public/images/client/payments/number_agents.png" alt="time icon">
                                <div class="right">
                                    <div class="sub-info-box-heading">
                                        4 AGENTS
                                    </div>
                                    <div class="sub-info-box-note">
                                        working on campaign
                                    </div>
                                </div>
                            </div>
                            <div class="sub-info-box">
                                <img src="/resumeApp/public/images/client/payments/rate.png" alt="time icon">
                                <div class="right">
                                    <div class="sub-info-box-heading">
                                        $ 10
                                    </div>
                                    <div class="sub-info-box-note">
                                        agent's hourly rate
                                    </div>
                                </div>
                            </div>
                            <div class="sub-info-box">
                                <img src="/resumeApp/public/images/client/payments/manager.png" alt="time icon">
                                <div class="right">
                                    <div class="sub-info-box-heading">
                                        CONOR MARJORAM
                                    </div>
                                    <div class="sub-info-box-note">
                                        your manager
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="blue-text pt-4 pb-4">
                        NEW SUBSCRIPTION PLAN
                    </div>

                    <div class="new-sub-plan">
                        <div class="weeks-number">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="/resumeApp/public/images/client/payments/week.png" alt="week icon" class="mr-3">
                                <div class="weeks-number-heading">
                                    Total number of weeks
                                </div>
                            </div>
                            <div class="week-input">
                                <div class="account-edit-section-inputs d-flex align-items-center">
                                    <div class="faq-question-input sub-edit-input  mt-3 d-flex flex-lg-row flex-column align-items-center">
                                        <div class="faq-input">
                                            <select name="weeks" id="weeks">
                                                <option value="2">2 weeks</option>
                                                <option value="4">4 weeks</option>
                                                <option value="6">6 weeks</option>
                                            </select>
                                        </div>
                                        <div class="mt-3" style="margin-left:99px;">
                                            <input type="checkbox" name="no-end-date"/>
                                            <span class="weeks-number-heading ml-1"> no end date </span>
                                        </div>
                                    </div>
                                </div>
                                <div>

                                </div>
                            </div>
                            <div class="weeks-number-note">
                                Campaign period: 4.04.19   —   4.01.20
                            </div>
                        </div>
                    </div>

                    <div class="new-sub-plan pt-5">
                        <div class="weeks-number">
                            <div class="sub-agent-numbering pb-3">
                                Agent № 1
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="/resumeApp/public/images/client/payments/time.png" alt="week icon" class="mr-3">
                                <div class="weeks-number-heading">
                                   Number of working hours per week
                                </div>
                            </div>
                            <div class="week-input">
                                <div class="account-edit-section-inputs d-flex align-items-center">
                                    <div class="faq-question-input sub-edit-input  mt-3 d-flex flex-row align-items-center">
                                        <div class="faq-input">
                                            <select name="weeks" id="hours">
                                                <option value="2">15 hours</option>
                                                <option value="4">20 hours</option>
                                                <option value="6">25 hours</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="new-sub-plan pt-5">
                        <div class="weeks-number">
                            <div class="sub-agent-numbering pb-3">
                                Agent № 2
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="/resumeApp/public/images/client/payments/time.png" alt="week icon" class="mr-3">
                                <div class="weeks-number-heading">
                                   Number of working hours per week
                                </div>
                            </div>
                            <div class="week-input">
                                <div class="account-edit-section-inputs d-flex align-items-center">
                                    <div class="faq-question-input sub-edit-input  mt-3 d-flex flex-row align-items-center">
                                        <div class="faq-input">
                                            <select name="weeks" id="hours2">
                                                <option value="2">15 hours</option>
                                                <option value="4">20 hours</option>
                                                <option value="6">25 hours</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="button-base white-button-a pt-4 w-100 d-flex justify-content-center">
                        <a href="#" class="border-0 m-0" style="width:auto">
                            ADD ANOTHER AGENT
                        </a>
                    </div>

                    <div class="new-sub-plan pt-5">
                        <div class="d-flex justify-content-start align-items-center">
                            <img src="/resumeApp/public/images/client/payments/manager.png" alt="week icon" class="mr-3">
                            <div class="weeks-number-heading">
                               Manager of your campaign
                            </div>
                        </div>
                    </div>
                    <div class="blue-text" style="margin-left: 2.7rem;">
                        Conor Marjoram
                    </div>
                    <div class="button-base white-button-a pt-4 w-100 d-flex justify-content-center">
                        <a href="javascript:void(0)" style="width:158px; height:36px;" class="m-0" data-toggle="modal" data-target="#remove-manager-modal">
                            REMOVE MANAGER
                        </a>
                    </div>

                    <div class="sub-action pt-5">
                        <a href="#"  @click="status='finish'">
                            CONTINUE
                        </a>
                    </div>

                </div>
                <div v-show="status==='finish'">
                    <div class="d-flex pt-3">
                        <div class="mr-2">
                            <img src="/resumeApp/public/images/client/payments/amount.png" class="mr-2" alt="amount icon">
                        </div>
                        <div>
                            <div class="blue-text">
                                WEEKLY RATE CALCULATIONS:
                            </div>
                            <div class="pt-2">
                                40 agent hours <span class="sub-agent-numbering ml-1"> $ 400</span>
                            </div>
                            <div class="blue-text pt-3">
                                TOTAL WEEKLY AMOUNT:
                            </div>
                            <div class="sub-agent-numbering pt-2">
                                $ 400
                            </div>
                        </div>
                    </div>
                    <div class="w-100 d-flex justify-content-end">
                        <div class="lineDiv"></div>
                        <div class="sub-action pt-5">
                            <a href="#">
                                FINISH PAYMENT
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="remove-manager-modal" tabindex="-1" role="dialog" aria-labelledby="remove-manager-modal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content border-0" style="margin-top: 30%;">
                    <div class="modal-body campaign-team-modal">
                        <div class="modal-question">
                            Are you sure you want to remove the manager ?
                        </div>

                        <div class="modal-btn-wrapper">
                            <div class="button-base white-button-a">
                                <a href="javascript:void(0)" data-dismiss="modal">CANCEL</a>
                            </div>
                            <div class="button-base blue-button-a">
                                <a href="javascript:void(0)" data-dismiss="modal">REMOVE THE MANAGER</a>
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
                status : 'update' // or finish
            }
        }
    }
</script>

<style scoped>

</style>