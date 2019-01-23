<template>
    <div>
        <transition-group name="list" class="row">
            <campaign-component v-for="(camp,index) in camps" v-bind:key="index" class="list-item workExperience col-12" style="margin: 0px 10px 20px;">

                <div class="row">
                    <div class="col-md-8">
                        <div style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">Campaign : {{camp.title}}</div><br/>
                        <div  style="color: #30323D;font-family: Roboto;"><b>Description : </b>{{camp.description}}</div>
                        <div  style="color: #30323D;font-family: Roboto;"><b>Starts at : </b> {{getDate(camp.start_date)}}</div>
                        <div  style="color: #30323D;font-family: Roboto;"><b>Ends at : </b>{{getDate(camp.end_date)}}</div>
                        <div  style="color: #30323D;font-family: Roboto;"><b>Status : </b> {{camp.status}}</div>
                        <div  style="color: #30323D;font-family: Roboto;" class="NoDecor"><b>Client : </b>
                            <a :href="'/admin/client/'+camp.client.id" target="_blank">
                                {{camp.client.name}}
                            </a>
                        </div>
                        <div  v-show="camp.shifts.length < 1" class="font-weight-bold">
                            No shifts in this campaign.
                        </div>
                        <div class="row" v-show="camp.shifts.length > 0">
                            <div class="font-weight-bold">
                                Shifts : ({{camp.shifts.length}}#)
                            </div>
                            <transition-group name="list" class="col-12">
                                <div  class="list-item" v-for="(shift,index) in camp.shifts" v-bind:key="index" style="margin:5px 0 5px 5px; padding:5px 0 5px 5px; border:1px solid lightgrey; border-radius:5px;">
                                    <div class="text-center">
                                        <span style="padding:10px 0 5px 0; border-bottom: 1px solid lightgrey">
                                            Shift details
                                        </span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <b>Starts at :</b>{{shift.start_time}}<br/>
                                            <b>Ends at : </b> {{shift.end_time}}<br/>
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
                    </div>
                    <div class="col-md-4">
                        <span class="deleteWorkBtn NoDecor" @click="deleteCamp(camp)">
                            <a href="javascript:void(0)">
                                <img src="/resumeApp/resources/assets/images/close_blue.png" alt="edit profile">
                                Delete
                            </a>
                        </span>
                        <span class="deleteWorkBtn NoDecor"  @click="updateCamp(camp.id)" style=" width: 75px; margin-right:5px;">
                    <a href="javascript:void(0)" data-target="#addCampModal"  data-toggle="modal">
                        <img src="/resumeApp/resources/assets/images/edit_blue.png" alt="edit profile" style="width: 20px;
    padding-right: 7px;
    padding-bottom: 2px;
    height: 15px;">
                        Edit
                    </a>
                </span>
                        <div class="deleteWorkBtn NoDecor"  @click="updateCamp(camp.id)" style="width: 169px;margin-top: 5px;">
                            <a href="javascript:void(0)" data-target="#updateMembersModal"  data-toggle="modal">
                                <img src="/resumeApp/resources/assets/images/edit_blue.png" alt="edit profile" style="width: 20px;
            padding-right: 7px;
            padding-bottom: 2px;
            height: 15px;">
                                Update members
                            </a>
                        </div>
                        <div class="deleteWorkBtn NoDecor"  @click="updateCamp(camp.id)" style="width: 169px;margin-top: 5px;">
                            <a href="javascript:void(0)" data-target="#addShiftModal"  data-toggle="modal">
                                <img src="/resumeApp/resources/assets/images/add_blue.png" alt="edit profile" style="width: 20px;
            padding-right: 7px;
            padding-bottom: 2px;
            height: 15px;">
                                Add shift
                            </a>
                        </div>
                    </div>
                </div>

            </campaign-component>
        </transition-group>

        <span class="deleteWorkBtn NoDecor" v-show="this.canAdd" @click="clearData" style="width:137px">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#addCampModal">
                <img src="/resumeApp/resources/assets/images/add_blue.png" alt="edit profile">
                Create campaign
            </a>
        </span>
        <br/>
        <add-campaign-modal @campAdded="addCamp" :toBeEditedCamp="toBeEditedCamp"></add-campaign-modal>
        <update-members-modal :toBeEditedCamp="toBeEditedCamp"></update-members-modal>
        <add-shift-modal :toBeEditedCamp="toBeEditedCamp"></add-shift-modal>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                camps: [],
                canAdd:true,
                toBeEditedCamp:{
                    'id':'',
                    'client_id':'',
                    'title' :'',
                    'description':'',
                    'status' :'',
                    'start_date' :'',
                    'end_date':'',
                    'clientName':'',
                    'members':[],
                    'shifts':[]
                },
            }
        },
        methods: {
            getCurrentCamps() {
                axios.get('/admin/get_camps').then(
                    (response) => {
                        let currCamps =  response.data;
                        this.camps = currCamps;
                        this.checkMaxCamps();
                    }
                );
            },

            addCamp(newCamp) {
                this.camps.push(newCamp);
                this.checkMaxCamps();
            },

            deleteCamp(camp){
                if(!confirm('Are you sure you want to delete this campaign ?')){
                    return;
                }
                axios.post('/admin/camps/delete',{campID:camp.id}).then((response)=>{
                    let camps = this.camps;
                    $.each(camps, function(i){
                        if(camps[i].id === camp.id) {
                            camps.splice(i,1);
                            return false;
                        }
                    });

                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);

                    this.checkMaxCamps();

                });
            },

            deleteShift(shift){
                if(!confirm('Are you sure you want to delete this shift ?')){
                    return;
                }
                axios.post('/admin/camps/delete_shift',{shiftID:shift.id}).then((response)=>{
                    let camps = this.camps;
                    $.each(camps, function(i){
                        $.each(camps[i].shifts,function (j) {
                            if(camps[i].shifts[j].id === shift.id) {
                                camps[i].shifts.splice(j,1);
                                return false;
                            }
                        });
                    });

                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);

                    this.checkMaxCamps();

                });
            },

            updateCamp(campID){
                let camps = this.camps;
                let editedCamp =  {};

                $.each(camps, function(i){
                    if(camps[i].id === campID){
                        editedCamp = camps[i];
                    }
                });
                this.toBeEditedCamp = editedCamp;
            },

            checkMaxCamps(){
                if(this.camps.length > 4){
                    this.canAdd =  false;
                }else{
                    this.canAdd = true;
                }
            },

            clearData(){
                this.toBeEditedCamp={
                    'id':'',
                    'client_id':'',
                    'title' :'',
                    'description':'',
                    'status':'',
                    'start_date':'',
                    'end_date':'',
                    'clientName':'',
                    'members':[],
                    'shifts':[]
                };
            },
            getDate(date){
                let event = new Date(date);
                let options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };
                return event.toLocaleDateString('en-EN', options);
            },
        },

        created() {
            this.getCurrentCamps();
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