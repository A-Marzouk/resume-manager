<template>
  <div class="account-info-edit dashboard-box">
    <div class="account-info-edit-heading dashboard-box-heading">
        <div class="left">
            <img src="/images/client/my_account/info_40px.png" alt="info icon">
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
                <label class="faq-input-description" style="margin-bottom: 30px;">
                    Please upload a short audio recording describing your previous experience in Customer service and Sales (ideal recording length is from 1 to 2 minutes). File must be in .mp3 format and no more than 45 MB.
                </label>
                <div class="faq-input" :class="{ 'error-input' : errors.voiceRecorder}">
                    <div class="form-group form-center">
                        <div class="fake-radio-option" :class="{ checked: typeOfRecording === 'file' }">
                            <div class="inner-circle"></div>
                        </div>
                        <input class="radio-option" type="radio" name="voiceRecorder" id="voiceRecorder" :checked="(typeOfRecording === 'file')" v-on:click="typeOfRecording = 'file'">
                        <label for="">Upload a file</label>
                    </div>
                </div>
                <div class="faq-input" :class="{ 'error-input' : errors.voiceRecorder}">
                    <div class="form-group form-center">
                        <div class="fake-radio-option" :class="{ checked: typeOfRecording === 'link' }">
                            <div class="inner-circle"></div>
                        </div>
                        <input class="radio-option" type="radio" name="voiceRecorder" id="voiceRecorder" :checked="(typeOfRecording === 'link')" v-on:click="typeOfRecording = 'link'">
                        <label for="">Share a link</label>
                    </div>
                </div>
                <div class="faq-input" :class="{ 'error-input' : errors.voiceRecorder}">
                    <div class="form-group form-center">
                        <div class="fake-radio-option" :class="{ checked: typeOfRecording === 'recording' }">
                            <div class="inner-circle"></div>
                        </div>
                        <input class="radio-option" type="radio" name="voiceRecorder" id="voiceRecorder" :checked="(typeOfRecording === 'recording')" v-on:click="typeOfRecording = 'recording'">
                        <label for="">Record your voice</label>
                    </div>
                </div>
            </div>
            <div v-if="(typeOfRecording === 'file')" class="account-edit-section-edit-btn no-decoration" :class="{'disabled-btn' : !canSubmit}">
                <div class="fake-file-input btn" >
                    <input type="file" id="voiceRecorder" />
                    UPLOAD A FILE
                </div>
            </div>
            <div v-else-if="(typeOfRecording === 'link')" class="faq-question-input account-edit-input">
                <div  class="faq-input" :class="{ 'error-input' : errors.primaryJob}">
                    <input type="text" placeholder="Insert link here..." />
                </div>
            </div>
            <div v-else class="faq-question-input account-edit-input">
                <div  class="faq-input" :class="{ 'error-input' : errors.primaryJob}">
                    <a href="javascript:;" class="recording-button">
                        <img src="/images/icons/mic_record.svg" alt="">
                        START RECORDING
                    </a>
                </div>
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
                <div class="fake-file-input btn" >
                    <input type="file" id="resumeFile" />
                    UPLOAD A FILE
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
        resumeData:{
            voiceRecorder: '',
            resumeFile: ''
        },
        typeOfRecording: 'file',
        canSubmit: true,
        errors:[]
    }
  },
  methods: {
      nextStep (e) {
        e.preventDefault()
        if (this.canSubmit) {
            this.getData({ resumeData: { ...this.resumeData }})
            this.changeStep(4)
            this.$router.push('/freelancer/register/page4')
        } else {
            // Send errors
        }

      }
  },
  watch: {
        resumeData: {
            handler(){
                // check if all resumeData values are filled
                let values = Object.values(this.resumeData);
                let isAll_filled = true;
                for (const value of values) {
                    if (value.trim() !== '') {
                        isAll_filled = false;
                        break
                    }
                }
                this.canSubmit = isAll_filled;
            },
            deep: true
        }
    },
    mounted () {
        this.changeStep(3)
    }
}
</script>

