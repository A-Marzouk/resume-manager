<template>
    <div class="campaign_brief_content">
        <div class="campaign_desc">
            <div class="d-flex justify-content-between">
                <div class="title">
                    PROJECT DESCRIPTION
                </div>
                <div>
                    <img src="/images/client/campaign_activity/edit.png" alt="edit icon" @click="canEdit = true"
                         class="editIcon">
                </div>
            </div>

            <div class="title">
                <div v-show="!canEdit">
                    {{campaign.title}}
                </div>

                <div v-show="canEdit" class="faq-question-input" style="margin-top:16px;">
                    <div class="faq-input">
                        <input type="text" v-model="editFormData.title">
                        <img src="/images/client/campaign_activity/close_black.png" alt="delete icon"
                             v-show="editFormData.title.length > 0" @click="editFormData.title = ''">
                    </div>
                    <div v-if="infoErrors.title" style="color: red; font-size: 14px; font-weight:normal ;">
                        {{infoErrors.title}}
                    </div>
                </div>
            </div>
            <div class="desc">
                <div v-show="!canEdit">
                    {{campaign.description}}
                </div>

                <div v-show="canEdit" class="faq-question-input" style="margin-top:16px;">
                    <div class="faq-input">
                        <input type="text" v-model="editFormData.description">
                        <img src="/images/client/campaign_activity/close_black.png" alt="delete icon"
                             v-show="editFormData.description.length > 0" @click="editFormData.description = ''">
                    </div>
                    <div v-if="infoErrors.description" style="color: red;font-size: 14px;">
                        {{infoErrors.description}}
                    </div>
                </div>
            </div>

            <div class="edit-action-btns NoDecor pt-3 d-flex justify-content-end" v-if="canEdit">
                <a href="javascript:void(0)" @click="resetEdit" class="mr-4">CANCEL</a>
                <a href="javascript:void(0)" @click="saveEdit">SAVE</a>
            </div>
        </div>
        <div class="campaign_brief_tabs">
            <div class="campaign-info-bar">
                <div class="campaign-info-tab firstTab"
                     :class="{active : activeBriefTab === 'FAQ'}"
                     @click="chooseBriefTab('FAQ')">
                    FAQ
                </div>
                <div class="campaign-info-tab"
                     :class="{active : activeBriefTab === 'PROCESS_FLOW'}"
                     @click="chooseBriefTab('PROCESS_FLOW')">
                    PROCESS FLOW
                </div>
                <div class="campaign-info-tab"
                     :class="{active : activeBriefTab === 'FILES'}"
                     @click="chooseBriefTab('FILES')">
                    FILES
                </div>
                <div class="campaign-info-tab"
                     :class="{active : activeBriefTab === 'VOICE_SCRIPTS'}"
                     @click="chooseBriefTab('VOICE_SCRIPTS')">
                    VOICE SCRIPTS
                </div>
                <div class="campaign-info-tab"
                     :class="{active : activeBriefTab === 'EMAIL_TEMPS'}"
                     @click="chooseBriefTab('EMAIL_TEMPS')">
                    E-MAIL TEMPLATES
                </div>
            </div>
            <div class="campaign-info-content">
                <div class="faq-content"
                     v-show="activeBriefTab === 'FAQ'">
                    <div class="faq-title">
                        In this section you can add frequently asked questions and answers to them.
                    </div>
                    <div class="faq-question-input">
                        <div class="faq-container">
                            <img src="/images/client/campaign_activity/faq.png" alt="faq icon">
                            <div class="faq-input">
                                <input type="text"
                                       name="faq"
                                       placeholder="Write a frequently asked question"
                                       v-model="newFAQ.question">
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon"
                                     v-show="newFAQ.question.length > 0" @click="newFAQ.question = ''">
                            </div>
                        </div>
                        <div v-if="showErrors && errors.question" class="error">
                            This field must contain at least 7 characters.
                        </div>
                    </div>
                    <div class="faq-answer-input">
                        <div class="faq-container">

                            <img src="/images/client/campaign_activity/answer.png" alt="faq icon">
                            <div class="faq-input">
                  <textarea rows="1"
                            name="faq-answer"
                            placeholder="Add an answer to the question"
                            v-model="newFAQ.answer"></textarea>
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon"
                                     v-show="newFAQ.answer.length > 0" @click="newFAQ.answer = ''">
                            </div>
                        </div>
                        <div v-if="showErrors && errors.answer" class="error">
                            This field must contain at least 7 characters.
                        </div>
                    </div>
                    <div class="faq-add-btn"
                         :class="{ active : newFAQ.question.length > 7 && newFAQ.answer.length > 7 }">
                        <a v-on:click="addFAQ" href="javascript:;">
                            ADD FAQ
                        </a>
                    </div>
                    <div class="faq-questions-list">
                        <div v-for="(faq,index) in faqs"
                             v-bind:key="index"
                             class="question-container">
                            <div v-show="faq.id === editedQuestionID"
                                 class="faq-edit-state">
                                <div class="edit-heading">
                                    <div class="faq-numbering">
                                        <span>{{index+1}}</span>
                                    </div>
                                    <div class="edit-title">
                                        Edit the question and the answer :
                                    </div>
                                    <div class="edit-action-btns">
                                        <a href="javascript:void(0)" @click="deleteFAQ(faq.id)">DELETE</a>
                                        <a href="javascript:void(0)" @click="editedQuestionID = 0">CANCEL</a>
                                        <a href="javascript:void(0)" @click="saveFAQ(faq)">SAVE</a>
                                    </div>
                                </div>
                                <div class="faq-question-input">
                                    <img src="/images/client/campaign_activity/faq.png" alt="faq icon">
                                    <div class="faq-input">
                                        <input type="text"
                                               name="faq"
                                               placeholder="Write a frequently asked question"
                                               v-model="currentlyEditedQuestion.question">
                                        <img src="/images/client/campaign_activity/close_black.png" alt="delete icon"
                                             v-show="currentlyEditedQuestion.question.length > 0"
                                             @click="currentlyEditedQuestion.question = ''">
                                    </div>
                                </div>
                                <div class="faq-answer-input">
                                    <img src="/images/client/campaign_activity/answer.png" alt="faq icon">
                                    <div class="faq-input">
                          <textarea name="faq-answer"
                                    rows="2"
                                    placeholder="Add an answer to the question"
                                    v-model="currentlyEditedQuestion.answer"></textarea>
                                        <img src="/images/client/campaign_activity/close_black.png" alt="delete icon"
                                             v-show="currentlyEditedQuestion.answer.length > 0"
                                             @click="faq.answer = ''">
                                    </div>
                                </div>
                            </div>
                            <div v-show="faq.id !== editedQuestionID"
                                 class="faq-question">
                                <div class="faq-numbering">
                                    <span>{{index+1}}</span>
                                </div>
                                <div class="faq-item">
                                    <div class="faq-item-question">
                                        {{faq.question}}
                                    </div>
                                    <div class="faq-item-answer">
                                        {{faq.answer}}
                                    </div>
                                </div>
                                <div class="faq-edit">
                                    <img src="/images/client/campaign_activity/edit.png"
                                         alt="edit icon" @click="editFAQ(faq)"
                                         v-show="editedQuestionID === 0">
                                    <img src="/images/client/campaign_activity/edit grey.png"
                                         alt="edit icon" v-show="editedQuestionID !== 0"
                                         class="faq-edit-disabled">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="process-flow-content"
                     v-show="activeBriefTab === 'PROCESS_FLOW'">
                    <div class="empty-state"
                         v-show="process_flow_em === true">
                        <div class="process-flow-heading">
                            <div class="process-flow-text">
                                This section is empty. To fiil it please click the edit <img
                                    src="/images/client/campaign_activity/edit grey.png" alt="edit grey icon"> button.
                                <br>
                                In this section you can...short description.
                            </div>
                            <img src="/images/client/campaign_activity/edit.png" alt="edit icon">
                        </div>
                        <img src="/images/client/campaign_activity/Illustrations_026_Campaign_brief_flow_empty.png"
                             alt="empty-state">
                    </div>
                    <div class="edit-state"
                         v-show="process_flow_em === false">
                        <div class="edit-state-heading">
                            <div class="heading-text">
                                Enter the description of the process flow:
                            </div>
                            <div class="edit-state-action">
                                <a href="javascript:void(0)" class="btn-link"
                                   v-show="flowHasChanged">CANCEL</a>
                                <a href="javascript:void(0)" @click="saveProcessFlow" class="btn-link"
                                   v-show="flowHasChanged">SAVE</a>
                            </div>
                        </div>
                        <div id="toolbar"
                             class="toolbar">
                        </div>
                        <!-- Create the editor container -->
                        <div id="editor"
                             class="editor">
                        </div>
                    </div>
                </div>

                <div class="files-tab-content"
                     v-show="activeBriefTab === 'FILES'">

                    <FilesComponent  :campaign="campaign"></FilesComponent>

                </div>

                <div class="voice-scripts-content"
                     v-show="activeBriefTab === 'VOICE_SCRIPTS'">
                    <div class="files-tab-heading">
                        In this section you can add documents with voice scripts
                    </div>
                    <div class="faq-input dropZoneSection">
                        <div v-if="files.length === 0"
                             class="account-edit-section-edit-btn no-decoration picture-box">
                            <div class="fallback">
                                <input multiple type="file" id="files_voice_scripts" name="files"/>
                            </div>
                            <p class="dz-message">Drag and drop a photo you want to upload <br/> or</p>

                            <div class="fake-file-input btn btn-orange dz-input">
                                CHOOSE A FILE
                            </div>
                            <p class="dz-message little">Maximum allowed size is 45 MB</p>
                            <div id="dropfiles-team-brief_voice_scripts" class="dropzone"></div>
                        </div>
                        <div class="preview-files-container" v-else>
                            <div class="add-document-container">
                                <div class="dz-details">
                                    <div
                                            class="thumbnail-container">
                                        <img class="icon-download" src="/images/icons/document.svg"/>
                                        <input multiple type="file" id="files_voice_scripts" name="files"
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
                <div class="email-templates-tab-content"
                     v-show="activeBriefTab === 'EMAIL_TEMPS'">
                    <div class="files-tab-heading">
                        In this section you can add e-mail templates
                    </div>
                    <div class="faq-input dropZoneSection">
                        <div v-if="files.length === 0"
                             class="account-edit-section-edit-btn no-decoration picture-box">
                            <div class="fallback">
                                <input multiple type="file" id="files_email_template" name="files"/>
                            </div>
                            <p class="dz-message">Drag and drop a photo you want to upload <br/> or</p>

                            <div class="fake-file-input btn btn-orange dz-input">
                                CHOOSE A FILE
                            </div>
                            <p class="dz-message little">Maximum allowed size is 45 MB</p>
                            <div id="dropfiles-team-brief_email_template" class="dropzone"></div>
                        </div>
                        <div class="preview-files-container" v-else>
                            <div class="add-document-container">
                                <div class="dz-details">
                                    <div
                                            class="thumbnail-container">
                                        <img class="icon-download" src="/images/icons/document.svg"/>
                                        <input multiple type="file" id="files_email_template" name="files"
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
        </div>
    </div>
</template>
<script>

    import FilesComponent from './campaignBriefTabs/FilesComponent' ;
    export default {
        props: ['campaign'],
        components:{FilesComponent},
        data() {
            return {
                faqs: [],

                activeBriefTab: 'FAQ',
                newFAQ: {
                    question: '',
                    answer: '',
                    campaign_id: this.campaign.id
                },
                newLink: '',
                editingLink: -1,
                links: [],
                errors: {
                    question: false,
                    answer: false
                },
                currentlyEditedQuestion: {
                    question: '',
                    answer: '',
                },
                flowHasChanged: false,
                process_flow_em: false,
                is_text_editor_set: false,
                showErrors: false,
                files: [],
                editedQuestionID: 0,
                processFlowText: '',
                processFlowJson: '',
                processFlowHTML: '',
                canEdit: false,
                editFormData: {
                    title: this.campaign.title,
                    description: this.campaign.description,
                    campaign_id: this.campaign.id
                },
                infoErrors:{}
            }
        },
        methods: {
            resetEdit() {
                this.editFormData = {
                    title: this.campaign.title,
                    description: this.campaign.description,
                    campaign_id: this.campaign.id
                };
                this.canEdit = false;
                this.infoErrors = {};
            },
            saveEdit() {
                axios.post('/client/camp/update-info', this.editFormData)
                    .then((response) => {
                        console.log(response.data);
                        if (response.data.status === 'success') {
                            this.campaign.title = this.editFormData.title;
                            this.campaign.description = this.editFormData.description;
                            this.canEdit = false;
                            this.infoErrors = {};
                        }
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                           this.infoErrors = error.response.data.errors ;
                        }
                    });
            },
            chooseBriefTab(tab_name) {
                this.activeBriefTab = tab_name;
                if (tab_name === 'PROCESS_FLOW' && !this.is_text_editor_set) {
                    this.setTextEditor();
                }
            },

            editFAQ(faq) {
                this.editedQuestionID = faq.id;
                this.currentlyEditedQuestion = faq;
            },
            cancelEditFAQ(faq_id) {
                return;
                let faqs = this.faqs;
                $.each(faqs, (i) => {
                    faqs[i].beingEdited = false;
                });
            },
            addFAQ() {
                if (this.newFAQ.answer.length < 7) {
                    this.showErrors = true;
                    this.errors.answer = true;
                } else {
                    this.showErrors = false;
                }

                if (this.newFAQ.question.length < 7) {
                    this.showErrors = true;
                    this.errors.question = true;
                } else {
                    this.showErrors = false;
                }


                if (this.showErrors) return;

                // add FAQ
                axios.post('/client/camp/faqs/add', this.newFAQ)
                    .then((response) => {
                        let addedFAQ = response.data;
                        addedFAQ.beingEdited = false;
                        this.faqs.push(addedFAQ);

                        // clear data
                        this.newFAQ.question = '';
                        this.newFAQ.answer = '';
                        this.showErrors = false;
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            console.log(error.response.data.errors);
                        } else {
                            console.log('Something went wrong. Please try again.');
                        }
                    });


            },
            saveFAQ(faq) {
                axios.post('/client/camp/faqs/update', faq)
                    .then((response) => {
                        console.log(response.data);
                        this.editedQuestionID = 0;
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            console.log(error.response.data.errors);
                        } else {
                            console.log('Something went wrong. Please try again.');
                        }
                    });
            },
            deleteFAQ(faq_id) {
                if (!confirm('Are you sure you want to delete this FAQ ?')) {
                    return;
                }

                axios.post('/client/camp/faqs/delete', {'FAQ_ID': faq_id})
                    .then((response) => {
                        this.editedQuestionID = 0;
                        let faqs = this.faqs;
                        $.each(faqs, function (i) {
                            if (faqs[i].id === faq_id) {
                                faqs.splice(i, 1);
                                return false;
                            }
                        });
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            console.log(error.response.data.errors);
                        } else {
                            console.log('Something went wrong. Please try again.');
                        }
                    });

            },
            setTextEditor() {
                let component = this;
                var quill = new Quill('#editor', {
                    modules: {
                        toolbar: [
                            [{'header': [1, 2, 3, 4, 5, 6, false]}],
                            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                            ['blockquote'],
                            [{'list': 'ordered'}, {'list': 'bullet'}],
                            [{'align': []}],

                        ]
                    },
                    placeholder: 'Write your description here...',
                    theme: 'snow' // or 'bubble'
                });

                quill.root.innerHTML = this.campaign.process_flow;

                component.is_text_editor_set = true;

                quill.on('text-change', () => {
                    this.processFlowHTML = quill.root.innerHTML.trim();
                    component.flowHasChanged = (quill.root.innerHTML.trim() !== this.campaign.process_flow);
                });

            },

            saveProcessFlow() {
                axios.post('/client/camp/process-flow/update', {
                    process_flow: this.processFlowHTML,
                    campaign_id: this.campaign.id
                })
                    .then((response) => {
                        this.campaign.process_flow = response.data.process_flow;
                        this.flowHasChanged = false;
                    })
                    .catch((error) => {

                    })
            }

        },
        mounted() {
            this.faqs = this.campaign.faqs;
            this.links = this.campaign.links;
        },
    }
</script>


<style scoped lang="scss">
    .dropZoneSection {
        padding: 36px 0 36px 65px;
        @media (max-width: 1240px) {
            padding: 36px 0px 36px 18px;
        }
    }

    .campaign_brief_content .campaign_desc {
        height: auto;
        padding-top: 60px;
        padding-bottom: 60px;
    }

    .editIcon:hover {
        cursor: pointer;
    }
</style>