<template>
    <div>
        <div class="modal fade" id="addWorkModal" tabindex="-1" role="dialog" aria-labelledby="addWorkModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="text-right" style="padding-right: 12px;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/freelancer/addwork/" method="post" @submit.prevent="submitForm">
                            <div class="form-group">
                                <label for="job_title">Job title :</label>
                                <input type="text" class="form-control" id="job_title" name="job_title" v-model="formData.job_title" required>
                            </div>
                            <div class="form-group">
                                <label for="company">Company:</label>
                                <input type="text" class="form-control" id="company" name="company" v-model="formData.company" required>
                            </div>
                            <div class="form-group">
                                <label for="job_description">Job description :</label>
                                <textarea class="form-control" rows="3" id="job_description" name="job_description" v-model="formData.job_description" required>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="date_from">From :</label>
                                <input type="date" class="form-control" id="date_from" name="date_from" v-model="formData.date_from" required>
                            </div>
                            <div class="form-group" v-show="!formData.currently_working">
                                <label for="date_from">To :</label>
                                <input type="date" class="form-control" id="date_to" name="date_to" v-model="formData.date_to">
                            </div>
                            <label class="form-check-label col-md-3 checkBoxText checkBoxContainer">
                                <input class="form-check-input" style="@if($errors->has('design_skills_checkbox')) border:1px solid red; @endif" type="checkbox" name="currently_working" checked v-model="formData.currently_working">
                                Present
                                <span class="checkmark"></span>
                            </label>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Add</button>
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
        data(){
            return{
                formData:{
                    'job_title' :'',
                    'job_description':'',
                    'company' :'',
                    'date_from' :'',
                    'date_to' :'',
                    'currently_working':''
                }
            }
        },
        methods:{
            submitForm(){
                // post data :
                axios.post('/freelancer/addwork',this.formData).then( (response) => {
                    console.log(response.data);
                });
                $('#closeModal').click();
                this.$emit('workAdded',this.formData);
            }
        }
    }
</script>