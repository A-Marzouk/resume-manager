<template>
    <div>
        <div class="alert-danger d-none" style="padding: 15px;" id="invoiceErrors">
            Error while saving, please fill in all required fields.
        </div>
        <transition-group name="list" class="row">
            <invoice-component v-for="(invoice,index) in invoices" v-bind:key="index" class="list-item workExperience col-12" style="margin: 0px 10px 20px;">
                <div class="row">
                    <div class="col-md-12">
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
                        <br/>
                        Total amount to pay :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.total_amount}}</b><br/>
                        Currency :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.currency}}</b><br/>
                        <div  style="color: #30323D;font-family: Roboto;" v-show="invoice.notes != null">Notes : {{invoice.notes}}</div>
                        <hr>
                        Hours :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.hours}}</b><br/>
                        <hr>
                        Status : <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.status}}</b><br/>
                        Payment options : <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">  {{invoice.payment_options.join(' | ')}}</b><br/>

                        <div class="NoDecor">
                            Public link :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">
                            <a :href="'https://123workforce.com/workforce/invoices/'+invoice.unique_number" target="_blank"> View invoice</a>
                        </b><br/>
                        </div>
                        <div v-show="invoice.services.length < 1" class="font-weight-bold row">
                            No services in this invoice.
                        </div>
                        <div class="row" v-show="invoice.services.length > 0">
                            <div class="font-weight-bold col-12">
                                Services : ({{invoice.services.length}}#)
                            </div>
                            <div  class="col-8" v-for="(service,index) in invoice.services" v-bind:key="index" style="margin:5px 0 5px 5px; padding:5px 0 5px 5px; border:1px solid lightgrey; border-radius:5px;">
                                <div class="text-center row">
                                    <span style="padding:10px 0 5px 0; border-bottom: 1px solid lightgrey">
                                        Service details
                                    </span>
                                </div>
                                <div class="row" style="padding-top: 10px;">
                                    <div>
                                        <b>Title :</b>{{service.title}}<br/>
                                        <b>Rate : </b> {{service.rate}} USD<br/>
                                        <b>Hours : </b> {{service.hours}}<br/>
                                        <b>Service days : <Br/></b>{{service.days}}
                                    </div>
                                </div>
                            </div>
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
                    </div>
                </div>
            </invoice-component>
        </transition-group>

        <div class="pageSubHeading text-left" v-show="this.invoices.length < 1">
            Currently this client has no invoices.
        </div>
        <add-invoice-modal :toBeEditedInvoice="toBeEditedInvoice"></add-invoice-modal>
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
                    'notes':'',
                    'status':'',
                    'timeZone':'',
                    'currency':'',
                    'campaign_brief_id':'',
                     errors:[],
                     services:[],
                     payment_options:[]
                }
            }
        },

        methods: {
            getCurrentInvoices() {
                axios.get('/admin/client/invoices/'+ this.client_id).then(
                    (response) => {
                        let currInvoices =  response.data;
                        $.each(currInvoices, function(i){
                            if(currInvoices[i].payment_options === null){
                                currInvoices[i].payment_options = [];
                            }else{
                                currInvoices[i].payment_options = currInvoices[i].payment_options.split(',')
                            }
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
                    'hours':'',
                    'rate' :'',
                    'notes':'',
                    'status':'',
                    'timeZone':'',
                    'currency':'',
                    'campaign_brief_id':'',
                    errors:[],
                    services:[],
                    payment_options:[]
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
            getDateOfISOWeek(w, y) {
                var simple = new Date(y, 0, 1 + (w - 1) * 7);
                var dow = simple.getDay();
                var ISOweekStart = simple;
                if (dow <= 4)
                    ISOweekStart.setDate(simple.getDate() - simple.getDay() + 1);
                else
                    ISOweekStart.setDate(simple.getDate() + 8 - simple.getDay());

                return this.getDate(ISOweekStart);
            },
            getDate(date){
                let event = new Date(date);
                let options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };
                return event.toLocaleDateString('en-EN', options);
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