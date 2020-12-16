<template>
    <v-container style="width:100%" id="createAccount">
        <v-row align="center" justify="center">
            <v-col lg="8" xl="8" md="8" sm="11" cols="12">
                <v-card color="transparent" tile flat class="mt-md-0 mt-sm-0 mt-n5">
                    <v-card class="pa-xl-10 pa-lg-5 pa-md-5 pa-sm-5 card-login">
                        <v-card-subtitle align="center" class="create-new-account-text">Login</v-card-subtitle>

                        <v-card-subtitle>
                            <v-form ref="form" :lazy-validation="lazy" class="login-form">
                                <div class="input-div mt-md-0 mt-sm-0 mt-n3">
                                    <label style="line-height: 40px;">Email Address</label>
                                    <v-text-field
                                            dark
                                            color="primary"
                                            class="login-input"
                                            type="email"
                                            outlined
                                            :error="!!errors.email"
                                            :error-messages="errors.email"
                                            background-color="#ffffff"
                                            v-model="formData.email"
                                            :height="windowWidth<=599 ? '33.44' : '60'"
                                    ></v-text-field>
                                </div>

                                <div class="input-div mt-md-0 mt-sm-0 mt-n3">
                                    <label style="line-height: 40px;">Password</label> <a href="/password/reset" class="ml-2">Forgot?</a>
                                    <v-text-field
                                            dark
                                            color="primary"
                                            class="login-input"
                                            :type="fieldType"
                                            outlined
                                            :error="!!errors.password"
                                            :error-messages="errors.password"
                                            background-color="#ffffff"
                                            v-model="formData.password"
                                            :height="windowWidth<=599 ? '33.44' : '60'"
                                    >
                                        <template slot="append" class="show-password">
                                            <a href="javascript:void(0)">
                                                <img src="/icons/eye-blue.svg" alt="eye" style="width: 40px; height: 40px; margin-top: -8px !important;" @click="showPassword">
                                            </a>
                                        </template>
                                    </v-text-field>

                                </div>

                                <v-checkbox dense v-model="formData.remember" class="hidden-sm-only mt-n2">
                                    <template slot="label">
                                        <div class="agree-text">
                                            Remember Me
                                        </div>
                                    </template>
                                </v-checkbox>

                                <v-checkbox v-model="formData.remember"  class="d-none d-sm-flex d-md-none">
                                    <template slot="label">
                                        <div class="agree-text">
                                            Remember Me
                                        </div>
                                    </template>
                                </v-checkbox>
                                <div class="error--text error-custom-margin">{{errors.agreeCheck}}</div>

                                <v-btn color="#0046FE" class="btn-signup" @click="login">
                                    <span>Sign In</span>
                                </v-btn>
                            </v-form>
                        </v-card-subtitle>
                        <v-card-subtitle class="account-exists NoDecor">
                            Don't have an account?
                            <a href="/register">Register</a>
                        </v-card-subtitle>
                    </v-card>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        name: "LoginForm",
        data() {
            return {
                windowWidth: window.innerWidth,
                agreeCheck: false,
                fieldType: 'password',
                socialMediaIcons: [
                    {
                        id: 1,
                        title: "instagram",
                        width: 18,
                        tablet_width: 18,
                        link: "/register/instagram"
                    },
                    {
                        id: 2,
                        title: "linkedin",
                        width: 16,
                        tablet_width: 16,
                        link: "/register/linkedin"
                    },
                    {
                        id: 3,
                        title: "google",
                        width: 14,
                        tablet_width: 14,
                        link: "/register/google"
                    },
                    {
                        id: 4,
                        title: "facebook",
                        width: 18,
                        tablet_width: 18,
                        link: "/register/facebook"
                    },
                    {
                        id: 5,
                        title: "github",
                        width: 22,
                        tablet_width: 22,
                        link: "/register/github"
                    }
                ],
                formData: {
                    email: '',
                    password: '',
                    remember: false,
                },
                errors: {},
                lazy: false,
            }
        },
        methods:{
            login() {
                this.errors = {};
                axios.post('/client/login/submit', this.formData)
                    .then(response => {
                        if(response.data.status === 'success'){
                            window.location.href = '/client';
                        }
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
            getSocialIcon(title) {
                return `/icons/social/${title}.png`;
            },
            showPassword(){
                this.fieldType = 'text';
                setTimeout(()=> {
                    this.fieldType = 'password'
                },1000);
            }
        }
    }
</script>
