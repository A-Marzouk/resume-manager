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
                            <div class="processBar"></div>
                        </div>
                    </div>
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
                            <div class="faq-input" :class="{ 'error-input' : errors.first_name}">
                                <input
                                    v-model="agent.first_name"
                                    v-on:keyDown="checkDataIsNotEmpty"
                                    type="text"
                                    name="faq"
                                    placeholder="Jose" >
                                <img
                                v-show="agent.first_name"
                                v-on:click="clearInput('first_name')"
                                src="/images/client/campaign_activity/close_black.png"
                                alt="delete icon">
                            </div>
                            <div class="error" v-if="showErrors && errors.first_name">
                                {{errors.first_name}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your surname
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.last_name}">
                                <input
                                    v-model="agent.last_name"
                                    type="text"
                                    name="faq"
                                    placeholder="Quintero"
                                    v-on:keyDown="checkDataIsNotEmpty">
                                <img
                                    v-show="agent.last_name"
                                    v-on:click="clearInput('last_name')"
                                    src="/images/client/campaign_activity/close_black.png"
                                    alt="delete icon">
                            </div>
                            <div class="error" v-if="showErrors && errors.last_name">
                                {{errors.last_name}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Choose your gender
                            </label>
                            <div class="img-container">
                                <div class="faq-input" :class="{ 'error-input' : errors.gender}">
                                    <img v-on:click="agent.gender = 'M'"
                                        :src="`/images/icons/${(agent.gender === 'M') ? 'male_icon_pressed' : 'male_icon'}.svg`">
                                    <img v-on:click="agent.gender = 'F'"
                                        :src="`/images/icons/${(agent.gender === 'F') ? 'female_icon_pressed' : 'female_icon'}.svg`">
                                </div>
                            </div>
                            <div class="error" v-if="showErrors && errors.gender">
                                {{errors.gender}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your phone number
                            </label>
                            <div class="faq-input" :class="{'error-input': errors.phone}">
                                <!-- <flag-dropdown> -->
                                    <input
                                        v-model="agent.phone"
                                        type="text"
                                        name="phone"
                                        placeholder="123-3534634"
                                        v-on:keyDown="checkDataIsNotEmpty">
                                    <img
                                        v-show="agent.phone"
                                        v-on:click="clearInput('phone')"
                                        src="/images/client/campaign_activity/close_black.png"
                                        alt="delete icon">
                                <!-- </flag-dropdown>                     -->
                            </div>
                            <div class="error" v-if="showErrors && errors.phone">
                                {{errors.phone}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your e-mail
                            </label>
                            <div class="faq-input" :class="{'error-input': errors.email}">
                                <input
                                    v-model="agent.email"
                                    type="text"
                                    name="faq"
                                    placeholder="123456@gmail.com"
                                    v-on:keyDown="checkDataIsNotEmpty">
                                <img
                                    v-show="agent.email"
                                    v-on:click="clearInput('email')"
                                    src="/images/client/campaign_activity/close_black.png"
                                    alt="delete icon">
                            </div>
                            <div class="error" v-if="showErrors && errors.email">
                                {{errors.email}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Select your time zone
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.timeZone}">
                                <div class="select-icon"></div>
                                <select
                                    class="form-control"
                                    id="timeZone"
                                    name="timeZone"
                                    style="height: 50px;"
                                    v-model="agent.timeZone"
                                    v-on:change="checkDataIsNotEmpty">
                                    <option value="" selected="selected">Select your timezone</option>
                                    <option value="(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima">(GMT -5:00) Eastern
                                        Time (US & Canada), Bogota, Lima
                                    </option>
                                    <option value="(GMT -6:00) Central Time (US & Canada), Mexico City">(GMT -6:00) Central Time
                                        (US & Canada), Mexico City
                                    </option>
                                    <option value="(GMT -7:00) Mountain Time (US & Canada)">(GMT -7:00) Mountain Time (US &
                                        Canada)
                                    </option>
                                    <option value="(GMT -8:00) Pacific Time (US & Canada)">(GMT -8:00) Pacific Time (US &
                                        Canada)
                                    </option>
                                    <option value="(GMT -9:00) Alaska">(GMT -9:00) Alaska</option>
                                    <option value="">--------------</option>
                                    <option value="(GMT -12:00) Eniwetok, Kwajalein">(GMT -12:00) Eniwetok, Kwajalein</option>
                                    <option value="(GMT -11:00) Midway Island, Samoa">(GMT -11:00) Midway Island, Samoa</option>
                                    <option value="(GMT -10:00) Hawaii">(GMT -10:00) Hawaii</option>
                                    <option value="(GMT -9:30) Taiohae">(GMT -9:30) Taiohae</option>
                                    <option value="(GMT -9:00) Alaska">(GMT -9:00) Alaska</option>
                                    <option value="(GMT -8:00) Pacific Time (US & Canada)">(GMT -8:00) Pacific Time (US &
                                        Canada)
                                    </option>
                                    <option value="(GMT -7:00) Mountain Time (US & Canada)">(GMT -7:00) Mountain Time (US &
                                        Canada)
                                    </option>
                                    <option value="(GMT -6:00) Central Time (US & Canada), Mexico City">(GMT -6:00) Central Time
                                        (US & Canada), Mexico City
                                    </option>
                                    <option value="(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima">(GMT -5:00) Eastern
                                        Time (US & Canada), Bogota, Lima
                                    </option>
                                    <option value="(GMT -4:30) Caracas">(GMT -4:30) Caracas</option>
                                    <option value="(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz">(GMT -4:00) Atlantic
                                        Time (Canada), Caracas, La Paz
                                    </option>
                                    <option value="(GMT -3:30) Newfoundland">(GMT -3:30) Newfoundland</option>
                                    <option value="(GMT -3:00) Brazil, Buenos Aires, Georgetown">(GMT -3:00) Brazil, Buenos
                                        Aires, Georgetown
                                    </option>
                                    <option value="(GMT -2:00) Mid-Atlantic">(GMT -2:00) Mid-Atlantic</option>
                                    <option value="(GMT -1:00) Azores, Cape Verde Islands">(GMT -1:00) Azores, Cape Verde
                                        Islands
                                    </option>
                                    <option value="(GMT +0:00) Western Europe Time, London, Lisbon, Casablanca">(GMT +0:00)
                                        Western Europe Time, London, Lisbon, Casablanca
                                    </option>
                                    <option value="(GMT +1:00) Brussels, Copenhagen, Madrid, Paris">(GMT +1:00) Brussels,
                                        Copenhagen, Madrid, Paris
                                    </option>
                                    <option value="(GMT +2:00) Kaliningrad, South Africa">(GMT +2:00) Kaliningrad, South
                                        Africa
                                    </option>
                                    <option value="(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg">(GMT +3:00) Baghdad,
                                        Riyadh, Moscow, St. Petersburg
                                    </option>
                                    <option value="(GMT +3:30) Tehran">(GMT +3:30) Tehran</option>
                                    <option value="(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi">(GMT +4:00) Abu Dhabi, Muscat,
                                        Baku, Tbilisi
                                    </option>
                                    <option value="(GMT +4:30) Kabul">(GMT +4:30) Kabul</option>
                                    <option value="(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent">(GMT +5:00)
                                        Ekaterinburg, Islamabad, Karachi, Tashkent
                                    </option>
                                    <option value="(GMT +5:30) Bombay, Calcutta, Madras, New Delhi">(GMT +5:30) Bombay,
                                        Calcutta, Madras, New Delhi
                                    </option>
                                    <option value="(GMT +5:45) Kathmandu, Pokhara">(GMT +5:45) Kathmandu, Pokhara</option>
                                    <option value="(GMT +6:00) Almaty, Dhaka, Colombo">(GMT +6:00) Almaty, Dhaka, Colombo
                                    </option>
                                    <option value="(GMT +6:30) Yangon, Mandalay">(GMT +6:30) Yangon, Mandalay</option>
                                    <option value="(GMT +7:00) Bangkok, Hanoi, Jakarta">(GMT +7:00) Bangkok, Hanoi, Jakarta
                                    </option>
                                    <option value="(GMT +8:00) Beijing, Perth, Singapore, Hong Kong">(GMT +8:00) Beijing, Perth,
                                        Singapore, Hong Kong
                                    </option>
                                    <option value="(GMT +8:45) Eucla">(GMT +8:45) Eucla</option>
                                    <option value="(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk">(GMT +9:00) Tokyo, Seoul,
                                        Osaka, Sapporo, Yakutsk
                                    </option>
                                    <option value="(GMT +9:30) Adelaide, Darwin">(GMT +9:30) Adelaide, Darwin</option>
                                    <option value="(GMT +10:00) Eastern Australia, Guam, Vladivostok">(GMT +10:00) Eastern
                                        Australia, Guam, Vladivostok
                                    </option>
                                    <option value="(GMT +10:30) Lord Howe Island">(GMT +10:30) Lord Howe Island</option>
                                    <option value="(GMT +11:00) Magadan, Solomon Islands, New Caledonia">(GMT +11:00) Magadan,
                                        Solomon Islands, New Caledonia
                                    </option>
                                    <option value="(GMT +11:30) Norfolk Island">(GMT +11:30) Norfolk Island</option>
                                    <option value="(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka">(GMT +12:00) Auckland,
                                        Wellington, Fiji, Kamchatka
                                    </option>
                                    <option value="(GMT +12:45) Chatham Islands">(GMT +12:45) Chatham Islands</option>
                                    <option value="(GMT +13:00) Apia, Nukualofa">(GMT +13:00) Apia, Nukualofa</option>
                                    <option value="(GMT +14:00) Line Islands, Tokelau">(GMT +14:00) Line Islands, Tokelau
                                    </option>
                                </select>
                            </div>
                            <div class="error" v-if="showErrors && errors.timeZone">
                                {{errors.timeZone}}
                            </div>
                        </div>
                    </div>
                    <div class="faq-question-input account-edit-input">
                        <label class="faq-input-label">
                            Enter your city name
                        </label>
                        <div class="faq-input" :class="{'error-input': errors.city}">
                            <input
                                v-model="agent.city"
                                type="text"
                                name="faq"
                                placeholder="London"
                                v-on:keyDown="checkDataIsNotEmpty">
                            <img
                                v-show="agent.city"
                                v-on:click="clearInput('city')"
                                src="/images/client/campaign_activity/close_black.png"
                                alt="delete icon">
                        </div>
                        <div class="error" v-if="showErrors && errors.city">
                            {{errors.city}}
                        </div>
                    </div>
                    <div class="faq-question-input account-edit-input">
                        <label class="faq-input-label">
                            Enter your PayPal acc number
                        </label>
                        <div class="faq-input" :class="{'error-input': errors.paypal}">
                            <input
                                v-model="agent.paypal"
                                type="text"
                                name="faq"
                                placeholder="9128412945"
                                v-on:keyDown="checkDataIsNotEmpty">
                            <img
                                v-show="agent.paypal"
                                v-on:click="clearInput('paypal')"
                                src="/images/client/campaign_activity/close_black.png"
                                alt="delete icon">
                        </div>
                        <div class="error" v-if="showErrors && errors.paypal">
                            {{errors.paypal}}
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
                            <div class="faq-input" :class="{'error-input': errors.password}">
                                <input v-model="password" type="text" name="faq" placeholder="Enter your password" >
                                <img
                                    v-show="password"
                                    v-on:click="password = ''"
                                    src="/images/client/campaign_activity/close_black.png"
                                    alt="delete icon">
                            </div>
                            <div class="error" v-if="showErrors && errors.password">
                                {{errors.password}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Repeat your new password
                            </label>
                            <div class="faq-input" :class="{'error-input': errors.password_confirmation}">
                                <input v-model="password_confirmation" type="text" name="faq" placeholder="Confirm your password" >
                                <img 
                                    v-show="password_confirmation"
                                    v-on:click="password_confirmation = ''"
                                    src="/images/client/campaign_activity/close_black.png"
                                    alt="delete icon">
                            </div>
                            <div class="error" v-if="showErrors && errors.password_confirmation">
                                {{errors.password_confirmation}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="account-edit-section-edit-btn no-decoration"
                    :class="{'disabled-btn' : !canSubmit}"
                >
                    <a class="btn-primary"
                        v-on:click="submitData"
                        href="#"
                    >
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
        components: {
            "flag-dropdown": flagDropdown
        },
        props: ['agentData'],
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
                if (this.password !== this.password_confirmation) {
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
          },
          "agent.phone": function (val) {
              if (val === "") this.canSubmit = false
          },
          "agent.first_name": function (val) {
              if (val === "") this.canSubmit = false
          },
          "agent.last_name": function (val) {
              if (val === "") this.canSubmit = false
          },
          "agent.email": function (val) {
              if (val === "") this.canSubmit = false
          },
          "agent.timezone": function (val) {
              if (val === "") this.canSubmit = false
          },
          "agent.paypal": function (val) {
              if (val === "") this.canSubmit = false
          }
      },

      mounted () {
          console.log(this.agentData)
          this.agent = { ...this.agent, ...this.agentData }
          let component  = this;

            let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            dropZone = new Dropzone("#drop-profile-picture" , {
                maxFilesize: 45,
                dictDefaultMessage: '',
                dictRemoveFile: 'DELETE THE PHOTO',
                dictCancelUpload: '',
                url: '/freelancer/edit/avatar/',
                // headers: {
                //     'x-csrf-token': CSRF_TOKEN
                // },
                paramName: 'photo',
                addRemoveLinks: true,
                uploadMultiple: false,
                init: function () {
                    this.on('addedfile', (file) => {
                        console.log('addedfile event');
                        component.uploadFile(file);
                        // file.previewElement.innerHTML = "";
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

<style lang="scss" scoped>

.processBar{
    height: 6px;
    background: lightgreen;
    width: 0%;
    bottom: -15px;
    position: absolute;
}

</style>