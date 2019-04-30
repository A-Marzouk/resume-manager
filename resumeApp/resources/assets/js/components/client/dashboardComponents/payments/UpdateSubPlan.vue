<template>
    <div>
        <nav class="navbar navbar-light fixed-top client_navbar">
            <div class="backBtn">
                <a href="/client">
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
                <div class="subs-list">
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
                                    <div class="faq-question-input sub-edit-input  mt-3">
                                        <div class="faq-input">
                                            <select name="weeks" id="weeks">
                                                <option value="2">2 weeks</option>
                                                <option value="4">4 weeks</option>
                                                <option value="6">6 weeks</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sub-action">
                        <a href="#">
                            CONTINUE
                        </a>
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

            }
        }
    }
</script>

<style scoped>

</style>