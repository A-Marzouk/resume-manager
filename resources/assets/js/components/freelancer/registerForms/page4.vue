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
            ADD A PICTURE OF YOURSELF
        </div>
        <div class="account-edit-section-inputs">
            <div class="faq-question-input account-edit-input full-width">
                <label class="faq-input-description">
                    Please upload a picture of yourself. There should be only your face
                </label>
            </div>
            <div id="dropbox" class="account-edit-section-edit-btn no-decoration picture-box" :class="{'disabled-btn' : !canSubmit}">
                <div class="fallback">
                    <input type="file" id="photo" name="photo" />
                </div>
                <p class="dz-message">Drag and drop a photo you want to upload</p>
        
                <div class="fake-file-input btn btn-orange dz-input" >
                    CHOOSE A FILE
                </div>
                <p class="dz-message little">Maximum allowed size is 45 MB</p>
                <div id="dropzone" class="dropzone"></div>
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
        profileData:{
            profilePicture: ''
        },
        canSubmit: true,
        errors:[]
    }
  },
  methods: {
      nextStep (e) {
        e.preventDefault()
        this.canSubmit = true
        if (this.canSubmit) {
            this.getData({ profileData: { ...this.profileData }})
            this.changeStep(5)
            this.$router.push('/freelancer/register/page5')
        } else {
            // Send errors
        }

      }
  },
  watch: {
        profileData: {
            handler(){
                // check if all profileData values are filled
                let values = Object.values(this.profileData);
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
        this.changeStep(4)
    }
}
</script>

