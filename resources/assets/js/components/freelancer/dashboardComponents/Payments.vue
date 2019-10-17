<template>
    <div class="payments">
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
                                    <a :href="'/agent/invoices/view/' + invoice.id">{{invoiceStatusCode[invoice.status]}}</a>
                                </div>
                            </td>
                            <td>
                                <div class="export-icon">
                                    <a :href="'/agent/invoices/export/' + invoice.id">
                                        <img src="/images/client/payments/export_invoice.png" alt="export icon">
                                    </a>
                                </div>
                            </td>

                            <td>
                                <div class="NoDecor">
                                    <a :href="'/agent/invoices/view/' + invoice.id">Open</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="invoices-export-btn">
                    <a href="/agent/invoices/export/all"  v-show="invoices.length > 1">
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
            getAgentInvoices() {
                axios.get('/agent/invoices/get')
                    .then((response) => {
                        this.invoices = response.data;
                        if(this.invoices.length > 0){
                            this.invoices_empty_state = false;
                        }
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
            this.getAgentInvoices();
        }
    }
</script>
<style scoped>
    .table td{
        border-top: 0 !important;
    }
</style>
