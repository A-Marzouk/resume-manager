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
            PROFESSIONAL INFORMATION
        </div>
        <div class="account-edit-section-inputs">
            <div class="faq-question-input account-edit-input">
                <label class="faq-input-label">
                    Enter primary job title
                </label>
                <div class="faq-input" :class="{ 'error-input' : errors.primaryJob}">
                    <input type="text" name="primaryJob" placeholder="e.g. Frontend Developer" v-model="professionalData.primaryJob">
                    <img src="/images/client/campaign_activity/close_black.png"
                          alt="delete icon"
                          v-show="professionalData.primaryJob.length > 0"
                          @click="clearInput('primaryJob')"
                    >
                </div>
                <div class="error" v-if="showErrors && errors.primaryJob">
                    {{errors.primaryJob}}
                </div>
            </div>
            <div class="faq-question-input account-edit-input">
                <label class="faq-input-label">
                    Enter sector experience
                </label>
                <div class="faq-input" :class="{ 'error-input' : errors.sector}">
                    <input type="text" name="sector" placeholder="e.g. React.js" v-model="professionalData.sector">
                    <img src="/images/client/campaign_activity/close_black.png"
                          alt="delete icon"
                          v-show="professionalData.sector.length > 0"
                          @click="clearInput('sector')"
                    >
                </div>
                <div class="error" v-if="showErrors && errors.sector">
                    {{errors.sector}}
                </div>
            </div>
            <div class="faq-question-input account-edit-input">
                <label class="faq-input-label">
                    Choose voice character (for sales-agents)
                </label>
                <div class="faq-input"  :class="{ 'error-input' : errors.voice}">
                    <select class="form-control" id="voice" name="voice" style="height: 50px;" v-model="professionalData.voice">
                        <option value="" selected="selected">Select your voice character</option>
                        <option value="voice1">Voice character 1</option>
                    </select>
                </div>
                <div class="error" v-if="showErrors && errors.voice">
                    {{errors.voice}}
                </div>
            </div>
            <div class="faq-question-input account-edit-input">
                <label class="faq-input-label">
                    Specify available hours per week hoursPerWeek
                </label>
                <div class="faq-input" :class="{ 'error-input' : errors.hoursPerWeek}">
                    <input type="text" name="hoursPerWeek" placeholder="25" v-model="professionalData.hoursPerWeek">
                    <img src="/images/client/campaign_activity/close_black.png" @click="clearInput('hoursPerWeek')" alt="delete icon" v-show="professionalData.hoursPerWeek.length > 0">
                </div>
                <div class="error" v-if="showErrors && errors.hoursPerWeek">
                    {{errors.hoursPerWeek}}
                </div>
            </div>
            <div class="faq-question-input account-edit-input">
                <label class="faq-input-label">
                    Enter technologies/frameworks/software
                </label>
                <div class="faq-input multi-items" :class="{ 'error-input' : errors.techs}">
                    <input type="text" class="fake-input">
                    <div class="tech-item" v-for="(item, index) in professionalData.techs" :key="item + index">
                        <span>
                            {{ item }}
                        </span>
                        <img class="delete-multi-item" src="/images/client/campaign_activity/close_black.png" @click="deleteItem(index)" alt="delete icon">
                    </div>
                    <input class="multi-input" type="text" name="techs" placeholder="You can enter several items using comas" v-model="inputTechs"
                        @keydown="addToTechs"
                    >
                    <img src="/images/client/campaign_activity/close_black.png" @click="clearInput('techs')" alt="delete icon" v-show="professionalData.techs.length > 0">
                </div>
                <div class="error" v-if="showErrors && errors.techs">
                    {{errors.techs}}
                </div>
            </div>
            <div class="faq-question-input account-edit-input">
                <label class="faq-input-label">
                    Choose languages you speak
                </label>
                <div class="img-container">
                    <div class="faq-input" :class="{ 'error-input' : errors.lang}">
                        <div v-on:click='professionalData.lang = "en"' class="lang">
                            <img src="/images/client/add_agent/language/english_icon.png">
                            <span>English</span>
                        </div>
                        <div v-on:click='professionalData.lang = "es"' class="lang">
                            <img src="/images/client/add_agent/language/spanish_icon.png">
                            <span>Spanish</span>
                        </div>
                    </div>
                </div>
                <div class="error" v-if="showErrors && errors.lang">
                    {{errors.lang}}
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
        professionalData:{
            primaryJob:'',
            sector:'',
            voice:'',
            hoursPerWeek:'',
            techs: [],
            lang:''
        },
        inputTechs: '',
        canSubmit: false,
        showErrors: false,
        errors: {
            primaryJob:'',
            sector:'',
            voice:'',
            hoursPerWeek:'',
            techs: '',
            lang:''
        }
    }
  },
  methods: {
      noErrors () {
            let noErrorsPrimaryJob = this.noErrorsPrimaryJob()
            let noErrorsSector = this.noErrorsSector()
            let noErrorsVoice = this.noErrorsVoice()
            let noErrorsHours = this.noErrorsHours()
            let noErrorsLang = this.noErrorsLang()

            return (
                noErrorsPrimaryJob &&
                noErrorsSector &&
                noErrorsVoice &&
                noErrorsHours &&
                noErrorsLang
            )
      },
      noErrorsPrimaryJob () {
            let valid = true 
        
            // Empty field
            if (this.professionalData.primaryJob.trim() === '') {
                valid = false
                this.errors.primaryJob = 'Please, fill this field'
            } else this.errors.primaryJob  = ''
            // Invalid characters (?)
            return valid
      },
      noErrorsSector () {
            let valid = true 
        
            // Empty field
            if (this.professionalData.sector.trim() === '') {
                valid = false
                this.errors.sector = 'Please, fill this field'
            } else this.errors.sector  = ''
            // Invalid characters (?)
            return valid
      },
      noErrorsVoice () {
            let valid = true 
        
            // Empty field
            if (this.professionalData.voice.trim() === '') {
                valid = false
                this.errors.voice = 'Please, fill this field'
            } else this.errors.voice  = ''
            // Invalid characters (?)
            return valid
      },
      noErrorsHours () {
            let valid = true 
        
            // Empty field
            if (this.professionalData.hoursPerWeek.trim() === '') {
                valid = false
                this.errors.hoursPerWeek = 'Indicate how many hours do you work'
            } else this.errors.hoursPerWeek  = ''
            // Invalid characters (?)
            return valid
      },
      noErrorsLang () {
            let valid = true 
        
            // Empty field
            if (this.professionalData.lang.trim() === '') {
                valid = false
                this.errors.lang = 'Please, fill this field'
            } else this.errors.lang  = ''
            // Invalid characters (?)
            return valid
      },
      nextStep (e) {
        e.preventDefault()
        this.canSubmit = true
        if (this.noErrors()) {
            this.getData({ professionalData: { ...this.professionalData }})
            this.changeStep(3)
            this.$router.push('/freelancer/register/page3')
        } else {
            this.showErrors = true
        }

      },
      addToTechs (e) {
          if (e.key == ',') {
            e.preventDefault()
            this.professionalData.techs.push(this.inputTechs)
            this.inputTechs = ''
          }
      },
      deleteItem (index) {
          this.professionalData.techs.splice(index, 1)
      },
      clearInput (name) {
            if (name !== 'techs') this.professionalData[name] = ''
            else this.inputTechs = ''
      }
    },

  watch: {
        professionalData: {
            handler(){
                // check if all professionalData values are filled
                let values = Object.values(this.professionalData);
                let isAll_filled = true;
                for (const value of values) {
                    if (!Array.isArray(value) && value.trim().length < 1) {
                        isAll_filled = false;
                        break
                    } else if (value.length < 1) {
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
        this.changeStep(2)
    }
}
</script>

