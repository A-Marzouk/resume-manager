<template>
    <div>
        <transition-group name="list" class="row">
            <work-history v-for="(work,index) in works" v-bind:key="index" class="list-item workExperience col-lg-3 col-md-5">
                <button type="button" class="close" style="padding: 5px; outline: none;" @click="deleteWork(work)">
                    <span aria-hidden="true">&times;</span>
                </button>
                <button type="button" data-toggle="modal" data-target="#addWorkModal" class="close" style="padding:3px 2px 5px 0px; outline: none;" @click="editWork(work.id)">
                <span aria-hidden="true">
                    <img src="/resumeApp/resources/views/customTheme/images/edit.png" alt="edit" width="17px">
                </span>
                </button>
                <b style="font-size:16px; font-weight:bolder; ">{{work.job_title}}</b><br/>
                {{work.company}}<br/>
                Start :{{work.date_from}} <span v-show="work.date_to"> End : {{work.date_to}}</span>
                <span v-show="!work.date_to"> - Present</span><br/><br/>

                {{work.job_description}}
            </work-history>
        </transition-group>
        <div class="text-center align-middle col-lg-3 col-md-5 noHoverEffect" v-show="this.canAdd">
            <button class="btn btn-default btn-workExp" @click="clearData" data-toggle="modal" data-target="#addWorkModal" href="javascript:void(0)" id="addWorkText">
                <span>
                    <img src="/resumeApp/resources/views/customTheme/images/add_work_img.png" alt="add work" width="30px">
                    Add work experience
                </span>
            </button>
        </div>
        <br/>
        <add-work-modal @workAdded="addWorkHistory" :toBeEditedWork="toBeEditedWork"></add-work-modal>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                works: [],
                canAdd:true,
                toBeEditedWork:{
                    'id':'',
                    'job_title' :'',
                    'job_description':'',
                    'company' :'',
                    'date_from' :'',
                    'date_to' :'',
                    'currently_working':true
                }
            }
        },

        methods: {
            getCurrentWorks() {
                axios.get('/freelancer/workshistory').then(
                    (response) => {
                        this.works = response.data;
                    }
                );
            },

            addWorkHistory(newWork) {
                this.works.push(newWork);
                this.checkMaxWorks();
            },

            deleteWork(work){
                if(!confirm('Are you sure you want to delete this work experience ?')){
                    return;
                }
                axios.post('/freelancer/deletework',{workHistoryID:work.id}).then((response)=>{
                    let works = this.works;
                    $.each(works, function(i){
                        if(works[i].id === work.id) {
                           works.splice(i,1);
                            return false;
                        }
                    });

                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);

                    this.checkMaxWorks();

                });
            },

            editWork(workID){
                let works = this.works;
                let editedWork =  {};

                $.each(works, function(i){
                    if(works[i].id === workID){
                        editedWork = works[i];
                    }
                });
                this.toBeEditedWork = editedWork;
            },

            checkMaxWorks(){
                if(this.works.length > 4){
                    this.canAdd =  false;
                }else{
                    this.canAdd = true;
                }
            },
            clearData(){
                this.toBeEditedWork={
                    'id':'',
                    'job_title' :'',
                    'job_description':'',
                    'company' :'',
                    'date_from' :'',
                    'date_to' :'',
                    'currently_working':true
                };
            }
        },

        created() {
            this.getCurrentWorks();
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