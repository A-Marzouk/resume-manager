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
                },
                isLoading: false,
                notificationMessage:'',
                profilePicture:''
            }
        },
        methods: {
            submitForm() {
                let form_data = new FormData();

                $.each(this.agentData, (field) => {
                    form_data.append(field, this.agentData[field]);
                });
                if(this.profilePicture){
                    form_data.append('profilePicture', this.profilePicture);
                }

                this.clearErrors();
                this.isLoading = true;

                axios.post('/freelancer/account/personal/submit', form_data)
                    .then((response) => {
                        this.agentData.profile_picture = this.getImageSrc(response.data.profile_picture);
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
                this.profilePicture = this.$refs.file.files[0];
                this.agentData.profile_picture = URL.createObjectURL(this.profilePicture) ;
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
