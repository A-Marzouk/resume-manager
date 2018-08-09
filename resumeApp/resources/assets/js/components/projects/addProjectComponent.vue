<template>
    <div>
        <div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="addProjectModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="text-right" style="padding: 15px 10px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeProjectModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding: 0 36px 36px 36px;">
                        <div class="row">
                            <div class="col-md-8"  style="border-radius:10px; border: 1px solid lightgray;" v-show="!toBeEditedProject.mainImage">

                            </div>
                            <div class="col-md-8" v-show="toBeEditedProject.mainImage">
                                <div>
                                    <img :src="toBeEditedProject.mainImage" alt="" width="100%" height="auto" style="border-radius:10px; border: 1px solid lightgray;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <form action="/freelancer/addproject/" method="post" @submit.prevent="submitProjectForm">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="projectName" class="panelFormLabel">Name :</label>
                                            <input type="text" class="form-control" id="projectName" name="projectName" v-model="toBeEditedProject.projectName" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="link" class="panelFormLabel">Link:</label>
                                            <input type="text" class="form-control" id="link" name="link" v-model="toBeEditedProject.link">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="projectDesc" class="panelFormLabel">Description :</label>
                                            <textarea class="form-control" rows="3" id="projectDesc" name="projectDesc" v-model="toBeEditedProject.projectDesc">
                                    </textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="custom-file" style="padding-top: 5px;">
                                                <input type="file" id="mainImage" ref="file" class="custom-file-input panelFormInput" name="mainImage" @change="handleFile" accept="image/*">
                                                <label class="custom-file-label" id="mainImageLabel">
                                                    Main image
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="custom-file" style="padding-top: 5px;">
                                                <input type="file" id="newImage" class="custom-file-input panelFormInput" name="newImage" @change="handleNewImage" accept="image/*">
                                                <label class="custom-file-label" id="newImageLabel">
                                                    Add image
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

                                        <div class="row">
                                            <div v-for="image in toBeEditedProject.images" class="col-md-6">
                                                <img :src="image" alt="" width="100%">
                                            </div>
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
                form_data:{},
                canAddImage:false,
            }
        },
        methods:{
            submitProjectForm(){
                // post data :
                this.form_data = new FormData;
                this.form_data.append('id',this.toBeEditedProject.id);
                this.form_data.append('projectName',this.toBeEditedProject.projectName ||'');
                this.form_data.append('link',this.toBeEditedProject.link||'');
                this.form_data.append('projectDesc',this.toBeEditedProject.projectDesc||'');
                this.form_data.append('isActive',this.toBeEditedProject.isActive||'');

                if(this.canAddImage){
                    let mainImage = this.$refs.file.files[0];
                    this.form_data.append('mainImage',mainImage);
                }

                if(this.toBeEditedProject.imagesFiles.length > 0){
                    let i = 0 ;
                    this.toBeEditedProject.imagesFiles.forEach( (file) => {
                        let name = 'moreImages'+i ;
                        this.form_data.append(name,file);
                        i++;
                    })
                }


                axios.post('/freelancer/addproject',this.form_data).then( (response) => {
                    console.log(response.data);

                    if(this.toBeEditedProject.id === ""){
                        this.$emit('projectAdded',this.toBeEditedProject);
                    }
                    // save the project id :
                    this.toBeEditedProject.id = response.data.id;
                    this.toBeEditedProject.mainImage = response.data.mainImagePath ;
                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);
                });
                $('#closeProjectModal').click();
            },
            handleFile(){
                this.canAddImage = true;
                const file = this.$refs.file.files[0];
                this.toBeEditedProject.mainImage = URL.createObjectURL(file);

            },
            handleNewImage(){
                let newImage = document.getElementById('newImage');
                let image = newImage.files[0];
                let tempPath = URL.createObjectURL(image);

                let currentImages = this.toBeEditedProject.images ;
                if(currentImages == null){
                    this.toBeEditedProject.images = [];
                }
                this.toBeEditedProject.images.push(tempPath);
                // save files array
                let currentImagesFiles = this.toBeEditedProject.imagesFiles ;
                if(currentImagesFiles == null){
                    this.toBeEditedProject.imagesFiles = [];
                }
                this.toBeEditedProject.imagesFiles.push(image);

            }

    },
        mounted(){
        }
    }
</script>