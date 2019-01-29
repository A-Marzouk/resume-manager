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
                <div class="pageSubHeading text-left">
                    Campaign Brief details
                </div>
                Company website :
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{cBrief.company_website}}</b><br/>
                Company values :
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{cBrief.company_values}}</b><br/>
                Client contact :
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{cBrief.client_contact}}</b><br/>
                Objective :
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{cBrief.objective}}</b><br/>
                Email pitch :
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{cBrief.email_pitch}}</b><br/>
                Phone pitch :
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{cBrief.phone_pitch}}</b><br/>
                Data systems :
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{cBrief.data_systems}}</b><br/>
                Estimated duration:
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{cBrief.estimated_duration}}</b><br/>
                Time zone:
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{cBrief.time_zone}}</b><br/>
                Time needed :
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{cBrief.time_needed}}</b><br/>
                Starting date :
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{cBrief.start_date}}</b><br/>
                Contract terms:
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{cBrief.contract_terms}}</b><br/>
                Hours per week:
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{cBrief.hours_per_week}}</b><br/>
                Weekly rate:
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{cBrief.weekly_rate}}</b><br/>
                Payment Method :
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{cBrief.payment_method}}</b><br/>
                Campaign Manager:
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{cBrief.campaign_manager}}</b><br/>
                Report requirement:
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; "> {{cBrief.report_requirement}}</b><br/>
                <hr>
                <div class="NoDecor">
                    Public link : <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">
                    <a :href="'https://123workforce.com/workforce/campaign_briefs/'+cBrief.id" target="_blank">https://123workforce.com/workforce/campaign_briefs/{{cBrief.id}}</a>
                    </b><br/>
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

            clearData(){
                this. toBeEditedCBrief={
                        'id':'',
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