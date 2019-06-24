<template>
    <div>
        <transition-group name="list" class="row">
            <freelancer-card v-for="(freelancer,index) in freelancers" v-bind:key="index" class="list-item">
                <div class="row" style="padding-top: 20px;">
                    <div class="col-lg-12">
                        <div class="freelancerCard" style="width: auto;">
                            <div class="row">
                                <div class="col-lg-5 col-md-12 freelancerCardLeft">
                                    <div class="row">
                                        <div class="col-lg-6 col-6 imageContainer">
                                            <img :src="getImageSrc(freelancer.photo)" alt="freelancer" class="freelancerImg" width="100" height="100">

                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <div id="name">
                                                {{freelancer.firstName}} {{freelancer.lastName}}
                                            </div>
                                            <div class="buttonMain" style=" margin-top: 10px;">
                                                <a class="hireBtn btn-block" :href="freelancer.username" style="font-weight:normal; padding: 7px 5px 7px 5px; ">Visit profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-12 freelancerCardRight">
                                    <div class="panelFormLabel" style=" color: #0290D8;"><b>{{freelancer.profession}}</b></div>
                                    <div class="panelFormLabel" style="	color: #697786;"><b>Key skills :</b> {{freelancer.design_skills_checkbox}}</div>
                                    <div class="panelFormLabel" style="	color: #697786;"><b>Rate: </b>${{freelancer.salary}}/hour</div>
                                    <div class="panelFormLabel" style="	color: #697786;"><b>No.hours/week available: </b>{{freelancer.availableHours}}</div>
                                </div>
                                <button type="button" class="close" style="padding: 5px; outline: none;" @click="removeFreelancer(freelancer)">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </freelancer-card>
        </transition-group>
    </div>
</template>

<script>
    export default {
        props:['freelancers'],
        data(){
            return{
            }
        },
        methods:{
            removeFreelancer(freelancer){
                if(!confirm('Are you sure you want to remove this freelancer from search ?')){
                    return;
                }
                let i = 0 ;
                for(i=0;i<this.freelancers.length;i++){
                    if(this.freelancers[i].id === freelancer.id){
                        this.freelancers.splice(i,1);
                    }
                }
            },
            getImageSrc(userImage){
                if(!userImage || userImage === null){
                    return '/resumeApp/public/images/user.png';
                }

                if(userImage.charAt(0) !== 'h'){
                    return '/'+userImage;
                }

                return userImage;
            }
        }
    }
</script>

<style lang="css">
    .list-item {
        display: inline-block;
        margin-right: 10px;
        width: 100%;
    }
    .list-enter-active, .list-leave-active {
        transition: all 1s;
    }
    .list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
        opacity: 0;
        transform: translateY(30px);
    }
</style>