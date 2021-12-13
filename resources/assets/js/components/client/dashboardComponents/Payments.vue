<template>
    <div class="payments">
        <div class="subscriptions">
            <div class="subs-heading">
                <div class="left">
                    <img src="/images/client/plan.png" alt="subs icon">
                    <span>
                        YOUR SUBSCRIPTIONS
                    </span>
                </div>
                <div class="right">
                    <a href="/client/payments/sub-set-up" v-show="subs.length > 0">
                        <img src="/images/client/payments/add.png" alt="add icon">
                        ADD NEW SUBSCRIPTION PLAN
                    </a>
                    <span>
                        SUBSCRIPTION RECORD
                    </span>
                </div>
            </div>
            <div class="subs-empty-state"
                 v-show="subs.length < 1">
                <div>
                    <img src="/images/client/payments/Illustrations_065_Subscr_empty_state.svg" alt="subs empty state">
                </div>
                <div class="subs-e-s-action" style="padding-top:50px;">
                    <a href="/client/payments/sub-set-up">
                        SET UP YOUR SUBSCRIPTION PLAN
                    </a>
                </div>
            </div>
            <div class="subs-list" v-show="subs.length > 0">
                <div v-for="(sub,index) in subs" :key="index" class="sub-item">
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
                                    {{sub.original_duration_in_weeks}} WEEKS
                                </div>
                                <div class="sub-info-box-note">
                                    {{parseInt(sub.original_duration_in_weeks) - parseInt(sub.duration_in_weeks)}} used
                                    / {{sub.duration_in_weeks}} left
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
                                    $ {{sub.hourly_rate}}
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
                                    {{sub.manager.user.user_data.first_name}} {{sub.manager.user.user_data.last_name}}
                                </div>
                                <div class="sub-info-box-note">
                                    your manager
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sub-action">
                        <a :href="'/client/subs/update/' + sub.id">
                            UPDATE SUBSCRIPTION PLAN
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="invoices">
            <div class="invoices-heading">
                <img src="/images/client/payments/invoices_40px.png" alt="invoices icon">
                YOUR INVOICES
            </div>
            <div v-show="!invoices_empty_state">
                <div class="table invoices-table">
                    <table>
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">INVOICE NUMBER</th>
                            <th scope="col">SERVICE PROVIDED</th>
                            <th scope="col">TOTAL DUE</th>
                            <th scope="col">PAYMENT STATUS</th>
                            <th scope="col">EXPORT</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(invoice,index) in invoices" :key="index">
                            <td>
                                <a class="invoice-view" data-toggle="modal" data-target="#view-invoice"
                                   @click="setOpenedInvoice(invoice)"
                                   href="javascript:void(0)">
                                    <img src="/images/client/payments/show_invoice.png" alt="show invoice icon">
                                </a>
                            </td>
                            <td>
                                <div class="invoice-number">
                                    {{invoice.identifier}}
                                </div>
                            </td>
                            <td>
                                <div class="invoice-service">
                                    {{invoice.service_title}}
                                </div>
                            </td>
                            <td>
                                <div class="invoice-amount">
                                    $ {{invoice.total}}
                                </div>
                            </td>
                            <td style="display:inline-block">
                                <div class="payment-btn" :class="{ 'paid' : invoice.status == 1, 'upcoming' :invoice.status == 2, 'due' : invoice.status == 4}">
                                    <a :href="'/client/invoices/view/' + invoice.id">{{invoiceStatusCode[invoice.status]}}</a>
                                </div>
                            </td>
                            <td>
                                <div class="export-icon">
                                    <a :href="'/client/invoices/export/' + invoice.id">
                                        <img src="/images/client/payments/export_invoice.png" alt="export icon">
                                    </a>
                                </div>
                            </td>

                            <td>
                                <div class="NoDecor">
                                    <a :href="'/client/invoices/view/' + invoice.id">Open</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="invoices-export-btn">
                    <a href="/client/invoices/export/all"  v-show="invoices.length > 1">
                        EXPORT ALL INVOICES
                    </a>
                </div>
            </div>

            <div class="subs-empty-state"
                 v-show="invoices_empty_state">
                <div>
                    <img src="/images/client/payments/Illustrations_065_Invoice_empty_state.svg"
                         alt="invoices empty state">
                </div>
                <div class="subs-e-s-text" style="padding-bottom: 70px;">
                    There are no invoices yet.
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                subs: [],
                invoices: [],
                invoices_empty_state: true,
                invoiceStatusCode: {
                    '1': 'PAID',
                    '2': 'OUTSTANDING',
                    '3': 'CANCELLED',
                }
            }
        },
        methods: {
            getClientSubs() {
                axios.get('/client/subs/get')
                    .then((response) => {
                        this.subs = response.data;
                    })
                    .catch((error) => {

                    });
            },
            getClientInvoices() {
                axios.get('/client/invoices/get')
                    .then((response) => {
                        this.invoices = response.data;
                        this.invoices_empty_state = false;
                    })
                    .catch((error) => {

                    });
            },
            calculateNextBillingDate() {

            },
            setOpenedInvoice(invoice) {
                this.$emit('openInvoice', invoice);
            }
        },
        mounted() {
            this.getClientSubs();
            this.getClientInvoices();

            let searchParams = new URLSearchParams(window.location.search);

            if (searchParams.has('request')) {
                if (searchParams.get('request') === 'updateSubscription') {
                    let notificationMessage = "Request successfully sent. (Update subscription plan)";
                    this.$emit('showPositiveNotification', notificationMessage);
                    window.history.pushState('request', 'sent', '/client/dashboard/payment');
                }
            }

        }
    }
</script>
<style lang="scss" scoped>

    .subscriptions{
        background: white;
        box-shadow: 0px 2px 18px rgba(179, 183, 186, 0.57);
        border-radius: 4px;

    .subs-heading{
    @media (max-width:1240px) {
        padding-top: 0;
    }

    @media (max-width:650px) {
        padding-top: 34px;
        flex-direction: column;
    }
    display: flex;
    justify-content: space-between;
    padding-bottom: 24px;
    padding-top: 34px;
    margin-left:24px;
    margin-right: 24px;
    border-bottom: 1px solid rgba(188, 191, 198, 0.44);
    .left{
        display:flex;
        align-items:center;
    img{
        margin-right:20px;
    }
    span{
        font-family: Roboto;
        font-style: normal;
        font-weight: 500;
        font-size: 20px;
        line-height: 16px;
        text-transform: uppercase;
        color: #4A5464;
    @media (max-width:650px) {
        font-size: 16px;
        img{
            width: 30px;
            height: 30px;
        }
    }
    }
    }
    .right{
    @media (max-width:1240px) {
        flex-direction: column;
        align-items: flex-end;
        padding-top: 45px;
        span{
            margin-right: 18px;
        }
    }
    @media (max-width:650px) {
        padding-top: 20px;
        span{
            margin-right: 4px;
        }
    }
    display:flex;
    align-items:center;
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 24px;
    text-align: center;
    letter-spacing: -0.1px;
    color: #05A4F4;
    a{
    @media (max-width:1240px) {
        margin-right:0;
        margin-bottom:20px;
    }

    @media (max-width:650px) {
        font-size: 14px;
        width: 257px;
    }
    height:36px;
    width: 271px;
    margin-right:20px;
    display: flex;
    justify-content: center;
    align-items: center;

    border: 2px solid #05A4F4;
    border-radius: 40px;
    color: inherit;
    img{
        margin-right:12px;
    }
    }
    a:hover{
        text-decoration: none;
    }
    }
    }

    .subs-list{
        margin-left:24px;
        margin-right: 24px;
    }
    .sub-item{
    .next-billing-date{
        display: flex;
        justify-content: flex-end;
        font-family: Roboto;
        font-style: normal;
        line-height: 24px;
        padding-top: 20px;
        padding-bottom: 18px;
        color: #4A5464;
        font-size: 12px;
    .date{
        font-weight: 500;
        font-size: 14px;
        color: #FFA368;
        margin-right:5px;
    }
    }
    .sub-info{
    @media (max-width:650px) {
        justify-content: center;
    }
    display: flex;
    justify-content: flex-start;
    flex-wrap: wrap;
    margin-right: -16px;
    .sub-info-box{
        width: 210px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        border: 1px solid #E2E3E6;
        border-radius: 4px;
        margin-bottom: 16px;
        margin-right: 16px;
    img{
        margin-left: 16px;
        margin-right: 16px;
    }

    .right{
        display: flex;
        flex-direction: column;
        justify-content: center;
    .sub-info-box-heading{
        font-family: Roboto;
        font-style: normal;
        font-weight: bold;
        font-size: 14px;
        line-height: 24px;
        color: #FFA368;
    }
    .sub-info-box-note{
        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 24px;
        color: #4A5464;
        opacity: 0.7;
    }
    }
    }
    }
    }

    .sub-action{
        display:flex;
        justify-content:right;
        display: flex;
        justify-content: flex-end;
    @media (max-width:650px) {
        justify-content: center;
    }
    padding: 20px 0 28px 0;
    a{
        width: 226px;
        height: 48px;
        border-radius: 4px;
        display: flex;
        justify-content: center;
        align-items: center;
        background:#05A4F4 ;

        font-family: Roboto;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        text-align: center;
        text-transform: uppercase;
        color: #FFFFFF;
    }
    a:hover{
        text-decoration: none;
    }
    }

    }



    .invoices{
        background: white;
        box-shadow: 0px 2px 18px rgba(179, 183, 186, 0.57);
        border-radius: 4px;
        margin-top: 15px;
        padding-left: 24px;
        padding-right: 24px;
    .invoices-heading {
        display: flex;
        justify-content: flex-start;
        align-items:center;
        padding-bottom: 24px;
        padding-top: 34px;
        font-family: Roboto;
        font-style: normal;
        font-weight: 500;
        font-size: 20px;
        line-height: 16px;
        text-transform: uppercase;
        color: #4A5464;
    img {
        margin-right: 20px;
    }

    }
    .invoices-export-btn{
        padding-bottom:26px;
        padding-top: 26px;
        display:flex;
        justify-content:flex-end;
        align-items:center;
    a:hover{
        text-decoration:none;
    }
    a{
        width:183px;
        height:36px;
        display:flex;
        justify-content:center;
        align-items:center;
        font-family: Roboto;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 24px;
        text-align: center;
        letter-spacing: -0.1px;
        color: #05A4F4;
        border:2px solid #05A4F4;
        border-radius: 2px;
    }
    }
    }

    .invoices-table{
    table{
        width: 100%;
    thead{
    tr{
        background: #3EA3D7;
        border-radius:4px ;
        height:  38px;
    th{
        font-family: Roboto;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        text-transform: uppercase;
        color: #FFFFFF;
        border: none;
        white-space: nowrap;
    }
    th:first-child{
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    th:last-child{
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }
    }
    }
    tbody{
        box-shadow: 0px 4px 7px rgba(202, 202, 202, 0.25);
    tr{
        height: 70px;
    td{
        padding-top: 25px;
        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: #4A5464;
    .invoice-view{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: -4px;
    }
    .invoice-number{
        display: flex;
        align-items: center;
    }
    .invoice-service{
        line-height: 13px;
        letter-spacing: -0.1px;
        color: #4A5464;
    }
    .invoice-amount{
        font-weight: 500;
    }
    .payment-btn{
    a:hover{
        text-decoration:none;
    }
    a{
        width:116px;
        height:24px;
        display:flex;
        justify-content:center;
        align-items:center;
        background: #FFFFFF;
        box-sizing: border-box;
        border-radius: 40px;
        font-family: Roboto;
        font-style: normal;
        font-weight: bold;
        font-size: 12px;
        line-height: 24px;
        text-align: center;
        letter-spacing: -0.1px;
    }
    }
    .due{
    a{
        border: 2px solid #F56F6F;
        color: #F56F6F;
    }
    }
    .upcoming{
    a{
        border: 2px solid #FFA368;
        color: #FFA368;
    }
    }
    .paid{
    a{
        border: 2px solid #27AE60;
        color: #27AE60;
    }
    }
    .active{
    a{
        border: 2px solid #27AE60;
        color: #27AE60;
        width: 79px;
        height: 30px;
        margin-top: -8px;
    }
    }
    .new{
    a{
        border: 2px solid #FFA368;
        color: #FFA368;
        width: 79px;
        height: 30px;
        margin-top: -8px;
    }
    }
    .paused{
    a{
        border: 2px solid #9346DA;
        color: #9346DA;
        width: 79px;
        height: 30px;
        margin-top: -8px;
    }
    }
    .export-icon{
    img{
        margin-left:10px;
    }
    }
    }
    }
    }
    }
    }

    .table{
    @media (max-width:900px) {
        overflow-x: scroll !important;
    }
    }

    .subscriptions,.invoices{
    .subs-empty-state{
        display:flex;
        justify-content:center;
        flex-direction: column;
        align-items: center;
    .subs-e-s-text{
        padding-top: 67px;
        padding-bottom:148px;

        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 24px;
        text-align: center;
        letter-spacing: -0.1px;
        color: #4A5464;
        opacity: 0.8;
    }
    .subs-e-s-action{
        padding-bottom: 68px;
    a:hover{
        text-decoration: none;
    }
    a{
        width: 249px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: Roboto;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 24px;
        letter-spacing: -0.1px;
        color: #05A4F4;
        border: 2px solid #05A4F4;
        border-radius: 40px;
    }
    }
    }
    }


</style>
