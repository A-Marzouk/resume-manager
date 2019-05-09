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
            PROFESSIONAL INFORMATION
        </div>
        <div class="account-edit-section-inputs">
            <div class="faq-question-input account-edit-input">
                <label class="faq-input-label">
                    Enter primary job title
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
            <div class="faq-question-input account-edit-input">
                <label class="faq-input-label">
                    Enter sector experience
                </label>
                <div class="faq-input" :class="{ 'error-input' : errors.sector}">
                    <input type="text" name="sector" placeholder="e.g. React.js" v-model="formData.sector">
                    <img src="/resumeApp/public/images/client/campaign_activity/close_black.png"
                          alt="delete icon"
                          v-show="formData.sector.length > 0"
                          @click="clearInput('sector')"
                    >
                </div>
                <div class="error" v-if="errors.sector">
                    {{errors.sector[0]}}
                </div>
            </div>
            <div class="faq-question-input account-edit-input">
                <label class="faq-input-label">
                    Choose voice character (for sales-agents)
                </label>
                <div class="faq-input"  :class="{ 'error-input' : errors.voice}">
                    <select class="form-control" id="voice" name="voice" style="height: 50px;" v-model="formData.voice">
                        <option value="" selected="selected">Select your voice character</option>
                        <option value="voice1">Voice character 1</option>
                    </select>
                </div>
                <div class="error" v-if="errors.voice">
                    {{errors.voice[0]}}
                </div>
            </div>
            <div class="faq-question-input account-edit-input">
                <label class="faq-input-label">
                    Specify available hours per week hoursPerWeek
                </label>
                <div class="faq-input" :class="{ 'error-input' : errors.hoursPerWeek}">
                    <input type="text" name="hoursPerWeek" placeholder="25" v-model="formData.hoursPerWeek">
                    <img src="/resumeApp/public/images/client/campaign_activity/close_black.png" @click="clearInput('hoursPerWeek')" alt="delete icon" v-show="formData.hoursPerWeek.length > 0">
                </div>
                <div class="error" v-if="errors.hoursPerWeek">
                    {{errors.hoursPerWeek[0]}}
                </div>
            </div>
            <div class="faq-question-input account-edit-input">
                <label class="faq-input-label">
                    Enter technologies/frameworks/software
                </label>
                <div class="faq-input" :class="{ 'error-input' : errors.techs}">
                    <input type="text" name="techs" placeholder="You can enter several items using comas" v-model="formData.techs">
                    <img src="/resumeApp/public/images/client/campaign_activity/close_black.png" @click="clearInput('techs')" alt="delete icon" v-show="formData.techs.length > 0">
                </div>
                <div class="error" v-if="errors.techs">
                    {{errors.techs[0]}}
                </div>
            </div>
            <div class="faq-question-input account-edit-input">
                <label class="faq-input-label">
                    Choose languages you speak
                </label>
                <div class="img-container">
                    <div class="faq-input" :class="{ 'error-input' : errors.gender}">
                        <div class="lang">
                            <img src="/images/client/add_agent/language/english_icon.png">
                            <span>English</span>
                        </div>
                        <div class="lang">
                            <img src="/images/client/add_agent/language/spanish_icon.png">
                            <span>Spanish</span>
                        </div>
                    </div>
                </div>
                <div class="error" v-if="errors.lang">
                    {{errors.lang[0]}}
                </div>
            </div>
        </div>
    </div>
    <div class="account-edit-section-edit-btn no-decoration" :class="{'disabled-btn' : !canSubmit}" id="submitBtnWrapper">
        <router-link to="/freelancer/register/page3">
            CONTINUE
        </router-link>
    </div>
  </div>
</template>
<script>
export default {
  data () {
    return{
        formData:{
            primaryJob:'',
            sector:'',
            voice:'',
            hoursPerWeek:'',
            techs:'',
            lang:'',
        },
        canSubmit: false,
        errors:[]
    }
  }
}
</script>

