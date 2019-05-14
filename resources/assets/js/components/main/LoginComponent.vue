<template>
  <div class="flex-column">
    <div class="account-info-edit">
      <div class="account-info-edit-heading dashboard-box-heading">
        <div class="left">
          <img src="/images/client/my_account/info_40px.png" alt="info icon">
          <span>
                        LOG IN
                    </span>
        </div>
      </div>

      <div class="account-edit-section" style="padding-bottom: 0; margin: 0 24px;">
        <div class="account-edit-section-inputs">
          <div class="faq-question-input account-edit-input">
            <label class="faq-input-label">
              Enter your e-mail address
            </label>
            <div class="faq-input"  :class="{ 'error-input' : errors.email}">
              <input type="text" name="email" placeholder="Enter your email" v-model="formData.email">
              <img src="/images/client/campaign_activity/close_black.png" @click="clearInput('email')" alt="delete icon" v-show="formData.email.length > 0">
            </div>
            <div class="error" v-if="errors.email">
              {{errors.email[0]}}
            </div>
          </div>
        </div>

        <div class="account-edit-section-inputs">
          <div class="faq-question-input account-edit-input">
            <label class="faq-input-label">
              Enter your password
            </label>
            <div class="faq-input"  :class="{ 'error-input' : errors.password}">
              <input type="password" name="password" placeholder="Enter your password" v-model="formData.password">
              <img src="/images/client/campaign_activity/close_black.png"
                   alt="delete icon"
                   v-show="formData.password.length > 0"
                   @click="clearInput('password')">
            </div>
            <div class="error" v-if="errors.password">
              {{errors.password[0]}}
            </div>
          </div>
        </div>

        <div class="form-group" style="margin-top: 36px;">
          <div class="checkbox">
            <label class="checkBoxText checkBoxContainer">
              <input type="checkbox" name="remember" v-model="formData.remember">
              <span class="rememberText">Remember Me</span>
              <span class="checkmark"></span>
            </label>
          </div>
        </div>

      </div>
    </div>

    <div class="account-edit-section-edit-btn no-decoration mt-0" :class="{'disabled-btn' : !canSubmit}" id="submitBtnWrapper">
      <a href="javascript:void(0)" @click="submitForm">
        LOG IN
      </a>
    </div>

    <div class="pt-3 no-decoration d-flex justify-content-center base-text align-items-center">
      Don't have an account ? <a href="#" class="ml-2 base-link"> REGISTER </a>
    </div>

  </div>
</template>

<script>
  export default {
    data(){
      return{
        formData:{
          email:'',
          password:'',
          remember:false
        },
        canSubmit: false,
        errors:[]
      }
    },
    methods:{
      submitForm(){
        if($('#submitBtnWrapper').hasClass('disabled-btn')){
          return ;
        }
        this.canSubmit = false;
        axios.post('/client/login/submit',this.formData).then( (response) => {
          if(response.data.status === 'success'){
            // redirect to client dashboard
            window.location.href =response.data.redirect ;
          }
          this.errors = response.data.errors;
        });
      },
      clearInput(inputName){
        this.formData[inputName] = '' ;
      },
    },
    watch: {
      formData: {
        handler(){
          // check if all formData values are filled
          let values = Object.values(this.formData);
          let isAll_filled = true;
          for (const value of values) {
            if (value.length < 1) {
              isAll_filled = false;
            }
          }
          this.canSubmit = isAll_filled ;
        },
        deep: true
      }
    }
  }
</script>

<style scoped>
  .error{
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 30px;/* identical to box height, or 187% */
    color: #F56F6F;
  }
</style>