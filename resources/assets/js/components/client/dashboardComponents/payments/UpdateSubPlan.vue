<template>

    <div>
        <div v-show="status==='update'">
            <nav class="navbar navbar-light fixed-top dashboard_navbar">
                <div class="backBtn"
                     v-show="status === 'update'">
                    <a href="/client/dashboard/payments">
                        <img src="/images/client/arrow_back.png" alt="back-icon">
                    </a>
                    SUBSCRIPTION PLAN UPDATE
                </div>
                <div class="backBtn"
                     v-show="status === 'finish'">
                    <a href="javascript:void(0)" @click="status='update'">
                        <img src="/images/client/arrow_back.png" alt="back-icon">
                    </a>
                    SUBSCRIPTION PLAN UPDATE
                </div>
            </nav>
            <div class="update-sub-plan">
                <div class="subscriptions">
                    <div class="subs-heading">
                        <div class="left">
                            <img src="/images/client/payments/agents_40px.png" alt="subs icon">
                            <span>
                        SUBSCRIPTION PLAN UPDATE
                    </span>
                        </div>
                    </div>

                    <div class="subs-list">
                        <div class="sub-item">
                            <div class="next-billing-date">
                                <span class="date"> 22.04.19 </span> <span style='opacity: 0.7;'>next billing date</span>
                            </div>
                            <div class="sub-info">
                                <div class="sub-info-box">
                                    <img src="/images/client/payments/time.png" alt="time icon">
                                    <div class="right">
                                        <div class="sub-info-box-heading">
                                            {{sub.hours_per_week}} HOURS
                                        </div>
                                        <div class="sub-info-box-note">
                                            per week
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-info-box">
                                    <img src="/images/client/payments/amount.png" alt="time icon">
                                    <div class="right">
                                        <div class="sub-info-box-heading">
                                            $ {{sub.amount_paid}}
                                        </div>
                                        <div class="sub-info-box-note">
                                            weekly amount
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-info-box">
                                    <img src="/images/client/payments/week.png" alt="time icon">
                                    <div class="right">
                                        <div class="sub-info-box-heading">
                                            {{sub.origianl_duration_in_weeks}} WEEKS
                                        </div>
                                        <div class="sub-info-box-note">
                                            {{sub.duration_in_weeks}} used / {{sub.origianl_duration_in_weeks - sub.duration_in_weeks}} left
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-info-box">
                                    <img src="/images/client/payments/period.png" alt="time icon">
                                    <div class="right">
                                        <div class="sub-info-box-heading" style="font-size:12px;">
                                            {{sub.start_date}} - {{sub.end_date}}
                                        </div>
                                        <div class="sub-info-box-note">
                                            start date - finish date
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-info-box">
                                    <img src="/images/client/payments/number_agents.png" alt="time icon">
                                    <div class="right">
                                        <div class="sub-info-box-heading">
                                            {{sub.campaign.agents.length}} AGENTS
                                        </div>
                                        <div class="sub-info-box-note">
                                            <span v-if="sub.campaign.agents.length > 0">
                                                working on campaign
                                            </span>
                                            <span v-else class="NoDecor">
                                                <a href="/client/camp/add-agent"> Add agent</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-info-box">
                                    <img src="/images/client/payments/rate.png" alt="time icon">
                                    <div class="right">
                                        <div class="sub-info-box-heading">
                                            $  {{sub.hourly_rate}}
                                        </div>
                                        <div class="sub-info-box-note">
                                            agent's hourly rate
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-info-box">
                                    <img src="/images/client/payments/manager.png" alt="time icon">
                                    <div class="right">
                                        <div class="sub-info-box-heading">
                                            {{sub.manager.user.user_data.first_name}}  {{sub.manager.user.user_data.last_name}}
                                        </div>
                                        <div class="sub-info-box-note">
                                            your manager
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="blue-text pt-4 pb-4">
                        SUBSCRIPTION PLAN UPDATE
                    </div>

                    <div class="new-sub-plan">
                        <div class="subscription-plans">
                            <div :key="index + plan.price" v-for="(plan, index) in plans" class="plan">
                                <div class="price">
                                    <span class="value">$ {{plan.price}}</span>
                                    <span class="frequency">peer week, billed weekly</span>
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
                                <a href="javascript:;" class="arrow-dropdown">
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
                                            <input v-model="numOfWeeks" type="text" placeholder="N° of weeks">
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
                    </div>

                    <div class="sub-action pt-5" :class="{'disabled-btn': !canSubmit}">
                        <a href="#" @click="finishUpdate">
                            CONTINUE
                        </a>
                    </div>
                </div>



            </div>
        </div>


        <div v-show="status === 'finish'">
            <finishSub :subscription="subscription_data" :status="'updateSub'"></finishSub>
        </div>

        <!-- Modal -->
        <div class="modal fade"
             id="remove-manager-modal"
             tabindex="-1"
             role="dialog"
             aria-labelledby="remove-manager-modal"
             aria-hidden="true">
            <div class="modal-dialog"
                 role="document">
                <div class="modal-content border-0"
                     style="margin-top: 30%;">
                    <div class="modal-body campaign-team-modal">
                        <div class="modal-question">
                            Are you sure you want to remove the manager ?
                        </div>
                        <div class="modal-btn-wrapper">
                            <div class="button-base white-button-a">
                                <a href="javascript:void(0)" data-dismiss="modal">CANCEL</a>
                            </div>
                            <div class="button-base blue-button-a">
                                <a href="javascript:void(0)" data-dismiss="modal">REMOVE THE MANAGER</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
        props: ['subscription'],
        data() {
            return {
                status: 'update', // or finish
                checked: false,
                numOfWeeks: '',
                canSubmit: false,
                selectedDate: '',
                sub: {
                    campaign:{
                        agents:[]
                    },
                    manager:{
                        user:{
                            user_data:{}
                        }
                    }
                },
                subscription_data:{
                    id:'',
                    amount_paid : '',
                    hours_per_week : '',
                    duration_in_weeks : '',
                    start_date : '',
                    end_date : '',
                },
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
                ]
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
                        this.subscription_data.amount_paid = plan.price;
                        this.subscription_data.hours_per_week = plan.hoursPerWeek;
                    }
                });

                this.subscription_data.duration_in_weeks = this.numOfWeeks ;

                axios.post('/client/subs/update',this.subscription_data)
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
                this.subscription_data.start_date = this.selectedDate;
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
        },

        mounted() {
            this.sub = this.subscription ;
            this.numOfWeeks = this.sub.duration_in_weeks ;
            $.each(this.plans,(index,plan)=>{
                if(plan.price == this.sub.amount_paid){
                    plan.selected = true ;
                }
            });
            this.subscription_data = {
                id:this.sub.id,
                amount_paid : this.sub.amount_paid,
                hours_per_week : this.sub.hours_per_week,
                duration_in_weeks : this.sub.duration_in_weeks,
                start_date : this.sub.start_date,
                end_date : this.sub.end_date
            }

        }
    }
</script>
<style scoped>
</style>
