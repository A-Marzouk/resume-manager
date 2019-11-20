<template>
    <div class="my-account">
        <div class="account-info dashboard-box">
            <div class="account-info-heading dashboard-box-heading">
                <div class="left">
                    <img src="/images/client/my_account/info_40px.png" alt="info icon">
                    <span>
                        YOUR ACCOUNT INFORMATION
                    </span>
                </div>
                <div class="right no-decoration">
                    <a href="/freelancer/account/edit" class="normal-link">
                        EDIT
                    </a>
                </div>
            </div>

            <div class="account-info-content-wrapper">
                <div class="account-info-content">
                    <div class="acc-info-content-heading">
                        <div class="acc-info-item">
                            <img src="/images/client/my_account/name.png" alt="name icon">
                            <span>
                                 {{user.user_data.first_name}} {{user.user_data.last_name}}
                            </span>
                        </div>
                        <div class="acc-info-timezone">
                            GMT -8
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/client/my_account/agency.png" alt="agency icon">
                        <div>
                            {{user.user_data.city}}
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/client/my_account/phone_number.png" alt="phone icon">
                        <div>
                            {{user.user_data.phone}}
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/client/my_account/email.png" alt="email icon">
                        <div style="line-height: inherit;">
                            {{user.email}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="professional-info dashboard-box">
            <div class="account-info-heading dashboard-box-heading">
                <div class="left">
                    <!-- Replace here with the professional info icon -->
                    <img src="/images/client/my_account/contract_40px.png" alt="info icon">
                    <span>
                        PROFESSIONAL INFORMATION
                    </span>
                </div>

                <div class="right no-decoration d-flex">
                    <a href="/freelancer/developer-card" class="normal-link mr-3" v-show="user.user_data.profession_id == 2">
                        DEVELOPER CARD
                    </a>
                    <a href="/freelancer/professional/edit" class="normal-link">
                        EDIT
                    </a>
                </div>
            </div>
            <div class="account-info-content-wrapper">
                <div class="account-info-content">
                    <div class="primary-job-title info">
                        <img class="" src="/images/dashboard/job_title.svg" alt="job icon">
                        <div class="info-content">
                            <b>Primary job title: </b>{{user.user_data.job_title}}

                        </div>
                    </div>
                    <div class="sector-experience info">
                        <img class="" src="/images/dashboard/experience.svg" alt="experience icon">
                        <div class="info-content">
                            <b>Sector experience: </b>{{user.agent.experience}}
                        </div>
                    </div>
                    <div class="software info">
                        <img class="" src="/images/dashboard/software.svg" alt="software icon">
                        <div class="info-content">
                            <b>Technologies, software: </b> {{user.agent.technologies}}
                        </div>
                    </div>
                    <div class="hours info">
                        <img class="" src="/images/dashboard/hours.svg" alt="hours icon">
                        <div class="info-content">
                            <b>N. hours per week: </b>{{parseInt(user.agent.available_hours_per_week)}} hours
                        </div>
                    </div>
                    <div class="voice-character info">
                        <img class="" src="/images/dashboard/voice.svg" alt="voice icon">
                        <div class="info-content">
                            <b>Voice character: </b>{{user.agent.voice_character}}
                        </div>
                    </div>
                    <div class="languages info">
                        <img class="" src="/images/dashboard/languages.svg" alt="languages icon">
                        <div class="info-content">
                            <b>Languages: </b>
                            <span v-for="(language,index) in user.languages" :key="language.id">
                                {{language.label}}<span v-if="index < user.languages.length - 1">, </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contracts dashboard-box">
            <div class="account-info-heading dashboard-box-heading">
                <div class="left">
                    <img src="/images/client/my_account/contract_40px.png" alt="info icon">
                    <span>
                        CONTRACTS
                    </span>
                </div>
            </div>
            <div class="account-info-content-wrapper">
                <div class="account-info-content p-0">
                    <div class="agreement">
                       <div class="right">
                           <img src="/images/client/my_account/privacy.png" alt="privacy icon">
                           <div>
                               Privacy agreement
                           </div>
                       </div>
                        <div class="left no-decoration">
                            <a href="/agent/account/privacy-agreement">
                                <span v-if="user.agreed_with_privacy_agreement_at === null">COMPLETE AGREEMENT</span>
                                <span v-else >SHOW AGREEMENT</span>
                            </a>
                        </div>
                    </div>
                    <div class="agreement">
                        <div class="right">
                            <img src="/images/client/my_account/service.png" alt="service icon">
                            <div>
                                Service agreement
                            </div>
                        </div>
                        <div class="left no-decoration">
                            <a href="/agent/account/service-agreement">
                                <span v-if="user.agreed_with_service_agreement_at === null">COMPLETE AGREEMENT</span>
                                <span v-else >SHOW AGREEMENT</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="faqs dashboard-box">
            <div class="account-info-heading dashboard-box-heading">
                <div class="left">
                    <img src="/images/client/my_account/faq_40px.png" alt="info icon">
                    <span>
                        FAQ
                    </span>
                </div>
            </div>

            <div class="faqs-wrapper">
                <div class="faq-questions-list">
                    <div v-for="(faq,index) in faqs" v-bind:key="index" class="question-container">
                        <div class="faq-question">
                        <div class="faq-numbering">
                            <span>{{index+1}}</span>
                        </div>
                        <div class="faq-item">
                            <div class="faq-item-question">
                                {{faq.question}}
                            </div>
                            <div class="faq-item-answer" v-show="faq.opened">
                                {{faq.answer}}
                            </div>
                        </div>
                        <div class="faq-edit">
                            <img src="/images/client/my_account/dropdown.png" :id="'toggleIcon_'+faq.id" alt="toggle icon" @click="toggleAnswer(faq.id)">
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
                faqs:[
                    {
                        id:1,
                        opened:false,
                        question:'Lorem 1111 ipsum dolor sit amet, consectetur adipiscing elit,' +
                            ' sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ?',
                        answer:'Lorem 1111 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
                            ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
                            ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' +
                            ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                    },
                    {
                        id:2,
                        opened:false,
                        question:'Lorem 2222 ipsum dolor sit amet, consectetur adipiscing elit,' +
                            ' sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ?',
                        answer:'Lorem 2222 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
                            ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
                            ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' +
                            ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                    },
                    {
                        id:3,
                        opened:false,
                        question:'Lorem 3333 ipsum dolor sit amet, consectetur adipiscing elit,' +
                            ' sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ?',
                        answer:'Lorem 3333 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
                            ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
                            ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' +
                            ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                    },
                    {
                        id:4,
                        opened:false,
                        question:'Lorem 4444 ipsum dolor sit amet, consectetur adipiscing elit,' +
                            ' sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ?',
                        answer:'Lorem 4444 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
                            ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
                            ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' +
                            ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                    },

                ],


                user: {
                    agent:{},
                    user_data:{},
                },
            }
        },
        methods:{
            toggleAnswer(faq_id){
                let faqs = this.faqs;
                $.each(faqs, function(i){
                    if(faqs[i].id === faq_id) {
                        faqs[i].opened = !faqs[i].opened ;
                        if(faqs[i].opened){
                            $('#toggleIcon_'+faq_id).css('transform','rotate(180deg)');
                        }else{
                            $('#toggleIcon_'+faq_id).css('transform','rotate(0deg)');
                        }
                    }

                });
            },
            getCurrentAgent() {
                axios.get('/agent/current').then((response) => {
                    this.user = response.data;
                });
            },

        },
        mounted(){
            this.getCurrentAgent();
        }
    }
</script>

<style scoped>

</style>
