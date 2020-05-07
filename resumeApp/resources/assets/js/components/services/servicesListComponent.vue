<template>
    <div>
        <div class="alert-danger d-none" style="padding: 15px;" id="servicesErrors">
            Error while saving, please fill in all required fields.
        </div>
        <transition-group name="list" class="row">
            <service-component v-for="(service,index) in services" v-bind:key="Math.random()" class="list-item workExperience col-12" style="margin: 0px 10px 20px;">
                <div class="row">
                    <div class="col-md-12">
                        <span class="deleteWorkBtn NoDecor" @click="deleteService(service)">
                            <a href="javascript:void(0)">
                                <img src="/resumeApp/resources/assets/images/close_blue.png" alt="edit profile">
                                Delete
                            </a>
                        </span>
                        <span class="deleteWorkBtn NoDecor"  @click="editService(service.id)" style=" width: 75px; margin-right:5px;">
                            <a href="javascript:void(0)" data-target="#addInvoiceServiceModal"  data-toggle="modal">
                                <img src="/resumeApp/resources/assets/images/edit_blue.png" alt="edit profile" style="width: 20px;
            padding-right: 7px;
            padding-bottom: 2px;
            height: 15px;">
                                Edit
                            </a>
                        </span>

                        <div class="pageSubHeading text-left">
                            Service details
                        </div><br/>

                        Title :
                        <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">
                            {{service.title}}
                        </b><Br/>
                        <div v-if="service.agents !== undefined">
                         Agents :

                            <div v-for="(agent,index) in service.agents" v-bind:key="Math.random()" style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">
                                {{agent.firstName}} {{agent.lastName}}
                            </div>
                        </div>
                        <br/>
                        Rate per Hour :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{service.rate}}</b><br/>
                        Total price of service :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{service.total_price}}</b><br/>
                        Time zone:<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{service.timeZone}}</b><br/>
                        Year - Week :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{service.week}}</b>
                        <span>{{service.weekDate}}</span>
                        <br/>
                        Hours :<b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{service.hours}}</b>
                        <span style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;"><br/>Days :</span>
                        <div style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">
                            <b v-show="service.days.includes('all_days')">
                                All days of the week.
                            </b>
                            <b v-show="!service.days.includes('all_days')">
                                {{service.days.join(' | ')}}
                            </b>
                        </div>
                        <label class="col-md-5 form-check-label checkBoxContainer checkBoxText" v-show="service.invoice_id === null" style="margin-top: 15px;">
                            <input  class="form-check-input" type="checkbox" :value="service" v-model="selectedServices" >
                            <span class="checkmark"></span>
                            Add to Invoice
                        </label>
                        <div v-show="service.invoice_id !== null " style="color: blue; padding-top:15px;">
                            Already added to invoice
                        </div>
                    </div>
                </div>
            </service-component>
        </transition-group>

        <div class="pageSubHeading text-left" v-show="this.services.length < 1">
            Currently this client has no services.
        </div>
        <span class="deleteWorkBtn NoDecor" v-show="this.canAdd" @click="clearData" style="width:137px">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#addInvoiceServiceModal">
                <img src="/resumeApp/resources/assets/images/add_blue.png" alt="edit profile">
                Add Service
            </a>
        </span>

        <span class="NoDecor" v-show="selectedServices.length > 0" @click="generateServicesInvoice" style="width:137px">
            <a href="javascript:void(0)" class="btn btn-outline-primary">
                Generate Invoice with selected services.
            </a>
        </span>
        <br/>
        <add-invoice-service-modal @serviceAdded="addService"  :toBeEditedService="toBeEditedService"></add-invoice-service-modal>
    </div>
</template>

<script>
    export default {
        props:['client_id'],
        data() {
            return {
                services: [],
                'temp_numb':'',
                selectedServices:[],
                canAdd:true,
                toBeEditedService:{
                    'id':'',
                    'invoice_id':null,
                    'title':'',
                    'client_id':this.client_id,
                    'total_price' :'',
                    'hours':'',
                    'rate' :'',
                    'timeZone':'',
                    'week':'',
                    'weekDate':'',
                     days:['Mon'],
                     errors:[],
                }
            }
        },

        methods: {
            getCurrentServices() {
                axios.get('/admin/client/services/'+ this.client_id).then(
                    (response) => {
                        let currServices =  response.data;
                        $.each(currServices, (i) => {
                            if(currServices[i].days === null){
                                currServices[i].days = [];
                            }else{
                                currServices[i].days = currServices[i].days.split(',')
                            }
                        });
                        this.services = currServices;
                        this.checkMaxServices();
                    }
                );
            },

            addService(newService) {
                this.services.push(newService);
                this.checkMaxServices();
            },

            generateServicesInvoice(){
                axios.post('/admin/client/generate_service_invoice',{selectedServices:this.selectedServices}).then(
                    response => {
                        $.each( this.selectedServices,(i)=>{
                            this.selectedServices[i].invoice_id = response.data ;
                        });
                        this.selectedServices = [];
                        // changes saved :
                        $('#changesSaved').fadeIn('slow');
                        setTimeout(function () {
                            $('#changesSaved').fadeOut();
                        },2000);

                        this.checkMaxServices();

                    }
                );
            },
            deleteService(service){
                if(!confirm('Are you sure you want to delete this service ?')){
                    return;
                }
                axios.post('/admin/client/deleteservice',{serviceID:service.id}).then((response)=>{
                    let services = this.services;
                    $.each(services, function(i){
                        if(services[i].id === service.id) {
                            services.splice(i,1);
                            return false;
                        }
                    });

                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);

                    this.checkMaxServices();

                });
            },

            editService(serviceID){
                let services = this.services;
                let editedService =  {};

                $.each(services, function(i){
                    if(services[i].id === serviceID){
                        editedService = services[i];
                        editedService.selectedAgents = services[i].agents;
                    }
                });
                this.toBeEditedService = editedService;
            },

            checkMaxServices(){
                if(this.services.length > 4){
                    this.canAdd =  false;
                }else{
                    this.canAdd = true;
                }
            },

            clearData(){
                this.toBeEditedService={
                    'id':'',
                    'invoice_id':null,
                    'title':'',
                    'client_id':this.client_id,
                    'total_price' :'',
                    'hours':'',
                    'rate' :'',
                    'timeZone':'',
                    'week':'',
                    'weekDate':'',
                    days:['Mon'],
                    errors:[],
                };
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
            this.getCurrentServices();
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
