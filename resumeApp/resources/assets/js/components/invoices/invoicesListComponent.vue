<template>
    <div>
        <div class="alert-danger d-none" style="padding: 15px;" id="invoiceErrors">
            Error while saving..
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
                        <span class="deleteWorkBtn NoDecor"  @click="editInvoice(invoice.id)" style=" width: 125px; margin-right:5px;">
                            <a href="javascript:void(0)" data-target="#addInvoiceShiftModal"  data-toggle="modal">
                                <img src="/resumeApp/resources/assets/images/add_blue.png" alt="edit profile" style="width: 20px;
            padding-right: 7px;
            padding-bottom: 2px;
            height: 15px;">
                                Add shift
                            </a>
                        </span>

                        <div class="pageSubHeading text-left">
                            Invoice details
                        </div>
                        Client name :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.clientName}}</b><br/>
                        Agent :
                        <b v-if="invoice.agent !== null" style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">
                            {{invoice.agent.firstName}} {{invoice.agent.lastName}}
                        </b>
                        <br/>
                        Rate per Hour :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.rate}}</b><br/>
                        Total amount to pay :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.total_amount}}</b><br/>
                        Currency :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.currency}}</b><br/>
                        <div  style="color: #30323D;font-family: Roboto;" >Service provided : {{nl2br(invoice.service,false)}}</div>
                        <div  style="color: #30323D;font-family: Roboto;" v-show="invoice.notes != null">Notes : {{invoice.notes}}</div>
                        <hr>
                        Time zone:<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.timeZone}}</b><br/>
                        <div  style="color: #30323D;font-family: Roboto;" v-show="invoice.time_of_service != null">Time : {{nl2br(invoice.time_of_service,false)}}</div>
                        Year - Week :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.week}}</b>
                        <span>{{invoice.weekDate}}</span>
                        <br/>

                        Hours :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{invoice.hours}}</b><br/>

                        Working hours :<br/><b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">
                        Start : {{invoice.start_time}} | End : {{invoice.end_time}} </b>
                        <br/>
                        Days :
                        <div style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">
                            <b v-show="invoice.days.includes('all_days')">
                                All days of the week.
                            </b>
                            <b v-show="!invoice.days.includes('all_days')">
                                {{invoice.days.join(' | ')}}
                            </b>
                        </div>

                        <hr>
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
                        <div v-show="invoice.shifts.length < 1" class="font-weight-bold row">
                            No shifts in this invoice.
                        </div>
                        <div class="row" v-show="invoice.shifts.length > 0">
                            <div class="font-weight-bold">
                                Shifts : ({{invoice.shifts.length}}#)
                            </div>
                            <transition-group name="list" class="col-12">
                                <div  class="list-item" v-for="(shift,index) in invoice.shifts" v-bind:key="index" style="margin:5px 0 5px 5px; padding:5px 0 5px 5px; border:1px solid lightgrey; border-radius:5px;">
                                    <div class="text-center">
                                        <span style="padding:10px 0 5px 0; border-bottom: 1px solid lightgrey">
                                            Shift details
                                        </span>
                                    </div>
                                    <div class="row" style="padding-top: 10px;">
                                        <div class="col-md-8">
                                            <b>Starts at :</b>{{shift.start_time}}<br/>
                                            <b>Ends at : </b> {{shift.end_time}}<br/>
                                            <b>Rate : </b> {{shift.rate}}<br/>
                                            <b>Service : </b> {{shift.service}}<br/>
                                            <b>Shift days : <Br/></b>{{shift.days}}
                                        </div>
                                        <div class="col-md-4">
                                     <span class="deleteWorkBtn NoDecor" @click="deleteShift(shift)">
                                        <a href="javascript:void(0)">
                                            <img src="/resumeApp/resources/assets/images/close_blue.png" alt="edit profile">
                                            Delete
                                        </a>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </transition-group>
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
        <span class="deleteWorkBtn NoDecor" v-show="this.canAdd" @click="clearData" style="width:137px">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#addInvoiceModal">
                <img src="/resumeApp/resources/assets/images/add_blue.png" alt="edit profile">
                Add Invoice
            </a>
        </span>
        <br/>
        <add-invoice-modal @invoiceAdded="addInvoice"  :toBeEditedInvoice="toBeEditedInvoice"></add-invoice-modal>
        <add-invoice-shift-modal :toBeEditedInvoice="toBeEditedInvoice"></add-invoice-shift-modal>
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
                    'user_id':'',
                    'total_amount' :'',
                    'agentName' :'',
                    'hours':'',
                    'rate' :'',
                    'service' :'',
                    'notes':'',
                    'time_of_service':'',
                    'status':'',
                    'timeZone':'',
                    'currency':'',
                    'year':'',
                    'week':'',
                    'start_time':'',
                    'end_time':'',
                    'weekDate':'',
                     days:['Mon'],
                    'campaign_brief_id':'',
                     agent:{},
                     errors:[],
                     shifts:[]
                }
            }
        },

        methods: {
            getCurrentInvoices() {
                axios.get('/admin/client/invoices/'+ this.client_id).then(
                    (response) => {
                        let currInvoices =  response.data;
                        $.each(currInvoices, function(i){
                            if(currInvoices[i].days === null){
                                currInvoices[i].days = [];
                            }else{
                                currInvoices[i].days = currInvoices[i].days.split(',')
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
                    'user_id':'',
                    'total_amount' :'',
                    'agentName' :'',
                    'hours':'',
                    'rate' :'',
                    'service' :'',
                    'notes':'',
                    'time_of_service':'',
                    'status':'',
                    'timeZone':'',
                    'currency':'',
                    'year':'',
                    'weekDate':'',
                    'week':'',
                    'start_time':'',
                    'end_time':'',
                     days:[],
                    'campaign_brief_id':'',
                     agent:{},
                     errors:[],
                     shifts:[]
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
            deleteShift(shift){
                if(!confirm('Are you sure you want to delete this shift ?')){
                    return;
                }
                axios.post('/admin/camps/delete_shift',{shiftID:shift.id}).then((response)=>{
                    let invoices = this.invoices;
                    $.each(invoices, function(i){
                        $.each(invoices[i].shifts,function (j) {
                            if(invoices[i].shifts[j].id === shift.id) {
                                invoices[i].shifts.splice(j,1);
                                return false;
                            }
                        });
                    });

                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);
                });
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