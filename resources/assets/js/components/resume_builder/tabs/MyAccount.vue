<template>
    <div class="my-account-tab-wrapper">
        <div class="info-wrapper">
            <div class="avatar">
                <img src="/images/resume_themes/theme5/profile.png" alt="profile-pic">
            </div>
            <div class="name-title-wrapper">
                <div class="user-name">
                    Carolyn Meyer
                </div>
                <div class="job-title">
                    User interface designer
                </div>
            </div>
        </div>
        <div class="form-wrapper">
            <div class="content-wrapper">
                <div class="form-title">
                    My account
                </div>
                <div class="mar-form">
                    <div class="mar-input" :class="{active:fields.first_name, 'error':errors.first_name}">
                        <div class="d-flex align-items-center" style="position: relative;">
                            <input type="text" v-model="accountData.first_name" id="first_name" @focus="focusFiledStyles('first_name')"  @blur="validateFiled('first_name')">
                            <img src="/images/resume_builder/my_account/check-circle-regular.svg" alt="correct" v-show="fields.first_name">
                            <img src="/images/resume_builder/my_account/times-circle-regular.svg" alt="correct"  v-show="errors.first_name">
                        </div>
                        <label for="first_name">
                            Name
                        </label>
                    </div>
                    <div class="mar-input" :class="{'active': fields.email , 'error': errors.email}">
                        <input type="email" v-model="accountData.email" id="email" :disabled="canEditEmail()" >
                        <label for="email">
                            Email
                        </label>
                    </div>
                    <div class="mar-input" :class="{'active': fields.password , 'error': errors.password}"  >
                        <div class="d-flex align-items-center" style="position: relative;">
                            <input type="password" v-model="accountData.password" placeholder="*********" id="password" @focus="focusFiledStyles('password')"   @blur="validateFiled('password')">
                            <img src="/images/resume_builder/my_account/check-circle-regular.svg" alt="correct" v-show="fields.password">
                            <img src="/images/resume_builder/my_account/times-circle-regular.svg" alt="correct"  v-show="errors.password">
                        </div>
                        <label for="password">
                            Password
                        </label>
                    </div>
                    <div class="mar-input" :class="{'active': fields.password , 'error': errors.password}">
                        <div class="d-flex align-items-center" style="position: relative;">
                            <input type="password" v-model="accountData.password_confirmation"  placeholder="*********" @focus="focusFiledStyles('password_confirmation')" id="password_confirmation"  @blur="validateFiled('password')">
                            <img src="/images/resume_builder/my_account/check-circle-regular.svg" alt="correct" v-show="fields.password">
                            <img src="/images/resume_builder/my_account/times-circle-regular.svg" alt="correct"  v-show="errors.password">
                        </div>

                        <label for="password_confirmation">
                            Re-type password
                        </label>
                    </div>
                    <div class="my-subscription">
                        <div class="form-title sub">
                            My subscription
                        </div>
                        <div>
                            <label class='toggle-label'>
                                <input type='checkbox'/>
                                <span class='back'>
                                    <span class='toggle'></span>
                                    <span class='label on'>On</span>
                                    <span class='label off'>Off</span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="mar-input" :class="{'active': fields.username , 'error': errors.username}">
                        <div class="d-flex align-items-center" style="position: relative;">
                            <input type="text" v-model="accountData.username" id="username" @focus="focusFiledStyles('username')"  @blur="validateFiled('username')">
                            <img src="/images/resume_builder/my_account/check-circle-regular.svg" alt="correct" v-show="fields.username">
                            <img src="/images/resume_builder/my_account/times-circle-regular.svg" alt="correct"  v-show="errors.username">
                        </div>

                        <label for="username">{{baseUrl()}}</label>
                    </div>
                </div>

                <div class="actions-row">
                    <img src="/images/resume_builder/my_account/edit-solid.svg" alt="edit">
                    <img src="/images/resume_builder/my_account/copy.svg" alt="edit">
                    <img src="/images/resume_builder/my_account/share-square-solid.svg" alt="edit">
                </div>

                <div class="action-btns NoDecor">
                    <a class="save-btn" href="javascript:void(0)" @click="submitForm">
                        <img src="/images/resume_builder/my_account/check-solid.svg" alt="edit">
                        Save changes
                    </a>
                    <div class="purchase-btn">
                        Purchase subscription
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MyAccount",
        data() {
            return {
                errors: {},
                successes:{},
                currentUser:{},
                isLoading: false,
                notificationMessage: '',
                usernameOldValue: '',
                fields:{
                    first_name:'',
                    email:'',
                    username:'',
                    password:'',
                }
            }
        },
        computed: {
            accountData() {
                let user = this.currentUser = this.$store.state.user;
                this.usernameOldValue = this.currentUser.username;

                return {
                    first_name: user.user_data ? user.user_data.first_name : '',
                    email: user.email,
                    username: user.username,
                    userNameChanged: false,
                    password: '',
                    password_confirmation: ''
                }
            }
        },
        methods: {
            validateFiled(field_name){
                let data =  {
                    [field_name] : this.accountData[field_name]
                };

                if(field_name === 'username'){
                    if(!this.isUsernameChanged()){
                       return;
                    }
                }

                if(field_name === 'password'){
                    data['password_confirmation'] = this.accountData.password_confirmation;
                }

                if(field_name === 'password' && this.accountData.password_confirmation !== this.accountData.password){
                    this.errors['password'] = 'error';
                    this.fields['password'] = null;
                    return;
                }

                axios.post('/resume-builder/account/validate',data )
                    .then((response) => {
                        if(response.data === 'success'){
                            this.fields[field_name] = 'success';
                            this.errors[field_name] = null;
                        }
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors[field_name] = 'error';
                            this.fields[field_name] = null;
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    })
            },

            focusFiledStyles(field_name){
                let label = $("[for="+field_name+"]");
                if(label.hasClass('labelFocused')){
                    label.removeClass('labelFocused');
                }else{
                    label.addClass('labelFocused');
                }
            },

            submitForm() {

                this.clearErrors();
                this.isLoading = true;

                if(this.isUsernameChanged()){
                    this.accountData.userNameChanged = true ;
                }

                axios.post('/resume-builder/account/submit', this.accountData)
                    .then((response) => {
                        console.log(response.data);
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                            this.updateErrors(error.response.data.errors);
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    })
            },

            clearErrors() {
                $.each(this.errors, (error) => {
                    this.errors[error] = '';
                });
            },
            clearSuccesses() {
                $.each(this.fields, (field) => {
                    this.fields[field] = '';
                });
            },
            updateErrors(responseErrors) {
                $.each(this.errors, (error) => {
                    if (responseErrors[error]) {
                        this.errors[error] = responseErrors[error][0];
                    }
                });
            },
            baseUrl() {
                let getUrl = window.location;
                return getUrl.protocol + "//" + getUrl.host + '/';
            },
            canEditEmail(){
                return !(this.currentUser.instagram_id !== null && !this.currentUser.email);
            },
            isUsernameChanged() {
                if (!this.currentUser.username) {
                    return;
                } else {
                    return this.usernameOldValue.trim() !== this.accountData.username.trim(); // return true if  changed
                }
            },
        },
        mounted() {
            this.$store.dispatch('getCurrentUser');
        }

    }
</script>

<style scoped lang="scss">
    .my-account-tab-wrapper {
        .info-wrapper {
            display: flex;
            align-items: center;

            .avatar {
                margin-right: 32px;

                img {
                    width: 167px;
                    height: 167px;
                }
            }

            .name-title-wrapper {
                .user-name {
                    margin-bottom: 4px;
                    font: Bold 34px/46px Noto Sans;
                    letter-spacing: 0;
                    color: #413A5D;
                    opacity: 1;
                }

                .job-title {
                    margin-left: 4px;
                    font: Medium 18px/24px Noto Sans;
                    letter-spacing: 0;
                    color: #413A5D;
                    opacity: 1;
                }
            }
        }

        .form-wrapper {
            margin-top: 73px;
            display: flex;
            flex-direction: column;
            align-items: center;

            .content-wrapper {
                .form-title {
                    margin-bottom: 44px;
                    font: 500 51px Noto Sans;
                    letter-spacing: 0;
                    color: #001CE2;
                    opacity: 1;
                }

                .form-title.sub {
                    font: 500 30px Noto Sans;
                    margin-bottom: 27px;
                }

                .mar-form {
                    .mar-input {
                        display: flex;
                        flex-direction: column-reverse;
                        margin-bottom: 25px;

                        label {
                            text-align: left;
                            font: 500 17px/23px Noto Sans;
                            letter-spacing: 0;
                            color: #505050;
                            opacity: 1;
                        }

                        label.labelFocused{
                            color: #001CE2;
                        }

                        input {
                            width: 616px;
                            height: 73px;
                            background: #FFFFFF 0% 0% no-repeat padding-box;
                            border: 2px solid #505050;
                            color: #505050;
                            border-radius: 8px;
                            padding-left: 17px;
                            opacity: 1;
                        }

                        input:focus {
                            border: 2px solid #001CE2;
                            color: #001CE2;
                            outline: none;
                        }

                        img{
                            width: 36px;
                            height: 36px;
                            right: 20px;
                            position: absolute;
                        }
                    }

                    .mar-input.active {
                        label {
                            color: #1EC300;
                            font: 600 17px/23px Noto Sans;
                        }

                        input {
                            border: 2px solid #1EC300;
                            color: #1EC300;
                        }
                    }

                    .mar-input.error {
                        label {
                            color: #E20000;
                            font: 600 17px/23px Noto Sans;
                        }

                        input {
                            border: 2px solid #E20000;
                            color: #E20000;
                        }
                    }

                    .my-subscription {
                        display: flex;
                        justify-content: space-between;

                        .toggle-label {
                            position: relative;
                            display: block;
                            width: 135px;
                            height: 55px;
                            margin-bottom: 0 !important;
                            border-radius: 41px;

                            input[type="checkbox"] {
                                opacity: 0;
                                position: absolute;
                                width: 100%;
                                height: 100%;

                                + .back {
                                    position: absolute;
                                    width: 100%;
                                    height: 100%;
                                    background: white;
                                    border-radius: 41px;
                                    transition: background 150ms linear;
                                }

                                &:checked {
                                    + .back {
                                        background: white;

                                        /*green*/
                                    }

                                    + .back .toggle {
                                        margin-left: 76px;
                                    }
                                }

                                + .back .toggle {
                                    display: block;
                                    position: absolute;
                                    content: " ";
                                    background: #001BDE;
                                    width: 50%;
                                    height: 100%;
                                    transition: margin 150ms linear;
                                    border: none;
                                    border-radius: 41px;
                                }
                            }

                            .label {
                                display: block;
                                position: absolute;
                                width: 50%;
                                line-height: 54px;
                                margin-right: 6px;
                                text-align: center;
                                font-size: 18px;
                                font-weight: bold;
                                filter: grayscale(0%) !important;

                                &.on {
                                    left: 0;
                                    color: white;
                                    opacity: 1 !important;
                                }

                                &.off {
                                    right: 0;
                                    color: #001BDE !important;
                                    opacity: 1 !important;
                                    margin-right: -6px;

                                }
                            }

                            input[type="checkbox"] {
                                &:checked {
                                    + .back .label.on {
                                        color: #001BDE;
                                    }

                                    + .back .label.off {
                                        color: #fff !important;
                                    }
                                }

                                + .back .label.off {
                                    color: #fff;
                                }
                            }
                        }
                    }
                }

                .actions-row {
                    margin-bottom: 25px;

                    img {
                        width: 35px;
                        height: 35px;
                        margin-right: 32px;
                    }
                }

                .action-btns {
                    display: flex;
                    justify-content: space-between;

                    .save-btn {
                        width: 240px;
                        height: 66px;
                        display: flex;
                        justify-content: center;
                        align-items: center;

                        background: #001CE2 0% 0% no-repeat padding-box;
                        border-radius: 8px;

                        text-align: left;
                        font: 500 21px Noto Sans;
                        letter-spacing: 0;
                        color: #FFFFFF;
                        opacity: 1;

                        img {
                            width: 27px;
                            height: 21px;
                            margin-right: 20px;
                        }
                    }

                    .purchase-btn {
                        width: 230px;
                        height: 66px;
                        display: flex;
                        justify-content: center;
                        align-items: center;

                        background: #FFFFFF 0% 0% no-repeat padding-box;
                        border: 1px solid #001CE2;
                        border-radius: 12px;
                        opacity: 1;

                        font: bold 16px Noto Sans;
                        letter-spacing: 0;
                        color: #001CE2;

                    }
                }
            }

        }
    }
</style>
