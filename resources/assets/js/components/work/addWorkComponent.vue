<template>
    <div>
        <div class="modal fade" id="addWorkModal" tabindex="-1" role="dialog" aria-labelledby="addWorkModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="text-right" style="padding: 15px 10px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/freelancer/addwork/" method="post" @submit.prevent="submitForm">
                          <div class="row">
                              <div class="form-group d-flex flex-column align-items-start col-md-6">
                                  <label for="job_title" class="panelFormLabel">Job title :</label>
                                  <input type="text" class="form-control p-2" id="job_title" name="job_title" v-model="toBeEditedWork.job_title" required>
                              </div>
                              <div class="form-group d-flex flex-column align-items-start col-md-6">
                                  <label for="" class="panelFormLabel">Company:</label>
                                  <input type="text" class="form-control p-2" name="company" v-model="toBeEditedWork.company" required>
                              </div>
                              <div class="form-group d-flex flex-column align-items-start col-md-12">
                                    <label for="job_description" class="panelFormLabel">Job description :</label>
                                    <textarea class="form-control p-2" rows="3" id="job_description" name="job_description" v-model="toBeEditedWork.job_description" required>
                                    </textarea>
                                </div>
                              <div class="form-group d-flex flex-column align-items-start col-md-6">
                                    <label for="" class="panelFormLabel">Start :</label>
                                    <input type="date" class="form-control p-2" name="date_from" v-model="toBeEditedWork.date_from" required>
                                </div>
                              <div class="form-group d-flex flex-column align-items-start col-md-6" v-show="!toBeEditedWork.is_currently_working">
                                    <label for="" class="panelFormLabel">End :</label>
                                    <input type="date" class="form-control p-2"  name="date_to" v-model="toBeEditedWork.date_to">
                                </div>

                              <div class="form-group d-flex flex-column align-items-start col-md-12">
                                  <label class="form-check-label checkBoxText checkBoxContainer">
                                      <input id="is_currently_working" class="form-check-input" type="checkbox" name="is_currently_working" :checked="toBeEditedWork.is_currently_working" v-model="toBeEditedWork.is_currently_working">
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
        props:['toBeEditedWork'],
        data(){
            return{
            }
        },
        methods:{
            submitForm(){
               // post data :
                axios.post('/freelancer/addwork',this.toBeEditedWork).then( (response) => {
                    //
                    console.log(response.data);
                    if(this.toBeEditedWork.id === ""){
                        this.$emit('workAdded',this.toBeEditedWork);
                    }
                    // save the work id :
                    this.toBeEditedWork.id = response.data.id;
                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);
                });
                $('#closeModal').click();
            },
        },
        mounted(){
        }
    }
</script>
