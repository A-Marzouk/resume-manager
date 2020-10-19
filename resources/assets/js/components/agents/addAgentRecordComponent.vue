<template>
    <div>
        <div class="modal fade" id="addAgentRecordModal" tabindex="-1" role="dialog" aria-labelledby="addAgentRecordModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="text-right" style="padding: 15px 10px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeAgentRecordModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/workforce/agent/add_record" method="post" @submit.prevent="submitForm">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="title" class="panelFormLabel"> Title : *</label>
                                    <input id="title" type="text" class="form-control" name="title" v-model="record.title" required autofocus>
                                </div>

                                <div class="form-group col-md-12" v-show="uploadMethod.length < 1">
                                    <div class="panelFormLabel" style="padding-bottom: 15px;">
                                        Please choose uploading method :
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12" style="padding-top:10px;">
                                            <a href="javascript:void(0)" class="btn btn-primary btn-block" @click="setUploadMethod('upload')">Upload audio file</a>
                                        </div>
                                        <div class="col-md-6 col-12" style="padding-top:10px;">
                                            <a href="javascript:void(0)" class="btn btn-primary btn-block" @click="setUploadMethod('url')">Link</a>
                                        </div>
                                    </div>
                                    <br/>
                                </div>

                                <div id="uploadFile" v-show="uploadMethod == 'upload'">
                                    <div class="form-group col-md-12">
                                        <input type="file" id="file" ref="file" v-on:change="handleFileUpload"/>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12" v-show="uploadPercentage > 0">
                                            <progress style="width: 300px;height:5px;" max="100" :value.prop="uploadPercentage"></progress>
                                        </div>
                                    </div>
                                </div>

                                <div id="urlToAudio" class="form-group col-md-12" v-show="uploadMethod == 'url'">
                                    <label class="panelFormLabel">Link to record :</label>
                                    <input type="text" class="form-control panelFormInput" v-model="record.src">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="javascript:void(0)" class="btn btn-primary" @click="clearUploadMethod" v-show="uploadMethod.length > 0"> Back </a>
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
                uploadPercentage: 0,
                uploadMethod: '',
                file:'',
                record:{
                    src:'',
                    title:''
                }
            }
        },
        methods:{
            setUploadMethod(method){
                this.uploadMethod = method;
            },
            handleFileUpload(){
                this.file = this.$refs.file.files[0];
            },
            submitForm(){
                if(this.record.src.length < 1 &&  this.file.length < 1){
                    alert('Please upload the required record..');
                    return;
                }
                let formData = new FormData();
                formData.append('audioFile', this.file);
                formData.append('src', this.record.src);
                formData.append('title', this.record.title);
                formData.append('agent.id', this.toBeEditedAgent.id);

                axios.post( '/workforce/agent/add_record',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        onUploadProgress: function( progressEvent ) {
                            this.uploadPercentage = parseInt( Math.round( ( progressEvent.loaded * 100 ) / progressEvent.total ) );
                        }.bind(this)
                    }
                ).then((response)=>{
                    let newRecord = response.data;
                    this.toBeEditedAgent.records.push(newRecord);

                });
                $('#closeAgentRecordModal').click();
                this.clearRecordData();
                // changes saved :
                $('#changesSaved').fadeIn('slow');
                setTimeout(function () {
                    $('#changesSaved').fadeOut();
                },2000);
            },
            clearRecordData(){
                this.record = {
                    src:'',
                    title:''
                };
                this.file='';
                this.uploadPercentage = 0;
                this.uploadMethod='';
            },
            clearUploadMethod(){
                this.uploadMethod = '' ;
            },
        },
        mounted(){
        }
    }
</script>