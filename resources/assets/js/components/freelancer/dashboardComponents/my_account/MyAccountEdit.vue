<template>
    <div class="d-flex justify-content-center">
        <div class="account-info-edit-wrapper">
            <nav class="navbar navbar-light fixed-top dashboard_navbar">
                <div class="backBtn">
                    <a href="/freelancer/dashboard/my-account">
                        <img src="/images/client/arrow_back.png" alt="back-icon">
                    </a>
                    YOUR PERSONAL INFORMATION
                </div>
            </nav>

            <div class="account-info-edit dashboard-box">
                <div class="account-info-edit-heading dashboard-box-heading">
                    <div class="left">
                        <img src="/images/dashboard/info.svg" alt="info icon">
                        <span>
                        EDIT YOUR PERSONAL INFORMATION
                    </span>
                    </div>
                </div>

                <div class="account-edit-section">
                    <div class="account-edit-section-heading">
                        PERSONAL INFORMATION
                    </div>
                    <div class="account-edit-section-inputs">
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your name
                            </label>
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="Jose" >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your surname
                            </label>
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="Quintero" >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Choose your gender
                            </label>
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="Enter your ..." >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your phone number
                            </label>
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="Enter your ..." >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter yout e-mail
                            </label>
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="123456@gmail.com" >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Select your time zone
                            </label>
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="Enter your ..." >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                            </div>
                        </div>
                    </div>
                    <div class="faq-question-input account-edit-input">
                        <label class="faq-input-label">
                            Enter your city name
                        </label>
                        <div class="faq-input">
                            <input type="text" name="faq" placeholder="London" >
                            <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                        </div>
                    </div>
                    <div class="faq-question-input account-edit-input">
                        <label class="faq-input-label">
                            Enter your PayPal acc number
                        </label>
                        <div class="faq-input">
                            <input type="text" name="faq" placeholder="9128412945" >
                            <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                        </div>
                    </div>
                </div>
                <div class="account-edit-section sub-section">
                    <div class="account-edit-section-heading">
                        PASSWORD
                    </div>
                    <div class="account-edit-section-inputs">
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Write a new password
                            </label>
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="Enter your ..." >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Repeat your new password
                            </label>
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="Enter your ..." >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="account-edit-section-edit-btn no-decoration">
                    <a href="#">
                        SAVE EDITS
                    </a>
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