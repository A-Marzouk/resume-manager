<template>
  <div class="account-info-edit dashboard-box">
    <div class="account-info-edit-heading dashboard-box-heading">
        <div class="left">
            <img src="/images/dashboard/info.svg" alt="info icon">
            <span>
            FILL IN THE INFORMATION TO REGISTER AN AGENT (BUSSINESS SUPPORT)
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
                    <input v-model="passwords.password" type="password" name="name" placeholder="Enter your password">
                    <img src="/images/client/campaign_activity/close_black.png"
                          alt="delete icon"
                          @click="clearInput('password')" v-if="passwords.password.length > 0"
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
                    <input v-model="passwords.passwordConf" type="password" name="surname" placeholder="Repeat your password">
                    <img src="/images/client/campaign_activity/close_black.png" @click="clearInput('passwordConf')" alt="delete icon" v-if="passwords.passwordConf.length > 0">
                </div>
                <div class="error" v-if="showErrors && errors.passwordConf">
                    {{errors.passwordConf}}
                </div>
            </div>
        </div>
    </div>
    <div class="account-edit-section-edit-btn no-decoration" :class="{'disabled-btn' : !canSubmit}" id="submitBtnWrapper">
        <a class="btn-primary" href="javascript:;" v-on:click="nextStep">
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
        passwords: {
            password: '',
            passwordConf: '',
        },
        canSubmit: false,
        errors: {
            password: '',
            passwordConf: ''
        },
        showErrors: false
    }
  },
  methods: {
      noErrors () {
          let noErrorPassword = this.noErrorPassword()
          let passwordsMatch = this.password === this.passwordConf

          return (
              noErrorPassword &&
              passwordsMatch
          )
      },
      noErrorPassword () {
          let valid = true

          if (this.passwords.password.trim().length < 1) {
              valid = false
              this.errors.password = 'Please, enter a password'
          } else if (this.passwords.password.length < 6) {
              valid = false
              this.errors.password = 'The password must have at least 8 characters'
          } else this.errors.password = ''

          return valid
      },
      nextStep (e) {
        e.preventDefault()
        if (this.noErrors()) {
            this.getData({ password: this.passwords.password, password2: this.passwords.passwordConf});
            this.$emit('formReady');
            window.location.replace('/admin/register-agent/completed')
        } else {
            this.showErrors = true
        }

      },
      clearInput(name) {
          this.passwords[name] = ''
      }
  },
  watch: {
      passwords: {
          handler () {
                // check if all personalData values are filled
                let keys = Object.keys(this.passwords);
                let isAll_filled = true;
                for (const key of keys) {
                    if (this.passwords[key].trim().length < 1) {
												isAll_filled = false
												break
                    }
                }
                this.canSubmit = isAll_filled;
            },
            deep: true
      }
  },
    mounted () {
        this.changeStep(5)
    }
}
</script>

