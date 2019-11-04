<template>
    <div class="d-flex justify-content-center">
        <div class="account-info-edit-wrapper">
            <nav class="navbar navbar-light fixed-top dashboard_navbar">
                <div class="backBtn">
                    <a href="/freelancer/dashboard/my-account">
                        <img src="/images/client/arrow_back.png" alt="back-icon">
                    </a>
                    YOUR PERSONAL INFORMATION
                </div>
            </nav>

            <div class="account-info-edit dashboard-box">
                <div class="account-info-edit-heading dashboard-box-heading">
                    <div class="left">
                        <img src="/images/dashboard/info.svg" alt="info icon">
                        <span>
                        EDIT YOUR PERSONAL INFORMATION
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
                            <div id="drop-profile-picture" class="dropzone"></div>
                        </div>
                    </div>
                    <div class="processBar"></div>
                </div>

                <div class="account-edit-section">
                    <div class="account-edit-section-heading">
                        PERSONAL INFORMATION
                    </div>
                    <div class="account-edit-section-inputs">
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your name
                            </label>
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="Jose" >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your surname
                            </label>
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="Quintero" >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Choose your gender
                            </label>
                            <div class="img-container">
                                <div class="faq-input">    
                                    <img src="/images/client/add_agent/gender/male_icon.png">
                                    <img src="/images/client/add_agent/gender/female_icon.png">
                                </div>
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your phone number
                            </label>
                            <div class="faq-input">
                                <flag-dropdown>
                                    <input type="text" name="phone" placeholder="123-3534634">
                                    <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                                </flag-dropdown>                    
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your e-mail
                            </label>
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="123456@gmail.com" >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Select your time zone
                            </label>
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="Enter your ..." >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                            </div>
                        </div>
                    </div>
                    <div class="faq-question-input account-edit-input">
                        <label class="faq-input-label">
                            Enter your city name
                        </label>
                        <div class="faq-input">
                            <input type="text" name="faq" placeholder="London" >
                            <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                        </div>
                    </div>
                    <div class="faq-question-input account-edit-input">
                        <label class="faq-input-label">
                            Enter your PayPal acc number
                        </label>
                        <div class="faq-input">
                            <input type="text" name="faq" placeholder="9128412945" >
                            <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                        </div>
                    </div>
                </div>
                <div class="account-edit-section sub-section">
                    <div class="account-edit-section-heading">
                        PASSWORD
                    </div>
                    <div class="account-edit-section-inputs">
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Write a new password
                            </label>
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="Enter your ..." >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Repeat your new password
                            </label>
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="Enter your ..." >
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="account-edit-section-edit-btn no-decoration">
                    <a class="btn-primary" href="#">
                        SAVE EDITS
                    </a>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import flagDropdown from '../../../flagsDropdown.vue'
    import axios from 'axios'

    let dropZone

    export default {
      data(){
          return {
              agent:{
                  first_name: '',
                  last_name: '',
                  email: '',
                  timezone: '',
                  phone: '',
                  gender: '',
                  city: '',
                  paypal_acc_number: '',
                  avatar: null
              },
              errors: {
                name: '',
                last_name: '',
                email: '',
                timezone: '',
                phone: '',
                gender: '',
                city: '',
                paypal: '',
                password: '',
                password_confirmation: '',
              },
              password: '',
              password_confirmation: '',
              showErrors: false,
              canSubmit: false
          }
      },
      methods:{
            noErrors () {
                let noErrorsName = this.noErrorsName()
                let noErrorslast_name = this.noErrorslast_name()
                let noErrorsEmail = this.noErrorsEmail()
                let noErrorsPaypal = this.noErrorsPaypal()
                let noErrorsGender = this.noErrorsGender()
                let noErrorsPhone = this.noErrorsPhone()
                let noErrorsCity = this.noErrorsCity()
                let noErrorsTimeZone = this.noErrorsTimeZone()
                let noErrorsPassword = this.noErrorsPassword()

                return (
                    noErrorsName &&
                    noErrorslast_name &&
                    noErrorsEmail &&
                    noErrorsPaypal &&
                    noErrorsGender &&
                    noErrorsPhone &&
                    noErrorsCity &&
                    noErrorsTimeZone &&
                    noErrorsPassword
                )
            },
            noErrorsName () {
                let valid = true
                
                // Empty field
                if (this.agent.first_name.trim() === '') {
                    valid = false;
                    this.errors.first_name = 'Please fill this field'
                } else {
                    this.errors.first_name = ''
                }

                return valid
            },
            noErrorslast_name () {
                let valid = true
                
                // Empty field
                if (this.agent.last_name.trim() === '') {
                    valid = false;
                    this.errors.last_name = 'Please fill this field'
                } else {
                    this.errors.last_name = ''
                }

                return valid
            },
            noErrorsEmail () {
                let valid = true
                let emailRegex = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/g

                if (!emailRegex.test(this.agent.email)) {
                    valid = false;
                    this.errors.email = 'Invalid email format'
                } else {
                    this.errors.email = ''
                }

                return valid
            },

            noErrorsGender () {
                let valid = true

                if (this.agent.gender === "") {
                    valid = false
                    this.errors.gender = "Please select a gender"
                } else this.errors.gender = ""

                return valid
            },

            noErrorsPhone () {
                let valid = true
                let phoneFormat = /\+[0-9]{1,3}-[0-9]{10}/g

                if (this.agent.phone.trim() === '') {
                    // Empty field
                    valid = false
                    this.errors.phone = 'Please enter your phone number'
                } else if (!phoneFormat.test(this.agent.phone)) {
                    // Review the regExp
                    valid = false
                    this.errors.phone = 'This not a valid phone number format'
                } else this.errors.phone = ''

                return valid
            },
            noErrorsPaypal () {
                let valid = true


                if (this.agent.paypal_acc_number.trim() === '') {
                    valid = false
                    this.errors.paypal = 'Please fill this field'
                } else if (!/\d{9}/g.test(this.agent.paypal_acc_number)) {
                    valid = false
                    this.errors.paypal = 'This is not a valid paypal ID'
                } else {
                    this.errors.paypal = ''
                }

                return valid
            },
            noErrorsTimeZone () {
                let valid = true

                if (this.agent.timezone === '') {
                    valid = false
                    this.errors.timezone = 'Select a timezone'
                } else {
                    this.errors.timezone = ''
                }

                return valid
            },
            noErrorsCity () {
                let valid = true

                if (this.agent.city.trim === '') {
                    valid = false
                    this.errors.city = 'Please fill this field'
                } else {
                    this.errors.city = ''
                }

                return valid
            },
            noErrorsPassword() {
                let valid = true;

                // Empty field
                if (this.password.trim() !== this.password_confirmation.trim()) {
                    valid = false;
                    this.errors.password = 'Password doesn\'t match';
                } else {
                    this.errors.password = '';
                }

                return valid
            },

            submitData () {

                if (this.noErrors()) {
                    // send data to backend
                    
                    // Fix this bug
                    this.agent.timezone = 1

                    axios
                        .post('/freelancer/account/edit', {
                            ...this.agent
                        })
                        .then(res => {
                            if (res.data.status === "sucess") window.location.reload()
                        })
                        .catch(err => console.log(err))

                } else this.showErrors = true
            },
            clearInput(name) {
                this.agent[name] = ''
            },
            checkDataIsNotEmpty () {
                let canSubmit = true

                Object.keys(this.agent).forEach((key, index) => {
                    if (this.agent[key] === "") canSubmit = false
                })

                this.canSubmit = canSubmit
            },
            uploadFile (file) {
                console.log(file)
                this.avatar = file

                // upload the file as soon as it is added :
                let formData = new FormData();
                formData.append('avatar', file);
                axios.post('/freelancer/edit/avatar',
                    formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        onUploadProgress: function(progressEvent) {
                            this.uploadPercentage = parseInt(Math.round((progressEvent.loaded * 100) / progressEvent.total));
                            $('.processBar').css('width',this.uploadPercentage+'%');
                        }.bind(this)
                    }
                ).then((response) => {
                    this.uploadPercentage = 0 ;
                    $('.processBar').css('width',0);

                    if(response.data.filePath === null){
                        let notificationMessage = 'File is not accepted !';
                        this.$emit('showNegativeNotification',notificationMessage);
                        if (this.agent.avatar.length === 0) dropZone.removeAllFiles();
                    }else{
                        this.$emit('showPositiveNotification','File has been successfully uploaded!');
                        this.agent.avatar = response.data.file;
                    }

                }).catch((error) => {

                });
            }
      },

      watch: {
          "agent.gender": function (val) {
              if (val === "") this.canSubmit = false
          }
      },

      mounted () {
          this.agent = { ...this.agent, ...this.agentData }
          let component  = this;

            let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            dropZone = new Dropzone("#drop-profile-picture" , {
                maxFilesize: 45,
                dictDefaultMessage: '',
                dictRemoveFile: '',
                dictCancelUpload: '',
                url: '/freelancer/edit/avatar/',
                autoProcessQueue:false,
                headers: {
                    'x-csrf-token': CSRF_TOKEN
                },
                paramName: 'files',
                addRemoveLinks: false,
                addImage: false,
                uploadMultiple: false,
                init: function () {
                    this.on('addedfile', (file) => {
                        console.log('addedfile event');
                        component.uploadFile(file);
                        file.previewElement.innerHTML = "";
                        $('.dz-message').hide()
                        $('.dz-input').hide()
                        $('#dropbox').addClass('file-upload')
                    });

                    this.on('error', (error) => console.log(error))
    
                    this.on('removedfile', (file) => {
                        $('.dz-message').show()
                        $('.dz-input').show()
                        $('#dropbox').removeClass('file-upload')
                    })
                }
            });
      }
    }
</script>

<style scoped>

.processBar{
    height: 6px;
    background: lightgreen;
    width: 0%;
}

</style>