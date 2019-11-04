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

        <div class="account-edit-section-inputs flex-column">

            <div class="faq-question-input account-edit-input faq-description">
                <label class="faq-input-description">
                    Please upload a picture of yourself. There should be only your face
                </label>
            </div>

            <div  class="ml-3 d-flex align-items-center">
                <img :src="profilePictureUrl" alt="photo" style="width:100px; height:100px; border-radius:50%; " v-show="profilePictureUrl.length > 1">
            </div>

            <div class="account-edit-section-edit-btn no-decoration justify-content-start" :class="{'disabled-btn' : !canSubmit}">
                <div class="fake-file-input btn" >
                    <input type="file" id="resumeFile" ref="file" v-on:change="handleFileUpload"/>
                    UPLOAD A FILE
                </div>
                <div  class="ml-3 d-flex align-items-center">
                    {{profilePictureName}}
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
        profileData:{
            profilePicture: ''
        },
        profilePictureName:'',
        profilePictureUrl:'',
        canSubmit: false,
        errors:[]
    }
  },
  methods: {
      nextStep (e) {
        e.preventDefault();
        this.canSubmit = true;
        if (this.canSubmit) {
            this.getData({ profileData: { ...this.profileData }})
            this.changeStep(5);
            this.$router.push('/freelancer/register/page5')
        } else {
            // Send errors
        }

      },
      handleFileUpload(){
          this.profileData.profilePicture = this.$refs.file.files[0];
          this.profilePictureName =  this.profileData.profilePicture.name;
          this.profilePictureUrl = URL.createObjectURL(this.profileData.profilePicture);
      },
  },
  watch: {
        profileData: {
            handler(){
                // check if all profileData values are filled
                let profilePicture = false;

                if(this.profileData.profilePicture){
                    profilePicture = true ;
                }

                this.canSubmit = profilePicture;
            },
            deep: true
        }
    },
    mounted () {
        this.changeStep(4);
    }
}
</script>

