<template>
  <div class="account-info-edit dashboard-box">
    <div class="account-info-edit-heading dashboard-box-heading">
        <div class="left">
            <img src="/images/client/my_account/info_40px.png" alt="info icon">
            <span>
            FILL IN THE INFORMATION TO BECOME AN AGENT (BUSSINESS SUPPORT)
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
                        <div class="fake-radio-option" :class="{ checked: typeOfRecording === 'record' }">
                            <div class="inner-circle"></div>
                        </div>
                        <input class="radio-option" type="radio" name="voiceRecorder" id="voiceRecorder" :checked="(typeOfRecording === 'recording')" v-on:click="typeOfRecording = 'record'">
                        <label for="">Record your voice</label>
                    </div>
                </div>
            </div>
            
            <div v-if="(typeOfRecording === 'file')" class="account-edit-section-edit-btn no-decoration" :class="{'disabled-btn' : !canSubmit}">
                <div class="fake-file-input btn" >
                    <input type="file" id="voiceRecorder" v-on:change="handleChange" />
                    
                    UPLOAD A FILE

                </div>
                <div class="error" v-if="showErrors && errors.voiceRecord">
                    {{errors.voiceRecord}}
                </div>
            </div>
            <div v-else-if="(typeOfRecording === 'link')" class="faq-question-input account-edit-input">
                <div  class="faq-input" :class="{ 'error-input' : errors.primaryJob}">
                    <input type="text" placeholder="Insert link here..." />
                </div>
                <div class="error" v-if="showErrors && errors.voiceRecord">
                    {{errors.voiceRecord}}
                </div>
            </div>
            <div v-else class="faq-question-input account-edit-input">
                <div class="faq-input" :class="{ 'error-input' : errors.primaryJob}">
                    <a v-if="!recording" href="javascript:;" v-on:click="startRecording" class="recording-button">
                        <img src="/images/icons/mic_record.svg" alt="">
                        START RECORDING
                    </a>
                    <a v-else href="javascript:;" v-on:click="stopRecording" class="recording-button">
                        <img src="/images/icons/mic_record.svg" alt="">
                        STOP RECORDING

                        <span>{{(timer.minutes < 10) ? '0' + timer.minutes : timer.minutes}}</span>:
                        <span>{{ (timer.seconds < 10) ? '0' + timer.seconds : timer.seconds }}</span>
                    </a>
                </div>
                <div class="error" v-if="showErrors && errors.voiceRecord">
                    {{errors.voiceRecord}}
                </div>
            </div>
            <div v-if="resumeData.voiceRecord" class="file-details">
                <p>{{ resumeData.voiceRecord.name }}</p>
                <b>{{ (resumeData.voiceRecord.size * 0.000008).toFixed(2) }} MB</b>

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
                    <input v-bind="resumeData.voiceRecord" type="file" id="resumeFile" />
                    UPLOAD A FILE
                </div>
                <div class="error" v-if="showErrors && errors.resumeFile">
                    {{errors.voiceRecord}}
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
            voiceRecord: null,
            resumeFile: null
        },
        mediaRecorder: null,
        audioChunks: null,
        typeOfRecording: 'file',
        canSubmit: true,
        recording: false,
        timer: {
            seconds: 0,
            minutes: 0
        },
        errors: {
            voiceRecord: '',
            resumeFile: ''
        },
        showErrors: false
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
            this.showErrors = true
        }

      },
      handleChange (e) {
          let type = e.target.files[0].type.split('/')[0]
          let size = e.target.files[0].size

          if (type !== 'audio') {
            this.showErrors = true
            this.errors.voiceRecord = 'This file is not an audio file'
            e.target.files.pop()
          } else if (size > 45 * 8 * 10000) {
            this.showErrors = true
            this.errors.voiceRecord = 'The file size is greater than 45 MB'
            e.target.files.pop()
          }

            this.resumeData.voiceRecord = e.target.files[0]
        
      },
      startRecording () {
          this.recording = true
            let _this = this

          navigator.mediaDevices.getUserMedia({ audio: true })
            .then(function (stream) {
                _this.mediaRecorder = new MediaRecorder(stream);
                _this.mediaRecorder.start();

                _this.audioChunks = [];

                _this.mediaRecorder.addEventListener("dataavailable", function (event) {
                    _this.audioChunks.push(event.data)
                });

                _this.mediaRecorder.addEventListener("stop", () => {
                    const audioBlob = new Blob(_this.audioChunks);
                    const audioUrl = URL.createObjectURL(audioBlob);
                    const audio = new Audio(audioUrl)
                    audio.play()
                });

                _this.startTimerRecorder()

                setTimeout(() => {
                    _this.stopRecording()
                }, 1000 * 90)
            });
      },
      stopRecording() {
          this.recording = false
          this.timer.seconds = 0
          this.timer.minutes = 0
          this.mediaRecorder.stop()
      },
      startTimerRecorder () {
          let _this = this
          setInterval(function () {
              _this.timer.seconds++

              if (seconds > 60) {
                  _this.timer.seconds = 0
                  _this.timer.minutes++
              }
          }, 1000)
      }
  },
  watch: {
        resumeData: {
            handler(){
                
            },
            deep: true
        }
    },
    mounted () {
        this.changeStep(3)
    }
}
</script>

