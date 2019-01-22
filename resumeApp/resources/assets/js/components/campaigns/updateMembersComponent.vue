<template>
    <div>
        <div class="modal fade" id="updateMembersModal" tabindex="-1" role="dialog" aria-labelledby="updateMembersModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="text-right" style="padding: 15px 10px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeMembersModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="content">
                        <div class="pageHeading" style="padding-bottom:15px;">
                            Current campaign members.
                        </div>
                        <transition-group name="list" class="row" v-show="this.toBeEditedCamp.members.length > 0">
                            <div class="col-md-2 col-6 freelancerBox list-item" v-for="(user,index) in toBeEditedCamp.members" v-bind:key="index">
                                <div class="freelancerItem">
                                    <img :src="getImageSrc(user.image)"
                                         alt="freelancer" class="slickFreelancerImg" style="background:white">
                                    <div class="freelancerData">
                                        <div class="freelancerName nohover">
                                            {{user.firstName}} {{user.lastName}}
                                        </div>
                                        <div class="freelancerJob">
                                            {{user.profession}}
                                        </div>
                                    </div>
                                </div>
                                <span class="deleteWorkBtn NoDecor" style="width: 100%"  @click="removeMember(user)">
                                    <a href="javascript:void(0)">
                                        <img src="/resumeApp/resources/assets/images/close_blue.png" alt="edit profile">
                                        Remove
                                    </a>
                                </span>
                            </div>
                        </transition-group>
                        <div v-show="this.toBeEditedCamp.members.length < 1" class="pageSubHeading text-left">
                           No members assigned to this campaign.
                        </div>
                        <hr>
                        <div class="pageHeading" style="padding-bottom:15px;">
                            Business support freelancers.
                        </div>
                        <transition-group name="list" class="row">
                            <div class="list-item col-md-2 col-6 freelancerBox" v-for="(user,index) in businessUsers" v-bind:key="index">
                                <div class="freelancerItem">
                                    <img :src="getImageSrc(user.image)"
                                         alt="freelancer" class="slickFreelancerImg" style="background:white">
                                    <div class="freelancerData">
                                        <div class="freelancerName nohover">
                                            {{user.firstName}} {{user.lastName}}
                                        </div>
                                        <div class="freelancerJob">
                                            {{user.profession}}
                                        </div>
                                    </div>
                                </div>
                                <span v-show="freelancerExists(user.id)" class="deleteWorkBtn NoDecor" style="width: 100%"  @click="addMember(user)">
                                    <a href="javascript:void(0)">
                                        <img src="/resumeApp/resources/assets/images/add_blue.png" alt="edit profile">
                                        Add
                                    </a>
                                </span>
                                <span v-show="!freelancerExists(user.id)" >
                                    <div style="color:lightgreen;" class="text-center">Campaign member</div>
                                </span>
                            </div>
                        </transition-group>
                        <div class="modal-footer" style="margin-top: 15px;">
                            <button class="btn btn-primary" @click="updateCampMembers" >Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['toBeEditedCamp'],
        data(){
            return{
                businessUsers:[],
            }
        },
        methods:{
            updateCampMembers(){
                axios.post('/admin/camp/update_members',{users:this.toBeEditedCamp.members,campID:this.toBeEditedCamp.id}).then((response)=>{

                    console.log(response.data);

                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);
                });

                $('#closeMembersModal').click();
            },
            getBusinessUsers(){
                axios.get('/admin/get_users').then((response)=>{
                    this.businessUsers = response.data;
                });
            },
            addMember(user){
                let canAdd = true;
                $.each(this.toBeEditedCamp.members, (i) => {
                    if(this.toBeEditedCamp.members[i].id === user.id) {
                        alert('Freelancer already exists.');
                        canAdd = false;
                    }
                });
                if(canAdd){
                    this.toBeEditedCamp.members.push(user);
                }
            },
            removeMember(user){
                $.each(this.toBeEditedCamp.members, (i) => {
                    if(this.toBeEditedCamp.members[i].id === user.id) {
                        this.toBeEditedCamp.members.splice(i,1);
                        return false;
                    }
                });
            },
            freelancerExists(user_id){
                let canAdd = true;
                $.each(this.toBeEditedCamp.members, (i) => {
                    if(this.toBeEditedCamp.members[i].id === user_id) {
                        canAdd = false;
                    }
                });

                return canAdd;
            },
            getImageSrc(userImage){
                if(!userImage || userImage === null){
                    return '/resumeApp/resources/views/customTheme/images/user.png';
                }

                return '/'+userImage;
            }
        },
        mounted(){
            this.getBusinessUsers();
        }
    }
</script>

<style lang="css">
    .list-item {
        display: inline-block;
        margin-right: 10px;
    }
    .list-enter-active, .list-leave-active {
        transition: all 2s;
    }
    .list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
        opacity: 0;
        transform: translateY(30px);
    }
</style>