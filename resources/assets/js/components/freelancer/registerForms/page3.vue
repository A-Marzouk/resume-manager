<template>
  <div class="account-info-edit dashboard-box">
    <div class="account-info-edit-heading dashboard-box-heading">
        <div class="left">
            <img src="/resumeApp/public/images/client/my_account/info_40px.png" alt="info icon">
            <span>
            FILL IN THE INFORMATION TO BECOME AN AGENT
        </span>
        </div>
    </div>

    <div class="account-edit-section">
        <div class="account-edit-section-heading">
            RECORDING
        </div>
        <div class="account-edit-section-inputs">
            <div class="faq-question-input account-edit-input">
                <label class="faq-input-description">
                    Please upload a short audio recording describing your previous experience in Customer service and Sales (ideal recording length is from 1 to 2 minutes). File must be in .mp3 format and no more than 45 MB.
                </label>
                <div class="faq-input" :class="{ 'error-input' : errors.primaryJob}">
                    <input type="text" name="primaryJob" placeholder="e.g. Frontend Developer" v-model="formData.primaryJob">
                    <img src="/resumeApp/public/images/client/campaign_activity/close_black.png"
                          alt="delete icon"
                          v-show="formData.primaryJob.length > 0"
                          @click="clearInput('primaryJob')"
                    >
                </div>
                <div class="error" v-if="errors.primaryJob">
                    {{errors.primaryJob[0]}}
                </div>
            </div>
            <div class="account-edit-section-edit-btn no-decoration" :class="{'disabled-btn' : !canSubmit}">
                <a href="javascript:;">
                    UPLOAD A FILE
                </a>
            </div>
        </div>
    </div>
    <div class="account-edit-section">
        <div class="account-edit-section-heading">
            RESUME
        </div>
        <div class="account-edit-section-inputs">
            <div class="faq-question-input account-edit-input faq-description">
                <label class="faq-input-description">
                    Please upload your resume. Only .pdf files are allowed.
                </label>
            </div>
            <div class="account-edit-section-edit-btn no-decoration" :class="{'disabled-btn' : !canSubmit}">
                <a href="javascript:;">
                    UPLOAD A FILE
                </a>
            </div>
        </div>
    </div>
    <div class="account-edit-section-edit-btn no-decoration" :class="{'disabled-btn' : !canSubmit}" id="submitBtnWrapper">
        <router-link to="/freelancer/register/page4">
            CONTINUE
        </router-link>
    </div>
  </div>
</template>
<script>
export default {
  data () {
    return{
        resumeData:{
            voiceRecorder: '',
            resumeFile: ''
        },
        canSubmit: false,
        errors:[]
    }
  },
  methods: {
      nextStep (e) {
        e.preventDefault()
        if (this.canSubmit) {
            this.getData({ resumeData: { ...this.resumeData }})
            this.changeStep(2)
            this.$router.push('/freelancer/register/page2')
        } else {
            // Send errors
        }

      },
      updateData () {
          this.getData ({ resumeData: data })
      }
  },
  watch: {
        resumeData: {
            handler(){
                // check if all resumeData values are filled
                let values = Object.values(this.resumeData);
                let isAll_filled = true;
                for (const value of values) {
                    if (value.trim().length < 1) {
                        isAll_filled = false;
                        break
                    }
                }
                this.canSubmit = isAll_filled;
            },
            deep: true
        }
    }
}
</script>

