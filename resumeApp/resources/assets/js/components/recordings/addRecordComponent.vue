<template>
    <div>
        <div class="modal fade" id="addRecordModal" tabindex="-1" role="dialog" aria-labelledby="addRecordModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="text-right" style="padding: 15px 10px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeRecordModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/freelancer/addrecord/" method="post" @submit.prevent="submitForm">
                          <div class="row">
                              <div class="form-group col-md-6">
                                  <label for="title" class="panelFormLabel">Title :</label>
                                  <input type="text" class="form-control" id="title" name="title" v-model="toBeEditedRecord.title" required>
                              </div>
                              <div class="form-group col-md-12">
                                    <label for="transcription" class="panelFormLabel">Transcription :</label>
                                    <textarea class="form-control" rows="3" id="transcription" name="transcription" v-model="toBeEditedRecord.transcription">
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
        props:['toBeEditedRecord'],
        data(){
            return{
            }
        },
        methods:{
            submitForm(){
               // post data :
                axios.post('/freelancer/addrecord',this.toBeEditedRecord).then( (response) => {
                    if(this.toBeEditedRecord.id === ""){
                        this.$emit('recordAdded',this.toBeEditedRecord);
                    }
                    // save the record id :
                    this.toBeEditedRecord.id = response.data.id;
                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);
                });
                $('#closeRecordModal').click();
            },
        },
        mounted(){
        }
    }
</script>