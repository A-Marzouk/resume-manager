<template>
    <div class="d-flex justify-content-center">
        <div class="account-info-edit-wrapper flex-column d-flex align-items-center">
            <nav class="navbar navbar-light fixed-top dashboard_navbar">
                <div class="backBtn">
                    <a href="/freelancer/dashboard/my-account">
                        <img src="/images/client/arrow_back.png" alt="back-icon">
                    </a>
                    PROFESSIONAL INFORMATION
                </div>
            </nav>


            <div class="container" style="display: flex;justify-content: center;">
                <div class="notificationBar" id="notificationBar" style=" display:none; position:fixed;">
                    <div>
                        {{notificationMessage}}
                    </div>
                    <a href="javascript:void(0)" @click="hideNotification" class="no-decoration" style="color: white;">
                        x
                    </a>
                </div>
            </div>

            <div class="account-info-edit dashboard-box">
                <div class="account-info-edit-heading dashboard-box-heading">
                    <div class="left">
                        <img src="/images/client/my_account/info_40px.png" alt="info icon">
                        <span>
                        EDIT PROFESSIONAL INFORMATION
                    </span>
                    </div>
                </div>

                <div class="account-edit-section">
                    <div class="account-edit-section-inputs">
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter primary job title
                            </label>
                            <div class="faq-input">
                                <input type="text" v-model="agentData.job_title" name="faq" placeholder="Telemarketing">
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon" @click="clearInput('job_title')">
                            </div>
                            <div class="error" v-if="errors.job_title">
                                {{errors.job_title[0]}}
                            </div>
                            <div class="error" v-if="showErrors && errors.job_title">
                                {{errors.job_title}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Choice voice character (for sales-agents)
                            </label>
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="Friendly" v-model="agentData.voice_character" >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon" @click="clearInput('voice_character')">
                            </div>
                            <div class="error" v-if="errors.voice_character">
                                {{errors.voice_character[0]}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter sector experience
                            </label>
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="Real state, Insurance, Investment" v-model="agentData.experience" >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon" @click="clearInput('experience')">
                            </div>
                            <div class="error" v-if="errors.experience">
                                {{errors.experience[0]}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Specify available hours per week
                            </label>
                            <div class="faq-input">
                                <input type="number" min="0" max="99" step="1" name="faq" placeholder="25" v-model="agentData.available_hours_per_week" >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon" @click="clearInput('available_hours_per_week')">
                            </div>
                            <div class="error" v-if="errors.available_hours_per_week">
                                {{errors.available_hours_per_week[0]}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter technologies/frameworks/software
                            </label>
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="Microsoft Word, Excel" v-model="agentData.technologies">
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon" @click="clearInput('technologies')">
                            </div>
                            <div class="error" v-if="errors.technologies">
                                {{errors.technologies[0]}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Choose languages you speak
                            </label>
                            <div class="img-container">
                                <div class="faq-input">
                                    <div v-on:click='agentData.language = "english"' class="lang">
                                        <img :src="`/images/client/add_agent/language/${agentData.language === 'english' ? 'english_icon-selected': 'english_icon'}.png`">
                                        <span>English</span>
                                    </div>
                                    <div v-on:click='agentData.language = "spanish"' class="lang">
                                        <img :src="`/images/client/add_agent/language/${agentData.language === 'spanish' ? 'spanish_icon-selected': 'spanish_icon'}.png`">
                                        <span>Spanish</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="account-edit-section flex-row flex-wrap justify-content-between sub-section">

                    <div class="account-edit-section-edit-btn no-decoration">
                        <a href="javascript:void(0)" @click="submitForm">
                            SAVE EDITS
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {},
                agent: {},
                errors: [],
                agentData: {
                    'job_title': this.$attrs.current_user.user_data.job_title,
                    'voice_character': this.$attrs.current_user.agent.voice_character,
                    'experience': this.$attrs.current_user.agent.experience,
                    'technologies': this.$attrs.current_user.agent.technologies,
                    'available_hours_per_week': this.$attrs.current_user.agent.available_hours_per_week,
                    'language': this.$attrs.current_user.languages[0] ? this.$attrs.current_user.languages[0].name : '',
                },
                isLoading: false,
                notificationMessage:'',
            }
        },
        methods: {
            submitForm() {
                let form_data = new FormData();

                $.each(this.agentData, (field) => {
                    form_data.append(field, this.agentData[field]);
                });

                this.clearErrors();

                axios.post('/freelancer/account/professional/submit', form_data)
                    .then((response) => {
                        this.showSuccessMessage();
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    })
            },
            clearErrors() {
                $.each(this.errors, (error) => {
                    this.errors[error] = '';
                });

            },
            clearInput(field) {
                this.agentData[field] = '';
            },
            showSuccessMessage(){
                $('.notificationBar').css('background','#FFBA69') ;
                this.notificationMessage = 'Professional information has been successfully updated!' ;
                $('#notificationBar').fadeIn(600);
                setTimeout(()=>{
                    $('#notificationBar').fadeOut(1500);
                },4000);
            },
            hideNotification(){
                $('#notificationBar').css('display','none');
            },
        },
        create(){
            
        }
    }
</script>

<style scoped lang="scss">

    .notificationBar{
        margin-top: -8px;
        z-index: 2;
        width: 1164px;
    }


    @media screen and (max-width: 1270px) {
        .notificationBar{
            width: 96%;
        }
    }
    .main-box-margin{
        margin-top: 22px;
    }

</style>
