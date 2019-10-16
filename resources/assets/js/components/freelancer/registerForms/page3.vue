<template>
  <div class="account-info-edit dashboard-box">
    <div class="account-info-edit-heading dashboard-box-heading">
        <div class="left">
            <img src="/images/client/my_account/info_40px.png" alt="info icon">
            <span>
            FILL IN THE INFORMATION TO REGISTER AN AGENT (BUSSINESS SUPPORT)
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
                        <div class="fake-radio-option" :class="{ checked: resumeData.typeOfRecording === 'file' }">
                            <div class="inner-circle"></div>
                        </div>
                        <input class="radio-option" type="radio" name="voiceRecorder"  :checked="(resumeData.typeOfRecording === 'file')" v-on:click="resumeData.typeOfRecording = 'file'">
                        <label for="">Upload a file</label>
                    </div>
                </div>
                <div class="faq-input" :class="{ 'error-input' : errors.voiceRecorder}">
                    <div class="form-group form-center">
                        <div class="fake-radio-option" :class="{ checked: resumeData.typeOfRecording === 'link' }">
                            <div class="inner-circle"></div>
                        </div>
                        <input class="radio-option" type="radio" name="voiceRecorder"  :checked="(resumeData.typeOfRecording === 'link')" v-on:click="resumeData.typeOfRecording = 'link'">
                        <label for="">Share a link</label>
                    </div>
                </div>
                <!--<div class="faq-input" :class="{ 'error-input' : errors.voiceRecorder}">-->
                    <!--<div class="form-group form-center">-->
                        <!--<div class="fake-radio-option" :class="{ checked: resumeData.typeOfRecording === 'recording' }">-->
                            <!--<div class="inner-circle"></div>-->
                        <!--</div>-->
                        <!--<input class="radio-option" type="radio" name="voiceRecorder" :checked="(resumeData.typeOfRecording === 'recording')" v-on:click="resumeData.typeOfRecording = 'recording'">-->
                        <!--<label for="">Record your voice</label>-->
                    <!--</div>-->
                <!--</div>-->
            </div>
            <div v-if="(resumeData.typeOfRecording === 'file')" class="account-edit-section-edit-btn no-decoration" :class="{'disabled-btn' : !canSubmit}">
                <div class="fake-file-input btn" >
                    <input type="file" id="recording" ref="file"  v-on:change="handleFileUpload" />
                    UPLOAD A FILE
                </div>
                <div v-show="resumeData.typeOfRecording === 'file' " class="ml-3 d-flex align-items-center">
                    {{recordingFileName}}
                </div>
            </div>
            <div v-else-if="(resumeData.typeOfRecording === 'link')" class="faq-question-input account-edit-input">
                <div  class="faq-input" :class="{ 'error-input' : errors.primaryJob}">
                    <input type="text" placeholder="Insert link here..."  v-model="resumeData.recordingLink" />
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
            <div class="account-edit-section-edit-btn no-decoration justify-content-start" :class="{'disabled-btn' : !canSubmit}">
                <div class="fake-file-input btn" >
                    <input type="file" id="resumeFile" ref="file2" v-on:change="handleCVUpload"/>
                    UPLOAD A FILE
                </div>
                <div  class="ml-3 d-flex align-items-center">
                    {{resumeFileName}}
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
        resumeData:{
            // voiceRecorder: '',
            typeOfRecording: 'file',
            recordingLink: '',
            recordingFile: '',
            resumeFile: ''
        },
        recordingFileName: '' ,
        resumeFileName: '' ,
        canSubmit: false,
        errors:[],
        showErrors: false
    }
  },
  methods: {
      handleFileUpload(){
          this.recordingFileName = this.$refs.file.files[0].name ;
          this.resumeData.recordingFile = this.$refs.file.files[0];
      },
      handleCVUpload(){
          this.resumeFileName = this.$refs.file2.files[0].name ;
          this.resumeData.resumeFile = this.$refs.file2.files[0];
      },
      nextStep (e) {
        e.preventDefault();
        if (this.canSubmit) {
            this.getData({ resumeData: { ...this.resumeData }});
            this.changeStep(4);
            this.$router.push('/freelancer/register/page4')
        } else {
            this.showErrors = true
        }

      }
  },
  watch: {
        resumeData: {
            handler(){
                // check if all resumeData values are filled
                let values = Object.values(this.resumeData);

                let resume = false;
                let recording = false;

                if(this.resumeData.recordingFile || this.resumeData.recordingLink ){
                    // recording is fine
                    recording = true;
                }

                if(this.resumeData.resumeFile){
                    // resume file is fine
                    resume = true;
                }


                this.canSubmit = resume && recording;
            },
            deep: true
        }
    },
    mounted () {
        this.changeStep(3)
    }
}
</script>

