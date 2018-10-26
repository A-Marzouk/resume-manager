<template>
    <div>
        <transition-group name="list" class="row">
            <project-detail v-for="(project,index) in projects" v-bind:key="index" class="list-item projectBox">
                <div style="height: 200px; overflow: hidden;">
                    <a href="javascript:void(0)" @click="editProject(project.id)"  data-toggle="modal" data-target="#addProjectModal" style="outline: none;">
                        <img :src="project.mainImage" alt="" width="100%" id="projectImg" style="border-radius:5px;">
                    </a>
                </div>
                <hr>
                <button type="button" class="close" style="padding: 5px; outline: none;" @click="deleteProject(project)">
                    <span aria-hidden="true">&times;</span>
                </button>
                <button type="button" data-toggle="modal" data-target="#addProjectModal" class="close" style="padding:3px 2px 5px 0px; outline: none;" @click="editProject(project.id)">
                <span aria-hidden="true">
                    <img src="/resumeApp/resources/views/customTheme/images/edit.png" alt="edit" width="17px">
                </span>
                </button>
                <b style="font-size:16px; font-weight:bolder; ">{{project.projectName}}</b><br/>
            </project-detail>
        </transition-group>
        <hr>
        <span class="deleteWorkBtn NoDecor" v-show="this.canAddProject" @click="clearData" style="width:137px">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#addProjectModal">
                <img src="/resumeApp/resources/assets/images/add_blue.png" alt="edit profile">
                Add work
            </a>
        </span>
        <br/>
        <add-project-modal @projectAdded="addProject" :toBeEditedProject="toBeEditedProject"></add-project-modal>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                projects: [],
                canAddProject:true,
                toBeEditedProject:{
                    'id':'',
                    'projectName' :'',
                    'isActive':'',
                    'link' :'',
                    'projectDesc' :'',
                    'images' :[],
                    'imagesFiles' :[],
                    'mainImage':'',
                    'order':1,
                }
            }
        },

        methods: {
            getCurrentProjects() {
                axios.get('/freelancer/projects').then(
                    (response) => {
                        let currProjects =  response.data;
                        this.projects = currProjects;
                        let i =0 ;
                        for(i=0 ; i< this.projects.length ; i++){
                            let project= this.projects[i];
                            if(project.images !== null){
                                this.projects[i].images = (project.images.split(','));
                            }

                        }

                        this.checkMaxProjects();
                    }
                );
            },

            addProject(newProject) {
                this.projects.push(newProject);
                this.checkMaxProjects();
            },

            deleteProject(project){
                if(!confirm('Are you sure you want to delete this Project ?')){
                    return;
                }
                axios.post('/freelancer/deleteproject',{projectID:project.id}).then((response)=>{
                    let projects = this.projects;
                    $.each(projects, function(i){
                        if(projects[i].id === project.id) {
                            projects.splice(i,1);
                            return false;
                        }
                    });

                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);

                    this.checkMaxProjects();

                });
            },

            editProject(projectID){
                let projects = this.projects;
                let editedProject =  {};

                $.each(projects, function(i){
                    if(projects[i].id === projectID){
                        editedProject = projects[i];
                    }
                });
                this.toBeEditedProject = editedProject;
            },

            checkMaxProjects(){
                if(this.projects.length > 16){
                    this.canAddProject =  false;
                }else{
                    this.canAddProject = true;
                }
            },

            clearData(){
                this.toBeEditedProject={
                    'id':'',
                    'projectName' :'',
                    'isActive':'',
                    'link' :'',
                    'projectDesc' :'',
                    'images' :[],
                    'imagesFiles' :[],
                    'mainImage':'',
                    'order':1,
                };
            }
        },

        created() {
            this.getCurrentProjects();
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