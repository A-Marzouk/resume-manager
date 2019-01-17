<template>
    <div>
        <transition-group name="list" class="row">
            <invoice-component v-for="(invoice,index) in invoices" v-bind:key="index" class="list-item workExperience col-12" style="margin: 0px 10px 20px;">

                <span class="deleteWorkBtn NoDecor" @click="deleteInvoice(invoice)">
                    <a href="javascript:void(0)">
                        <img src="/resumeApp/resources/assets/images/close_blue.png" alt="edit profile">
                        Delete
                    </a>
                </span>

                <span class="deleteWorkBtn NoDecor"  @click="editInvoice(invoice.id)" style=" width: 75px; margin-right:5px;">
                    <a href="javascript:void(0)" data-target="#addInvoiceModal"  data-toggle="modal">
                        <img src="/resumeApp/resources/assets/images/edit_blue.png" alt="edit profile" style="width: 20px;
    padding-right: 7px;
    padding-bottom: 2px;
    height: 15px;">
                        Edit
                    </a>
                </span>
                <div class="pageSubHeading text-left">
                    Invoice details
                </div>
                Total amount to pay :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.total_amount}}</b><br/>
                Hours :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.hours}}</b><br/>
                Rate per Hour :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.rate}}</b><br/>
                <div  style="color: #30323D;font-family: Roboto;">Service provided : {{invoice.service}}</div>
                <div  style="color: #30323D;font-family: Roboto;" v-show="invoice.notes != null">Notes : {{invoice.notes}}</div>
                <div  style="color: #30323D;font-family: Roboto;" v-show="invoice.time_of_service != null">Time : {{invoice.time_of_service}}</div>
                Status : <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.status}}</b><br/>
                <div class="NoDecor">
                    Public link : <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">
                    <a :href="'https://123workforce.com/workforce/invoices/'+invoice.unique_number" target="_blank">https://123workforce.com/workforce/invoices/{{invoice.unique_number}}</a>
                    </b><br/>
                </div>
            </invoice-component>
        </transition-group>

        <span class="deleteWorkBtn NoDecor" v-show="this.canAdd" @click="clearData" style="width:137px">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#addInvoiceModal">
                <img src="/resumeApp/resources/assets/images/add_blue.png" alt="edit profile">
                Add Invoice
            </a>
        </span>
        <br/>
        <add-invoice-modal @invoiceAdded="addInvoice"  :toBeEditedInvoice="toBeEditedInvoice"></add-invoice-modal>
    </div>
</template>

<script>
    export default {
        props:['client_id'],
        data() {
            return {
                invoices: [],
                canAdd:true,
                toBeEditedInvoice:{
                    'id':'',
                    'unique_number':'',
                    'client_id':this.client_id,
                    'total_amount' :'',
                    'hours':'',
                    'rate' :'',
                    'service' :'',
                    'notes':'',
                    'time_of_service':'',
                    'status':''
                }
            }
        },

        methods: {
            getCurrentInvoices() {
                axios.get('/admin/client/invoices/'+ this.client_id).then(
                    (response) => {
                        let currInvoices =  response.data;
                        $.each(currInvoices, function(i){
                        });
                        this.invoices = currInvoices;
                        this.checkMaxInvoices();
                    }
                );
            },

            addInvoice(newInvoice) {
                this.invoices.push(newInvoice);
                this.checkMaxInvoices();
            },

            deleteInvoice(invoice){
                if(!confirm('Are you sure you want to delete this invoice ?')){
                    return;
                }
                axios.post('/admin/client/deleteinvoice',{invoiceID:invoice.id}).then((response)=>{
                    let invoices = this.invoices;
                    $.each(invoices, function(i){
                        if(invoices[i].id === invoice.id) {
                            invoices.splice(i,1);
                            return false;
                        }
                    });

                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);

                    this.checkMaxInvoices();

                });
            },

            editInvoice(invoiceID){
                let invoices = this.invoices;
                let editedInvoice =  {};

                $.each(invoices, function(i){
                    if(invoices[i].id === invoiceID){
                        editedInvoice = invoices[i];
                    }
                });
                this.toBeEditedInvoice = editedInvoice;
            },

            checkMaxInvoices(){
                if(this.invoices.length > 4){
                    this.canAdd =  false;
                }else{
                    this.canAdd = true;
                }
            },

            clearData(){
                this.toBeEditedInvoice={
                    'id':'',
                    'unique_number':'',
                    'client_id':this.client_id,
                    'total_amount' :'',
                    'hours':'',
                    'rate' :'',
                    'service' :'',
                    'notes':'',
                    'time_of_service':'',
                    'status':''
                };
            }
        },

        created() {
            this.getCurrentInvoices();
        }
    }
</script>

<style lang="css">
    .list-item {
        display: inline-block;
        margin-right: 10px;
    }
    .list-enter-active, .list-leave-active {
        transition: all 1s;
    }
    .list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
        opacity: 0;
        transform: translateY(30px);
    }
</style>