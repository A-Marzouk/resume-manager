<template>
    <div style="padding-top:20px;">
        <div class="row" v-for="(member,index) in members" v-bind:key="index">
            <div class="col-md-4 text-center" style="border-right:1px solid lightgrey;">
                <img :src="getImageSrc(member.image)"
                     alt="freelancer image" class="memberImg"><br/>
                <span class="memberName">
                    {{member.firstName}}
                </span>
                <br/>
            </div>
            <div class="col-md-8">
                <div v-for="(log,index) in logs" v-bind:key="index" style="padding:5px;  display:inline-block;"
                     v-show = "log.user_id == member.id"
                >
                    <div class="log">
                        <b>{{log.log_text}}</b><br/>
                        <small class="logTime">
                            {{log.created_at}}
                        </small>
                        <span v-show="log.user_id == user_id" class="deleteWorkBtn NoDecor" @click="deleteLog(log)" style="width: 15px;border: none;">
                            <a href="javascript:void(0)">
                                <img src="/resumeApp/resources/assets/images/close_blue.png" alt="edit profile">
                            </a>
                        </span>
                    </div>
                </div>
                <hr>
               <div class="row" v-show="user_id == member.id">
                   <div class="form-group col-md-10">
                       <input type="text" class="form-control" placeholder="Activity log text.." v-model="currentLog.log_text" required>
                   </div>
                   <div class="col-md-1">
                       <a href="javascript:void(0)"  class="btn btn-outline-info" @click="submitForm">
                           Add
                       </a>
                   </div>
               </div>
            </div>
            <div class="col-12">
                <hr>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['campaign_id','user_id'],
        data(){
            return{
                logs : [],
                members :[],
                currentLog:{
                    log_text :'',
                    campaign_id: this.campaign_id
                }
            }
        },
        methods:{
            submitForm(){
                // post data :
                axios.post('/admin/camps/add_log',this.currentLog).then( (response) => {
                    this.logs.push(response.data);
                    this.currentLog.log_text = '';
                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);
                });
            },
            getCampLogs(){
                axios.get('/admin/camps/get_camp_logs/'+this.campaign_id).then(
                    response => {
                        this.logs = response.data;
                    }
                );
            },
            getCampMembers(){
                axios.get('/admin/camps/get_camp_members/'+this.campaign_id).then(
                    response => {
                        this.members = response.data;
                    }
                );
            },
            getImageSrc(userImage){
                if(!userImage || userImage === null){
                    return '/resumeApp/public/images/user.png';
                }

                if(userImage.charAt(0) !== 'h'){
                    return '/'+userImage;
                }

                return userImage;
            },
            deleteLog(log){
                axios.post('/admin/camps/delete_log',{logID:log.id}).then(
                    response => {
                        // remove log :
                        let logs = this.logs;
                        $.each(logs, function(i){
                            if(logs[i].id === log.id) {
                                logs.splice(i,1);
                                return false;
                            }
                        });

                        // changes saved :
                        $('#changesSaved').fadeIn('slow');
                        setTimeout(function () {
                            $('#changesSaved').fadeOut();
                        },2000);
                    }
                );
            }
        },
        mounted(){
            this.getCampLogs();
            this.getCampMembers();
        }
    }
</script>

<style>
    .memberImg{
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: grey 2px solid;
        margin:5px;
        padding:3px;
    }
    .memberName{
        color:#218dce;
        font: 14px;
        padding-top: 8px;
    }
    .log{
        background: white;
        color: grey;
        font:12px;
        display:inline-block;
        padding: 10px;
        border: lightgrey solid 1px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
    }
</style>