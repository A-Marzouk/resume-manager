<template>
    <div class="faq-content">
        <div class="faq-question-input">
            <label class="faq-input-label">
                <i class="icon icon-point"></i>
                List of links
            </label>
            <div class="faq-input">
                <input class="bg-gray-input" type="text" placeholder="Add a link you want to share"
                       v-model="newLink">
                <img src="/images/client/campaign_activity/close_black.png"
                     v-on:click="newLink = ''" alt="delete icon" v-show="newLink.length > 0"
                >
            </div>
            <a v-on:click="addLink(newLink)" class="btn btn-link" :class="{disabled: newLink === ''}"
               href="javascript:;">ADD LINK</a>
            <div class="links-saved">
                <div class="faq-question-input" :key="index + 'G'" v-for="(link, index) in links">
                    <div class="faq-input">
                        <input :disabled="index !== editingLink" class="saved-link bg-gray-input"
                               type="text" :value="link.url">
                        <img src="/images/client/campaign_activity/edit.png"
                             v-on:click="editingLink = index" alt="edit icon"
                        >
                    </div>
                    <a v-if="editingLink === index" v-on:click="editLink(index,link.id)"
                       class="btn btn-link" :class="{disabled: links[index] === ''}"
                       href="javascript:;">SAVE LINK</a>
                </div>
            </div>
        </div>
        <div class="faq-question-input">
            <label class="faq-input-label">
                <i class="icon icon-point"></i>
                List of documents
            </label>
            <div class="faq-input">
                <div v-if="files.length === 0"
                     class="account-edit-section-edit-btn no-decoration picture-box">
                    <div class="fallback">
                        <input multiple type="file" id="files" name="files"/>
                    </div>
                    <p class="dz-message">Drag and drop a photo you want to upload <br/> or</p>

                    <div class="fake-file-input btn btn-orange dz-input">
                        CHOOSE A FILE
                    </div>
                    <p class="dz-message little">Maximum allowed size is 45 MB</p>
                    <div id="dropfiles-team-brief" class="dropzone"></div>
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
                            <a href="javascript:;">UPLOAD NEW FILE</a>
                        </div>
                    </div>
                    <div :key="index + file.name" v-for="(file, index) in files"
                         class="preview-container">
                        <div class="dz-preview dz-file-preview">
                            <div class="dz-details">
                                <div class="thumbnail-container">
                                    <img class="icon-download" src="/images/icons/download_icon.svg"/>
                                    <a href="javascript:;"
                                       v-on:click="showMenu(index)"
                                       class="menu-handler">
                                        <img class="icon-menu"
                                             src="/images/icons/more_vert.svg"/>
                                    </a>
                                </div>
                                <div class="filename">{{file.name}}</div>
                            </div>
                            <div class="menu-preview">
                                <a href="javascript:;" v-on:click="removeDoc(index)">Delete the
                                    document</a>
                                <a href="javascript:;">Send in private message</a>
                                <a href="javascript:;">Send to email</a>
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
        props:['campaign'],
        data(){
            return{
                newLink: '',
                editingLink: -1,
                links: [],
                files: [],
            }
        },
        methods:{
            addLink(link) {
                axios.post('/client/camp/links/create', {url: link, campaign_id: this.campaign.id})
                    .then((response) => {
                        this.links.push(response.data);
                        this.newLink = '';
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            editLink(index, link_id) {
                let link = document.getElementsByClassName('saved-link')[index].value;
                this.links[index] = {
                    id: link_id,
                    url: link,
                    campaign_id: this.campaign.id
                };
                this.editingLink = -1;


                axios.post('/client/camp/links/update', {id: link_id, url: link})
                    .then((response) => {

                    })
                    .catch((error) => {
                        console.log(error);
                    });

            },
            removeDoc(index) {
                this.files.splice(index, 1)
                if (this.files.length === 0) dropZone.removeAllFiles()
            },
            showMenu(index) {
                let fileContainers = document.getElementsByClassName('preview-container')
                let container = fileContainers[index].getElementsByClassName('menu-preview')[0].classList.toggle('show')
            },
            addFiles(e) {
                console.log(e.target.files);
                // upload e.target.files[0]

                this.files = [...this.files, ...e.target.files];

                console.log('multi files has been added');
            },
        },
        mounted() {
            let component = this;

            let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            dropZone = new Dropzone("#dropfiles-team-brief", {
                maxFilesize: 45,
                dictDefaultMessage: '',
                dictRemoveFile: '',
                dictCancelUpload: '',
                url: '/client/camp/files/upload',
                headers: {
                    'x-csrf-token': CSRF_TOKEN
                },
                paramName: 'files',
                addRemoveLinks: true,
                uploadMultiple: true,
                init: function () {
                    this.on('addedfile', (file) => {
                        console.log('addedfile event, the file : ', file);
                        let filesInput = document.getElementById('files');
                        component.files.push(file);
                    });

                    this.on('error', (error) => {
                        console.log(error);
                        console.log('error event');
                    });

                    this.on('success', function() {
                        console.log('success event');

                        var args = Array.prototype.slice.call(arguments);
                        // Look at the output in you browser console, if there is something interesting
                        console.log(args);
                    });
                }
            });
        }
    }
</script>

<style scoped>

</style>