<template>
  <div class="account-info-edit dashboard-box">

    <div class="account-edit-section">
        <div class="account-edit-section-heading">
            THANK YOU FOR THE REGISTRATION!
        </div>
        <div class="account-edit-section-inputs">
            <div class="faq-question-input account-edit-input">
                <label class="faq-input-label">
                    Your registration is completed. Soon our recruitment coordinator will contact you.
                </label>
            </div>
        </div>
    </div>
    <div class="account-edit-section-edit-btn no-decoration" :class="{'disabled-btn' : !canSubmit}" id="submitBtnWrapper">
        <a href="/freelancer/dashboard">
            GO TO MAIN PAGE
        </a>
    </div>
  </div>
</template>
<script>


export default {
  props: ['changeStep', 'getData'],
  data () {
    return{
    }
  },
  methods: {
  },
  watch: {
    },
  mounted () {
    this.changeStep(6)
  }
}
</script>