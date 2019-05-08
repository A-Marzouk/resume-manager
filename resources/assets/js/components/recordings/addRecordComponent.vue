<template>
  <div>
    <div class="modal fade"
         id="addRecordModal"
         tabindex="-1"
         role="dialog"
         aria-labelledby="addRecordModalLabel"
         aria-hidden="true">
      <div class="modal-dialog"
           role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="pageSubHeading text-left">
              Add \ Edit a record
            </div>
            <button type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                    id="closeRecordModal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="/freelancer/addrecord/"
                  method="post"
                  @submit.prevent="submitForm">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="recordTitle"
                         class="panelFormLabel">Title :</label>
                  <input type="text"
                         class="form-control"
                         id="recordTitle"
                         name="title"
                         v-model="toBeEditedRecord.title"
                         required>
                </div>
                <div class="form-group col-md-12">
                  <label for="recordTranscription"
                         class="panelFormLabel">Transcription :</label>
                  <textarea class="form-control"
                            rows="3"
                            id="recordTranscription"
                            name="transcription"
                            v-model="toBeEditedRecord.transcription">
                                    </textarea>
                  <hr>
                </div>
                <div class="form-group"
                     v-show="toBeEditedRecord.src">
                  Current uploaded Audio : {{toBeEditedRecord.src.replace('/resumeApp/uploads/','')}}.
                  <br /><br />
                </div>
                <div class="form-group col-md-12"
                     v-show="!toBeEditedRecord.src && uploadMethod.length < 1">
                  <div class="panelFormLabel"
                       style="padding-bottom: 15px;">
                    Please choose uploading method :
                  </div>
                  <!-- when there is no src and no upload method was chosen we give them to choose.-->
                  <a href="javascript:void(0)" class="btn btn-primary" @click="setUploadMethod('upload')">Upload audio file</a>
                  <a href="javascript:void(0)" class="btn btn-primary" @click="setUploadMethod('record')">Record audio</a>
                  <a href="javascript:void(0)" class="btn btn-primary" @click="setUploadMethod('url')">GDrive URL</a>
                  <br />
                </div>
                <div id="uploadFile"
                     v-show="uploadMethod == 'upload'">
                  <div class="form-group col-md-12">
                    <input type="file"
                           id="file"
                           ref="file"
                           v-on:change="handleFileUpload" />
                  </div>
                  <div class="row">
                    <div class="col-md-12"
                         v-show="uploadPercentage > 0">
                      <progress style="width: 300px;height:5px;"
                                max="100"
                                :value.prop="uploadPercentage"></progress>
                    </div>
                  </div>
                </div>
                <div id="recordAudio"
                     class="form-group col-md-12"
                     v-show="uploadMethod == 'record'">
                  <div class="recorder_wrapper">
                    <div class="recorder">
                      <div id="recordImg">
                        <img src="/images/Microphone_1.png" alt="mic" width="30px">
                                          </div>
                        <p id="record_status"></p>
                        <div class="NoDecor">
                          <a href="javascript:void(0)" id="startRecord" class="btn btn-default">New record</a>
                          <a href="javascript:void(0)" id="stopAudio" style="padding-top: 20px;" class="d-none">Stop</a>
                          <br>
                          <a href="javascript:void(0)" id="playAudio" class="d-none">Play</a><br />
                          <a href="javascript:void(0)" id="downloadAudio" class="d-none">Download</a><br />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="urlToAudio"
                       class="form-group col-md-12"
                       v-show="uploadMethod == 'url'">
                    <label class="panelFormLabel">Link from Google drive :</label>
                    <input type="text"
                           class="form-control panelFormInput"
                           v-model="toBeEditedRecord.src">
                  </div>
                </div>
                <div class="modal-footer">
                  <a href="javascript:void(0)" class="btn btn-primary" @click="clearUploadMethod" v-show="uploadMethod.length > 0"> Back </a>
                  <button type="submit"
                          class="btn btn-primary"
                          v-show="uploadMethod != 'record'"
                          v-bind:disabled="toBeEditedRecord.src.length < 1 && !fileChosen">Save</button>
                  <!-- submit button for records -->
                  <a class="btn btn-primary d-none" id="saveAudio" @click="loadingBtn" style="color: white!important;" v-show="uploadMethod == 'record'">Save</a>
                  <button disabled
                          id="loadingBtn"
                          class="d-none btn btn-primary">Uploading..</button>
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
  props: ['toBeEditedRecord'],
  data() {
    return {
      file: '',
      fileChosen: false,
      uploadPercentage: 0,
      uploadMethod: ''
    }
  },
  methods: {
    handleFileUpload() {
      this.file = this.$refs.file.files[0];
      this.fileChosen = true;
    },
    submitForm() {
      let formData = new FormData();
      formData.append('audioFile', this.file);
      formData.append('title', this.toBeEditedRecord.title);
      formData.append('src', this.toBeEditedRecord.src);
      formData.append('transcription', this.toBeEditedRecord.transcription);
      formData.append('id', this.toBeEditedRecord.id);
      axios.post('/freelancer/addrecord',
        formData, {
          headers: {
            'Content-Type': 'multipart/form-data',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          onUploadProgress: function(progressEvent) {
            this.uploadPercentage = parseInt(Math.round((progressEvent.loaded * 100) / progressEvent.total));
          }.bind(this)
        }
      ).then((response) => {
        if (this.toBeEditedRecord.id === "") {
          this.$emit('recordAdded', this.toBeEditedRecord);
        }
        this.toBeEditedRecord.src = response.data.recordSrc;
        // save the record id :
        this.toBeEditedRecord.id = response.data.id;
        this.changesSaved();
        $('#closeRecordModal').click();
        this.uploadPercentage = 0;
        this.uploadMethod = '';
      });
    },
    changesSaved() {
      // changes saved :
      $('#changesSaved').fadeIn('slow');
      setTimeout(function() {
        $('#changesSaved').fadeOut();
      }, 2000);
    },
    setUploadMethod(method) {
      this.uploadMethod = method;
    },
    clearUploadMethod() {
      this.uploadMethod = '';
    },
    loadingBtn() {
      $('#loadingBtn').removeClass('d-none');
      $('#saveAudio').addClass('d-none');
    }

  },
  mounted() {}
}
</script>
