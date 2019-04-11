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
                <div class="campaign-info-tab firstTab" :class="{active : activeBriefTab === 'FAQ'}" @click="chooseBriefTab('FAQ')">
                    FAQ
                </div>
                <div class="campaign-info-tab" :class="{active : activeBriefTab === 'PROCESS_FLOW'}" @click="chooseBriefTab('PROCESS_FLOW')">
                    PROCESS FLOW
                </div>
                <div class="campaign-info-tab" :class="{active : activeBriefTab === 'FILES'}" @click="chooseBriefTab('FILES')">
                    FILES
                </div>
                <div class="campaign-info-tab" :class="{active : activeBriefTab === 'VOICE_SCRIPTS'}" @click="chooseBriefTab('VOICE_SCRIPTS')">
                    VOICE SCRIPTS
                </div>
                <div class="campaign-info-tab" :class="{active : activeBriefTab === 'EMAIL_TEMPS'}" @click="chooseBriefTab('EMAIL_TEMPS')">
                    E-MAIL TEMPLATES
                </div>
            </div>
            <div class="campaign-info-content">
                <div class="faq-content" v-show="activeBriefTab === 'FAQ'">
                    <div class="faq-title">
                        In this section you can add frequently asked questions and answers to them.
                    </div>
                    <div class="faq-question-input">
                        <img src="/resumeApp/public/images/client/campaign_activity/faq.png" alt="faq icon">
                        <div class="faq-input">
                            <input type="text" name="faq" placeholder="Write a frequently asked question" v-model="newFAQ.question">
                            <img src="/resumeApp/public/images/client/campaign_activity/close_black.png" alt="delete icon" v-show="newFAQ.question.length > 0" @click="newFAQ.question = ''">
                        </div>
                    </div>
                    <div class="faq-answer-input">
                        <img src="/resumeApp/public/images/client/campaign_activity/answer.png" alt="faq icon">
                        <div class="faq-input">
                            <textarea rows="1" name="faq-answer" placeholder="Add an answer to the question" v-model="newFAQ.answer"></textarea>
                            <img src="/resumeApp/public/images/client/campaign_activity/close_black.png" alt="delete icon" v-show="newFAQ.answer.length > 0" @click="newFAQ.answer = ''">
                        </div>
                    </div>
                    <div class="faq-add-btn" :class="{ active : newFAQ.question.length > 7 && newFAQ.answer.length > 7 }">
                        <a href="#">
                            ADD FAQ
                        </a>
                    </div>

                    <div class="faq-questions-list">
                        <div v-for="(faq,index) in faqs" v-bind:key="index" class="question-container">
                            <div v-show="faq.beingEdited" class="faq-edit-state">
                                <div class="edit-heading">
                                    <div class="faq-numbering">
                                        <span>{{index+1}}</span>
                                    </div>
                                    <div class="edit-title">
                                        Edit the question and the answer :
                                    </div>
                                    <div class="edit-action-btns" >
                                        <a href="javascript:void(0)" @click="deleteFAQ(faq.id)">DELETE</a>
                                        <a href="javascript:void(0)" @click="cancelEditFAQ(faq.id)">CANCEL</a>
                                        <a href="javascript:void(0)" @click="saveFAQ(faq.id)">SAVE</a>
                                    </div>
                                </div>
                                <div class="faq-question-input">
                                    <img src="/resumeApp/public/images/client/campaign_activity/faq.png" alt="faq icon">
                                    <div class="faq-input">
                                        <input type="text" name="faq" placeholder="Write a frequently asked question" v-model="currentlyEditedQuestion.question">
                                        <img src="/resumeApp/public/images/client/campaign_activity/close_black.png" alt="delete icon" v-show="currentlyEditedQuestion.question.length > 0" @click="currentlyEditedQuestion.question = ''">
                                    </div>
                                </div>
                                <div class="faq-answer-input">
                                    <img src="/resumeApp/public/images/client/campaign_activity/answer.png" alt="faq icon">
                                    <div class="faq-input">
                                        <textarea name="faq-answer" rows="2" placeholder="Add an answer to the question" v-model="currentlyEditedQuestion.answer"></textarea>
                                        <img src="/resumeApp/public/images/client/campaign_activity/close_black.png" alt="delete icon" v-show="currentlyEditedQuestion.answer.length > 0" @click="faq.answer = ''">
                                    </div>
                                </div>
                            </div>
                            <div v-show="!faq.beingEdited" class="faq-question">
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
                                    <img src="/resumeApp/public/images/client/campaign_activity/edit.png"
                                         alt="edit icon" @click="editFAQ(faq.id)">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-show="activeBriefTab === 'PROCESS_FLOW'">

                </div>
                <div v-show="activeBriefTab === 'FILES'">

                </div>
                <div v-show="activeBriefTab === 'VOICE_SCRIPTS'">

                </div>
                <div v-show="activeBriefTab === 'EMAIL_TEMPS'">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
          return{
              faqs:[
                  {
                      id:1,
                      beingEdited:false,
                      question:'Lorem 1111 ipsum dolor sit amet, consectetur adipiscing elit,' +
                      ' sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ?',
                      answer:'Lorem 1111 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
                      ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
                      ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' +
                      ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                  },
                  {
                      id:2,
                      beingEdited:false,
                      question:'Lorem 2222 ipsum dolor sit amet, consectetur adipiscing elit,' +
                      ' sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ?',
                      answer:'Lorem 2222 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
                      ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
                      ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' +
                      ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                  },
                  {
                      id:3,
                      beingEdited:false,
                      question:'Lorem 3333 ipsum dolor sit amet, consectetur adipiscing elit,' +
                      ' sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ?',
                      answer:'Lorem 3333 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
                      ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
                      ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' +
                      ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                  },
                  {
                      id:4,
                      beingEdited:false,
                      question:'Lorem 4444 ipsum dolor sit amet, consectetur adipiscing elit,' +
                      ' sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ?',
                      answer:'Lorem 4444 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
                      ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
                      ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' +
                      ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                  },

              ],
              activeBriefTab : 'FAQ',
              newFAQ:{
                  question:'',
                  answer:''
              },
              currentlyEditedQuestion:{
                  beingEdited:false,
                  question:'',
                  answer:''
              }
          }
        },
        methods:{
            chooseBriefTab(tab_name){
                this.activeBriefTab = tab_name ;
            },
            editFAQ(faq_id){
                let faqs = this.faqs;
                $.each(faqs, (i)=> {
                    faqs[i].beingEdited = false;
                    if(faqs[i].id === faq_id) {
                        faqs[i].beingEdited = true;
                        this.currentlyEditedQuestion.beingEdited =  true ;
                        this.currentlyEditedQuestion.question =  faqs[i].question ;
                        this.currentlyEditedQuestion.answer =  faqs[i].answer ;
                    }
                });
            },
            cancelEditFAQ(faq_id){
                let faqs = this.faqs;
                $.each(faqs, (i)=> {
                    if(faqs[i].id === faq_id) {
                        faqs[i].beingEdited = false;
                        this.currentlyEditedQuestion.beingEdited = false ;
                        this.currentlyEditedQuestion.question = '' ;
                        this.currentlyEditedQuestion.answer   = '' ;
                    }
                });
            },
            saveFAQ(faq_id){
                let faqs = this.faqs;
                $.each(faqs, (i)=> {
                    if(faqs[i].id === faq_id) {
                        faqs[i].beingEdited = false;
                        faqs[i].question    = this.currentlyEditedQuestion.question ;
                        faqs[i].answer      = this.currentlyEditedQuestion.answer  ;
                    }
                });
            },
            deleteFAQ(faq_id){
                let faqs = this.faqs;
                $.each(faqs, function(i){
                    if(faqs[i].id === faq_id) {
                        faqs.splice(i,1);
                        return false;
                    }
                });
            }
        },
        mounted() {
        }
    }
</script>
