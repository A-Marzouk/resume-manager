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
                Client name :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.clientName}}</b><br/>
                Total amount to pay :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.total_amount}}</b><br/>
                Hours :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.hours}}</b><br/>
                Rate per Hour :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.rate}}</b><br/>
                Agent :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.agentName}}</b><br/>
                <div  style="color: #30323D;font-family: Roboto;" >Service provided : {{nl2br(invoice.service,false)}}</div>
                <div  style="color: #30323D;font-family: Roboto;" v-show="invoice.notes != null">Notes : {{invoice.notes}}</div>
                <div  style="color: #30323D;font-family: Roboto;" v-show="invoice.time_of_service != null">Time : {{nl2br(invoice.time_of_service,false)}}</div>
                Time zone:<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.timeZone}}</b><br/>
                Status : <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.status}}</b><br/>
                <div class="NoDecor">
                    Related Campaign Brief : <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">
                    <a :href="'https://123workforce.com/workforce/campaign_briefs/'+invoice.campaign_brief_id" target="_blank">View campaign brief</a>
                    </b><br/>
                </div>

                <div class="NoDecor">
                    Public link :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">
                    <a :href="'https://123workforce.com/workforce/invoices/'+invoice.unique_number" target="_blank"> View invoice</a>
                    </b><br/>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <hr>
                        <div class="panelFormLabel" style="padding-bottom:10px;">
                            Change invoice unique identifier :
                        </div>
                        <div class="form-group">
                            <input type="text" @click="editInvoice(invoice.id)" class="form-control" v-model="invoice.unique_number">
                        </div>
                        <div :id="invoice.id" class="d-none" style="color: red">
                            This number is already in use, please use another one.
                        </div>

                        <div :id="invoice.id+'_updated'" class="d-none" style="color: lightgreen">
                            Updated.
                        </div>
                        <a href="javascript:void(0)" v-show="toBeEditedInvoice.id === invoice.id" class="btn btn-primary" @click="updateInvoiceNumber">Update</a>
                    </div>
                </div>
            </invoice-component>
        </transition-group>

        <div class="pageSubHeading text-left" v-show="this.invoices.length < 1">
            Currently this client has no invoices.
        </div>
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
                    'agentName' :'',
                    'hours':'',
                    'rate' :'',
                    'service' :'',
                    'notes':'',
                    'time_of_service':'',
                    'status':'',
                    'timeZone':'',
                    'campaign_brief_id':'',
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
                // hide errors
                $('#'+ editedInvoice.id).addClass('d-none');
                $('#'+ editedInvoice.id + '_updated').addClass('d-none');
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
                    'agentName' :'',
                    'hours':'',
                    'rate' :'',
                    'service' :'',
                    'notes':'',
                    'time_of_service':'',
                    'status':'',
                    'timeZone':'',
                    'campaign_brief_id':''
                };
            },

            updateInvoiceNumber(){
                let data = {
                  'invoice_id' : this.toBeEditedInvoice.id,
                  'newNumber': this.toBeEditedInvoice.unique_number
                };
                axios.post('/admin/update_invoice_number',data).then( (response) => {
                    if(response.data === 'used'){
                        $('#'+ data.invoice_id).removeClass('d-none');
                    }else{
                        $('#'+ data.invoice_id + '_updated').removeClass('d-none');
                    }
                    this.clearData();
                });
            },
            nl2br (str, is_xhtml) {
                if (typeof str === 'undefined' || str === null) {
                    return '';
                }
                var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
                return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
            },

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