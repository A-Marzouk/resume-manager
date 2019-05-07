<template>
    <div>
        <div class="modal fade" id="addJobModal" tabindex="-1" role="dialog" aria-labelledby="addJobModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="text-right" style="padding: 15px 10px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeJobModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/client/jobs/add" method="post" @submit.prevent="submitForm">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="title" class="panelFormLabel">Title :</label>
                                    <input type="text" class="form-control" id="title" name="title" v-model="toBeEditedJob.title" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description" class="panelFormLabel">Description :</label>
                                    <textarea class="form-control" rows="3" id="description" name="description" v-model="toBeEditedJob.description" required>
                                    </textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Budget" class="panelFormLabel">Budget :</label>
                                    <input type="text" class="form-control" id="Budget" name="Budget" v-model="toBeEditedJob.budget" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="time" class="panelFormLabel">Time :</label>
                                    <input type="text" class="form-control" id="time" name="time" v-model="toBeEditedJob.time" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="skills" class="panelFormLabel">skills :</label>
                                    <input type="text" class="form-control" id="skills" name="skills" v-model="toBeEditedJob.skills" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="level" class="panelFormLabel">Level : <small>Junior, Middle..</small></label>
                                    <input type="text" class="form-control" id="level" name="level" v-model="toBeEditedJob.level">
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="hidden" class="form-control" id="status" name="status" v-model="toBeEditedJob.status">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Post</button>
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
        props:['toBeEditedJob'],
        data(){
            return{
            }
        },
        methods:{
            submitForm(){
                // post data :
                axios.post('/client/jobs/add',this.toBeEditedJob).then( (response) => {
                    //
                    if(this.toBeEditedJob.id === ""){
                        this.$emit('jobAdded',this.toBeEditedJob);
                    }
                    // save the job id :
                    this.toBeEditedJob.id = response.data.id;
                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);
                });
                $('#closeJobModal').click();
            },
        },
        mounted(){
        }
    }
</script>