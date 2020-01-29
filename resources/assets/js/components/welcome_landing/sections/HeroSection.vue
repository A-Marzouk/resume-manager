<template>
    <div class="row hero-wrap">
        <div class="pa-0 head-bar col-sm-12 col-lg-12 col-12">
            <a href="#">
                <img src="/images/welcome_landing_page/icons/logo.png" alt="">
            </a>
        </div>
        <div class="pa-0 intro-section col-sm-12 col-lg-6 col-12">
            <h1>Make Your Online Resume</h1>
            <p>We believe that resume’s can look beautiful, we help freelancers, contractors &amp; jobseekers create
                stunning online resume’s.</p>
            <a href="#" class="btn-inset light__red hideOnTab"><i>Get started</i></a>
        </div>
        <div class="pa-0 form-wrap col-sm-12 col-lg-6 col-12">
            <div class="hold-form">
        <span class="title-form">
          Create new account
        </span>
                <div class="social-wrap">
                    <a href="/freelancer/register/instagram"><img src="/images/welcome_landing_page/icons/instagram.png" alt=""></a>
                    <a href="/freelancer/register/linkedin"><img src="/images/welcome_landing_page/icons/linkedin.png" alt=""></a>
                    <a href="/freelancer/register/google"><img src="/images/welcome_landing_page/icons/google.png" alt=""></a>
                    <a href="/freelancer/register/facebook"><img src="/images/welcome_landing_page/icons/facebook.png" alt=""></a>
                    <a href="/freelancer/register/github"><img src="/images/welcome_landing_page/icons/github.png" alt=""></a>
                </div>
                <span class="title-inline">
          or Sign Up with Email
        </span>
                <div class="v-form" ref="formSignup">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-12">
                                <div class="v-input v-input--has-state theme--light v-text-field v-text-field--is-booted v-text-field--placeholder error--text">
                                    <div class="v-input__control">
                                        <div class="v-input__slot">
                                            <div class="v-text-field__slot">
                                                <input name="email" required="required" id="input-9" class="w-100" placeholder="Email" type="text" style="padding-left: 20px;" v-model="formData.email"></div>
                                        </div>
                                        <div class="v-text-field__details" v-if="errors.email">
                                            <div class="v-messages theme--light error--text" role="alert">
                                                <div class="v-messages__wrapper">
                                                    <div class="v-messages__message">{{errors.email[0]}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12 col-12">
                                <div class="v-input v-input--has-state theme--light v-text-field v-text-field--is-booted v-text-field--placeholder error--text">
                                    <div class="v-input__control">
                                        <div class="v-input__slot">
                                            <div class="v-text-field__slot">
                                                <input name="password" required="required" id="input-10" placeholder="Password" type="password"  v-model="formData.password" class="w-100" style="padding-left: 20px;"></div>
                                        </div>
                                        <div class="v-text-field__details" v-if="errors.password">
                                            <div class="v-messages theme--light error--text" role="alert">
                                                <div class="v-messages__wrapper">
                                                    <div class="v-messages__message">{{errors.password[0]}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12 col-12 NoDecor">
                                <a href="javascript:void(0)" class="btn-inset light__blue full" @click="submitForm"><i>Sign up</i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="title-inline">Already have account? <a href="#">Login</a></span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                formData: {
                    name: 'Workforce agent',
                    email: '',
                    password: '',
                    password_confirmation: '',
                },
                canSubmit: true,
                errors: []
            }
        },
        methods: {
            getUserName(){
                return this.formData.email.substring(0,this.formData.email.lastIndexOf("@"));
            },
            submitForm() {
                this.canSubmit = false;
                if(this.referral_code){
                    this.formData.referral_code = this.referral_code ;
                }
                this.formData.name = this.getUserName();
                this.formData.password_confirmation = this.formData.password;
                axios.post('/freelancer/register', this.formData)
                    .then(response => {
                        window.location.href = '/dashboard';
                    })
                    .catch(error => {
                        this.canSubmit = true;
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },
            clearInput(inputName) {
                this.formData[inputName] = '';
            },
        },
        watch: {
            formData: {
                handler() {
                    // check if all formData values are filled
                    let values = Object.values(this.formData);
                    let isAll_filled = true;
                    for (const value of values) {
                        if (value.length < 1) {
                            isAll_filled = false;
                        }
                    }
                    this.canSubmit = isAll_filled;
                },
                deep: true
            }
        },
    };
</script>

<style lang="scss" scoped>
    .disabled-btn{
        background: lightgrey;
        border:none;
        cursor: not-allowed !important;
    }
    .hero-wrap {
        margin-bottom: 128px;

        @media screen and (max-width: 769px) {
            text-align: center;
            margin-bottom: 50px;

            .head-bar {
                margin-bottom: 65px;

                a {
                    img {
                        min-width: 316.4px;
                        max-height: 53px;
                    }
                }
            }

            .intro-section {

                h1 {
                    margin: 0 auto;
                    padding-top: 0;
                }

                p {
                    margin-bottom: 0px;
                }

            }

            .form-wrap {
                justify-content: center;
                max-width: 100%;

                .hold-form {
                    max-width: 90%;
                    width: 100%;
                    padding: 40px 0px;

                    .v-form {
                        width: 90%;
                    }

                    .social-wrap {
                        max-width: 90%;
                    }
                }

            }
        }

        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2) {

            .head-bar {
                margin-bottom: 45px;

                a {
                    img {
                        min-width: 240px;
                        max-width: 240px;
                    }
                }
            }

            .intro-section {
                h1 {
                    font-size: 50px;
                    line-height: 55px;
                }

                p {
                    font-size: 20px;
                    line-height: 30px;
                    margin: 0px 10px;
                }
            }
            .hold-form {
                .title-form {
                    font-size: 25px;
                    line-height: 30px;
                }


            }

            .social-wrap {

                width: 80%;

                a {
                    min-width: 45px;
                    min-height: 45px;
                }
            }

            .v-form {
                .container {
                    > .row {
                        flex-flow: column;
                    }
                }
            }


        }
        @media only screen and (min-device-width: 770px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 1) {
            .form-wrap {
                justify-content: center;
                max-width: 100%;
                align-items: center;
                margin-top: 3%;

                .hold-form {
                    max-width: 100%;
                }
            }
        }

    }

    .head-bar {
        margin-bottom: 100px;
    }

    .intro-section {
        h1 {
            padding-top: 90px;
            max-width: 580px;
        }

        p {
            padding: 30px 0px 45px 0px;
        }
    }

    .hold-form {
        max-width: 488px;
        padding: 40px;
        background: #F8F8F8;
        box-shadow: -6px -6px 16px #FFFFFF, 6px 6px 16px rgba(209, 205, 199, 0.4);
        border-radius: 15px;
        border: 2px solid #fff;
        justify-content: center;
        display: flex;
        flex-flow: column;
        align-items: center;

        .title-form {
            font-family: "Montserrat";
            font-style: normal;
            font-weight: 500;
            font-size: 30px;
            line-height: 37px;
            color: #0046FE;
        }

        .title-inline {
            font-family: "Montserrat";
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 20px;
            color: #575757;

            a {
                font-weight: bold;
                font-size: 18px;
                line-height: 22px;
                color: #0046FE;
                text-decoration: none;

                &:hover {
                    text-decoration: underline;
                }
            }
        }

        .container {
            background: none;
            max-width: 100%;
            padding: 0;
        }

        .v-text-field {

            font-family: "Montserrat";
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 20px;

        }

        .btn-inset {
            margin-bottom: 30px;
        }

        .col, .col-12 {
            padding: 0;
        }
    }


    .social-wrap {

        justify-content: space-between;
        display: flex;
        width: 100%;
        margin: 40px auto 55px auto;

        a {
            min-width: 56px;
            min-height: 56px;
            text-align: center;
            background: #F8F8F8;
            box-shadow: -6px -6px 16px #FFFFFF,
            6px 6px 16px rgba(209, 205, 199, 0.4);
            border-radius: 15px;
            align-items: center;
            justify-content: center;
            display: inline-flex;
            vertical-align: top;

            &:hover {
                box-shadow: -6px -6px 16px #FFFFFF,
                6px 6px 16px rgba(209, 205, 199, 0.4),
                inset 6px 4px 12px rgba(0, 0, 0, 0.25),
                inset -6px -4px 12px #FFFFFF;
                border: 1px solid #fff;
            }
        }
    }
</style>
