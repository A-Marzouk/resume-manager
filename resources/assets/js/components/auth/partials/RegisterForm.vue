<template>
    <v-container style="width:100%">
        <v-row align="center" justify="center">
            <v-col lg="8" xl="8" md="8" sm="11" cols="12">
                <v-card color="transparent" tile flat class="mt-md-0 mt-sm-0 mt-n5">
                    <v-card class="pa-xl-10 pa-lg-5 pa-md-5 pa-sm-5 card-login">
                        <v-card-subtitle align="center" class="create-new-account-text">Create New Account</v-card-subtitle>
                        <v-card-subtitle>
                            <v-form ref="form" :lazy-validation="lazy" class="login-form">
                                <div class="input-div">
                                    <label>Name</label>
                                    <v-text-field
                                            dark
                                            color="primary"
                                            class="login-input"
                                            type="text"
                                            outlined
                                            :error="!!errors.name"
                                            background-color="#ffffff"
                                            v-model="formData.name"
                                            :height="windowWidth<=599 ? '33.44' : '60'"
                                    ></v-text-field>
                                    <div
                                            class="error--text error-custom-margin"
                                            v-if="errors.name"
                                    >{{errors.name[0]}}</div>
                                </div>

                                <div class="input-div mt-md-0 mt-sm-0 mt-n3">
                                    <label>Email Address</label>
                                    <v-text-field
                                            dark
                                            color="primary"
                                            class="login-input"
                                            type="email"
                                            outlined
                                            :error="!!errors.email"
                                            background-color="#ffffff"
                                            v-model="formData.email"
                                            :height="windowWidth<=599 ? '33.44' : '60'"
                                    ></v-text-field>
                                    <div
                                            class="error--text error-custom-margin"
                                            v-if="errors.email"
                                    >{{errors.email[0]}}</div>
                                </div>

                                <div class="input-div mt-md-0 mt-sm-0 mt-n3">
                                    <label>Password</label>
                                    <v-text-field
                                            dark
                                            color="primary"
                                            class="login-input"
                                            type="password"
                                            outlined
                                            :error="!!errors.password"
                                            background-color="#ffffff"
                                            v-model="formData.password"
                                            :height="windowWidth<=599 ? '33.44' : '60'"
                                    ></v-text-field>
                                    <div
                                            class="error--text error-custom-margin"
                                            v-if="errors.password"
                                    >{{errors.password[0]}}</div>
                                </div>

                                <div class="input-div mt-md-0 mt-sm-0 mt-n3">
                                    <label>Confirm Password</label>
                                    <v-text-field
                                            dark
                                            color="primary"
                                            class="login-input"
                                            type="password"
                                            outlined
                                            background-color="#ffffff"
                                            v-model="formData.password_confirmation"
                                            :height="windowWidth<=599 ? '33.44' : '60'"
                                    ></v-text-field>
                                </div>

                                <v-checkbox dense v-model="agreeCheck" class="hidden-sm-only mt-n2">
                                    <template slot="label">
                                        <div class="agree-text">
                                            I accept your
                                            <span>Terms of Use</span> &
                                            <span>Privacy Policy.</span>
                                        </div>
                                    </template>
                                </v-checkbox>

                                <v-checkbox v-model="agreeCheck" class="d-none d-sm-flex d-md-none">
                                    <template slot="label">
                                        <div class="agree-text">
                                            I accept your
                                            <span>Terms of Use</span> &
                                            <span>Privacy Policy.</span>
                                        </div>
                                    </template>
                                </v-checkbox>
                                <div class="error--text error-custom-margin">{{errors.agreeCheck}}</div>

                                <v-btn color="#0046FE" class="btn-signup" @click="register">
                                    <span>Sign Up</span>
                                </v-btn>
                            </v-form>
                        </v-card-subtitle>
                        <v-card-subtitle class="account-exists NoDecor">
                            Already registered?
                            <a href="/client/login">Sign In</a>
                        </v-card-subtitle>
                    </v-card>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        name: "RegisterForm",
        props:['username'],
        data() {
            return {
                windowWidth: window.innerWidth,
                agreeCheck: false,
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
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                },
                errors: {},
                lazy: false,
            }
        },
        methods:{
            register() {
                this.errors = {};
                if (!this.agreeCheck) {
                    this.errors.agreeCheck =
                        "You have to accept our Terms of Use & Privacy Police*";
                    return;
                }

                axios.post('/client/register/submit', this.formData)
                    .then( (response) => {
                        if(response.data.status === 'success'){
                            window.location.href = '/client';
                        }
                    })
                    .catch(error => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = ['Something went wrong. Please try again'];
                        }
                    });
            },
            getSocialIcon(title) {
                return `/icons/social/${title}.png`;
            },
        }
    }
</script>
