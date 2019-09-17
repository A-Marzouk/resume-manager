<template>
    <div>
        <div class="faq-content">
            <div class="faq-question-input">
                <label class="faq-input-label">
                    <i class="icon icon-point"></i>
                    List of documents
                </label>
                <div class="faq-input">
                    <div v-if="filteredFiles.length === 0"
                         class="account-edit-section-edit-btn no-decoration picture-box">
                        <div class="fallback">
                            <input multiple type="file" id="files" name="files"/>
                        </div>
                        <p class="dz-message">Drag and drop a photo you want to upload <br/> or</p>

                        <div class="fake-file-input btn btn-orange dz-input">
                            CHOOSE A FILE
                        </div>
                        <p class="dz-message little">Maximum allowed size is 45 MB</p>
                        <div :id="'dropfiles-team-brief-'+ fileCategory" class="dropzone"></div>
                    </div>
                    <div class="preview-files-container" v-else>
                        <div class="add-document-container">
                            <div class="dz-details">
                                <div
                                        class="thumbnail-container">
                                    <img class="icon-download" src="/images/icons/document.svg"/>
                                    <input multiple type="file" id="files" name="files"
                                           v-on:change="addFiles"/>
                                </div>
                                <a>UPLOAD NEW FILE</a>
                            </div>
                        </div>
                        <div :key="index + file.name" v-for="(file, index) in filteredFiles"
                             class="preview-container">
                            <div class="dz-preview dz-file-preview">
                                <div class="dz-details">
                                    <div class="thumbnail-container">
                                        <img class="icon-download" src="/images/icons/download_icon.svg"/>
                                        <a href="javascript:;"
                                           v-on:click="toggleMenu(file)"
                                           class="menu-handler">
                                            <img class="icon-menu"
                                                 src="/images/icons/more_vert.svg"/>
                                        </a>
                                    </div>
                                    <div class="filename" style="word-break: break-all;">{{file.name}}</div>
                                </div>
                                <div class="menu-preview" v-show="selectedFileID === file.id">
                                    <a href="javascript:;" v-on:click="removeDoc(index,file)">Delete the document</a>
                                    <!--<a href="javascript:;">Send in private message</a>-->
                                    <!--<a href="javascript:;">Send to email</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="processBar">

        </div>
    </div>
</template>

<script>
    let dropZone;
    export default {
        name: "FilesComponent",
        props:['campaign','fileCategory'],
        data(){
            return{
                files: [],
                filePaths: [],
                selectedFileID: '',
                uploadPercentage:0
            }
        },
        computed:{
          filteredFiles(){
              return this.files.filter((file) => {return file.category === this.fileCategory})
          }
        },
        methods:{
            removeDoc(index,file) {
                if (!confirm('Are you sure you want to delete this file ?')) {
                    return;
                }
                // post data to delete the file from the directory and to remove the campaign file record.
                axios.post('/client/camp/files/delete',{file_id : file.id})
                    .then( (response) => {
                        if(response.data.status === 'success'){

                            this.files.forEach( (myFile, i) => {
                                if(myFile.id === file.id){
                                    // remove the file
                                    this.files.splice(i,1)
                                }
                            });

                            this.selectedFileID = '' ;
                            // file has been deleted notification.
                            this.$emit('showPositiveNotification','File has been successfully deleted!');
                        }
                    })
                    .catch()
                if (this.files.length === 0) dropZone.removeAllFiles();
            },
            toggleMenu(file) {
                if(this.selectedFileID === file.id ){
                    this.selectedFileID = '' ;
                }else{
                    this.selectedFileID = file.id ;
                }
            },
            addFiles(e) {
                console.log(e.target.files);
                // upload e.target.files[0]
                this.uploadFile(e.target.files[0]);
                this.files = [...this.files, ...e.target.files];
                console.log('multi files has been added');
            },
            uploadFile(file){
                // upload the file as soon as it is added :
                let formData = new FormData();
                formData.append('campaignFile', file);
                formData.append('campaign_id', this.campaign.id);
                formData.append('category', this.fileCategory);
                axios.post('/client/camp/files/upload',
                    formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        onUploadProgress: function(progressEvent) {
                            this.uploadPercentage = parseInt(Math.round((progressEvent.loaded * 100) / progressEvent.total));
                            $('.processBar').css('width',this.uploadPercentage+'%');
                        }.bind(this)
                    }
                ).then((response) => {
                    this.uploadPercentage = 0 ;
                    $('.processBar').css('width',0);

                    if(response.data.filePath === null){
                        let notificationMessage = 'File is not accepted !';
                        this.$emit('showNegativeNotification',notificationMessage);
                        if (this.files.length === 0) dropZone.removeAllFiles();
                    }else{
                        this.$emit('showPositiveNotification','File has been successfully uploaded!');
                        this.files.push(response.data.file);
                    }

                }).catch((error) => {

                });
            }
        },
        mounted() {
            this.files = this.campaign.files ;
            let component   = this;
            let fileCategory   = this.fileCategory;

            let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            dropZone = new Dropzone("#dropfiles-team-brief-"+ fileCategory , {
                maxFilesize: 45,
                dictDefaultMessage: '',
                dictRemoveFile: '',
                dictCancelUpload: '',
                url: '/client/camp/files/upload',
                autoProcessQueue:false,
                headers: {
                    'x-csrf-token': CSRF_TOKEN
                },
                paramName: 'files',
                addRemoveLinks: false,
                addImage: false,
                uploadMultiple: true,
                init: function () {
                    this.on('addedfile', (file) => {
                        console.log('addedfile event');
                        component.uploadFile(file);
                        file.previewElement.innerHTML = "";
                    });

                    this.on('error', (error) => {
                        console.log(error);
                    });
                }
            });
        }
    }
</script>

<style >
    .processBar{
        height: 6px;
        background: lightgreen;
        width: 0%;
    }

</style>