<template>
    <div class="payments">
        <div class="subscriptions">
            <div class="subs-heading">
                <div class="left">
                    <img src="/resumeApp/public/images/client/plan.png" alt="subs icon">
                    <span>
                        YOUR SUBSCRIPTIONS
                    </span>
                </div>
                <div class="right">
                    <a href="javascript:void(0)" v-show="!payments_empty_state">
                        <img src="/resumeApp/public/images/client/payments/add.png" alt="add icon">
                        ADD NEW SUBSCRIPTION PLAN
                    </a>
                    <span>
                        SUBSCRIPTION RECORD
                    </span>
                </div>
            </div>
            <div class="subs-empty-state" v-show="payments_empty_state">
                <div class="subs-e-s-text">
                    There are no subs yet.
                </div>
                <div class="subs-e-s-action">
                    <a href="javascript:void(0)">
                        SET UP YOUR SUBSCRIPTION PLAN
                    </a>
                </div>
            </div>
            <div class="subs-list" v-show="!payments_empty_state">
                <div class="sub-item">
                    <div class="next-billing-date">
                        <span class="date"> 22.04.19 </span> next billing date
                    </div>
                    <div class="sub-info">
                        <div class="sub-info-box">
                            <img src="/resumeApp/public/images/client/payments/time.png" alt="time icon">
                            <div class="right">
                                <div class="sub-info-box-heading">
                                    60 HOURS
                                </div>
                                <div class="sub-info-box-note">
                                    per week
                                </div>
                            </div>
                        </div>
                        <div class="sub-info-box">
                            <img src="/resumeApp/public/images/client/payments/amount.png" alt="time icon">
                            <div class="right">
                                <div class="sub-info-box-heading">
                                    $ 600
                                </div>
                                <div class="sub-info-box-note">
                                    weekly amount
                                </div>
                            </div>
                        </div>
                        <div class="sub-info-box">
                            <img src="/resumeApp/public/images/client/payments/week.png" alt="time icon">
                            <div class="right">
                                <div class="sub-info-box-heading">
                                   14 WEEKS
                                </div>
                                <div class="sub-info-box-note">
                                   10 used / 4 left
                                </div>
                            </div>
                        </div>
                        <div class="sub-info-box">
                            <img src="/resumeApp/public/images/client/payments/period.png" alt="time icon">
                            <div class="right">
                                <div class="sub-info-box-heading">
                                   4.04.19 - 4.01.20
                                </div>
                                <div class="sub-info-box-note">
                                   start date - finish date
                                </div>
                            </div>
                        </div>
                        <div class="sub-info-box">
                            <img src="/resumeApp/public/images/client/payments/number_agents.png" alt="time icon">
                            <div class="right">
                                <div class="sub-info-box-heading">
                                    4 AGENTS
                                </div>
                                <div class="sub-info-box-note">
                                    working on campaign
                                </div>
                            </div>
                        </div>
                        <div class="sub-info-box">
                            <img src="/resumeApp/public/images/client/payments/rate.png" alt="time icon">
                            <div class="right">
                                <div class="sub-info-box-heading">
                                    $ 10
                                </div>
                                <div class="sub-info-box-note">
                                    agent's hourly rate
                                </div>
                            </div>
                        </div>
                        <div class="sub-info-box">
                            <img src="/resumeApp/public/images/client/payments/manager.png" alt="time icon">
                            <div class="right">
                                <div class="sub-info-box-heading">
                                   CONOR MARJORAM
                                </div>
                                <div class="sub-info-box-note">
                                    your manager
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sub-action">
                        <a href="/client/payments/sub-update">
                            UPDATE SUBSCRIPTION PLAN
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="invoices">
            <div class="invoices-heading">
                <img src="/resumeApp/public/images/client/payments/invoices_40px.png" alt="invoices icon">
                YOUR INVOICES
            </div>
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a class="invoice-view" data-toggle="modal" data-target="#view-invoice" href="javascript:void(0)">
                                    <img src="/resumeApp/public/images/client/payments/show_invoice.png" alt="show invoice icon">
                                </a>
                            </td>
                            <td>
                                <div class="invoice-number">
                                    059-044-038
                                </div>
                            </td>
                            <td>
                                <div class="invoice-service">
                                    Other services
                                </div>
                            </td>
                            <td>
                                <div class="invoice-amount">
                                    $ 3,500
                                </div>
                            </td>
                            <td style="display:inline-block">
                                <div  class="payment-btn due">
                                    <a href="/client/payments/pay">DUE</a>
                                </div>
                            </td>
                            <td>
                                <div class="export-icon">
                                    <img src="/resumeApp/public/images/client/payments/export_invoice.png" alt="export icon">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="invoice-view" data-toggle="modal" data-target="#view-invoice" href="javascript:void(0)">
                                    <img src="/resumeApp/public/images/client/payments/show_invoice.png" alt="show invoice icon">
                                </a>
                            </td>
                            <td>
                                <div class="invoice-number">
                                    059-044-038
                                </div>
                            </td>
                            <td>
                                <div class="invoice-service">
                                    Other services
                                </div>
                            </td>
                            <td>
                                <div class="invoice-amount">
                                    $ 3,500
                                </div>
                            </td>
                            <td>
                                <div  class="payment-btn upcoming">
                                    <a href="#">UPCOMING</a>
                                </div>
                            </td>
                            <td>
                                <div class="export-icon">
                                    <img src="/resumeApp/public/images/client/payments/export_invoice.png" alt="export icon">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="invoice-view" data-toggle="modal" data-target="#view-invoice" href="javascript:void(0)">
                                    <img src="/resumeApp/public/images/client/payments/show_invoice.png" alt="show invoice icon">
                                </a>
                            </td>
                            <td>
                                <div class="invoice-number">
                                    059-044-038
                                </div>
                            </td>
                            <td>
                                <div class="invoice-service">
                                    Other services
                                </div>
                            </td>
                            <td>
                                <div class="invoice-amount">
                                    $ 3,500
                                </div>
                            </td>
                            <td>
                                <div  class="payment-btn paid">
                                    <a href="#">PAID</a>
                                </div>
                            </td>
                            <td>
                                <div class="export-icon">
                                    <img src="/resumeApp/public/images/client/payments/export_invoice.png" alt="export icon">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="invoice-view" data-toggle="modal" data-target="#view-invoice" href="javascript:void(0)">
                                    <img src="/resumeApp/public/images/client/payments/show_invoice.png" alt="show invoice icon">
                                </a>
                            </td>
                            <td>
                                <div class="invoice-number">
                                    059-044-038
                                </div>
                            </td>
                            <td>
                                <div class="invoice-service">
                                    Other services
                                </div>
                            </td>
                            <td>
                                <div class="invoice-amount">
                                    $ 3,500
                                </div>
                            </td>
                            <td>
                                <div  class="payment-btn paid">
                                    <a href="#">PAID</a>
                                </div>
                            </td>
                            <td>
                                <div class="export-icon">
                                    <img src="/resumeApp/public/images/client/payments/export_invoice.png" alt="export icon">
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
            <div class="subs-empty-state" v-show="payments_empty_state">
                <div class="subs-e-s-text">
                    There are no invoices yet.
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       data(){
           return{
               payments_empty_state : false
           }
       }
    }
</script>

<style scoped>

</style>