<template>
    <div class="d-flex justify-content-center">
        <div class="account-info-edit-wrapper flex-column align-items-center">
            <nav class="navbar navbar-light fixed-top dashboard_navbar">
                <div class="backBtn">
                    <a href="/freelancer/dashboard/my-account">
                        <img src="/images/client/arrow_back.png" alt="back-icon">
                    </a>
                    YOUR PERSONAL INFORMATION
                </div>
            </nav>

            <div class="container" style="display: flex;justify-content: center;">
                <div class="notificationBar" id="notificationBar" style=" display:none; position:fixed;">
                    <div>
                        {{notificationMessage}}
                    </div>
                    <a href="javascript:void(0)" @click="hideNotification" class="no-decoration" style="color: white;">
                        x
                    </a>
                </div>
            </div>

            <div class="main-box-margin account-info-edit dashboard-box">
                <div class="account-info-edit-heading dashboard-box-heading">
                    <div class="left">
                        <img src="/images/dashboard/info.svg" alt="info icon">
                        <span>
                        UPLOAD MEDIA FILES
                    </span>
                    </div>
                </div>

                <div class="account-edit-section">
                    <div class="account-edit-section-heading">
                        PROFILE PICTURE
                    </div>

                    <div class="avatar">
                        <img :src="getImageSrc(agentData.profile_picture)" alt="profile picture">
                    </div>

                    <div class="account-edit-section-inputs">
                        <div class="faq-question-input account-edit-input full-width">
                            <label class="faq-input-description">
                                Please upload a picture of yourself. There should be only your face
                            </label>
                        </div>

                        <input type="file" ref="file" @change=handleFileUpload>
                    </div>
                    <div class="error" v-if="errors.profile_picture">
                        {{errors.profile_picture[0]}}
                    </div>
                </div>


                <div class="account-edit-section">
                    <div class="account-edit-section-heading">
                        RESUME
                    </div>

                    <div class="account-edit-section-inputs flex-column d-flex">
                        <div class="faq-question-input account-edit-input full-width">
                            <label class="faq-input-description">
                                Please upload your resume ( Only PDF allowed )
                            </label>
                        </div>

                        <div class="avatar mt-3" v-show="agentData.cv">
                            <img src="/images/pdf.png" alt="pdf uploaded" style="width: 40px;height: 50px; border-radius:0;">
                        </div>

                        <div class="mt-2">
                            <a :href="'/'+agentData.cv" target="_blank" >View uploaded Resume</a>
                        </div>

                        <div class="form-group mt-3">
                            <input type="file" id="cv" ref="cv_file" name="included_cv" v-on:change="handleCVUpload"/>
                        </div>

                    </div>
                    <div class="error" v-if="errors.cv">
                        {{errors.cv[0]}}
                    </div>
                </div>

                <div class="account-edit-section-edit-btn no-decoration">
                    <a class="btn-primary"
                       v-on:click="submitForm"
                       href="javascript:void(0)">
                        SAVE EDITS
                    </a>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {},
                agent: {},
                errors: [],
                agentData: {
                    'profile_picture': this.$attrs.current_user.user_data.profile_picture,
                    'cv': this.$attrs.current_user.agent.cv,
                },
                isLoading: false,
                notificationMessage:'',
                profile_picture:'',
                cv:'',
            }
        },
        methods: {
            submitForm() {
                let form_data = new FormData();

                if(this.profile_picture){
                    form_data.append('profile_picture', this.profile_picture);
                }

                if(this.cv){
                    form_data.append('cv', this.cv);
                }

                this.clearErrors();
                this.isLoading = true;

                axios.post('/freelancer/account/media/submit', form_data)
                    .then((response) => {

                        if(response.data.errors){
                            this.errors = response.data.errors;
                            return ;
                        }

                        this.agentData.profile_picture = this.getImageSrc(response.data.user_data.profile_picture);
                        this.agentData.cv = response.data.agent.cv;
                        this.showSuccessMessage();

                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    })
            },
            handleFileUpload() {
                this.profile_picture = this.$refs.file.files[0];
                this.agentData.profile_picture = URL.createObjectURL(this.profile_picture) ;
            },
            handleCVUpload() {
                this.cv = this.$refs.cv_file.files[0];
            },
            clearErrors() {
                $.each(this.errors, (error) => {
                    this.errors[error] = '';
                });

            },
            clearInput(field) {
                this.agentData[field] = '';
            },
            getImageSrc(src) {
                if (!src) {
                    return '/images/placeholder.png';
                }

                if (src.charAt(0) !== '/' && src.charAt(0) !== 'h' && src.charAt(0) !== 'b') {
                    return '/' + src;
                }

                return src;
            },
            showSuccessMessage(){
                $('.notificationBar').css('background','#FFBA69') ;
                this.notificationMessage = 'Personal information has been successfully updated!' ;
                $('#notificationBar').fadeIn(600);
                setTimeout(()=>{
                    $('#notificationBar').fadeOut(1500);
                },4000);
            },
            hideNotification(){
                $('#notificationBar').css('display','none');
            },
        },

        mounted() {

        },
        created() {

        }
    }
</script>

<style lang="scss" scoped>

    .processBar {
        height: 6px;
        background: lightgreen;
        width: 0%;
        bottom: -15px;
        position: absolute;
    }

    .avatar {
        margin-top:25px;
        img{
            border-radius: 50%;
            width: 150px;
            height: 150px;
        }
    }

    .notificationBar{
        margin-top: -8px;
        z-index: 2;
        width: 1164px;
    }


    @media screen and (max-width: 1270px) {
        .notificationBar{
            width: 96%;
        }
    }
    .main-box-margin{
        margin-top: 22px;
    }
</style>
