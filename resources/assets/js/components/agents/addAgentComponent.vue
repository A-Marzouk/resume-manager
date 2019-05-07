<template>
    <div>
        <div class="modal fade" id="addAgentModal" tabindex="-1" role="dialog" aria-labelledby="addAgentModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="text-right" style="padding: 15px 10px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeAgentModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/freelancer/addeducation/" method="post" @submit.prevent="submitForm">
                          <div class="row">
                              <div class="form-group col-md-6">
                                  <label for="number" class="panelFormLabel">Order : *</label>
                                  <select name="number" class="form-control" id="number" v-model="toBeEditedAgent.number">
                                      <option v-for="i in (1,200)" :value="i">{{i}}</option>
                                  </select>
                              </div>

                              <div class="form-group col-md-6">
                                  <label for="hourly_rate" class="panelFormLabel">Hourly rate :</label>
                                  <select name="hourly_rate" class="form-control" id="hourly_rate" v-model="toBeEditedAgent.hourly_rate">
                                      <option v-for="i in (5,25)" :value="i">{{i}}</option>
                                  </select>
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="name" class="panelFormLabel">Name : *</label>
                                  <input type="text" class="form-control" id="name" name="name" v-model="toBeEditedAgent.name" required>
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="language" class="panelFormLabel">Language : *</label>
                                  <input type="text" class="form-control" id="language" name="language" v-model="toBeEditedAgent.language" required>
                              </div>
                              <div class="form-group col-md-12">
                                  <label for="location" class="panelFormLabel">Location : *</label>
                                  <input type="text" class="form-control" id="location" name="location" v-model="toBeEditedAgent.location" required>
                              </div>
                              <div class="form-group col-md-12">
                                    <label for="experience" class="panelFormLabel">Experience :*</label>
                                    <textarea class="form-control" rows="3" id="experience" name="experience" v-model="toBeEditedAgent.experience">
                                    </textarea>
                              </div>
                              <div class="form-group col-md-12">
                                  <label for="available_hours" class="panelFormLabel">Available hours :</label>
                                  <textarea class="form-control" rows="3" id="available_hours" name="experience" v-model="toBeEditedAgent.available_hours">
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
        props:['toBeEditedAgent'],
        data(){
            return{
            }
        },
        methods:{
            submitForm(){
               // post data :
                axios.post('/workforce/add_agent',this.toBeEditedAgent).then( (response) => {
                    //
                    if(this.toBeEditedAgent.id === ""){
                        this.$emit('agentAdded',this.toBeEditedAgent);
                    }
                    // save the education id :
                    this.toBeEditedAgent.id = response.data.id;
                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);

                    $('#closeAgentModal').click();
                });
            },
        },
        mounted(){
        }
    }
</script>