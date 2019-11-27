<template>
    <div class="d-flex justify-content-center">
        <div class="account-info-edit-wrapper">
            <nav class="navbar navbar-light fixed-top dashboard_navbar">
                <div class="backBtn">
                    <a href="/freelancer/dashboard/my-account">
                        <img src="/images/client/arrow_back.png" alt="back-icon">
                    </a>
                    PROFESSIONAL INFORMATION
                </div>
            </nav>

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
                            <div class="faq-input" :class="{'error-input': errors.job_title}">
                                <input type="text" name="faq" placeholder="Telemarketing" >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
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
                                <input type="text" name="faq" placeholder="Friendly" >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter sector experience
                            </label>
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="Real state, Insurance, Investment" >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Specify available hours per week
                            </label>
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="25" >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter technologies/frameworks/software
                            </label>
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="Microsoft Word, Excel" >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Choose languages you speak
                            </label>
                            <div class="img-container">
                                <div class="faq-input">
                                    <div class="lang">
                                        <img src="/images/icons/english_icon_pressed.svg">
                                        <span>English</span>
                                    </div>
                                    <div class="lang">
                                        <img src="/images/client/add_agent/language/spanish_icon.png">
                                        <span>Spanish</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="account-edit-section flex-row flex-wrap justify-content-between sub-section">
                    
                  <div class="account-edit-section-edit-btn no-decoration">
                      <a href="#">
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
      data(){
          return {
              client:{
                  name: 'Ahmed Marzouk',
                  agency:  'The best agency',
                  contact: ' 0044203700685',
                  timeZone: '(GMT - 5:00) Eastern time (US & Canada), Bogota, Lima',
                  emailDept: 'email1234567890@gmail.com',
                  email: 'test@gmail.com',
              }
          }
      },
      methods:{

      }
    }
</script>

<style scoped>

</style>