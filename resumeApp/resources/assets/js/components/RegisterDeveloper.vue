<template>
    <div :class="{loader : isLoading}" id="loaderArea">
        <form action="/freelancer/workforce/register_business" :class="{'d-none' : isLoading}" id="businessRegisterForm"
              method="post" @submit.prevent="submitForm">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="business_firstName" class="panelFormLabel">First name *</label>
                        <input id="business_firstName" type="text" class="panelFormInput form-control" name="firstName"
                               v-model="freelancerData.firstName" required autofocus>

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.firstName }}</strong>
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="business_lastName" class="panelFormLabel">Last name *</label>
                        <input id="business_lastName" type="text" class="panelFormInput form-control " name="lastName"
                               v-model="freelancerData.lastName" required autofocus>

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

                        <input id="business_email" type="email" class="panelFormInput form-control" name="email"
                               v-model="freelancerData.email" required>

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{errors.email}}</strong>
                        </span>
                    </div> <!-- email -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="business_phone" class="panelFormLabel">Phone *</label>

                        <input id="business_phone" type="tel" class="panelFormInput form-control" name="phone"
                               v-model="freelancerData.phone" required>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="whatsapp"
                                   v-model="freelancerData.whatsapp">
                            <label class="form-check-label" for="whatsapp">Whatsapp</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="telegram"
                                   v-model="freelancerData.telegram">
                            <label class="form-check-label" for="telegram">Telegram</label>
                        </div>

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.phone }}</strong>
                        </span>
                    </div>
                </div>
            </div>

            <hr>
            <h5 class="panelFormLabel">Main skills</h5><br/>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="programming_language" class="panelFormLabel">Primary programming language *</label>
                        <select id="programming_language" class="panelFormInput form-control"
                                v-model="freelancerData.programming_language" name="programming_language" required>
                            <option value="">Programming language</option>
                            <option v-for="(language, index) in customValues.programmingLanguages" :value="language"
                                    :key="language + index">{{language}}
                            </option>
                        </select>

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.programming_language }}</strong>
                        </span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="framework" class="panelFormLabel">Primary Framework / Library *</label>
                        <select id="framework" class="panelFormInput form-control"
                                v-model="freelancerData.framework" name="programming_language">
                            <option value="">Primary Framework / Library</option>
                            <option v-for="(framework, index) in customValues.frameworks" :value="framework"
                                    :key="framework + index">{{framework}}
                            </option>
                        </select>

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.framework }}</strong>
                        </span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="database" class="panelFormLabel">Primary Database *</label>
                        <select id="database" class="panelFormInput form-control"
                                v-model="freelancerData.database" name="database">
                            <option value="">Database</option>
                            <option v-for="(database, index) in customValues.databases" :value="database"
                                    :key="database + index">{{database}}
                            </option>
                        </select>

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.database }}</strong>
                        </span>
                    </div>
                </div>
            </div>

            <hr>

            <h5 class="panelFormLabel">Professional info</h5><br/>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="hourly_rate" class="panelFormLabel">Hourly rate *</label>
                        <input id="hourly_rate" type="number" min="0" max="9999999" step="any"
                               class="panelFormInput form-control" v-model="freelancerData.hourly_rate" name="hourly_rate">

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.hourly_rate }}</strong>
                        </span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="monthly_rate" class="panelFormLabel">Monthly rate *</label>
                        <input id="monthly_rate" type="number" min="0" max="9999999" step="any"
                               class="panelFormInput form-control" v-model="freelancerData.monthly_rate" name="monthly_rate">

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.monthly_rate }}</strong>
                        </span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="available_hours" class="panelFormLabel">available hours *</label>
                        <input id="available_hours" type="number" min="0" max="9999999" step="any"
                               class="panelFormInput form-control" v-model="freelancerData.available_hours"
                               name="available_hours">

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.available_hours }}</strong>
                        </span>
                    </div>
                </div>


            </div>


            <hr>
            <h5 class="panelFormLabel">Social apps</h5><br/>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="business_skype" class="panelFormLabel">Skype</label>
                        <input id="business_skype" type="text" class="panelFormInput form-control"
                               v-model="freelancerData.skype" name="skype">

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.skype }}</strong>
                        </span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="business_linkedin" class="panelFormLabel">linkedin</label>
                        <input id="business_linkedin" type="text" class="panelFormInput form-control"
                               v-model="freelancerData.Linkedin" name="linkedin">

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.linkedin }}</strong>
                        </span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="business_instagram" class="panelFormLabel">Instagram</label>
                        <input id="business_instagram" type="text" class="panelFormInput form-control"
                               v-model="freelancerData.instagram" name="instagram">

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.instagram }}</strong>
                        </span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="business_github" class="panelFormLabel">Github</label>
                        <input id="business_github" type="text" class="panelFormInput form-control"
                               v-model="freelancerData.github" name="github">

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.github }}</strong>
                        </span>
                    </div>
                </div>
            </div>

            <hr>

            <h5 class="panelFormLabel">Password</h5><br/>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password" class="panelFormLabel">Password *</label>
                        <input id="password" type="password" class="panelFormInput form-control" name="password"
                               v-model="freelancerData.password" required autofocus>

                        <span style="width:100%;margin-top:.25rem;font-size:80%;color:#dc3545">
                            <strong>{{ errors.password }}</strong>
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password_confirmation" class="panelFormLabel">Password confirmation *</label>
                        <input id="password_confirmation" type="password" class="panelFormInput form-control" name="password_confirmation"
                               v-model="freelancerData.password_confirmation" required autofocus>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">

                <div class="form-group">
                    <div class="col-md-12 text-left panelFormLabel">
                        Please upload / record a short audio recording describing your previous experience as a developer ( Ideal recording length from 1 - 2 minutes ).
                        <br/>
                        <div style="width:100%;margin-top:.25rem;font-size:100%;color:#dc3545">
                            <strong>{{ errors.audioError }}</strong>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12" v-show="uploadMethod.length < 1">
                    <div class="panelFormLabel" style="padding-bottom: 15px;">
                        Please choose uploading method :
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-12" style="padding-top:10px;">
                            <a href="javascript:void(0)" class="btn btn-primary btn-block"
                               @click="setUploadMethod('upload')">Upload audio file</a>
                        </div>
                        <div class="col-md-4 col-12" style="padding-top:10px;">
                            <a href="javascript:void(0)" class="btn btn-primary btn-block"
                               @click="setUploadMethod('record')">Record audio</a>
                        </div>
                        <div class="col-md-4 col-12" style="padding-top:10px;">
                            <a href="javascript:void(0)" class="btn btn-primary btn-block"
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
                    <label class="panelFormLabel">Link to your record :</label>
                    <input type="text" class="form-control panelFormInput" v-model="toBeEditedRecord.src">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <a href="javascript:void(0)" class="btn btn-primary" @click="clearUploadMethod"
                       v-show="uploadMethod.length > 0"> Back </a>
                </div>
                <div class="col-12">
                    <hr>
                    <div class="form-group">
                        <input type="checkbox" @click="cv_included = !cv_included" name="cv_included"
                               v-model="cv_included">
                        Include resume (PDF)

                    </div>

                    <div class="form-group" v-show="cv_included">
                        <input type="file" id="cv" ref="cv_file" name="included_cv" v-on:change="handleCVUpload"/>
                    </div>
                    <span id="cv_included_value" class="d-none">{{cv_included}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <div class="buttonMain text-center">
                            <a href="javascript:void(0)" style="padding: 15px 100px 15px 100px;" @click="submitForm"
                               class="hireBtn" v-show="uploadMethod != 'record'"
                               v-bind:disabled="toBeEditedRecord.src.length < 1 && !fileChosen">
                                Apply
                            </a>

                            <a href="javascript:void(0)" class="hireBtn"
                               style="padding: 15px 100px 15px 100px; color:white!important;" @click="validateForm"
                               v-show="uploadMethod == 'record'">
                                Apply
                                <!--record-->
                            </a>
                            <a href="javascript:void(0)" class="d-none" id="saveAudioRegister"></a>
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
        data() {
            return {
                isLoading: false,
                file: '',
                cv_file: '',
                fileChosen: false,
                uploadPercentage: 0,
                uploadMethod: '',
                cv_included: false,
                toBeEditedRecord: {
                    'src': ''
                },
                customValues: {
                    programmingLanguages: [
                        'JavaScript',
                        'HTML/CSS',
                        'SQL',
                        'Python',
                        'Java',
                        'Bash/Shell/PowerShell',
                        'C#',
                        'PHP',
                        'TypeScript',
                        'C++',
                        'C',
                        'Ruby',
                        'Go',
                        'Swift',
                        'Kotlin',
                        'R',
                        'VBA',
                        'Objective-C',
                        'Assembly',
                        'Scala',
                        'Rust',
                    ],
                    frameworks: [
                        'jQuery',
                        'Angular/Angular.js',
                        'React.js',
                        'ASP.NET',
                        'Express',
                        'Spring',
                        'Vue.js',
                        'Django',
                        'Flask',
                        'Laravel',
                        'Ruby,on,Rails',
                        'Drupal',
                        'Node.js',
                        '.NET',
                        '.NET,Core',
                        'Pandas',
                        'React,Native',
                        'Ansible',
                        'TensorFlow',
                        'Unity,3D',
                        'Cordova',
                        'Xamarin',
                        'Apache,Spark',
                        'Hadoop',
                        'Flutter',
                        'Wordpress'
                    ],
                    databases: [
                        'MySQL',
                        'PostgreSQL',
                        'Microsoft,SQL,Server',
                        'SQLite',
                        'MongoDB',
                        'Redis',
                        'MariaDB',
                        'Oracle',
                        'Elasticsearch',
                        'Firebase',
                        'DynamoDB',
                        'Cassandra',
                        'Couchbase',
                    ],
                },
                errors: {
                    'firstName': '',
                    'lastName': '',
                    'phone': '',
                    'email': '',
                    'audioError': '',
                    'password': '',

                    'programming_language': '',
                    'framework': '',
                    'database': '',

                    'skype': '',
                    'instagram': '',
                    'linkedin': '',
                    'github': '',

                    'hourly_rate': '',
                    'available_hours': '',
                    'monthly_rate': '',
                },
                freelancerData: {
                    'id': '',
                    'firstName': '',
                    'lastName': '',
                    'phone': '',
                    'email': '',
                    'password': '',
                    'password_confirmation': '',

                    'whatsapp': false,
                    'telegram': false,

                    'skype': '',
                    'instagram': '',
                    'linkedin': '',
                    'github': '',

                    'programming_language': '',
                    'framework': '',
                    'database': '',

                    'hourly_rate': '',
                    'available_hours': '',
                    'monthly_rate': '',

                }
            }
        },
        methods: {
            handleFileUpload() {
                this.file = this.$refs.file.files[0];
                this.fileChosen = true;
            },
            handleCVUpload() {
                this.cv_file = this.$refs.cv_file.files[0];
            },
            validateForm() {
                let formData = new FormData();

                $.each( this.freelancerData, (field) => {
                    formData.append(field, this.freelancerData[field]);
                });

                this.clearErrors();
                this.isLoading = true;

                axios.post('/freelancer/workforce/developer_form/validate', formData).then((response) => {
                    console.log(response.data);
                    if (response.data.errors) {
                        this.updateErrors(response.data.errors);
                        this.isLoading = false;
                    } else {
                        $('#saveAudioRegister').click();
                        this.isLoading = true;
                    }
                });

            },
            submitForm() {
                if (this.toBeEditedRecord.src.length < 1 && this.file.length < 1) {
                    alert('Please upload the required record..');
                    return;
                }
                this.isLoading = true;
                let formData = new FormData();
                formData.append('audioFile', this.file);
                if (this.cv_file !== '') {
                    formData.append('included_cv', this.cv_file);
                }
                formData.append('cv_included', this.cv_included);
                formData.append('src', this.toBeEditedRecord.src);
                formData.append('title', 'Business support application (uploaded/link)');
                formData.append('transcription', "");
                formData.append('audioType', 'uploaded');


                $.each( this.freelancerData, (field) => {
                    if(!formData.has(field)){
                        formData.append(field, this.freelancerData[field]);
                    }
                });

                this.clearErrors();

                axios.post('/freelancer/apply/register_developer',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        onUploadProgress: function (progressEvent) {
                            this.uploadPercentage = parseInt(Math.round((progressEvent.loaded * 100) / progressEvent.total));
                        }.bind(this)
                    }
                ).then((response) => {
                    console.log(response.data);
                    if (response.data.errors) {
                        this.updateErrors(response.data.errors);
                        this.isLoading = false;
                    } else {
                        window.location.href = '/freelancer';
                    }
                });
            },
            changesSaved() {
                // changes saved :
                $('#changesSaved').fadeIn('slow');
                setTimeout(function () {
                    $('#changesSaved').fadeOut();
                }, 2000);
            },
            clearErrors() {
                $.each( this.errors , (error) => {
                    this.errors[error] = '' ;
                });

            },
            setUploadMethod(method) {
                this.uploadMethod = method;
            },
            clearUploadMethod() {
                this.uploadMethod = '';
            },
            loadingBtn() {
                $('#loadingBtn').removeClass('d-none');
                $('#saveAudio').addClass('d-none');
            },
            updateErrors(responseErrors) {
                $.each( this.errors , (error) => {
                    if(responseErrors[error]){
                        this.errors[error] = responseErrors[error][0];
                    }
                });
            },

        },
        mounted() {
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
        0% {
            -webkit-transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    @media only screen and (max-width: 600px) {
        .recorder_wrapper_phone {
            width: 300px;
        }
    }
</style>
