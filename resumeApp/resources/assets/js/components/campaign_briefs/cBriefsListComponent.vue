<template>
    <div>
        <transition-group name="list" class="row">
            <cbrief-component v-for="(cBrief,index) in cBriefs" v-bind:key="index" class="list-item workExperience col-12" style="margin: 0px 10px 20px;">

                <span class="deleteWorkBtn NoDecor" @click="deleteCBrief(cBrief)">
                    <a href="javascript:void(0)">
                        <img src="/resumeApp/resources/assets/images/close_blue.png" alt="edit profile">
                        Delete
                    </a>
                </span>

                <span class="deleteWorkBtn NoDecor"  @click="editCBrief(cBrief.id)" style=" width: 75px; margin-right:5px;">
                    <a href="javascript:void(0)" data-target="#addCBriefModal"  data-toggle="modal">
                        <img src="/resumeApp/resources/assets/images/edit_blue.png" alt="edit profile" style="width: 20px;
    padding-right: 7px;
    padding-bottom: 2px;
    height: 15px;">
                        Edit
                    </a>
                </span>

                <div class="deleteWorkBtn NoDecor"  @click="editCBrief(cBrief.id)" style="width: 169px;margin-right: 7px;">
                    <a href="javascript:void(0)" data-target="#addServiceModal"  data-toggle="modal">
                        <img src="/resumeApp/resources/assets/images/add_blue.png" alt="edit profile" style="width: 20px;
            padding-right: 7px;
            padding-bottom: 2px;
            height: 15px;">
                        Add Service
                    </a>
                </div>


                <div class="pageSubHeading text-left" style="padding-bottom:15px;">
                    Campaign Brief details
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <tr>
                                <th>Client name</th>
                                <td>{{cBrief.client_name}}</td>
                            </tr>

                            <tr>
                                <th>Client contact </th>
                                <td>{{cBrief.client_contact}}</td>
                            </tr>

                            <tr>
                                <th>Company website</th>
                                <td>{{cBrief.company_website}}</td>
                            </tr>
                            <tr>
                                <th>Company values</th>
                                <td>{{cBrief.company_values}}</td>
                            </tr>

                            <tr>
                                <th>Objective</th>
                                <td>{{cBrief.objective}}</td>
                            </tr>

                            <tr>
                                <th>Email Pitch</th>
                                <td>{{cBrief.email_pitch}}</td>
                            </tr>

                            <tr>
                                <th>Phone Pitch</th>
                                <td>{{cBrief.phone_pitch}}</td>
                            </tr>

                            <tr>
                                <th> Data systems </th>
                                <td>{{cBrief.data_systems}}</td>

                            </tr>

                            <tr>
                                <th> Estimated duration </th>
                                <td>{{cBrief.estimated_duration}}</td>

                            </tr>
                            <tr>
                                <th>Time zone </th>
                                <td>{{cBrief.time_zone}}</td>

                            </tr>
                            <tr>
                                <th>Time needed </th>
                                <td>{{cBrief.time_needed}}</td>
                            </tr>

                            <tr>
                                <th> Starting date </th>
                                <td>{{cBrief.start_date}}</td>

                            </tr>
                            <tr>
                                <th>Contract terms </th>
                                <td>{{cBrief.contract_terms}}</td>

                            </tr>
                            <tr>
                                <th>Hours per week </th>
                                <td>{{cBrief.hours_per_week}}</td>
                            </tr>
                            <tr>
                                <th> Weekly rate </th>
                                <td>{{cBrief.weekly_rate}}</td>

                            </tr>
                            <tr>
                                <th>Payment method </th>
                                <td>{{cBrief.payment_method}}</td>

                            </tr>
                        </table>

                        <div>
                            Campaign Manager :
                            <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{cBrief.campaign_manager}}</b><br/>
                            Report requirement :
                            <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{cBrief.report_requirement}}</b><br/>
                            <div class="NoDecor">
                                Public link : <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">
                                <a :href="'https://123workforce.com/workforce/campaign_briefs/'+cBrief.id" target="_blank">https://123workforce.com/workforce/campaign_briefs/{{cBrief.id}}</a>
                            </b><br/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="pageSubHeading" style="padding-bottom:15px;">
                            Campaign brief services. ( {{cBrief.services.length}}# )
                        </div>
                        <div v-for="(service,index) in cBrief.services" v-bind:key="index">
                             <span class="deleteWorkBtn NoDecor" @click="deleteService(service)" style="margin-bottom:5px;">
                                <a href="javascript:void(0)">
                                    <img src="/resumeApp/resources/assets/images/close_blue.png" alt="edit profile">
                                    Del
                                </a>
                             </span>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Service required</th>
                                    <td>{{service.service_required}}</td>
                                </tr>
                                <tr>
                                    <th>Hours</th>
                                    <td>{{service.hours}}</td>
                                </tr>
                                <tr>
                                    <th>Hourly rate</th>
                                    <td>{{service.hourly_rate}} USD</td>
                                </tr>
                                <tr>
                                    <th>Language needed</th>
                                    <td>{{service.language}}</td>
                                </tr>
                                <tr>
                                    <th>Agent location</th>
                                    <td>{{service.agent_location}}</td>
                                </tr>

                                <tr>
                                    <th>No. of agents</th>
                                    <td>{{service.number_of_agents}}</td>
                                </tr>

                                <tr>
                                    <th>Agent experience</th>
                                    <td>{{service.agent_experience}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </cbrief-component>
        </transition-group>

        <div class="pageSubHeading text-left" v-show="this.cBriefs.length < 1">
            Currently there are no campaign briefs.
        </div>
        <span class="deleteWorkBtn NoDecor" v-show="this.canAdd" @click="clearData" style="width:137px">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#addCBriefModal">
                <img src="/resumeApp/resources/assets/images/add_blue.png" alt="edit profile">
                Add new brief
            </a>
        </span>
        <br/>
        <add-cbrief-modal @cBriefAdded="addCBrief"  :toBeEditedCBrief="toBeEditedCBrief"></add-cbrief-modal>
        <add-service-modal  :toBeEditedCBrief="toBeEditedCBrief"></add-service-modal>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                cBriefs: [],
                canAdd:true,
                toBeEditedCBrief:{
                    'id':'',
                    'client_name':'',
                    'company_website': '',
                    'company_values': '',
                    'client_contact': '',
                    'objective': '',
                    'email_pitch': '',
                    'phone_pitch': '',
                    'data_systems': '',
                    'estimated_duration': '',
                    'time_zone': '',
                    'time_needed': '',
                    'start_date': '',
                    'contract_terms': '',
                    'hours_per_week': '',
                    'weekly_rate': '',
                    'payment_method': '',
                    'campaign_manager': '',
                    'report_requirement': '',
                     services :[]
                }
            }
        },

        methods: {
            getCurrentCBriefs() {
                axios.get('/admin/workforce/get_cbriefs').then(
                    (response) => {
                        let currCBriefs =  response.data;
                        $.each(currCBriefs, function(i){
                        });
                        this.cBriefs = currCBriefs;
                        this.checkMaxCBriefs();
                    }
                );
            },

            addCBrief(newCBrief) {
                this.cBriefs.push(newCBrief);
                this.checkMaxCBriefs();
            },

            deleteCBrief(cBrief){
                if(!confirm('Are you sure you want to delete this campaign brief ?')){
                    return;
                }
                axios.post('/admin/workforce/delete_cbrief',{cBriefID:cBrief.id}).then((response)=>{
                    let cBriefs = this.cBriefs;
                    $.each(cBriefs, function(i){
                        if(cBriefs[i].id === cBrief.id) {
                            cBriefs.splice(i,1);
                            return false;
                        }
                    });

                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);

                    this.checkMaxCBriefs();

                });
            },

            editCBrief(cBriefID){
                let cBriefs = this.cBriefs;
                let editedCBrief =  {};

                $.each(cBriefs, function(i){
                    if(cBriefs[i].id === cBriefID){
                        editedCBrief = cBriefs[i];
                    }
                });
                this.toBeEditedCBrief = editedCBrief;
            },

            checkMaxCBriefs(){
                if(this.cBriefs.length > 4){
                    this.canAdd =  false;
                }else{
                    this.canAdd = true;
                }
            },
            deleteService(service){
                if(!confirm('Are you sure you want to delete this service ?')){
                    return;
                }
                axios.post('/admin/workforce/delete_cbrief_service',{serviceID:service.id}).then((response)=>{
                    let cBriefs = this.cBriefs;
                    $.each(cBriefs, function(i){
                        $.each(cBriefs[i].services,function (j) {
                            if(cBriefs[i].services[j].id === service.id) {
                                cBriefs[i].services.splice(j,1);
                                return false;
                            }
                        });
                    });

                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);

                    this.checkMaxCBriefs();

                });
            },
            clearData(){
                this. toBeEditedCBrief={
                        'id':'',
                        'client_name':'',
                        'company_website': '',
                        'company_values': '',
                        'client_contact': '',
                        'objective': '',
                        'email_pitch': '',
                        'phone_pitch': '',
                        'data_systems': '',
                        'estimated_duration': '',
                        'time_zone': '',
                        'time_needed': '',
                        'start_date': '',
                        'contract_terms': '',
                        'hours_per_week': '',
                        'weekly_rate': '',
                        'payment_method': '',
                        'campaign_manager': '',
                        'report_requirement': ''
                };
            },
            
            nl2br (str, is_xhtml) {
                if (typeof str === 'undefined' || str === null) {
                    return '';
                }
                var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
                return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
            }
        },

        created() {
            this.getCurrentCBriefs();
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