<template>
    <div>
        <div id="myAccountTab" class="my-account-tab-wrapper">
            <div class="form-wrapper">
                <div class="content-wrapper">
                    <div class="form-title">
                        My account
                    </div>
                    <div class="mar-form">
                        <div class="mar-input" :class="{active:fields.first_name, 'error':errors.first_name}">
                            <div class="d-flex align-items-center" style="position: relative;">
                                <input type="text" v-model="accountData.first_name" id="first_name"
                                       @focus="focusFiledStyles('first_name')" @blur="validateFiled('first_name')">
                                <img src="/images/resume_builder/my_account/check-circle-regular.svg" alt="correct"
                                     v-show="fields.first_name">
                                <img src="/images/resume_builder/my_account/times-circle-regular.svg" alt="correct"
                                     v-show="errors.first_name">
                            </div>
                            <label for="first_name">
                                Name
                            </label>
                        </div>
                        <div class="mar-input" :class="{'active': fields.email , 'error': errors.email}">
                            <input type="email" v-model="accountData.email" id="email" :disabled="canEditEmail()">
                            <label for="email">
                                Email
                            </label>
                        </div>
                        <div class="mar-input" :class="{'active': fields.password , 'error': errors.password}">
                            <div class="d-flex align-items-center" style="position: relative;">
                                <input type="password" v-model="accountData.password" placeholder="*********"
                                       id="password" @focus="focusFiledStyles('password')"
                                       @blur="validateFiled('password')">
                                <img src="/images/resume_builder/my_account/check-circle-regular.svg" alt="correct"
                                     v-show="fields.password">
                                <img src="/images/resume_builder/my_account/times-circle-regular.svg" alt="correct"
                                     v-show="errors.password">
                            </div>
                            <label for="password">
                                Password
                            </label>
                        </div>
                        <div class="mar-input" :class="{'active': fields.password , 'error': errors.password}">
                            <div class="d-flex align-items-center" style="position: relative;">
                                <input type="password" v-model="accountData.password_confirmation"
                                       placeholder="*********" @focus="focusFiledStyles('password_confirmation')"
                                       id="password_confirmation" @blur="validateFiled('password')">
                                <img src="/images/resume_builder/my_account/check-circle-regular.svg" alt="correct"
                                     v-show="fields.password">
                                <img src="/images/resume_builder/my_account/times-circle-regular.svg" alt="correct"
                                     v-show="errors.password">
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
                                <!--<label class='toggle-label'>-->
                                    <!--<input type='checkbox'/>-->
                                    <!--<span class='back'>-->
                                    <!--<span class='toggle'></span>-->
                                    <!--<span class='label on'>On</span>-->
                                    <!--<span class='label off'>Off</span>-->
                                    <!--</span>-->
                                <!--</label>-->

                                <div class="toggle-panel smaller">
                                    <div class="aux-fill" :class="{left: subscription === 'on',right: subscription === 'off'}"></div>
                                    <div class="buttons">
                                        <button class="toggle-btn monthly" @click="subscription = 'on' ">On
                                        </button>
                                        <button class="toggle-btn yearly"  @click="subscription = 'off' ">Off
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mar-input" :class="{'active': fields.username , 'error': errors.username}">
                            <div class="d-flex align-items-center" style="position: relative;">
                                <input type="text" v-model="accountData.username" id="username"
                                       @focus="focusFiledStyles('username')" @blur="validateFiled('username')">
                                <img src="/images/resume_builder/my_account/check-circle-regular.svg" alt="correct"
                                     v-show="fields.username">
                                <img src="/images/resume_builder/my_account/times-circle-regular.svg" alt="correct"
                                     v-show="errors.username">
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
                        <a href="javascript:void(0)" class="purchase-btn" data-toggle="modal" data-target="#prices" v-show="subscription==='on'">
                            Purchase subscription
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="prices" tabindex="-1" role="dialog" aria-labelledby="prices" aria-hidden="true" style="overflow: hidden!important;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body" style="min-height: 525px;">
                        <div class="plans">
                            <div class="toggle-panel">
                                <div class="aux-fill" :class="{left: selectedBtn === 'monthly',right: selectedBtn === 'yearly'}"></div>
                                <div class="buttons">
                                    <button @click="setPlan('monthly')" class="toggle-btn monthly">Monthly
                                    </button>
                                    <button @click="setPlan('yearly')" class="toggle-btn yearly">Yearly
                                    </button>
                                </div>
                            </div>
                            <transition name="fade">
                                <monthly-plan v-if="selectedPlan === 'monthly'"></monthly-plan>
                                <yearly-plan  v-if="selectedPlan === 'yearly'"></yearly-plan>
                            </transition>
                            <img class="dot-bg" src="/images/resume_builder/dotbox.png" alt/>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import monthlyPlan from "../../freelancerResume/resumeBuilderIncludes/monthly_plan.vue";
    import yearlyPlan from "../../freelancerResume/resumeBuilderIncludes/yearly_plan.vue";

    export default {
        name: "MyAccount",
        components: {monthlyPlan, yearlyPlan},

        data() {
            return {
                selectedPlan: "monthly",
                selectedBtn: "monthly",
                subscription: "off",
                errors: {},
                successes: {},
                currentUser: {},
                isLoading: false,
                notificationMessage: '',
                usernameOldValue: '',
                fields: {
                    first_name: '',
                    email: '',
                    username: '',
                    password: '',
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
            setPlan(plan){
                this.selectedPlan = 0 ;
                this.selectedBtn = plan;
                setTimeout(() => {
                    this.selectedPlan = plan ;
                },700)
            },
            validateFiled(field_name) {
                let data = {
                    [field_name]: this.accountData[field_name]
                };

                if (field_name === 'username') {
                    if (!this.isUsernameChanged()) {
                        return;
                    }
                }

                if (field_name === 'password') {
                    data['password_confirmation'] = this.accountData.password_confirmation;
                }

                if (field_name === 'password' && this.accountData.password_confirmation !== this.accountData.password) {
                    this.errors['password'] = 'error';
                    this.fields['password'] = null;
                    return;
                }

                axios.post('/resume-builder/account/validate', data)
                    .then((response) => {
                        if (response.data === 'success') {
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

            focusFiledStyles(field_name) {
                let label = $("[for=" + field_name + "]");
                if (label.hasClass('labelFocused')) {
                    label.removeClass('labelFocused');
                } else {
                    label.addClass('labelFocused');
                }
            },

            submitForm() {

                this.clearErrors();
                this.isLoading = true;

                if (this.isUsernameChanged()) {
                    this.accountData.userNameChanged = true;
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
            canEditEmail() {
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

<style lang="scss">
    $text-color: #4374de;
    $primary: #1f5de4;
    $bg-color: white;
    $input-bg: #f1f8fc;
    $placeholder-color: #9ba1ad;

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
                            line-height: 30px;
                            letter-spacing: 0;
                            color: #505050;
                            opacity: 1;
                        }

                        label.labelFocused {
                            color: #001CE2;
                        }

                        input {
                            width: 616px;
                            height: 73px;
                            background: #FFFFFF 0% 0% no-repeat padding-box;
                            border: 1.5px solid #505050;
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

                        img {
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


    .plans {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;

        & > .dot-bg {
            position: absolute;
            bottom: -6rem;
            left: -18rem;
            z-index: 1;
            height: 160px;
        }
    }

    .toggle-panel.smaller{
        width:110px;
        .aux-fill{
            width: 183%;
            position: absolute;
            background: #1f5de4;
            border-radius: 20px;
            height: 38px;
            top: 0;
            z-index: 1;
        }
    }

    .toggle-panel {
        border: solid 1.3px $primary;
        border-radius: 50px;
        position: relative;
        overflow: hidden;
        padding: 5px 10px;
        height: 40px;
        width: 200px;
        display: flex;
        justify-content: center;
        align-items: center;

        .aux-fill {
            width: 100%;
            position: absolute;
            background: $primary;
            border-radius: 20px;
            height: 40px;
            top: 0;
            z-index: 1;

            &.left {
                animation-name: swipeToLeft;
                animation-duration: 0.3s;
                animation-timing-function: ease;
                animation-fill-mode: forwards;

                & ~ .buttons .monthly {
                    color: $bg-color;
                    transition: color 0.5s ease;
                }
            }

            &.right {
                animation-name: swipeToRight;
                animation-duration: 0.3s;
                animation-timing-function: ease;
                animation-fill-mode: forwards;

                & ~ .buttons .yearly {
                    color: $bg-color;
                    transition: color 0.5s ease;
                }
            }
        }
        .buttons {
            position: absolute;
            right: 0;
            height: 40px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px;
            z-index: 2;

            button {
                background: transparent;
                border: none;
                color: $primary;
                font-weight: 700;
                width: 100px;
                outline: none;
                transition: color 0.5s ease;

                &:hover {
                    cursor: pointer;
                }
            }
        }
    }

    @keyframes swipeToRight {
        from {
            transform: translateX(-95px);
        }
        to {
            transform: translateX(95px);
        }
    }

    @keyframes swipeToLeft {
        from {
            transform: translateX(95px);
        }
        to {
            transform: translateX(-95px);
        }
    }

    // Transitions effects
    .fade-enter-active,
    .fade-leave-active {
        transition: opacity 0.5s ease;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0;
    }

    .slide-fade-enter-active {
        transition: all .3s ease;
    }
    .slide-fade-leave-active {
        transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to
        /* .slide-fade-leave-active below version 2.1.8 */ {
        transform: translateX(10px);
        opacity: 0;
    }

    .plan-container {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        color: $text-color;
        margin-top: 15px;
        box-shadow: none !important;

        .dot-bg {
            position: absolute;
            top: -18px;
            right: -78px;
            display: none;
        }

        .circle-bg {
            position: absolute;
            bottom: -60px;
            right: -40px;
            display: none;
        }
    }

    .plan-details {
        background: white;
        padding: 0 !important;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border-radius: 17px;
        position: relative;
        z-index: 1;

        .plan-original-price {
            position: relative;
            margin-top: 15px;
            font-size: 50px !important;

            img {
                position: absolute;
                right: 0;
                top: 0;
                height: 100%;
            }

            @media (max-width: 1480px) {
                right: 0;
            }
        }

        .plan-offer {
            color: $primary;
            font-size: 65px;
            position: relative;

            small,
            sup {
                font-size: 22px;
            }

            small {
                font-weight: 700;

                &:first-child {
                    margin-right: 10px;
                }

                &.not-bold {
                    font-weight: normal;
                }
            }

            sup {
                position: absolute;
                top: 25px;
                left: 92px;
            }

            @media (max-width: 1480px) {
                font-size: 42px;

                small,
                sup {
                    font-size: 20px;
                }

                sup {
                    top: 15px;
                    left: 90px;
                }
            }

            @media (max-width: 576px) {
                font-size: 36px;

                small,
                sup {
                    font-size: 16px;
                }

                sup {
                    left: 75px;
                }
            }
        }

        .btn {
            height: 60px;
            line-height: 1rem;

            small {
                display: block;
                font-size: 10px;
            }

            @media (max-width: 480px) {
                width: 100%;
            }
        }

        @media (max-width: 960px) {
            padding: 50px;
        }
    }

    .help-text {
        font-size: 22px;

        @media (max-width: 1480px) {
            font-size: 14px;
        }
    }

    .plan-info {
        width: 100%;
        padding: 3rem 5rem;

        img {
            height: 14px;
            margin-right: 5px;
        }

        @media (max-width: 576px) {
            padding: 2rem;
        }
    }

</style>
