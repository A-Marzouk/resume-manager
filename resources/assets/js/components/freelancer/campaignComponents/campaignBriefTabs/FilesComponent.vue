<template>
    <div>
        <div class="faq-content">
            <div class="faq-question-input">
                <label class="faq-input-label">
                    <i class="icon icon-point"></i>
                    List of documents
                </label>
                <div class="faq-input">
                    <div v-if="filteredFiles.length === 0">
                        - No files.
                    </div>
                    <div class="preview-files-container">
                        <div :key="index + file.name" v-for="(file, index) in filteredFiles"
                             class="preview-container">
                            <div class="dz-preview dz-file-preview">
                                <div class="dz-details">
                                    <div class="thumbnail-container">
                                        <img class="icon-download" src="/images/icons/download_icon.svg"/>
                                    </div>
                                    <div class="filename" style="word-break: break-all;">{{file.name}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

        },
        mounted() {
            this.files = this.campaign.files ;
            let component   = this;
            let fileCategory   = this.fileCategory;
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
