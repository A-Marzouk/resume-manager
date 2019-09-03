<template>
    <div>
        <div  v-show="status === 'update'">
            <nav class="navbar navbar-light fixed-top dashboard_navbar">
                <div class="backBtn">
                    <a href="/client/dashboard/payments">
                        <img src="/images/client/arrow_back.png" alt="back-icon">
                    </a>
                    SUBSCRIPTION PLAN UPDATE
                </div>
            </nav>
            <!--navbar-->
            <div class="d-flex justify-content-center">
                <div class="main-grid">
                    <div class="header-text">
                        <img src="/images/client/plan.png" alt="" class="icon-margin small-image">
                        CREATE SUBSCRIPTION PLAN
                    </div>
                    <!--title-->
                    <hr/>
                    <div class="sub-text blue-color">
                        SET UP YOUR SUBSCRIPTION PLAN
                    </div>
                    <div class="text new-sub-plan">
                        <div class="subscription-plans">
                            <div :key="index + plan.price" v-for="(plan, index) in plans" class="plan">
                                <div class="price">
                                    <span class="value">$ {{plan.price}}</span>
                                    <span class="frequency">per week, billed weekly</span>
                                </div>
                                <div class="hours">
                                    <img src="/images/client/payments/time.png" alt="time icon">
                                    {{plan.hoursPerWeek}} hours/week
                                </div>
                                <button class="btn-bordered" :class="{selected: plan.selected}"
                                        v-on:click="changePlan(index)"
                                >
                                    {{plan.selected ? 'SELECTED' : 'SELECT'}}
                                </button>
                                <a href="javascript:;">
                                    <img src="/images/icons/arrow_drop_down_circle.svg" alt="arrow dropdown icon">
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="start-date">
                            <div class="start-date-heading">
                                <img src="/images/client/payments/period.png" alt="time icon">
                                Pick a start date of updated campaign
                            </div>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#pick-date-modal"
                               @click.once="setDatePicker">
                            <span v-if="this.subscription.start_date === ''">
                                PICK START DATE
                            </span>
                                <span v-else>
                                {{this.subscription.start_date}}
                            </span>
                            </a>
                        </div>
                        <hr>
                        <div class="weeks-number">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="/images/client/payments/week.png" alt="week icon" class="mr-3">
                                <div class="weeks-number-heading">
                                    Total number of weeks
                                </div>
                            </div>
                            <div class="week-input">
                                <div class="account-edit-section-inputs d-flex align-items-center">
                                    <div class="faq-question-input sub-edit-input  mt-3 d-flex flex-lg-row flex-column align-items-center">
                                        <div class="faq-input">
                                            <input v-model="numOfWeeks" type="number" min="0" max="99" placeholder="N° of weeks">
                                            <img src="/images/client/campaign_activity/close_black.png"
                                                 alt="delete icon"
                                                 v-show="numOfWeeks.length > 0"
                                                 @click="clearInput('numOfWeeks')"
                                            >
                                        </div>
                                        <div class="mt-3"
                                             style="margin-left:99px;">

                                            <div class="custom-checkbox">
                                                <div class="checkbox" :class="{checked}"></div>
                                                <input v-on:click="handleCheck" checked type="checkbox"
                                                       name="no-end-date"/>
                                                <span class="weeks-number-heading sub-heading ml-1"> no end date </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>

                        <hr/>
                        <div style="justify-content: flex-end" class="d-flex sub-action pt-5"
                             :class="{'disabled-btn': !canSubmit}">
                            <a href="javascript:void(0)" class="btn btn-primary d-flex justify-content-center align-items-center" @click="finishUpdate">
                                CONTINUE
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-show="status === 'finish'">
            <finishSub :subscription="subscription"></finishSub>
        </div>

        <div class="modal" id="pick-date-modal">
            <div class="modal-dialog">
                <div class="modal-content agent-modal-content date-picker">
                    <!-- Modal body -->
                    <button type="button" id="close-modal" class="close d-none" data-dismiss="modal">&times;</button>
                    <div class="modal-body">
                        <div id="datepicker"></div>
                        <input type="hidden" name="selected-date-value" id="selected-date-value" @change="dateChanged">
                        <div class="date-picker-modal-footer">
                            <a href="javascriot:void(0)" class="cancelBtn" @click="cancelDatePicking">
                                CANCEL
                            </a>
                            <a href="javascriot:void(0)" class="applyBtn selected-date" @click="applySelectedDate">
                                APPLY
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    import finishSub from './finishSubSetUp'

    export default {
        components: {
            finishSub
        },
        data() {
            return {
                status: 'update', // or finish
                checked: false,
                numOfWeeks: '',
                canSubmit: false,
                selectedDate: '',
                plans: [
                    {
                        price: 75,
                        hoursPerWeek: 5,
                        selected: false
                    },
                    {
                        price: 140,
                        hoursPerWeek: 10,
                        selected: false
                    },
                    {
                        price: 260,
                        hoursPerWeek: 20,
                        selected: false
                    },
                    {
                        price: 360,
                        hoursPerWeek: 30,
                        selected: false
                    },
                    {
                        price: 440,
                        hoursPerWeek: 40,
                        selected: false
                    },
                    {
                        price: 600,
                        hoursPerWeek: 60,
                        selected: false
                    }
                ],

                subscription:{
                    amount_paid : '',
                    hours_per_week : '',
                    duration_in_weeks : '',
                    start_date : '',
                    end_date : '',
                }
            }
        },
        methods: {
            handleCheck() {
                this.checked = !this.checked
            },
            changePlan(index) {
                let {plans} = this
                let i = 0

                while (i < plans.length && !plans[i].selected) i++

                if (i < plans.length) plans[i].selected = false
                plans[index].selected = true

                this.plans = [...plans]

            },
            clearInput(key) {
                this[key] = ''
            },
            finishUpdate() {
               // create new subscription plan for the client.
                $.each(this.plans,(index,plan)=>{
                    if(plan.selected){
                        this.subscription.amount_paid = plan.price;
                        this.subscription.hours_per_week = plan.hoursPerWeek;
                    }
                });

                this.subscription.duration_in_weeks = this.numOfWeeks ;

                axios.post('/client/subs/create',this.subscription)
                    .then( (response) => {
                        if(response.data.status === 'success'){
                            this.status = 'finish';
                        }
                    })
                    .catch()

            },
            dateChanged() {
                this.selectedDate = $('#selected-date-value').val();
            },
            applySelectedDate() {
                this.subscription.start_date = this.selectedDate;
                $('#close-modal').click();
            },
            cancelDatePicking() {
                $('#close-modal').click();
            },
            setDatePicker() {
                $("#datepicker").datepicker({
                    onSelect: function (dateText, inst) {
                        $("input[name='selected-date-value']").val(dateText);
                        const dateChanged = new CustomEvent('change');
                        document.getElementById('selected-date-value').dispatchEvent(dateChanged);
                    }
                });
            }
        },
        watch: {
            plans: {
                handler(value) {
                    let selectedPlan = false ;

                    $.each(value,(index,plan)=>{
                        if(plan.selected){
                            selectedPlan = true ;
                        }
                    });

                    if (this.numOfWeeks !== '' && selectedPlan) this.canSubmit = true ;
                }
            },
            numOfWeeks: {
                handler(value) {
                    let selectedPlan = false

                    $.each(this.plans,(index,plan)=>{
                        if(plan.selected){
                            selectedPlan = true ;
                        }
                    });

                    if (value !== '' && selectedPlan) this.canSubmit = true ;
                }
            }
        }
    }
    $(document).ready(function () {

        $(":checkbox[class=chechbox-blue]").on("change", function () {
            var red = document.getElementById('checked').checked;
            var text = document.getElementById('text');
            console.log(red);
            if (red == true) {
                $(text).css({visibility: 'hidden'});
            } else {
                $(text).css({visibility: 'visible'});
            }
        })
    })
</script>

<style lang="scss" scoped>
    .disabled-btn{
       a{
           border: none;
       }
    }
</style>