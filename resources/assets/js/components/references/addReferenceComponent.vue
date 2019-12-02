<template>
    <div>
        <div class="modal fade" id="addReferenceModal" tabindex="-1" role="dialog" aria-labelledby="addReferenceModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="pageSubHeading text-left">
                            Add \ Edit a reference
                        </div>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeReferenceModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/freelancer/addreference/" method="post" @submit.prevent="submitForm">
                          <div class="row">
                              <div class="form-group col-md-6">
                                  <label for="referenceTitle" class="panelFormLabel">Title :</label>
                                  <input type="text" class="form-control" id="referenceTitle" name="title" v-model="toBeEditedReference.title" required>
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="company" class="panelFormLabel">Company :</label>
                                  <input type="text" class="form-control" id="company" name="company" v-model="toBeEditedReference.company" required>
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="phone" class="panelFormLabel">Phone :</label>
                                  <input type="text" class="form-control" id="phone" name="phone" v-model="toBeEditedReference.phone" required>
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="email" class="panelFormLabel">Email :</label>
                                  <input type="text" class="form-control" id="email" name="email" v-model="toBeEditedReference.email" required>
                              </div>
                              <div class="form-group col-md-12">
                                    <label for="referenceDetails" class="panelFormLabel">Details :</label>
                                    <textarea class="form-control" rows="3" id="referenceDetails" name="details" v-model="toBeEditedReference.details">
                                    </textarea>
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
        props:['toBeEditedReference'],
        data(){
            return{
            }
        },
        methods:{
            submitForm(){
                // post data :
                axios.post('/freelancer/addreference',this.toBeEditedReference).then( (response) => {
                    //
                    console.log(response.data);

                    if(this.toBeEditedReference.id === ""){
                        this.$emit('referenceAdded',this.toBeEditedReference);
                    }
                    // save the education id :
                    this.toBeEditedReference.id = response.data.id;
                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);
                });
                $('#closeReferenceModal').click();
            },
        },
        mounted(){
        }
    }
</script>
