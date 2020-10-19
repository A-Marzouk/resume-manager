<template>
    <div>
        <transition-group name="list" class="row">
            <job-post v-for="(job,index) in jobs" v-bind:key="Math.random()" class="list-item workExperience col-12" style="margin: 0px 10px 20px;">

                <span class="deleteWorkBtn NoDecor" @click="deleteJob(job)">
                    <a href="javascript:void(0)">
                        <img src="/images/close_blue.png" alt="edit profile">
                        Delete
                    </a>
                </span>

                <span class="deleteWorkBtn NoDecor"  @click="editJob(job.id)" style=" width: 75px; margin-right:5px;">
                    <a href="javascript:void(0)" data-target="#addJobModal"  data-toggle="modal">
                        <img src="/images/edit_blue.png" alt="edit profile" style="width: 20px;
    padding-right: 7px;
    padding-bottom: 2px;
    height: 15px;">
                        Edit
                    </a>
                </span>
                <div style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">{{job.title}}</div><br/>
                <div  style="color: #30323D;font-family: Roboto;">Description : {{job.description}}</div>
                <div  style="color: #30323D;font-family: Roboto;">Budget : {{job.budget}}</div>
                <div  style="color: #30323D;font-family: Roboto;"> Time : {{job.time}}</div>
                <div  style="color: #30323D;font-family: Roboto;">Level : {{job.level}}</div>
                <div  style="color: #30323D;font-family: Roboto;">Skills : {{job.skills}}</div>
                <div  style="color: #30323D;font-family: Roboto;" v-show="job.job_attachment !== null">File : <a :href="'/'+ job.job_attachment" target="_blank"> Open file </a></div>
                <button :id="'seeApplied'+job.id" class="btn btn-sm btn-outline-primary" @click="getAppliedFreelancers(job.id)">See who applied</button>
                <br/>
                <div v-for="(data,index) in appliedFreelancers" v-bind:key="Math.random()">
                    <div v-if="data.jobID == job.id">
                        <a target="_blank" :href="'/'+data.freelancer.username">{{data.freelancer.firstName}}</a>
                    </div>
                </div>
            </job-post>
        </transition-group>

        <span class="deleteWorkBtn NoDecor" v-show="this.canAdd" @click="clearData" style="width:137px">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#addJobModal">
                <img src="/images/add_blue.png" alt="edit profile">
                Add job
            </a>
        </span>
        <br/>
        <add-job-modal @jobAdded="addJobPost" :toBeEditedJob="toBeEditedJob"></add-job-modal>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                jobs: [],
                canAdd:true,
                toBeEditedJob:{
                    'id':'',
                    'title' :'',
                    'description':'',
                    'budget' :'',
                    'time' :'',
                    'skills':'',
                    'status':'',
                    'level':'',
                    'posted':'',
                    'job_attachment':''
                },
                appliedFreelancers:[]
            }
        },

        methods: {
            getCurrentJobs() {
                axios.get('/client/get_jobs').then(
                    (response) => {
                        let currJobs=  response.data;
                        $.each(currJobs, function(i){
                        });
                        this.jobs = currJobs;
                        this.checkMaxJobs();
                    }
                );
            },

            addJobPost(newJob) {
                this.jobs.push(newJob);
                this.checkMaxJobs();
            },

            deleteJob(job){
                if(!confirm('Are you sure you want to delete this job post ?')){
                    return;
                }
                axios.post('/client/jobs/delete',{jobID:job.id}).then((response)=>{
                    let jobs = this.jobs;
                    $.each(jobs, function(i){
                        if(jobs[i].id === job.id) {
                            jobs.splice(i,1);
                            return false;
                        }
                    });

                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);

                    this.checkMaxJobs();

                });
            },

            editJob(jobID){
                let jobs = this.jobs;
                let editedJob =  {};

                $.each(jobs, function(i){
                    if(jobs[i].id === jobID){
                        editedJob = jobs[i];
                    }
                });
                this.toBeEditedJob = editedJob;
            },

            checkMaxJobs(){
                if(this.jobs.length > 10){
                    this.canAdd =  false;
                }else{
                    this.canAdd = true;
                }
            },

            clearData(){
                this.toBeEditedJob={
                    'id':'',
                    'title' :'',
                    'description':'',
                    'budget' :'',
                    'time' :'',
                    'skills':'',
                    'status':'',
                    'level':'',
                    'posted':''
                };
            },

            getAppliedFreelancers(jobID){
                axios.post('/client/jobs/applied_freelancers',{jobID:jobID}).then((response)=>{
                    console.log(response.data);
                    let results = response.data;
                    let applied = false;
                    results.forEach( (freelancer) => {
                        this.appliedFreelancers.push({jobID:jobID,freelancer:freelancer});
                        applied = true;
                    });
                    $('#seeApplied'+jobID).attr('disabled',true);
                    if(!applied){
                       alert('No one has been applied to this job yet..');
                    }
                });
            }
        },

        created() {
            this.getCurrentJobs();
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
