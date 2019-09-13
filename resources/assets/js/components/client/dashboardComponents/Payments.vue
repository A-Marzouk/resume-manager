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
                                    <img src="/images/client/payments/export_invoice.png" alt="export icon">
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
                    <a href="#">
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
<style scoped>
</style>
