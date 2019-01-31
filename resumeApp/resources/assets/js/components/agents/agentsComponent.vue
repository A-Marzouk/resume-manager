<template>
    <div :class="{loader : isLoading}" id="loaderArea">
        <form action="//workforce/add_agent" :class="{'d-none' : isLoading}" id="businessRegisterForm" method="post" @submit.prevent="submitForm">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="business_firstName" class="panelFormLabel">First name *</label>
                        <input id="business_firstName" type="text" class="panelFormInput form-control" name="firstName" v-model="freelancerData.firstName" required autofocus>

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.firstName }}</strong>
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="business_lastName" class="panelFormLabel">Last name *</label>
                        <input id="business_lastName" type="text" class="panelFormInput form-control " name="lastName" v-model="freelancerData.lastName" required autofocus>

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.lastName }}</strong>
                        </span>


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="business_email" class="panelFormLabel">Email *</label>

                        <input id="business_email" type="email" class="panelFormInput form-control" name="email" v-model="freelancerData.email" required>

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{errors.email}}</strong>
                        </span>
                    </div> <!-- email -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="business_phone" class="panelFormLabel">Phone *</label>

                        <input id="business_phone" type="tel" class="panelFormInput form-control" name="phone" v-model="freelancerData.phone" required>

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.phone }}</strong>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="business_whatsapp" class="panelFormLabel">Whatsapp</label>
                        <input id="business_whatsapp" type="text" class="panelFormInput form-control" v-model="freelancerData.whatsapp" name="whatsapp">


                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.whatsapp }}</strong>
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="business_skype" class="panelFormLabel">Skype</label>
                        <input id="business_skype" type="text" class="panelFormInput form-control" v-model="freelancerData.skype" name="skype">

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.skype }}</strong>
                        </span>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="form-group">
                    <div class="col-md-12 text-left panelFormLabel">
                      Agent record:
                    </div>
                </div>

                <div class="form-group col-md-12" v-show="uploadMethod.length < 1">
                    <div class="panelFormLabel" style="padding-bottom: 15px;">
                        Please choose method :
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-12" style="padding-top:10px;">
                            <a href="javascript:void(0)" class="btn btn-primary btn-block" @click="setUploadMethod('upload')">Upload audio file</a>
                        </div>
                        <div class="col-md-4 col-12" style="padding-top:10px;">
                            <a href="javascript:void(0)" class="btn btn-primary btn-block" @click="setUploadMethod('url')">Link</a>
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
                            <progress style="width: 300px;height:5px;" max="100" :value.prop="uploadPercentage"></progress>
                        </div>
                    </div>
                </div>
                <div id="urlToAudio" class="form-group col-md-12" v-show="uploadMethod == 'url'">
                    <label class="panelFormLabel">Link to record :</label>
                    <input type="text" class="form-control panelFormInput" v-model="toBeEditedRecord.src">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <a href="javascript:void(0)" class="btn btn-primary" @click="clearUploadMethod" v-show="uploadMethod.length > 0"> Back </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <div class="buttonMain text-center">
                            <a href="javascript:void(0)" style="padding: 15px 100px 15px 100px;" @click="submitForm" class="hireBtn" v-bind:disabled="toBeEditedRecord.src.length < 1 && !fileChosen">
                                Apply
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                isLoading:false,
                file: '',
                fileChosen: false,
                uploadPercentage: 0,
                uploadMethod: '',
                toBeEditedAgent: {

                },
                errors: {
                    'firstName':'',
                    'lastName':'',
                    'phone':'',
                    'email':'',
                    'whatsapp':'',
                    'skype':'',
                },
            }
        },
        methods:{
            handleFileUpload(){
                this.file = this.$refs.file.files[0];
                this.fileChosen = true;
            },
            handleCVUpload(){
                this.cv_file = this.$refs.cv_file.files[0];
            },
            validateForm(){
                let formData = new FormData();
                formData.append('firstName', this.freelancerData.firstName);
                formData.append('lastName', this.freelancerData.lastName);
                formData.append('email', this.freelancerData.email);
                formData.append('phone', this.freelancerData.phone);
                formData.append('whatsapp', this.freelancerData.whatsapp);
                formData.append('skype', this.freelancerData.skype);

                this.clearErros();
                this.isLoading = true;
                axios.post('/freelancer/workforce/form/validate',formData).then((response)=>{
                    console.log(response.data);
                    if(response.data.errors){
                        this.updateErrors(response.data.errors);
                        this.isLoading = false;
                    }else{
                        $('#saveAudioRegister').click();
                        this.isLoading = true;
                    }
                });
            },
            submitForm(){
                if(this.toBeEditedRecord.src.length < 1 &&  this.file.length < 1){
                    alert('Please upload the required record..');
                    return;
                }
                this.isLoading = true ;
                let formData = new FormData();
                formData.append('audioFile', this.file);
                if(this.cv_file !== ''){
                    formData.append('included_cv', this.cv_file);
                }
                formData.append('cv_included', this.cv_included);
                formData.append('src', this.toBeEditedRecord.src);
                formData.append('title', 'Business support application');
                formData.append('transcription',"");
                formData.append('firstName', this.freelancerData.firstName);
                formData.append('lastName', this.freelancerData.lastName);
                formData.append('email', this.freelancerData.email);
                formData.append('phone', this.freelancerData.phone);
                formData.append('whatsapp', this.freelancerData.whatsapp);
                formData.append('skype', this.freelancerData.skype);
                formData.append('audioType', 'uploaded');

                this.clearErros();

                axios.post( '/freelancer/apply/register_business',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        onUploadProgress: function( progressEvent ) {
                            this.uploadPercentage = parseInt( Math.round( ( progressEvent.loaded * 100 ) / progressEvent.total ) );
                        }.bind(this)
                    }
                ).then((response)=>{
                    if(response.data.errors){
                        this.updateErrors(response.data.errors);
                        this.isLoading = false;
                    }else{
                        window.location.href = '/freelancer/workforce/success';
                    }
                });
            },
            changesSaved(){
                // changes saved :
                $('#changesSaved').fadeIn('slow');
                setTimeout(function () {
                    $('#changesSaved').fadeOut();
                },2000);
            },
            clearErros(){
                this.errors= {
                    'firstName':'',
                    'lastName':'',
                    'phone':'',
                    'email':'',
                    'whatsapp':'',
                    'skype':'',
                }
            },
            setUploadMethod(method){
                this.uploadMethod = method;
            },
            clearUploadMethod(){
                this.uploadMethod = '' ;
            },
            loadingBtn(){
                $('#loadingBtn').removeClass('d-none');
                $('#saveAudio').addClass('d-none');
            },
            updateErrors(responseErrors){
                if(responseErrors.email){
                    this.errors.email = responseErrors.email[0];
                }
                if(responseErrors.firstName){
                    this.errors.firstName = responseErrors.firstName[0];
                }
                if(responseErrors.lastName){
                    this.errors.lastName = responseErrors.lastName[0];
                }
                if(responseErrors.phone){
                    this.errors.phone = responseErrors.phone[0];
                }
                if(responseErrors.skype){
                    this.errors.skype = responseErrors.skype[0];
                }
                if(responseErrors.whatsapp){
                    this.errors.whatsapp = responseErrors.whatsapp[0];
                }

            },

        },
        mounted(){
        }
    }
</script>

<style>
    .loader {
        border: 15px solid lightblue;
        border-radius: 50%;
        border-top: 15px solid #3498db;
        width: 150px;
        height: 150px;
        margin-right: 25px;
        margin-top: 50px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    @media only screen and (max-width: 600px){
        .recorder_wrapper_phone{
            width:300px;
        }
    }
</style>