/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

import vuetify from "./vuetify";
import { store } from "./store/store";
import VueRouter from "vue-router";
import VueLazyload from 'vue-lazyload'

Vue.use(VueLazyload);

Vue.use(VueRouter);

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

require("./admin.js");
require("./freelancer_card.js");
require("./affiliates.js");
require("./freelancer.js");
require("./main.js");

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.config.devtools = true;
Vue.config.productionTip = false;

// new freelancers component:

Vue.component("freelancers-list", require("./components/admin/Dashboard.vue"));

import General from "./components/admin/tabs/General";
import accountSettings from "./components/admin/tabs/Settings";
import Users from "./components/admin/tabs/UsersTable";

if ($("#freelancersList").length !== 0) {
    const routes = [
        { path: "/", component: General, name: "general" },
        {
            path: "/account-settings",
            component: accountSettings,
            name: "acc_settings",
        },
        { path: "/users", component: Users, name: "users" },
    ];

    const router = new VueRouter({
        mode: "history",
        routes,
        base: "/admin/view/freelancers-list/",
    });

    let freelancersList = new Vue({
        vuetify,
        router,
        store,
        el: "#freelancersList",
    });
}

//new homepage components
import welcomeView from './components/new_homepage/NewHomePage';
if ($("#newHomepage").length !== 0) {
    new Vue({
        el: "#newHomepage",
        vuetify,
        components: {
            "new-homepage": welcomeView,
        },
    });
}

import Homepage from './pages/Homepage.vue';
if ($("#homepageRoot").length !== 0) {
    new Vue({
        el: "#homepageRoot",
        vuetify,
        components: {
            "homepage-root": Homepage,
        },
    });
}


import registerForm from './components/auth/Register';
if ($("#registerForm").length !== 0) {
    new Vue({
        el: '#registerForm',
        vuetify,
        components:{
            'register-form':registerForm
        }
    });
}

import loginForm from './components/auth/Login';
if ($("#loginForm").length !== 0) {
    new Vue({
        el: '#loginForm',
        vuetify,
        components:{
            'login-form':loginForm
        }
    });
}

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue")
);
Vue.component("chat-message", require("./components/chat/chatMessage.vue"));
Vue.component("chat-log", require("./components/chat/chatLog.vue"));
Vue.component("chat-composer", require("./components/chat/chatComposer.vue"));

// resume component
Vue.component(
    "freelancer-resume-long-v2",
    require("./components/freelancerResume/resumeComponentLongV2.vue")
);
Vue.component(
    "freelancer-resume-short-v2",
    require("./components/freelancerResume/resumeComponentShortV2.vue")
);

Vue.component(
    "freelancer-portfolio",
    require("./components/freelancerResume/portfolio.vue")
);

Vue.component("faq-list", require("./components/FaqsComponent.vue"));

// works
Vue.component(
    "works-list",
    require("./components/work/worksListComponent.vue")
);
Vue.component(
    "work-history",
    require("./components/work/workHistoryComponent.vue")
);
Vue.component(
    "add-work-modal",
    require("./components/work/addWorkComponent.vue")
);

// educations
Vue.component(
    "educations-list",
    require("./components/education/educationListComponent.vue")
);
Vue.component(
    "education-history",
    require("./components/education/educationHistoryComponent.vue")
);
Vue.component(
    "add-education-modal",
    require("./components/education/addEducationComponent.vue")
);

// invoices
Vue.component(
    "invoices-list",
    require("./components/invoices/invoicesListComponent.vue")
);
Vue.component(
    "invoice-component",
    require("./components/invoices/invoiceComponent.vue")
);
Vue.component(
    "add-invoice-modal",
    require("./components/invoices/addInvoiceComponent.vue")
);
Vue.component(
    "add-invoice-shift-modal",
    require("./components/invoices/addInvoiceShiftComponent.vue")
);

// services
Vue.component(
    "services-list",
    require("./components/services/servicesListComponent.vue")
);
Vue.component(
    "service-component",
    require("./components/services/serviceComponent.vue")
);
Vue.component(
    "add-invoice-service-modal",
    require("./components/services/addServiceComponent.vue")
);

// bookings calendar :
Vue.component(
    "bookings-calendar",
    require("./components/bookingsCalendarComponent.vue")
);

// campaign briefs
Vue.component(
    "cbriefs-list",
    require("./components/campaign_briefs/cBriefsListComponent.vue")
);
Vue.component(
    "cbrief-component",
    require("./components/campaign_briefs/cBriefComponent.vue")
);
Vue.component(
    "add-cbrief-modal",
    require("./components/campaign_briefs/addCBriefComponent.vue")
);
Vue.component(
    "add-service-modal",
    require("./components/campaign_briefs/addServiceComponent.vue")
);

// recordings
Vue.component(
    "records-list",
    require("./components/recordings/recordsListComponent.vue")
);
Vue.component(
    "record-component",
    require("./components/recordings/recordComponent.vue")
);
Vue.component(
    "add-record-modal",
    require("./components/recordings/addRecordComponent.vue")
);

//agents:
Vue.component(
    "agents-list",
    require("./components/agents/agentsListComponent.vue")
);
Vue.component(
    "agent-component",
    require("./components/agents/agentComponent.vue")
);
Vue.component(
    "add-agent-modal",
    require("./components/agents/addAgentComponent.vue")
);
Vue.component(
    "add-agent-record-modal",
    require("./components/agents/addAgentRecordComponent.vue")
);

// references
Vue.component(
    "references-list",
    require("./components/references/referencesListComponent.vue")
);
Vue.component(
    "reference-component",
    require("./components/references/referenceComponent.vue")
);
Vue.component(
    "add-reference-modal",
    require("./components/references/addReferenceComponent.vue")
);

// jobs
Vue.component("jobs-list", require("./components/jobs/jobsList.vue"));
Vue.component("job-post", require("./components/jobs/jobPost.vue"));
Vue.component("add-job-modal", require("./components/jobs/addJob.vue"));

// skills
Vue.component(
    "skills-list",
    require("./components/skills/skillsComponent.vue")
);

// record while register
Vue.component(
    "record-input",
    require("./components/record_while_register.vue")
);

// register developer
Vue.component(
    "register-developer",
    require("./components/RegisterDeveloper.vue")
);

// terms bar component
Vue.component("terms-bar", require("./components/termsBarComponent.vue"));

// current Subscriptions Componet
Vue.component(
    "current-subscriptions",
    require("./components/currentSubscriptionsComponent.vue")
);

// agent terms bar component
Vue.component(
    "agent-terms-bar",
    require("./components/agentTermsBarComponent.vue")
);

// projects
Vue.component(
    "projects-list",
    require("./components/projects/projectsListComponent.vue")
);
Vue.component(
    "project-detail",
    require("./components/projects/projectDetailComponent.vue")
);
Vue.component(
    "add-project-modal",
    require("./components/projects/addProjectComponent.vue")
);

// campaigns
Vue.component(
    "campaigns-list",
    require("./components/campaigns/campaingsListComponent.vue")
);
Vue.component(
    "campaign-component",
    require("./components/campaigns/campaingComponent.vue")
);
Vue.component(
    "add-campaign-modal",
    require("./components/campaigns/addCampaingComponent.vue")
);
Vue.component(
    "update-members-modal",
    require("./components/campaigns/updateMembersComponent.vue")
);
Vue.component(
    "add-shift-modal",
    require("./components/campaigns/addShiftComponent.vue")
);
// campaign activity logs:
Vue.component(
    "activity-logs",
    require("./components/campaigns/activityLogsComponent.vue")
);
// campaign timeTable:
Vue.component(
    "campaign-timetable",
    require("./components/campaigns/timeTableComponent.vue")
);

// search components :
Vue.component(
    "search-freelancers",
    require("./components/search/searchComponent.vue")
);
Vue.component(
    "freelancer-card",
    require("./components/search/freelancerCardComponent.vue")
);
Vue.component(
    "freelancers-list",
    require("./components/search/freelancersListComponent.vue")
);

// chat room:
Vue.component("new-chat", require("./components/newChat/newChat"));

// chat room:
Vue.component(
    "business-support-users",
    require("./components/businessSupportComponent.vue")
);

//
Vue.component(
    "send-emails",
    require("./components/mails/sendEmailsComponent.vue")
);
Vue.component(
    "send-invitations",
    require("./components/mails/sendInvitationMail.vue")
);

// new home vue component
Vue.component("new-home-component", require("./components/home/NewHome.vue"));

if ($("#newHomeComponent").length !== 0) {
    let newHomeComponent = new Vue({
        el: "#newHomeComponent",
    });
}

if ($("#searchFreelancers").length !== 0) {
    let searchFreelancers = new Vue({
        el: "#searchFreelancers",
    });
}

if ($("#freelancerResumeLongV2").length !== 0) {
    let freelancerResumeLongV2 = new Vue({
        el: "#freelancerResumeLongV2",
    });
}

if ($("#freelancerPortfolio").length !== 0) {
    let freelancerPortfolio = new Vue({
        el: "#freelancerPortfolio",
    });
}

if ($("#freelancerResumeShortV2").length !== 0) {
    let freelancerResumeShortV2 = new Vue({
        el: "#freelancerResumeShortV2",
    });
}

if ($("#record_input").length !== 0) {
    let record_input = new Vue({
        el: "#record_input",
    });
}

if ($("#registerDeveloper").length !== 0) {
    let registerDeveloper = new Vue({
        el: "#registerDeveloper",
    });
}

if ($("#faq_list").length !== 0) {
    let faq_list = new Vue({
        el: "#faq_list",
    });
}

if ($("#currentSubscriptions").length !== 0) {
    let currentSubscriptions = new Vue({
        el: "#currentSubscriptions",
    });
}

if ($("#activityLog").length !== 0) {
    let activityLog = new Vue({
        el: "#activityLog",
    });
}
if ($("#businessSupport").length !== 0) {
    let businessSupport = new Vue({
        el: "#businessSupport",
    });
}

if ($("#timeTable").length !== 0) {
    let timeTable = new Vue({
        el: "#timeTable",
    });
}

if ($("#terms_bar").length !== 0) {
    let terms_bar = new Vue({
        el: "#terms_bar",
    });
}

if ($("#agent_terms_bar").length !== 0) {
    let agent_terms_bar = new Vue({
        el: "#agent_terms_bar",
    });
}

if ($("#agents").length !== 0) {
    let agents = new Vue({
        el: "#agents",
    });
}

if ($("#bookings_calendar").length !== 0) {
    let bookings_calendar = new Vue({
        el: "#bookings_calendar",
    });
}

if ($("#clientJobs").length !== 0) {
    let clientJobs = new Vue({
        el: "#clientJobs",
    });
}
if ($("#send_emails_vue").length !== 0) {
    let send_emails_vue = new Vue({
        el: "#send_emails_vue",
    });
}
if ($("#send_invitations_vue").length !== 0) {
    let send_invitations_vue = new Vue({
        el: "#send_invitations_vue",
    });
}

if ($("#newChat").length !== 0) {
    let newChat = new Vue({
        el: "#newChat",
    });
}

if ($("#cbriefs").length !== 0) {
    let cbriefs = new Vue({
        el: "#cbriefs",
    });
}

if ($("#work_overview").length !== 0) {
    let work_overview = new Vue({
        el: "#work_overview",
    });
}

if ($("#freelancer_works").length !== 0) {
    let freelancer_works = new Vue({
        el: "#freelancer_works",
    });
}

if ($("#freelancer_educations").length !== 0) {
    let freelancer_educations = new Vue({
        el: "#freelancer_educations",
    });
}

if ($("#client_invoices").length !== 0) {
    let client_invoices = new Vue({
        el: "#client_invoices",
    });
}

if ($("#client_services").length !== 0) {
    let client_services = new Vue({
        el: "#client_services",
    });
}

if ($("#client_campaings").length !== 0) {
    let client_campaings = new Vue({
        el: "#client_campaings",
    });
}

if ($("#freelancer_records").length !== 0) {
    let freelancer_records = new Vue({
        el: "#freelancer_records",
    });
}

if ($("#freelancer_references").length !== 0) {
    let freelancer_references = new Vue({
        el: "#freelancer_references",
    });
}

if ($("#freelancer_skills").length !== 0) {
    let freelancer_skills = new Vue({
        el: "#freelancer_skills",
    });
}

if ($("#VueChat").length !== 0) {
    const app = new Vue({
        el: "#VueChat",
        data: {
            messages: [],
            usersInRoom: [],
            currentConvId: "",
            currentUser: "",
        },
        methods: {
            addMessage(message) {
                // add to the existing messages
                // message.created_at = new Date();
                this.messages.push({
                    message: message.message,
                    created_at: "just now",
                    user: {
                        firstName: "",
                    },
                    client: {
                        firstName: "",
                    },
                    visitor: {
                        firstName: "",
                    },
                });
                //scroll down :
                if ($("#chatBox").length) {
                    $("#messagesBox").animate(
                        { scrollTop: $("#messagesBox")[0].scrollHeight },
                        "slow"
                    );
                }
                if ($("#chatLogs").length && this.currentUser.admin == 1) {
                    setTimeout(function () {
                        $("html,body").animate(
                            { scrollTop: $("#sendMessage").offset().top },
                            "slow"
                        );
                    }, 2000);
                }
                // save to DB and so on.
                axios.post("/messages", message);
            },
        },
        created() {
            var pageUrl = window.location.pathname;
            var partsOfUrl = pageUrl.split("/");
            var conversationID = partsOfUrl[partsOfUrl.length - 1];
            if (isNaN(conversationID)) {
                conversationID = "";
            }
            axios.get("/messages/" + conversationID).then((response) => {
                this.messages = response.data;
            });

            Echo.channel("talkToSales").listen("MessagePosted", (e) => {
                // handle event here
                // console.log(e.message);
                // this.messages.push({
                //     message:e.message.message,
                //     created_at:e.message.created_at,
                //     user: e.user
                // });

                var pageUrl = window.location.pathname;
                var partsOfUrl = pageUrl.split("/");
                var conversationID = partsOfUrl[partsOfUrl.length - 1];
                if (isNaN(conversationID)) {
                    conversationID = "";
                }
                axios.get("/messages/" + conversationID).then((response) => {
                    this.messages = response.data;
                });

                axios.get("/chat/get-conv-id/").then((response) => {
                    this.currentConvId = response.data.conversationId;
                    this.currentUser = response.data.user;
                });

                // scroll down : only if message is to this conversation.
                if (this.currentConvId == e.message.conversation_id) {
                    if ($("#chatLogs").length) {
                        setTimeout(function () {
                            $("html,body").animate(
                                { scrollTop: $("#sendMessage").offset().top },
                                "slow"
                            );
                        }, 2000);
                    }
                    // play sound :
                    var chatAudio = document.getElementById("chatAudio");

                    // if user is not admin and message is from admin
                    if (this.currentUser.admin != 1 && e.message.user_id == 2) {
                        chatAudio.play();
                        // open the chat if it is closed.
                        if ($("#chatBox").css("opacity") == 0) {
                            $("#liveChat").click();
                        }
                        // write the head is new message
                        $("#chatText").html("New message !");
                        setTimeout(function () {
                            $("#messagesBox").animate(
                                { scrollTop: $("#messagesBox")[0].scrollHeight },
                                "slow"
                            );
                        }, 1000);
                        //2 seconds and return it back
                        setTimeout(function () {
                            $("#chatText").html("Chat with us");
                        }, 4000);
                    }

                    // if message is to admin !
                    if (this.currentUser.admin == 1 && e.message.user_id != 2) {
                        chatAudio.play();
                    }
                }
            });
        },
    });
}

// update Messaging unread messages :
window.Echo.channel("conversations").listen("UpdateMessageCount", (e) => {
    if (e.message.user_id) {
        // sent from user  : update client unread messages
        axios
            .get("/chat-room/getUnreadMessagesClient/" + e.currClient_id)
            .then((response) => {
                let countClient = response.data.unread_messages_client;
                $("#MessagingClient" + e.currClient_id).html(countClient);
            });
    } else if (e.message.client_id) {
        // sent from client  : update user unread messages
        axios
            .get("/chat-room/getUnreadMessagesUser/" + e.currFreelancer_id)
            .then((response) => {
                let countClient = response.data.unread_messages_freelancer;
                $("#MessagingFreelancer" + e.currFreelancer_id).html(countClient);
            });
    }
});

require("./record.js");
