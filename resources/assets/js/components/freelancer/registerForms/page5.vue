<template>
  <div class="account-info-edit dashboard-box">
    <div class="account-info-edit-heading dashboard-box-heading">
        <div class="left">
            <img src="/images/dashboard/info.svg" alt="info icon">
            <span>
            FILL IN THE INFORMATION TO BECOME AN AGENT
        </span>
        </div>
    </div>

    <div class="account-edit-section">
        <div class="account-edit-section-heading">
            CHOOSE A PASSWORD
        </div>
        <div class="account-edit-section-inputs">
            <div class="faq-question-input account-edit-input">
                <label class="faq-input-label">
                    Choose a password
                </label>
                <div class="faq-input" :class="{ 'error-input' : errors.password !== ''}">
                    <input v-model="password" type="text" name="name" placeholder="Enter your password">
                    <img src="/images/client/campaign_activity/close_black.png"
                          alt="delete icon"
                          @click="clearInput('password')" v-if="password.length > 0"
                    >
                </div>
                <div class="error" v-if="showErrors && errors.password">
                    {{errors.password}}
                </div>
            </div>
            <div class="faq-question-input account-edit-input">
                <label class="faq-input-label">
                    Repeat your password
                </label>
                <div class="faq-input"  :class="{ 'error-input' : errors.passwordConf !== ''}">
                    <input v-model="passwordConf" type="text" name="surname" placeholder="Repeat your password">
                    <img src="/images/client/campaign_activity/close_black.png" @click="clearInput('passwordConf')" alt="delete icon" v-if="passwordConf.length > 0">
                </div>
                <div class="error" v-if="showErrors && passwordConf">
                    {{errors.passwordConf}}
                </div>
            </div>
        </div>
    </div>
    <div class="account-edit-section-edit-btn no-decoration" :class="{'disabled-btn' : !canSubmit}" id="submitBtnWrapper">
        <a href="javascript:;" v-on:click="nextStep">
            CONTINUE
        </a>
    </div>
  </div>
</template>
<script>
export default {
    props: ['changeStep', 'getData'],
  data () {
    return{
        password: '',
        passwordConf: '',
        canSubmit: false,
        errors: {
            password: '',
            passwordConf: ''
        },
        showErrors: false
    }
  },
  methods: {
      nextStep (e) {
        e.preventDefault()
        if (this.canSubmit) {
            this.getData({ password: this.password, password2: this.passwordConf})
            this.changeStep(5)
            this.$router.push('/freelancer/register/page5')
        } else {
            // Send errors
        }

      }
  },
    mounted () {
        this.changeStep(5)
    }
}
</script>

