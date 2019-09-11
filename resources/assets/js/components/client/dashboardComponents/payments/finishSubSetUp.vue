<template>
    <div>
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
                    FINISH SUBSCRIPTION PLAN
                </div>
                <!--title-->
                <hr/>
                <div class="sub-text blue-color">
                    SET UP YOUR SUBSCRIPTION PLAN
                </div>

                <div class="d-flex flex-column">
                    <div class="d-flex plan-row">
                        <img src="/images/client/payments/icons/your_plan.svg" alt="">
                        <div class="plan-text">
                            YOUR PLAN IS:
                        </div>
                        <div class="plan-text text-orange">
                            $ {{subscription.amount_paid}}, {{subscription.hours_per_week}} HOURS/WEEK
                        </div>
                    </div>

                    <div class="d-flex plan-row">
                        <img src="/images/client/payments/icons/period.svg" alt="">
                        <div class="plan-text">
                            Your start date is :
                        </div>
                        <div  class="plan-text text-orange">
                            {{subscription.start_date}}
                        </div>
                    </div>

                    <div class="d-flex plan-row">
                        <img src="/images/client/payments/icons/weeks.svg" alt="">
                        <div class="plan-text">
                            Your campaign will run for :
                        </div>
                        <div  class="plan-text text-orange">
                            {{subscription.duration_in_weeks}} WEEKS
                        </div>
                    </div>

                    <div class="d-flex plan-row">
                        <img src="/images/client/payments/icons/amount.svg" alt="">
                        <div class="plan-text">
                            Total weekly amount is :
                        </div>
                        <div  class="plan-text text-orange">
                            $ {{subscription.amount_paid}}
                        </div>
                    </div>

                    <div class="d-flex plan-row">
                        <img src="/images/client/payments/icons/payment.svg" alt="">
                        <div class="plan-text">
                            First payment date is :
                        </div>
                        <div  class="plan-text text-orange">
                             {{subscription.start_date}}
                        </div>
                    </div>
                </div>


                <hr/>
                <div style="justify-content: flex-end" class="d-flex sub-action pt-5">
                    <a href="javascript:void(0)" @click="finishPayment" class="btn btn-primary d-flex justify-content-center align-items-center">
                        FINISH
                    </a>
                </div>


            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "finishSubSetUp",
        props:['subscription'],
        data(){
            return{

            }
        },
        methods:{
            finishPayment(){
                // issue client invoice and redirect to invoice page on success

                axios.post('/client/invoices/create',this.subscription)
                    .then ( (response) => {
                        console.log(response.data);
                        if(response.data.status === 'success' ){
                            // redirect to invoice page to pay
                            window.location.href = '/client/invoices/view/' + response.data.invoice_id ;
                        }
                    })
                    .catch( () => {});

            }
        },
        mounted(){

        }
    }
</script>

<style lang="scss" scoped>
    .plan-text{
        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 27px;
        display: flex;
        align-items: center;
        letter-spacing: -0.1px;
        color: #4A5464;
    }

    .text-orange{
        color: #FFA368;
    }

    .plan-row{
        padding-bottom:12px;
        img,.plan-text{
            margin-right: 10px;
        }
    }
</style>