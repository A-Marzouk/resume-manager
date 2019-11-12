<template>
    <div>
        <div class="modal fade" id="addEducationModal" tabindex="-1" role="dialog" aria-labelledby="addEducationModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="text-right" style="padding: 15px 10px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeEducationModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/freelancer/addeducation/" method="post" @submit.prevent="submitForm">
                          <div class="row">
                              <div class="form-group col-md-6">
                                  <label for="school_title" class="panelFormLabel">Title :</label>
                                  <input type="text" class="form-control" id="school_title" name="school_title" v-model="toBeEditedEducation.school_title" required>
                              </div>
                              <div class="form-group col-md-12">
                                    <label for="description" class="panelFormLabel">Description :</label>
                                    <textarea class="form-control" rows="3" id="description" name="description" v-model="toBeEditedEducation.description" required>
                                    </textarea>
                                </div>
                              <div class="form-group col-md-6">
                                    <label for="date_from" class="panelFormLabel">Start :</label>
                                    <input type="date" class="form-control" id="date_from" name="date_from" v-model="toBeEditedEducation.date_from" required>
                                </div>
                              <div class="form-group col-md-6" v-show="!toBeEditedEducation.is_currently_learning">
                                    <label for="date_from" class="panelFormLabel">End :</label>
                                    <input type="date" class="form-control" id="date_to" name="date_to" v-model="toBeEditedEducation.date_to">
                                </div>

                              <div class="form-group col-md-12">
                                  <label class="form-check-label checkBoxText checkBoxContainer">
                                      <input id="is_currently_learning" class="form-check-input" style="@if($errors->has('design_skills_checkbox')) border:1px solid red; @endif" type="checkbox" name="is_currently_learning" :checked="toBeEditedEducation.is_currently_learning" v-model="toBeEditedEducation.is_currently_learning">
                                      Present
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
</template>

<script>
    export default {
        props:['toBeEditedEducation'],
        data(){
            return{
            }
        },
        methods:{
            submitForm(){
               // post data :
                axios.post('/freelancer/addeducation',this.toBeEditedEducation).then( (response) => {
                    //
                    if(this.toBeEditedEducation.id === ""){
                        this.$emit('educationAdded',this.toBeEditedEducation);
                    }
                    // save the education id :
                    this.toBeEditedEducation.id = response.data.id;
                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);
                });
                $('#closeEducationModal').click();
            },
        },
        mounted(){
        }
    }
</script>
