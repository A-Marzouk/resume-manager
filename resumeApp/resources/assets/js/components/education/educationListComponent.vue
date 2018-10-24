<template>
    <div>
        <transition-group name="list" class="row">
            <education-history v-for="(education,index) in educations" v-bind:key="index" class="list-item workExperience col-12" style="margin: 0px 10px 20px;">
                <button type="button" class="close" style="padding: 5px; outline: none;" @click="deleteEducation(education)">
                    <span aria-hidden="true">&times;</span>
                </button>
                <button type="button" data-toggle="modal" data-target="#addEducationModal" class="close" style="padding:3px 2px 5px 0px; outline: none;" @click="editEducation(education.id)">
                <span aria-hidden="true">
                    <img src="/resumeApp/resources/views/customTheme/images/edit.png" alt="edit" width="17px">
                </span>
                </button>
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">{{education.school_title}}</b><br/>
                Start :{{education.date_from}}
                <span v-show="education.date_to && education.currently_learning !== true"> End : {{education.date_to}}</span>
                <span v-show="education.currently_learning !== false"> - Present</span><br/><br/>

                {{education.description}}
            </education-history>
        </transition-group>
        <div class="text-left align-middle col-lg-3 col-md-5 noHoverEffect" v-show="this.canAdd" @click="clearData">
            <a class="btn btn-default btn-workExp" data-toggle="modal" data-target="#addEducationModal" id="addWorkText">
                <span>
                    <img src="/resumeApp/resources/views/customTheme/images/add_work_img.png" alt="add education" width="30px">
                    Add new education
                </span>
            </a>
        </div>
        <br/>
        <add-education-modal @educationAdded="addEducationHistory" :toBeEditedEducation="toBeEditedEducation"></add-education-modal>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                educations: [],
                canAdd:true,
                toBeEditedEducation:{
                    'id':'',
                    'school_title' :'',
                    'description':'',
                    'date_from' :'',
                    'date_to' :'',
                    'currently_learning':''
                }
            }
        },

        methods: {
            getCurrentEducations() {
                axios.get('/freelancer/educationshistory').then(
                    (response) => {
                        let currEducations =  response.data;
                        $.each(currEducations, function(i){
                            if(currEducations[i].currently_learning == "0") {
                                currEducations[i].currently_learning = false;
                            }else{
                                currEducations[i].currently_learning = true;
                            }
                        });
                        this.educations = currEducations;
                        this.checkMaxEducations();
                    }
                );
            },

            addEducationHistory(newEducation) {
                this.educations.push(newEducation);
                this.checkMaxEducations();
            },

            deleteEducation(education){
                if(!confirm('Are you sure you want to delete this education history ?')){
                    return;
                }
                axios.post('/freelancer/deleteeducation',{educationHistoryID:education.id}).then((response)=>{
                    let educations = this.educations;
                    $.each(educations, function(i){
                        if(educations[i].id === education.id) {
                            educations.splice(i,1);
                            return false;
                        }
                    });

                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);

                    this.checkMaxEducations();

                });
            },

            editEducation(educationID){
                let educations = this.educations;
                let editedEducation =  {};

                $.each(educations, function(i){
                    if(educations[i].id === educationID){
                        editedEducation = educations[i];
                    }
                });
                this.toBeEditedEducation = editedEducation;
            },

            checkMaxEducations(){
                if(this.educations.length > 4){
                    this.canAdd =  false;
                }else{
                    this.canAdd = true;
                }
            },

            clearData(){
                this.toBeEditedEducation={
                    'id':'',
                        'school_title' :'',
                        'description':'',
                        'date_from' :'',
                        'date_to' :'',
                        'currently_learning':''
                };
            }
        },

        created() {
            this.getCurrentEducations();
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