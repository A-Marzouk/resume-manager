<template>
  <div class="account-info-edit dashboard-box">

    <div class="account-edit-section">
        <div class="account-edit-section-heading">
           NEW AGENT REGISTERED !
        </div>
        <div class="account-edit-section-inputs">
            <div class="faq-question-input account-edit-input">
                <label class="faq-input-label">
                </label>
            </div>
        </div>
    </div>
    <div class="account-edit-section-edit-btn no-decoration" id="submitBtnWrapper">
        <a href="/admin/agents">
            GO TO ADMIN PANEL
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