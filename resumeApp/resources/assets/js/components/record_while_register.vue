<template>
    <div>
        <form action="/freelancer/workforce/register_business" method="post" @submit.prevent="submitForm">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstName" class="panelFormLabel">First Name *</label>
                        <input id="firstName" type="text" class="panelFormInput form-control" name="firstName" v-model="freelancerData.firstName" required autofocus>
                        
                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.firstName }}</strong>
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastName" class="panelFormLabel">Last Name *</label>
                        <input id="lastName" type="text" class="panelFormInput form-control " name="lastName" v-model="freelancerData.lastName" required autofocus>
                       
                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.lastName }}</strong>
                        </span>
                       

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="panelFormLabel">Email *</label>

                        <input id="email" type="email" class="panelFormInput form-control" name="email" v-model="freelancerData.email" required>

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{errors.email}}</strong>
                        </span>
                    </div> <!-- email -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone" class="panelFormLabel">Phone *</label>

                        <input id="phone" type="tel" class="panelFormInput form-control" name="phone" v-model="freelancerData.phone" required>

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.phone }}</strong>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="whatsapp" class="panelFormLabel">Whatsapp</label>
                        <input id="whatsapp" type="text" class="panelFormInput form-control" v-model="freelancerData.whatsapp" name="whatsapp">


                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.whatsapp }}</strong>
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="skype" class="panelFormLabel">Skype</label>
                        <input id="skype" type="text" class="panelFormInput form-control" v-model="freelancerData.skype" name="skype">

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.skype }}</strong>
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="row">

                <div class="form-group">
                    <div class="col-md-12 text-left panelFormLabel">
                        Please upload / record a short audio recording describing your previous experience in Customer service and
                        Sales ( Ideal recording length from 1 - 2 minutes )
                    </div>
                </div>

                <div class="form-group col-md-12" v-show="uploadMethod.length < 1">
                    <div class="panelFormLabel" style="padding-bottom: 15px;">
                        Please choose uploading method :
                    </div>
                    <!-- when there is no src and no upload method was chosen we give them to choose.-->
                    <a href="javascript:void(0)" class="btn btn-primary" @click="setUploadMethod('upload')">Upload audio file</a>
                    <a href="javascript:void(0)" class="btn btn-primary" @click="setUploadMethod('record')">Record audio</a>
                    <a href="javascript:void(0)" class="btn btn-primary" @click="setUploadMethod('url')">GDrive URL</a>
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
                <div id="recordAudio" class="form-group col-md-12" v-show="uploadMethod == 'record'">
                    <div class="recorder_wrapper">
                        <div class="recorder">
                            <div id="recordImg">
                                <img src="/resumeApp/resources/assets/images/Microphone_1.png" alt="mic" width="30px">
                            </div>
                            <p id="record_status"></p>
                            <div class="NoDecor">
                                <a href="javascript:void(0)" id="startRecord" class="btn btn-default">New record</a>
                                <a href="javascript:void(0)" id="stopAudio" style="padding-top: 20px;" class="d-none">Stop</a>
                                <br>
                                <a href="javascript:void(0)" id="playAudio" class="d-none">Play</a><br/>
                                <a href="javascript:void(0)" id="downloadAudio" class="d-none">Download</a><br/>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="urlToAudio" class="form-group col-md-12" v-show="uploadMethod == 'url'">
                    <label class="panelFormLabel">Link from Google drive :</label>
                    <input type="text" class="form-control panelFormInput" v-model="toBeEditedRecord.src">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="javascript:void(0)" class="btn btn-primary" @click="clearUploadMethod" v-show="uploadMethod.length > 0"> Back </a>
                    <div class="form-group">
                        <div class="buttonMain text-center">
                            <a href="javascript:void(0)" style="padding: 15px 100px 15px 100px;" @click="submitForm" class="hireBtn" v-show="uploadMethod != 'record'" v-bind:disabled="toBeEditedRecord.src.length < 1 && !fileChosen">
                                Apply
                            </a>

                            <a class="hireBtn" style="padding: 15px 100px 15px 100px; color:white!important;" id="saveAudio" @click="loadingBtn" v-show="uploadMethod == 'record'">
                                Apply
                            </a>
                            <button disabled id="loadingBtn" class="d-none btn btn-primary" style="border: none">Uploading..</button>
                        </div>
                        <div class="text-center">
                            <div class="smallText">
                                <br/>Already have an account?
                                <span>
                                <a href="/freelancer/login"> Log in!</a>
                            </span>
                            </div>
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
                file: '',
                fileChosen: false,
                uploadPercentage: 0,
                uploadMethod: '',
                toBeEditedRecord: {
                    'src': ''
                },
                errors: {
                    'firstName':'',
                    'lastName':'',
                    'phone':'',
                    'email':'',
                    'whatsapp':'',
                    'skype':'',
                },
                freelancerData:{
                    'id':'',
                    'firstName':'',
                    'lastName':'',
                    'phone':'',
                    'email':'',
                    'whatsapp':'',
                    'skype':'',
                }
            }
        },
        methods:{
            handleFileUpload(){
                this.file = this.$refs.file.files[0];
                this.fileChosen = true;
            },
            submitForm(){
                let formData = new FormData();
                formData.append('audioFile', this.file);
                formData.append('src', this.toBeEditedRecord.src);
                formData.append('title', 'Business support application');
                formData.append('transcription',"");
                formData.append('firstName', this.freelancerData.firstName);
                formData.append('lastName', this.freelancerData.lastName);
                formData.append('email', this.freelancerData.email);
                formData.append('phone', this.freelancerData.phone);
                formData.append('whatsapp', this.freelancerData.whatsapp);
                formData.append('skype', this.freelancerData.skype);
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
                        console.log(response.data);
                    }else{
                        alert('success');
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