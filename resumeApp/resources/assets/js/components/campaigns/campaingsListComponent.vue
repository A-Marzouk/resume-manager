<template>
    <div>
        <transition-group name="list" class="row">
            <campaign-component v-for="(camp,index) in camps" v-bind:key="index" class="list-item workExperience col-12" style="margin: 0px 10px 20px;">

                <div class="row">
                    <div class="col-md-8">
                        <div style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">Campaign :{{camp.title}}</div><br/>
                        <div  style="color: #30323D;font-family: Roboto;"><b>Description :</b> <br/>{{camp.description}}</div>
                        <div  style="color: #30323D;font-family: Roboto;"><b>Starts at :</b> {{camp.start_date}}</div>
                        <div  style="color: #30323D;font-family: Roboto;"><b>Ends at : </b>{{camp.end_date}}</div>
                        <div  style="color: #30323D;font-family: Roboto;"><b>Status :</b> {{camp.status}}</div>
                        <div  style="color: #30323D;font-family: Roboto;"><b>Client :</b> {{camp.clientName}}</div>
                    </div>
                    <div class="col-md-4">
                        <span class="deleteWorkBtn NoDecor" @click="deleteCamp(camp)">
                            <a href="javascript:void(0)">
                                <img src="/resumeApp/resources/assets/images/close_blue.png" alt="edit profile">
                                Delete
                            </a>
                        </span>
                        <span class="deleteWorkBtn NoDecor"  @click="editCamp(camp.id)" style=" width: 75px; margin-right:5px;">
                    <a href="javascript:void(0)" data-target="#addCampModal"  data-toggle="modal">
                        <img src="/resumeApp/resources/assets/images/edit_blue.png" alt="edit profile" style="width: 20px;
    padding-right: 7px;
    padding-bottom: 2px;
    height: 15px;">
                        Edit
                    </a>
                </span>
                        <div class="deleteWorkBtn NoDecor"  @click="updateMembers(camp.id)" style="width: 169px;margin-top: 5px;">
                            <a href="javascript:void(0)" data-target="#updateMembersModal"  data-toggle="modal">
                                <img src="/resumeApp/resources/assets/images/add_blue.png" alt="edit profile" style="width: 20px;
            padding-right: 7px;
            padding-bottom: 2px;
            height: 15px;">
                                Update members
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
                    'members':[]
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

            editCamp(campID){
                let camps = this.camps;
                let editedCamp =  {};

                $.each(camps, function(i){
                    if(camps[i].id === campID){
                        editedCamp = camps[i];
                    }
                });
                this.toBeEditedCamp = editedCamp;
            },

            updateMembers(campID){
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
                    'members':[]
                };
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