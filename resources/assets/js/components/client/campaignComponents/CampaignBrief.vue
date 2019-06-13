<template>
  <div class="campaign_brief_content">
    <div class="campaign_desc">
      <div class="title">
        PROJECT DESCRIPTION
      </div>
      <div class="desc">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon" v-show="newFAQ.question.length > 0" @click="newFAQ.question = ''">
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
                  <img src="/images/client/campaign_activity/close_black.png" alt="delete icon" v-show="newFAQ.answer.length > 0" @click="newFAQ.answer = ''">
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
                  <div v-show="faq.beingEdited"
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
                        <a href="javascript:void(0)" @click="cancelEditFAQ(faq.id)">CANCEL</a>
                        <a href="javascript:void(0)" @click="saveFAQ(faq.id)">SAVE</a>
                      </div>
                    </div>
                    <div class="faq-question-input">
                      <img src="/images/client/campaign_activity/faq.png" alt="faq icon">
                      <div class="faq-input">
                        <input type="text"
                               name="faq"
                               placeholder="Write a frequently asked question"
                               v-model="currentlyEditedQuestion.question">
                        <img src="/images/client/campaign_activity/close_black.png" alt="delete icon" v-show="currentlyEditedQuestion.question.length > 0" @click="currentlyEditedQuestion.question = ''">
                                    </div>
                      </div>
                      <div class="faq-answer-input">
                        <img src="/images/client/campaign_activity/answer.png" alt="faq icon">
                        <div class="faq-input">
                          <textarea name="faq-answer"
                                    rows="2"
                                    placeholder="Add an answer to the question"
                                    v-model="currentlyEditedQuestion.answer"></textarea>
                          <img src="/images/client/campaign_activity/close_black.png" alt="delete icon" v-show="currentlyEditedQuestion.answer.length > 0" @click="faq.answer = ''">
                                    </div>
                        </div>
                      </div>
                      <div v-show="!faq.beingEdited"
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
                                         alt="edit icon" @click="editFAQ(faq.id)" v-if="currentlyEditedQuestion.beingEdited === false">
                          <img src="/images/client/campaign_activity/edit grey.png"
                                         alt="edit icon" v-if="currentlyEditedQuestion.beingEdited === true" class="faq-edit-disabled">
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
                          This section is empty. To fiil it please click the edit <img src="/images/client/campaign_activity/edit grey.png" alt="edit grey icon"> button.
                          <br>
                          In this section you can...short description.
                        </div>
                        <img src="/images/client/campaign_activity/edit.png" alt="edit icon">
                        </div>
                        <img src="/images/client/campaign_activity/Illustrations_026_Campaign_brief_flow_empty.png" alt="empty-state">
                    </div>
                        <div class="edit-state"
                             v-show="process_flow_em === false">
                          <div class="edit-state-heading">
                            <div class="heading-text">
                              Enter the description of the process flow:
                            </div>
                            <div class="edit-state-action">
                              <a href="javascript:void(0)">CANCEL</a>
                              <a href="javascript:void(0)">SAVE</a>
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

                        <div class="faq-content">
                          <div class="faq-question-input">
                            <label class="faq-input-label">
                              <i class="icon icon-point"></i>
                              List of the links
                            </label>
                            <div class="faq-input">
                              <input class="bg-gray-input" type="text" placeholder="Add a link you want to share">
                              <img src="/images/icons/arrow_drop_down_circle_gray.svg" alt="" class="dropdown-circle-icon">
                              <img class="edit-icon" src="/images/icons/edit_icon.svg" alt="edit icon">
                            </div>
                            <a class="btn btn-link" href="javascript:;">ADD LINK</a>
                          </div>
                          <div class="faq-question-input">
                            <label class="faq-input-label">
                              <i class="icon icon-point"></i>
                              List of the documents
                            </label>
                            <div class="faq-input">
                              <div v-if="files.length === 0" class="account-edit-section-edit-btn no-decoration picture-box">
                                <div class="fallback">
                                    <input multiple type="file" id="files" name="files" />
                                </div>
                                <p class="dz-message">Drag and drop a photo you want to upload <br/> or</p>
                        
                                <div class="fake-file-input btn btn-orange dz-input" >
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
                                            <img class="icon-download" src="/images/icons/document.svg" />
                                            <input multiple type="file" id="files" name="files"
                                            v-on:change="addFiles" />
                                        </div>
                                        <a href="javascript:;">UPLOAD NEW FILE</a>
                                    </div>
                                </div>
                                <div :key="index + file.name" v-for="(file, index) in files" class="preview-container">
                                  <div class="dz-preview dz-file-preview">
                                    <div class="dz-details">
                                        <div class="thumbnail-container">
                                            <img class="icon-download" src="/images/icons/download_icon.svg" />
                                            <a href="javascript:;"
                                            v-on:click="showMenu(index)"
                                            class="menu-handler">
                                                <img class="icon-menu"
                                                src="/images/icons/more_vert.svg" />
                                            </a>
                                        </div>
                                        <div class="filename">{{file.name}}</div>
                                    </div>
                                    <div class="menu-preview">
                                        <a href="javascript:;" v-on:click="removeDoc(index)">Delete the document</a>
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
                      <div class="voice-scripts-content"
                           v-show="activeBriefTab === 'VOICE_SCRIPTS'">
                        <div class="files-tab-heading">
                          In this section you can add documents with voice scripts
                        </div>
                        <div class="files-tab-upload-area">
                          <div class="upload-box">
                            <div class="upload-box-heading">
                              Drag or Drop documents you want to upload <br />or
                            </div>
                            <a href="#" class="upload-btn">
                                CHOOSE A FILE
                            </a>
                            <div class="upload-notes">
                              Maximum allowed size is 45 MB
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="email-templates-tab-content"
                           v-show="activeBriefTab === 'EMAIL_TEMPS'">
                        <div class="files-tab-heading">
                          In this section you can add e-mail templates
                        </div>
                        <div class="files-tab-upload-area">
                          <div class="upload-box">
                            <div class="upload-box-heading">
                              Drag or Drop documents you want to upload <br />or
                            </div>
                            <a href="#" class="upload-btn">
                                CHOOSE A FILE
                            </a>
                            <div class="upload-notes">
                              Maximum allowed size is 45 MB
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
</template>
<script>
let dropZone
export default {
  data() {
    return {
      faqs: [{
          id: 1,
          beingEdited: false,
          question: 'Lorem 1111 ipsum dolor sit amet, consectetur adipiscing elit,' +
            ' sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ?',
          answer: 'Lorem 1111 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
            ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
            ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' +
            ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        },
        {
          id: 2,
          beingEdited: false,
          question: 'Lorem 2222 ipsum dolor sit amet, consectetur adipiscing elit,' +
            ' sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ?',
          answer: 'Lorem 2222 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
            ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
            ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' +
            ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        },
        {
          id: 3,
          beingEdited: false,
          question: 'Lorem 3333 ipsum dolor sit amet, consectetur adipiscing elit,' +
            ' sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ?',
          answer: 'Lorem 3333 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
            ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
            ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' +
            ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        },
        {
          id: 4,
          beingEdited: false,
          question: 'Lorem 4444 ipsum dolor sit amet, consectetur adipiscing elit,' +
            ' sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ?',
          answer: 'Lorem 4444 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
            ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
            ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' +
            ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        },

      ],
      activeBriefTab: 'FAQ',
      newFAQ: {
        question: '',
        answer: ''
      },
      links: [

      ],
      errors: {
        question: false,
        answer: false
      },
      currentlyEditedQuestion: {
        beingEdited: false,
        question: '',
        answer: ''
      },
      process_flow_em: false,
      is_text_editor_set: false,
      showErrors: false,
      files: []
    }
  },
  methods: {
    chooseBriefTab(tab_name) {
      this.activeBriefTab = tab_name;
      if (tab_name === 'PROCESS_FLOW' && !this.is_text_editor_set) {
        this.setTextEditor();
      }
    },
    addLink(link) {
      this.links.push(link)
    },
    editLink(link, index) {
      this.links[index] = link
    },
    editFAQ(faq_id) {
      let faqs = this.faqs;
      $.each(faqs, (i) => {
        faqs[i].beingEdited = false;
        if (faqs[i].id === faq_id) {
          faqs[i].beingEdited = true;
          this.currentlyEditedQuestion.beingEdited = true;
          this.currentlyEditedQuestion.question = faqs[i].question;
          this.currentlyEditedQuestion.answer = faqs[i].answer;
        }
      });
    },
    cancelEditFAQ(faq_id) {
      let faqs = this.faqs;
      $.each(faqs, (i) => {
        if (faqs[i].id === faq_id) {
          faqs[i].beingEdited = false;
          this.currentlyEditedQuestion.beingEdited = false;
          this.currentlyEditedQuestion.question = '';
          this.currentlyEditedQuestion.answer = '';
        }
      });
    },
    addFAQ () {
      if (this.newFAQ.answer.length < 7) {
        this.showErrors = true
        this.errors.answer = true
      }

      if (this.newFAQ.question.length < 7) {
        this.showErrors = true
        this.errors.question = true
      }

      if (this.showErrors) return

      // add FAQ
      this.faqs.push({
        id: this.faqs.length,
        answer: this.newFAQ.answer,
        question: this.newFAQ.question
      })

      this.newFAQ.question = ''
      this.newFAQ.answer = ''
      this.showErrors = false
    },
    saveFAQ(faq_id) {
      let faqs = this.faqs;
      $.each(faqs, (i) => {
        if (faqs[i].id === faq_id) {
          faqs[i].beingEdited = false;
          faqs[i].question = this.currentlyEditedQuestion.question;
          faqs[i].answer = this.currentlyEditedQuestion.answer;
          this.currentlyEditedQuestion.beingEdited = false;
        }
      });
    },
    deleteFAQ(faq_id) {
      let faqs = this.faqs;
      $.each(faqs, function(i) {
        if (faqs[i].id === faq_id) {
          faqs.splice(i, 1);
          return false;
        }
      });
    },
    setTextEditor() {
      var quill = new Quill('#editor', {
        modules: {
          toolbar: [
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote'],
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            [{ 'align': [] }],

          ]
        },
        placeholder: 'Write your description here...',
        theme: 'snow' // or 'bubble'
      });
      this.is_text_editor_set = true;
    },
    removeDoc (index) {
      this.files.splice(index, 1)
      if (this.files.length === 0) dropZone.removeAllFiles()
    },
    showMenu (index) {
      let fileContainers = document.getElementsByClassName('preview-container')

      let container = fileContainers[index].getElementsByClassName('menu-preview')[0].classList.toggle('show')
    },
    addFiles (e) {
      this.files = [...this.files, ...e.target.files]
    }
  },
  mounted() {
    let component = this

    dropZone = new Dropzone("#dropfiles-team-brief", {
        maxFilesize: 45,
        dictDefaultMessage: '',
        dictRemoveFile: '',
        dictCancelUpload: '',
        url: '/',
        paramName: 'files',
        addRemoveLinks: true,
        uploadMultiple: true,
        init: function () {
            this.on('addedfile', (file) => {
                let filesInput = document.getElementById('files')
                component.files.push(file)
            })

            this.on('error', (error) => console.log(error))
        }
    })
  },
}
</script>
