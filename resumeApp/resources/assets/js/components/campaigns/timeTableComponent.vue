<template>
    <div style="padding-top:20px;">
        <div v-for="(shift,index) in shifts" v-bind:key="index">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Time</th>
                        <th scope="col" v-for="(day,index) in shift.daysArray" v-bind:key="index" style="color:#218dce;">{{day}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            Start at : <span style="color:#218dce;">{{shift.start_time}}</span><br/>
                            Ends at  :<span style="color:#218dce;">{{shift.end_time}}</span>
                        </th>
                        <td v-for="(day,index) in shift.daysArray" v-bind:key="index">
                            <!--
                                here we need to choose to add one of the members so each day has shift id and has
                            -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        props:['campaign_id'],
        data(){
            return{
                shifts  : [],
                members :[],
            }
        },
        methods:{
            submitForm(){
                // post data :
                axios.post().then( (response) => {


                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);
                });
            },
            getCampMembers(){
                axios.get('/admin/camps/get_camp_members/'+this.campaign_id).then(
                    response => {
                        this.members = response.data;
                    }
                );
            },
            getCampShifts(){
                axios.get('/admin/camps/get_camp_shifts/'+this.campaign_id).then(
                    response => {
                        this.shifts = response.data;
                    }
                );
            },
            getImageSrc(userImage){
                if(!userImage || userImage === null){
                    return '/resumeApp/resources/views/customTheme/images/user.png';
                }

                if(userImage.charAt(0) !== 'h'){
                    return '/'+userImage;
                }

                return userImage;
            },
        },
        mounted(){
            this.getCampMembers();
            this.getCampShifts();
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