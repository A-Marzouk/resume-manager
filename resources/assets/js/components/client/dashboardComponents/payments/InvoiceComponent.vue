<template>
    <div>
        <nav class="navbar navbar-light fixed-top dashboard_navbar" v-show="!modal">
            <div class="backBtn">
                <a href="/client/dashboard/payments">
                    <img src="/images/client/arrow_back.png" alt="back-icon">
                </a>
                {{invoice.identifier}} INVOICE DETAILS
            </div>
        </nav>
        <!--navbar  -->
        <div class="d-flex justify-content-center">
            <div  :class="{'d-flex flex-column w-100' : modal , 'search-main-grid main-grid': !modal}">
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="invoice-style"> INVOICE</div>
                        <div class="modal-logo"></div>
                    </div>
                </div>
                <!-- logos -->
                <div class="pay-top-text">
                    123 Workforce
                    <br/>
                    5th floor Portview House Thorn Castle st Dublin Ireland
                    <br/>
                    00442037000685
                    <br/>
                    info@123workforce.com
                </div>
                <div class="row justify-content-between align-items-baseline invoice-title w-100 flex-wrap">
                    <div class="mr-2" style="font-weight: 500;">№ {{invoice.identifier}}</div>
                    <div class="export-invoice mr-2"> {{invoice.service_title}}</div>
                    <div class="export-invoice" style="font-weight: 500;"> $ {{invoice.total}}</div>
                    <div class="invoice-outstand" style="padding: 0px 16px!important; display: inline; margin-left:0; line-height: 24px;">
                        {{invoiceStatusCode[invoice.status]}}
                    </div>
                    <div class="justify-content-end mobile-display">
                        <div class="export-invoice"
                             style="margin-right: 43px;"><img src="/images/client/payments/export_invoice.png"/>
                        </div>
                        <div class="invoice-download export-invoice payment-pay-text">COPY LINK</div>
                    </div>
                </div>
                <!-- title -->
                <div class="payment-pay-date">
                    Invoice issue date:
                    {{getDate(invoice.created_at).replace(/\//g, '.')}}
                </div>
                <!-- date -->
                <div class="payment-pay-text">
                    <div style=" font-weight: 500;">Client info:</div>
                    <div style="margin:20px 0 16px;">Name: {{invoice.client.contact}}</div>
                    <div style="margin:16px 0;">Company: {{invoice.client.agency}}</div>
                    <div class="d-flex">
                        <div>
                            Contact:
                        </div>
                        <div style="width:200px; margin-left: 3px;"> {{invoice.client.agency_phone}}
                            {{invoice.client.user.email}}
                        </div>
                    </div>
                </div>
                <!--payment info  -->
                <div class="payment-pay-text invoice-info-client d-flex align-items-start align-items-sm-start align-items-md-center align-items-lg-centert">
                    <img src="/images/client/payments/people_24px.png" class="pay-icons"/>
                    <div>
                        <div class="display-content-block payment-pay-title">
                            Name of campaign:
                        </div>
                        <div class="display-content-block">
                            {{invoice.subscription.campaign.title}}
                        </div>
                    </div>
                </div>
                <!--  agent name-->
                <div class="payment-pay-text d-flex align-items-start align-items-sm-start align-items-md-center align-items-lg-center"
                     style="margin-top: 24px;">
                    <img src="/images/client/payments/assignment_turned_in_24px.png" class="pay-icons"/>
                    <div>
                        <div class="display-content-block payment-pay-title">
                            Services provided:
                        </div>
                        <div class="display-content-block">
                            {{invoice.service_title}}
                        </div>
                    </div>
                </div>
                <!-- srevice provided -->
                <div class="payment-pay-text d-flex align-items-start align-items-sm-start align-items-md-center align-items-lg-center"
                     style="margin-top: 24px;">
                    <img src="/images/client/payments/watch_later_24px.png" class="pay-icons"/>
                    <div>
                        <div class="display-content-block payment-pay-title">
                            Hours:
                        </div>
                        <div class="display-content-block">
                            {{invoice.subscription.hours_per_week}} per week
                        </div>
                    </div>
                </div>
                <!--  hours-->
                <div class="payment-pay-text d-flex align-items-start align-items-sm-start align-items-md-center align-items-lg-center"
                     style="margin-top: 24px;">
                    <img src="/images/client/payments/date_range_24px.png" class="pay-icons"/>
                    <div>
                        <div class="display-content-block payment-pay-title">
                            Date:
                        </div>
                        <div class="display-content-block">
                            {{invoice.subscription.start_date.replace(/-/g, '.')}}
                        </div>
                    </div>
                </div>
                <!-- date -->
                <div class="payment-pay-text d-flex align-items-start align-items-sm-start align-items-md-center align-items-lg-center"
                     style="margin-top: 24px;">
                    <img src="/images/client/payments/Subtract.png" class="pay-icons"/>
                    <div>
                        <div class="display-content-block payment-pay-title">
                            Rate:
                        </div>
                        <div class="display-content-block">
                            $  {{invoice.subscription.hourly_rate}}
                        </div>
                    </div>
                </div>
                <!-- rate -->
                <div class="payment-pay-text d-flex align-items-start align-items-sm-start align-items-md-center align-items-lg-center"
                     style="margin-top: 24px;">
                    <img src="/images/client/payments/account_balance_wallet_24px.png" class="pay-icons"/>
                    <div>
                        <div class="display-content-block payment-pay-title">
                            Total due:
                        </div>
                        <div class="display-content-block">
                            $ {{invoice.total}}
                        </div>
                    </div>
                </div>
                <!-- total due -->
                <hr style="margin: 30px 0;"/>
                <div class="d-flex justify-content-end">
                    <button class="agreement-button payment-button">PAY VIA PayPal</button>
                </div>
            </div>
            <!-- payments info -->
        </div>
    </div>
</template>

<script>
    export default {
        props: ['invoice','modal'],
        data() {
            return {
                invoiceStatusCode:{
                    '1':'PAID',
                    '2':'OUTSTANDING',
                    '3':'CANCELLED',
                }
            }
        },
        methods: {
            getDate(date) {
                let event = new Date(date);
                let options = { day: '2-digit', month: '2-digit', year:'numeric' };
                return event.toLocaleDateString('en-EN', options);
            },
        }
    }
</script>

<style scoped lang="scss">
    .agreement-button:hover {
        cursor: pointer;
    }
</style>