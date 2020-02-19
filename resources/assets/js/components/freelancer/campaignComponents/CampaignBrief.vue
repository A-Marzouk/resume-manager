<template>
  <div class="campaign_brief_content">
    <div class="campaign_desc">
      <div class="d-flex justify-content-between">
        <div class="title">
          PROJECT DESCRIPTION
        </div>
      </div>

      <div class="title">
        <div>
          {{campaign.title}}
        </div>
      </div>
      <div class="desc">
        <div>
          {{campaign.description}}
        </div>
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
            In this section you can view frequently asked questions and their answers, and also you can ask your questions.
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
            <div class="faq-container"  v-show="false">

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
                    Edit the question :
                  </div>
                  <div class="edit-action-btns">
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
                <div class="faq-answer-input" v-show="false">
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
                <div class="faq-edit" v-show="false">
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
                Description of the process flow:
              </div>
            </div>

            <div v-html="campaign.process_flow"></div>

          </div>
        </div>

        <div class="files-tab-content"
             v-show="activeBriefTab === 'FILES'">

          <div class="faq-content">
            <LinksComponent  :campaign="campaign" @showPositiveNotification="showNotification" @showNegativeNotification="showNegativeNotification"></LinksComponent>
          </div>
          <FilesComponent  :campaign="campaign" :fileCategory="'files'" @showPositiveNotification="showNotification" @showNegativeNotification="showNegativeNotification"></FilesComponent>

        </div>

        <div class="voice-scripts-content"
             v-show="activeBriefTab === 'VOICE_SCRIPTS'">
          <div class="files-tab-heading">
            In this section you can view documents with voice scripts
          </div>

          <FilesComponent  :campaign="campaign" :fileCategory="'voice_scripts'" @showPositiveNotification="showNotification" @showNegativeNotification="showNegativeNotification"></FilesComponent>

        </div>
        <div class="email-templates-tab-content"
             v-show="activeBriefTab === 'EMAIL_TEMPS'">
          <div class="files-tab-heading">
            In this section you can view e-mail templates
          </div>

          <FilesComponent  :campaign="campaign" :fileCategory="'email_temps'" @showPositiveNotification="showNotification" @showNegativeNotification="showNegativeNotification"></FilesComponent>

        </div>

      </div>
    </div>
  </div>
</template>
<script>

  import FilesComponent from './campaignBriefTabs/FilesComponent' ;
  import LinksComponent from './campaignBriefTabs/LinksComponent' ;
  export default {
    props: ['campaign'],
    components:{FilesComponent,LinksComponent},
    data() {
      return {
        faqs: [],

        activeBriefTab: 'FAQ',
        newFAQ: {
          question: '',
          answer: 'There is no answer yet.',
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
        process_flow_em: false,
        showErrors: false,
        files: [],
        editedQuestionID: 0,
        processFlowText: '',
        processFlowJson: '',
        processFlowHTML: '',
        editFormData: {
          title: this.campaign.title,
          description: this.campaign.description,
          campaign_id: this.campaign.id
        },
        infoErrors:{}
      }
    },
    methods: {
      chooseBriefTab(tab_name) {
        this.activeBriefTab = tab_name;
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
      },
      showNotification(notificationMessage){
        this.$emit('showPositiveNotification',notificationMessage);
      },

      showNegativeNotification(notificationMessage){
        this.$emit('showNegativeNotification',notificationMessage);
      },

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

  .ql-align-center{
    text-align: center !important;
  }

</style>
