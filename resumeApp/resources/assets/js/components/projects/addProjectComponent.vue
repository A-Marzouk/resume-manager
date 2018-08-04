<template>
    <div>
        <div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="addProjectModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="text-right" style="padding: 15px 10px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">

                            </div>
                            <div class="col-md-4">
                                <form action="/freelancer/addproject/" method="post" @submit.prevent="submitProjectForm">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="projectName" class="panelFormLabel">Project name :</label>
                                            <input type="text" class="form-control" id="projectName" name="projectName" v-model="toBeEditedProject.projectName" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="link" class="panelFormLabel">link:</label>
                                            <input type="text" class="form-control" id="link" name="link" v-model="toBeEditedProject.link" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="projectDesc" class="panelFormLabel">Project description :</label>
                                            <textarea class="form-control" rows="3" id="projectDesc" name="projectDesc" v-model="toBeEditedProject.projectDesc" required>
                                    </textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="custom-file" style="padding-top: 5px;">
                                                <input type="file" id="mainImage" class="custom-file-input panelFormInput" name="mainImage">
                                                <label class="custom-file-label" id="audioLabel">
                                                    Main image
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="form-check-label checkBoxText checkBoxContainer">
                                                <input id="isActive" class="form-check-input" style="@if($errors->has('design_skills_checkbox')) border:1px solid red; @endif" type="checkbox" name="isActive" :checked="toBeEditedProject.isActive" v-model="toBeEditedProject.isActive">
                                                Active
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['toBeEditedProject'],
        data(){
            return{
            }
        },
        methods:{
            submitProjectForm(){
                // post data :
                axios.post('/freelancer/addproject',this.toBeEditedProject).then( (response) => {
                    //
                    if(this.toBeEditedProject.id === ""){
                        this.$emit('projectAdded',this.toBeEditedProject);
                    }
                    // save the project id :
                    this.toBeEditedProject.id = response.data.id;
                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);
                });
                $('#closeModal').click();
            }

    },
        mounted(){
        }
    }
</script>