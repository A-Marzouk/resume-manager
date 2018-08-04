<template>
    <div>
        <transition-group name="list" class="row">
            <project-detail v-for="(project,index) in projects" v-bind:key="index" class="list-item workExperience col-lg-3 col-md-5">
                <div>
                    <img :src="project.mainImage" alt="" width="100%" height="200px" id="projectImg">
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
        <div class="text-center align-middle col-lg-3 col-md-5 noHoverEffect" v-show="this.canAdd" @click="clearData">
            <a class="btn btn-default btn-workExp" data-toggle="modal" data-target="#addProjectModal" id="addProjectText">
                <span>
                    <img src="/resumeApp/resources/views/customTheme/images/add_work_img.png" alt="add project" width="30px">
                    Add Project
                </span>
            </a>
        </div>
        <br/>
        <add-project-modal @projectAdded="addProject" :toBeEditedProject="toBeEditedProject"></add-project-modal>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                projects: [],
                canAdd:true,
                toBeEditedProject:{
                    'id':'',
                    'projectName' :'',
                    'isActive':'',
                    'link' :'',
                    'projectDesc' :'',
                    'images' :'',
                    'mainImage':''
                }
            }
        },

        methods: {
            getCurrentProjects() {
                axios.get('/freelancer/projects').then(
                    (response) => {
                        let currProjects =  response.data;
                        this.projects = currProjects;
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
                if(this.projects.length > 4){
                    this.canAdd =  false;
                }else{
                    this.canAdd = true;
                }
            },

            clearData(){
                this.toBeEditedProject={
                    'id':'',
                    'projectName' :'',
                    'isActive':'',
                    'link' :'',
                    'projectDesc' :'',
                    'images' :'',
                    'mainImage':''
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