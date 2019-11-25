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

                        <input type="file" ref="profile_picture" id="profile_picture" @change=handleProfilePictureUpload>
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
                        <span id="cv_included_value" class="d-none"></span>

                    </div>
                    <div class="error" v-if="errors.cv">
                        {{errors.cv[0]}}
                    </div>
                </div>


                <div class="row flex-column d-flex">

                    <div class="form-group">
                        <div class="text-left">
                            Please upload / record a short audio recording describing your previous experience as a developer ( Ideal recording length from 1 - 2 minutes ).
                            <br/>
                            <div style="width:100%;margin-top:.25rem;font-size:100%;color:#dc3545">
                                <strong>{{ errors.audioError }}</strong>
                            </div>
                        </div>
                    </div>

                    <div class="form-group d-flex flex-column align-items-start" v-show="uploadMethod.length < 1">
                        <div class="text-left" style="padding-bottom: 15px;">
                            Please choose uploading method :
                        </div>
                        <div class="text-left" style="padding-bottom: 15px;">
                            <span v-if="agentData.recordings[0] !== undefined"><a :href="agentData.recordings[0].src" target="_blank">Listen to uploaded audio</a></span>
                        </div>
                        <div class="row w-100">
                            <div class="col-md-4 col-12" style="padding-top:10px;">
                                <a href="javascript:void(0)" class="d-flex align-items-center btn btn-primary btn-block"
                                   @click="setUploadMethod('upload')">Upload audio file</a>
                            </div>
                            <div class="col-md-4 col-12" style="padding-top:10px;">
                                <a href="javascript:void(0)" class="d-flex align-items-center btn btn-primary btn-block"
                                   @click="setUploadMethod('record')">Record audio</a>
                            </div>
                            <div class="col-md-4 col-12" style="padding-top:10px;">
                                <a href="javascript:void(0)" class="d-flex align-items-center btn btn-primary btn-block"
                                   @click="setUploadMethod('url')">Link</a>
                            </div>
                        </div>
                        <br/>
                    </div>

                    <div id="uploadFile" v-show="uploadMethod == 'upload'">
                        <div class="form-group col-md-12">
                            <input type="file" id="file" ref="file" v-on:change="handleFileUpload"/>
                        </div>
                        <div class="row">
                            <div class="col-md-12" v-show="uploadPercentage > 0">
                                <progress style="width: 300px;height:5px;" max="100"
                                          :value.prop="uploadPercentage"></progress>
                            </div>
                        </div>
                    </div>
                    <div id="recordAudio" class="form-group" v-show="uploadMethod == 'record'">
                        <div class="recorder_wrapper recorder_wrapper_phone">
                            <div class="recorder">
                                <div id="recordImg">
                                    <img src="/images/Microphone_1.png" alt="mic" width="30px">
                                </div>
                                <p id="record_status"></p>
                                <div class="NoDecor">
                                    <a href="javascript:void(0)" id="startRecord" class="btn btn-default">New record</a>
                                    <a href="javascript:void(0)" id="stopAudio" style="padding-top: 20px;" class="d-none">Stop</a>
                                    <br>
                                    <a href="javascript:void(0)" id="playAudio" class="d-none">Play</a><br/>
                                    <a href="javascript:void(0)" id="downloadAudio" class="d-none">Download</a><br/>
                                    <a href="javascript:void(0)" id="discardAudio" class="d-none" @click="resetAudio">Discard</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="urlToAudio" class="form-group col-md-12" v-show="uploadMethod == 'url'">
                        <label class="panelFormLabel">Link to your record :</label>
                        <input type="text" class="form-control panelFormInput" v-model="link">
                    </div>
                </div>

                <div class="error" v-if="errors.audio">
                    {{errors.audio[0]}}
                </div>

                <div class="row">
                    <div class="col-4">
                        <a href="javascript:void(0)" class="btn btn-primary" style=" padding-top: 10px;" @click="clearUploadMethod"
                           v-show="uploadMethod.length > 0"> Back </a>
                    </div>
                </div>



                <div class="account-edit-section-edit-btn no-decoration">
                    <a class="btn-primary"
                       v-on:click="submitFormWithRecord"
                       href="javascript:void(0)" v-show="uploadMethod == 'record' && !isLoading">
                        SAVE EDITS
                    </a>

                    <a class="btn-primary"
                       v-on:click="submitForm"
                       href="javascript:void(0)" v-show="uploadMethod != 'record' && !isLoading">
                        SAVE EDITS
                    </a>

                    <a class="btn-primary"  href="javascript:void(0)"
                       v-show="isLoading">
                        Loading..
                    </a>

                    <a href="javascript:void(0)" class="d-none" id="saveAudioMedia"></a>
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
                file: '',
                fileChosen: false,
                uploadPercentage: 0,
                uploadMethod: '',
                agentData: {
                    'profile_picture': this.$attrs.current_user.user_data.profile_picture,
                    'cv': this.$attrs.current_user.agent.cv,
                    'recordings': this.$attrs.current_user.recordings,
                },
                isLoading: false,
                notificationMessage:'',
                profile_picture:'',
                cv:'',
                link:'',
            }
        },
        methods: {
            submitFormWithRecord(){
                this.isLoading = true ;
                $('#saveAudioMedia').click();
                setTimeout(() => {
                    this.isLoading = false ;
                },3000);
            },
            submitForm() {
                this.isLoading = true ;
                let form_data = new FormData();

                if(this.profile_picture){
                    form_data.append('profile_picture', this.profile_picture);
                }

                if(this.cv){
                    form_data.append('cv', this.cv);
                }

                if(this.file && this.uploadMethod === 'upload'){
                    form_data.append('file', this.file);
                }

                if(this.link.length > 0 && this.uploadMethod === 'url'){
                    form_data.append('link', this.link);
                }

                form_data.append('uploadMethod',this.uploadMethod);

                this.clearErrors();

                axios.post('/freelancer/account/media/submit', form_data)
                    .then((response) => {

                        if(response.data.errors){
                            this.errors = response.data.errors;
                            return ;
                        }

                        this.agentData.profile_picture = this.getImageSrc(response.data.user_data.profile_picture);
                        this.agentData.cv = response.data.agent.cv;
                        this.agentData.recordings = response.data.recordings;
                        this.showSuccessMessage();
                        window.location.href = '/freelancer/media/edit';
                    })
                    .catch((error) => {
                        this.isLoading = false ;
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    })
            },

            resetAudio(){
                let startBtn =  $('#startRecord') ;
                startBtn.removeClass('d-none');
                startBtn.css('display','block');
                $('#record_status').fadeOut().addClass('d-none');

                $('#playAudio').addClass('d-none');
                $('#downloadAudio').addClass('d-none');
                $('#discardAudio').addClass('d-none');
            },
            setUploadMethod(method) {
                this.uploadMethod = method;
            },
            clearUploadMethod() {
                this.uploadMethod = '';
            },
            handleProfilePictureUpload() {
                this.profile_picture = this.$refs.profile_picture.files[0];
                this.agentData.profile_picture = URL.createObjectURL(this.profile_picture) ;
            },
            handleCVUpload() {
                this.cv = this.$refs.cv_file.files[0];
            },
            handleFileUpload() {
                this.file = this.$refs.file.files[0];
                this.fileChosen = true;
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
