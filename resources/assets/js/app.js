/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment');

import VueRouter from 'vue-router';

Vue.use(VueRouter);

import VueParticles from 'vue-particles';

Vue.use(VueParticles);

import Vuetify from 'vuetify';

Vue.use(Vuetify);

import SvgVue from 'svg-vue';

Vue.use(SvgVue);


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

require('./admin.js');
require('./freelancer_card.js');
require('./affiliates.js');
require('./freelancer.js');
require('./main.js');
require('./select.js');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.config.devtools = true;


// resume builder components & routes

Vue.component('resume-builder', require('./components/resume_builder/Main'));

import ResumeBuilderMyAccount from './components/resume_builder/tabs/MyAccount'
import ResumeBuilderEditCV from './components/resume_builder/tabs/EditCV'
import ResumeBuilderViewCV from './components/resume_builder/tabs/ViewCV'

// edit inside components :
import ResumeBuilderEditCVProfile from './components/resume_builder/tabs/edit_tabs/Profile'
import ResumeBuilderEditCVSummary from './components/resume_builder/tabs/edit_tabs/Summary'
import ResumeBuilderEditCVWorkExperience from './components/resume_builder/tabs/edit_tabs/WorkExperience'
import ResumeBuilderEditCVEducation from './components/resume_builder/tabs/edit_tabs/Education'
import ResumeBuilderEditCVSkills from './components/resume_builder/tabs/edit_tabs/Skills'
import ResumeBuilderEditCVProjects from './components/resume_builder/tabs/edit_tabs/Projects'
import ResumeBuilderEditCVAchievement from './components/resume_builder/tabs/edit_tabs/Achievement'
import ResumeBuilderEditCVHobbies from './components/resume_builder/tabs/edit_tabs/Hobbies'
import ResumeBuilderEditCVAudioVideo from './components/resume_builder/tabs/edit_tabs/AudioVideo'
import ResumeBuilderEditCVPayAvailability  from './components/resume_builder/tabs/edit_tabs/PayAvailability'
import ResumeBuilderEditCVImports from './components/resume_builder/tabs/edit_tabs/Imports'
import ResumeBuilderEditCVReferences from './components/resume_builder/tabs/edit_tabs/References'



if ($("#resumeBuilder").length !== 0) {

    const routes = [
        {path: '/resume-builder', component: ResumeBuilderMyAccount},
        {
            path: '/resume-builder/edit',
            component: ResumeBuilderEditCV,
            children: [
                {
                    path: '/resume-builder/edit',
                    component: ResumeBuilderEditCVProfile
                },
                {
                    path: '/resume-builder/edit/profile',
                    component: ResumeBuilderEditCVProfile
                },
                {
                    path: '/resume-builder/edit/summary',
                    component: ResumeBuilderEditCVSummary
                },
                {
                    path: '/resume-builder/edit/work-experience',
                    component: ResumeBuilderEditCVWorkExperience
                },
                {
                    path: '/resume-builder/edit/education',
                    component: ResumeBuilderEditCVEducation
                },
                {
                    path: '/resume-builder/edit/skills',
                    component: ResumeBuilderEditCVSkills
                },
                {
                    path: '/resume-builder/edit/projects',
                    component: ResumeBuilderEditCVProjects
                },
                {
                    path: '/resume-builder/edit/achievement',
                    component: ResumeBuilderEditCVAchievement
                },
                {
                    path: '/resume-builder/edit/hobbies',
                    component: ResumeBuilderEditCVHobbies
                },
                {
                    path: '/resume-builder/edit/audio-video',
                    component: ResumeBuilderEditCVAudioVideo
                },
                {
                    path: '/resume-builder/edit/pay-availability',
                    component: ResumeBuilderEditCVPayAvailability
                },
                {
                    path: '/resume-builder/edit/imports',
                    component: ResumeBuilderEditCVImports
                },
                {
                    path: '/resume-builder/edit/references',
                    component: ResumeBuilderEditCVReferences
                },
            ]

        },
        {path: '/resume-builder/view', component: ResumeBuilderViewCV}
    ];

    const router = new VueRouter({
        mode: 'history',
        routes,
    });


    let resumeBuilder = new Vue({
        router,
        el: '#resumeBuilder'
    });
}


// admin front-end components :
Vue.component('admin-dashboard', require('./components/admin/dashboard/Main.vue'));
Vue.component('applicant-profile', require('./components/admin/ApplicantProfile.vue'));
Vue.component('approved-agent-profile', require('./components/admin/ApprovedAgentProfile.vue'));
Vue.component('advanced-search-component', require('./components/admin/AdvancedSearch.vue'));
Vue.component('admin-register-agent', require('./components/admin/RegisterAgent.vue'));
Vue.component('add-behance-designer', require('./components/admin/AddBehanceDesigner.vue'));
Vue.component('admin-client-register', require('./components/admin/registerClient/ClientRegisterAdmin.vue'));

// edit agent :
Vue.component('admin-agent-edit-personal-info', require('./components/admin/editAgent/EditPersonalInfo.vue'));
Vue.component('admin-agent-edit-professional-info', require('./components/admin/editAgent/EditProfessionalInfo.vue'));
Vue.component('admin-agent-edit-record-resume', require('./components/admin/editAgent/EditRecordResumeInfo.vue'));


// resume component
Vue.component('freelancer-resume-long-v2', require('./components/freelancerResume/resumeComponentLongV2.vue'));
Vue.component('freelancer-resume-short-v2', require('./components/freelancerResume/resumeComponentShortV2.vue'));
Vue.component('freelancer-resume-download', require('./components/freelancerResume/resumeDownloadComponent.vue'));
Vue.component('freelancer-resume-editor', require('./components/freelancerResume/ResumeEditor.vue'));
Vue.component('resume-homepage', require('./components/freelancerResume/resume_homepage.vue'));


// register developer
Vue.component('register-developer', require('./components/RegisterDeveloper.vue'));


Vue.component('resume-theme-2', require('./components/resume_themes/theme2.vue'));
Vue.component('resume-theme-3', require('./components/resume_themes/theme3.vue'));
Vue.component('resume-theme-4', require('./components/resume_themes/theme4.vue'));
Vue.component('resume-theme-5', require('./components/resume_themes/theme5.vue'));
Vue.component('resume-theme-6', require('./components/resume_themes/theme6.vue'));
Vue.component('resume-theme-7', require('./components/resume_themes/theme7.vue'));
Vue.component('resume-theme-8', require('./components/resume_themes/theme8.vue'));
Vue.component('resume-theme-10', require('./components/resume_themes/theme10.vue'));


Vue.component('welcome-landing', require('./components/welcome_landing/Main.vue'));

if ($("#welcomeLanding").length !== 0) {
    let welcomeLanding = new Vue({
        el: '#welcomeLanding'
    });
}

// simple registration:
Vue.component('freelancer-simple-register', require('./components/auth/FreelancerSimpleRegistration.vue'));
if ($("#freelancerSimpleRegisterComponent").length !== 0) {
    let freelancerSimpleRegisterComponent = new Vue({
        el: '#freelancerSimpleRegisterComponent'
    });
}


Vue.component('business-card-v2', require('./components/resume_themes/businessCardV2.vue'));


Vue.component('extract-text-from-pdf', require('./components/resume_themes/ExtractTextFromPDF.vue'));


import AdminAgentRegisterPage1 from './components/admin/registerAgent/page1.vue'
import AdminAgentRegisterPage2 from './components/admin/registerAgent/page2.vue'
import AdminAgentRegisterPage3 from './components/admin/registerAgent/page3.vue'
import AdminAgentRegisterPage4 from './components/admin/registerAgent/page4.vue'
import AdminAgentRegisterPage5 from './components/admin/registerAgent/page5.vue'
import AdminAgentRegisterCompleted from './components/admin/registerAgent/finish.vue'

import AdminAgents from './components/admin/dashboard/Agents.vue';
import AdminClients from './components/admin/dashboard/Clients.vue';
import AdminCampaigns from './components/admin/dashboard/Campaigns.vue';


if ($("#extractFromPDF").length !== 0) {
    let extractFromPDF = new Vue({
        el: '#extractFromPDF'
    });
}

if ($("#resumeTheme2").length !== 0) {
    let resumeTheme2 = new Vue({
        el: '#resumeTheme2'
    });
}
if ($("#resumeTheme3").length !== 0) {
    let resumeTheme3 = new Vue({
        el: '#resumeTheme3'
    });
}
if ($("#resumeTheme4").length !== 0) {
    let resumeTheme4 = new Vue({
        el: '#resumeTheme4'
    })
}
if ($("#resumeTheme5").length !== 0) {
    let resumeTheme5 = new Vue({
        el: '#resumeTheme5'
    })
}
if ($("#resumeTheme8").length !== 0) {
    let resumeTheme8 = new Vue({
        el: '#resumeTheme8'
    })
}

if ($("#resumeTheme6").length !== 0) {
    let resumeTheme6 = new Vue({
        el: '#resumeTheme6'
    })
}

if ($("#resumeTheme7").length !== 0) {
    let resumeTheme7 = new Vue({
        el: '#resumeTheme7'
    })
}
if ($("#resumeTheme10").length !== 0) {
    let resumeTheme4 = new Vue({
        el: '#resumeTheme10'
    })
}


if ($("#businessCardV2").length !== 0) {
    let businessCardV2 = new Vue({
        el: '#businessCardV2'
    })
}


if ($("#freelancerResumeLongV2").length !== 0) {
    let freelancerResumeLongV2 = new Vue({
        el: '#freelancerResumeLongV2'
    });
}

if ($("#freelancerResumeDownload").length !== 0) {
    let freelancerResumeDownload = new Vue({
        el: '#freelancerResumeDownload'
    })
}

if ($("#freelancerResumeEditor").length !== 0) {
    let freelancerResumeEditor = new Vue({
        el: '#freelancerResumeEditor'
    });
}


if ($("#registerDeveloper").length !== 0) {
    let registerDeveloper = new Vue({
        el: '#registerDeveloper'
    });
}


if ($("#freelancerResumeShortV2").length !== 0) {
    let freelancerResumeShortV2 = new Vue({
        el: '#freelancerResumeShortV2'
    });
}

if ($("#resumeHomepage").length !== 0) {
    let resumeHomepage = new Vue({
        el: '#resumeHomepage'
    });
}


if ($("#adminEditAgentPersonalInfo").length !== 0) {
    let adminEditAgentPersonalInfo = new Vue({
        el: '#adminEditAgentPersonalInfo'
    });

}
if ($("#adminEditAgentProfessionalInfo").length !== 0) {
    let adminEditAgentProfessionalInfo = new Vue({
        el: '#adminEditAgentProfessionalInfo'
    });

}
if ($("#adminEditAgentRecordResumeInfo").length !== 0) {
    let adminEditAgentRecordResumeInfo = new Vue({
        el: '#adminEditAgentRecordResumeInfo'
    });

}


if ($("#approvedAgentProfile").length !== 0) {
    let approvedAgentProfile = new Vue({
        el: '#approvedAgentProfile'
    });

}

if ($("#adminClientRegister").length !== 0) {
    let adminClientRegister = new Vue({
        el: '#adminClientRegister'
    });
}

if ($("#addBehanceDesigner").length !== 0) {
    let addBehanceDesigner = new Vue({
        el: '#addBehanceDesigner'
    });

}

if ($("#applicantProfile").length !== 0) {
    let applicantProfile = new Vue({
        el: '#applicantProfile'
    });

}

if ($("#advancedSearch").length !== 0) {
    let advancedSearch = new Vue({
        el: '#advancedSearch'
    });
}

if ($("#adminDashboardComponent").length !== 0) {

    const routes = [
        {path: '/admin/agents/', component: AdminAgents},
        {path: '/admin/clients/', component: AdminClients},
        {path: '/admin/campaign-manager/', component: AdminCampaigns},
        {path: '/admin/', component: AdminCampaigns},
    ];

    const router = new VueRouter({
        mode: 'history',
        routes,
    });


    let clientDashboardComponent = new Vue({
        router,
        el: '#adminDashboardComponent'
    });
}

if ($('#adminRegisterAgent').length !== 0) {

    const routes = [
        {path: '/admin/register-agent', component: AdminAgentRegisterPage1},
        {path: '/admin/register-agent/page1', component: AdminAgentRegisterPage1},
        {path: '/admin/register-agent/page2', component: AdminAgentRegisterPage2},
        {path: '/admin/register-agent/page3', component: AdminAgentRegisterPage3},
        {path: '/admin/register-agent/page4', component: AdminAgentRegisterPage4},
        {path: '/admin/register-agent/page5', component: AdminAgentRegisterPage5},
        {path: '/admin/register-agent/completed', component: AdminAgentRegisterCompleted}
    ];

    const router = new VueRouter({
        mode: 'history',
        routes,
    });


    let adminRegisterAgent = new Vue({
        router,
        el: '#adminRegisterAgent'
    });
}


// end of admin front-end components

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('add-agent-component', require('./components/client/AddAgentComponent.vue'));


// client components
Vue.component('client-dashboard', require('./components/client/Dashboard.vue'));
Vue.component('campaign-main', require('./components/client/CampaignMainComponent.vue'));
Vue.component('campaign-archives', require('./components/client/CampaignArchives.vue'));
Vue.component('account-info-edit', require('./components/client/dashboardComponents/my_account/MyAccountEdit.vue'));
Vue.component('service-agreement', require('./components/client/dashboardComponents/my_account/ServiceAgreement.vue'));
// payment pay
Vue.component('invoice-component', require('./components/client/dashboardComponents/payments/InvoiceComponent.vue'));
Vue.component('agent-invoice-component', require('./components/freelancer/dashboardComponents/payments/InvoiceComponent.vue'));
Vue.component('manager-calculation', require('./components/client/dashboardComponents/payments/ManagerCalculation.vue'));
Vue.component('sub-set-up', require('./components/client/dashboardComponents/payments/SubSetUp.vue'));
Vue.component('privacy-agreement', require('./components/client/dashboardComponents/my_account/PrivacyAgreement.vue'));
Vue.component('update-sub-plan', require('./components/client/dashboardComponents/payments/UpdateSubPlan.vue'));
Vue.component('client-register', require('./components/client/ClientRegister.vue'));
Vue.component('login-component', require('./components/main/LoginComponent.vue'));
Vue.component('campaign-agents', require('./components/client/campaignComponents/CampaignAgents.vue'));
Vue.component('campaign-statistics', require('./components/client/campaignComponents/CampaignStatistics.vue'));

// campaign-activity inside components :
import CampaignActivity from './components/client/campaignComponents/CampaignActivity.vue';
import CampaignTeam from './components/client/campaignComponents/CampaignTeam.vue';
import CampaignBrief from './components/client/campaignComponents/CampaignBrief.vue';

// dashboard inside components
import CampaignManager from './components/client/dashboardComponents/CampaignManager.vue';
import Payments from './components/client/dashboardComponents/Payments.vue';
import AgentsDatabase from './components/client/dashboardComponents/AgentsDatabase.vue';
import MyAccount from './components/client/dashboardComponents/MyAccount.vue';


if ($('#campaignMainComponent').length !== 0) {
    const routes = [
        {path: '/:campaign-team', component: CampaignTeam},
        {path: '/:campaign-brief', component: CampaignBrief},
        {path: '/', component: CampaignActivity}
    ];

    const router = new VueRouter({
        routes,
    });

    let campaignMainComponent = new Vue({
        router,
        el: '#campaignMainComponent'
    });
}


if ($("#clientDashboardComponent").length !== 0) {

    const routes = [
        {path: '/client/dashboard/my-account', component: MyAccount},
        {path: '/client/dashboard/agents-database', component: AgentsDatabase},
        {path: '/client/dashboard/payments', component: Payments},
        {path: '/client', component: CampaignManager},
        {path: '/client/dashboard', component: CampaignManager},
        {path: '/client/dashboard/*', component: CampaignManager}
    ];

    const router = new VueRouter({
        mode: 'history',
        routes,
    });


    let clientDashboardComponent = new Vue({
        router,
        el: '#clientDashboardComponent'
    });
}

if ($("#addAgentComponent").length !== 0) {

    let addAgentComponent = new Vue({
        el: '#addAgentComponent'
    });
}

if ($("#loginComponent").length !== 0) {

    let loginComponent = new Vue({
        el: '#loginComponent'
    });
}

if ($("#campaignAgent").length !== 0) {

    let campaignAgent = new Vue({
        el: '#campaignAgent'
    });
}

if ($("#managerCalculation").length !== 0) {

    let managerCalculation = new Vue({
        el: '#managerCalculation'
    });
}

if ($("#clientRegister").length !== 0) {

    let clientRegister = new Vue({
        el: '#clientRegister'
    });
}


if ($("#serviceAgreement").length !== 0) {

    let serviceAgreement = new Vue({
        el: '#serviceAgreement'
    });
}
if ($("#updateSubPlan").length !== 0) {

    let updateSubPlan = new Vue({
        el: '#updateSubPlan'
    });
}

if ($("#privacyAgreement").length !== 0) {

    let privacyAgreement = new Vue({
        el: '#privacyAgreement'
    });
}

if ($("#paymentShowInvoice").length !== 0) {

    let paymentShowInvoice = new Vue({
        el: '#paymentShowInvoice'
    });
}

if ($("#invoiceComponent").length !== 0) {

    let invoiceComponent = new Vue({
        el: '#invoiceComponent',
    });
}

if ($("#subSetUp").length !== 0) {

    let subSetUp = new Vue({
        el: '#subSetUp'
    });
}

if ($("#addAgent").length !== 0) {

    let addAgent = new Vue({
        el: '#addAgent'
    });
}

if ($("#campaignArchives").length !== 0) {

    let campaignArchives = new Vue({
        el: '#campaignArchives'
    });
}

if ($("#account_info_edit").length !== 0) {

    let account_info_edit = new Vue({
        el: '#account_info_edit'
    });
}

// Freelancer components

import FreelancerCampaignManager from './components/freelancer/dashboardComponents/CampaignManager.vue';
import FreelancerMyAccount from './components/freelancer/dashboardComponents/MyAccount.vue';
import FreelancerPayments from './components/freelancer/dashboardComponents/Payments.vue';
import FreelancerRegisterPage1 from './components/freelancer/registerForms/page1.vue'
import FreelancerRegisterPage2 from './components/freelancer/registerForms/page2.vue'
import FreelancerRegisterPage3 from './components/freelancer/registerForms/page3.vue'
import FreelancerRegisterPage4 from './components/freelancer/registerForms/page4.vue'
import FreelancerRegisterPage5 from './components/freelancer/registerForms/page5.vue'
import FreelancerRegisterCompleted from './components/freelancer/registerForms/finish.vue'


Vue.component('freelancer-dashboard', require('./components/freelancer/Dashboard.vue'))
Vue.component('freelancer-register', require('./components/freelancer/FreelancerRegister.vue'))
Vue.component('freelancer-campaign-archives', require('./components/freelancer/CampaignArchives.vue'))
Vue.component('freelancer-campaign-main', require('./components/freelancer/CampaignMainComponent.vue'))
Vue.component('freelancer-account-info-edit', require('./components/freelancer/dashboardComponents/my_account/MyAccountEdit.vue'));
Vue.component('freelancer-professional-info-edit', require('./components/freelancer/dashboardComponents/my_account/ProfessionalInfoEdit.vue'));
Vue.component('freelancer-professional-info-it-edit', require('./components/freelancer/dashboardComponents/my_account/ProfessionalInfoITEdit.vue'));
Vue.component('freelancer-media-info-edit', require('./components/freelancer/dashboardComponents/my_account/EditMediaInfo.vue'));

Vue.component('service-agreement', require('./components/freelancer/dashboardComponents/my_account/ServiceAgreement.vue'));
Vue.component('privacy-agreement', require('./components/freelancer/dashboardComponents/my_account/PrivacyAgreement.vue'));

if ($('#freelancerRegisterComponent').length !== 0) {

    const routes = [
        {path: '/freelancer/register', component: FreelancerRegisterPage1},
        {path: '/freelancer/register/page1', component: FreelancerRegisterPage1},
        {path: '/freelancer/register/page2', component: FreelancerRegisterPage2},
        {path: '/freelancer/register/page3', component: FreelancerRegisterPage3},
        {path: '/freelancer/register/page4', component: FreelancerRegisterPage4},
        {path: '/freelancer/register/page5', component: FreelancerRegisterPage5},
        {path: '/freelancer/register/completed', component: FreelancerRegisterCompleted}
    ];

    const router = new VueRouter({
        mode: 'history',
        routes,
    });


    let freelancerRegisterComponent = new Vue({
        router,
        el: '#freelancerRegisterComponent'
    });
}


if ($('#freelancerDashboardComponent').length !== 0) {
    const routes = [
        {path: '/freelancer/dashboard/my-account', component: FreelancerMyAccount},
        {path: '/freelancer/dashboard/payments', component: FreelancerPayments},
        {path: '/freelancer/dashboard', component: FreelancerCampaignManager}
    ]

    const router = new VueRouter({
        routes,
        mode: 'history'
    })

    let freelancerDashboardComponent = new Vue({
        router,
        el: '#freelancerDashboardComponent'
    })
}

if ($('#freelancerCampaignArchives').length !== 0) {
    let freelancerCampaignArchives = new Vue({
        el: '#freelancerCampaignArchives'
    })
}

import FreelancerCampaignActivity from './components/freelancer/campaignComponents/CampaignActivity.vue';
import FreelancerCampaignTeam from './components/freelancer/campaignComponents/CampaignTeam.vue';
import FreelancerCampaignBrief from './components/freelancer/campaignComponents/CampaignBrief.vue';

if ($('#freelancerCampaignMainComponent').length !== 0) {
    const routes = [
        {path: '/:campaign-team', component: FreelancerCampaignTeam},
        {path: '/:campaign-brief', component: FreelancerCampaignBrief},
        {path: '/', component: FreelancerCampaignActivity}
    ];

    const router = new VueRouter({
        routes,
    });

    let freelancerCampaignMainComponent = new Vue({
        router,
        el: '#freelancerCampaignMainComponent'
    })
}

if ($("#freelancer_account_info_edit").length !== 0) {

    let freelancer_account_info_edit = new Vue({
        el: '#freelancer_account_info_edit'
    });
}

if ($("#freelancer_professional_info_edit").length !== 0) {

    let freelancer_professional_info_edit = new Vue({
        el: '#freelancer_professional_info_edit'
    });
}

if ($("#freelancer_media_info_edit").length !== 0) {

    let freelancer_media_info_edit = new Vue({
        el: '#freelancer_media_info_edit'
    });
}

if ($("#freelancer_professional_info_it_edit").length !== 0) {

    let freelancer_professional_info_it_edit = new Vue({
        el: '#freelancer_professional_info_it_edit'
    });
}


if ($("#serviceAgreementFreelancer").length !== 0) {

    let serviceAgreement = new Vue({
        el: '#serviceAgreementFreelancer'
    });
}

if ($("#privacyAgreementFreelancer").length !== 0) {

    let privacyAgreement = new Vue({
        el: '#privacyAgreementFreelancer'
    });
}

Vue.component('freelancers-container', require('./containers/home/freelancersContainer.vue'));

if ($("#freelancers_container").length !== 0) {
    let freelancers_container = new Vue({
        el: "#freelancers_container"
    })
}

Vue.component('chat-message', require('./components/chat/chatMessage.vue'));
Vue.component('chat-log', require('./components/chat/chatLog.vue'));
Vue.component('chat-composer', require('./components/chat/chatComposer.vue'));


Vue.component('faq-list', require('./components/FaqsComponent.vue'));

// works
Vue.component('works-list', require('./components/work/worksListComponent.vue'));
Vue.component('work-history', require('./components/work/workHistoryComponent.vue'));
Vue.component('add-work-modal', require('./components/work/addWorkComponent.vue'));

// educations
Vue.component('educations-list', require('./components/education/educationListComponent.vue'));
Vue.component('education-history', require('./components/education/educationHistoryComponent.vue'));
Vue.component('add-education-modal', require('./components/education/addEducationComponent.vue'));


// invoices
Vue.component('invoices-list', require('./components/invoices/invoicesListComponent.vue'));
Vue.component('invoice-component', require('./components/invoices/invoiceComponent.vue'));
Vue.component('add-invoice-modal', require('./components/invoices/addInvoiceComponent.vue'));
Vue.component('add-invoice-shift-modal', require('./components/invoices/addInvoiceShiftComponent.vue'));

// services
Vue.component('services-list', require('./components/services/servicesListComponent.vue'));
Vue.component('service-component', require('./components/services/serviceComponent.vue'));
Vue.component('add-invoice-service-modal', require('./components/services/addServiceComponent.vue'));

// bookings calendar :
Vue.component('bookings-calendar', require('./components/bookingsCalendarComponent.vue'));

// campaign briefs
Vue.component('cbriefs-list', require('./components/campaign_briefs/cBriefsListComponent.vue'));
Vue.component('cbrief-component', require('./components/campaign_briefs/cBriefComponent.vue'));
Vue.component('add-cbrief-modal', require('./components/campaign_briefs/addCBriefComponent.vue'));
Vue.component('add-service-modal', require('./components/campaign_briefs/addServiceComponent.vue'));

// recordings
Vue.component('records-list', require('./components/recordings/recordsListComponent.vue'));
Vue.component('record-component', require('./components/recordings/recordComponent.vue'));
Vue.component('add-record-modal', require('./components/recordings/addRecordComponent.vue'));

//agents:
Vue.component('agents-list', require('./components/agents/agentsListComponent.vue'));
Vue.component('agent-component', require('./components/agents/agentComponent.vue'));
Vue.component('add-agent-modal', require('./components/agents/addAgentComponent.vue'));
Vue.component('add-agent-record-modal', require('./components/agents/addAgentRecordComponent.vue'));


// references
Vue.component('references-list', require('./components/references/referencesListComponent.vue'));
Vue.component('reference-component', require('./components/references/referenceComponent.vue'));
Vue.component('add-reference-modal', require('./components/references/addReferenceComponent.vue'));

// jobs
Vue.component('jobs-list', require('./components/jobs/jobsList.vue'));
Vue.component('job-post', require('./components/jobs/jobPost.vue'));
Vue.component('add-job-modal', require('./components/jobs/addJob.vue'));

// skills
Vue.component('skills-list', require('./components/skills/skillsComponent.vue'));

// record while register
Vue.component('record-input', require('./components/record_while_register.vue'));

// terms bar component
Vue.component('terms-bar', require('./components/termsBarComponent.vue'));

// current Subscriptions Componet
Vue.component('current-subscriptions', require('./components/currentSubscriptionsComponent.vue'));

// agent terms bar component
Vue.component('agent-terms-bar', require('./components/agentTermsBarComponent.vue'));


// projects
Vue.component('projects-list', require('./components/projects/projectsListComponent.vue'));
Vue.component('project-detail', require('./components/projects/projectDetailComponent.vue'));
Vue.component('add-project-modal', require('./components/projects/addProjectComponent.vue'));


// campaigns
Vue.component('campaigns-list', require('./components/campaigns/campaingsListComponent.vue'));
Vue.component('campaign-component', require('./components/campaigns/campaingComponent.vue'));
Vue.component('add-campaign-modal', require('./components/campaigns/addCampaingComponent.vue'));
Vue.component('update-members-modal', require('./components/campaigns/updateMembersComponent.vue'));
Vue.component('add-shift-modal', require('./components/campaigns/addShiftComponent.vue'));
// campaign activity logs:
Vue.component('activity-logs', require('./components/campaigns/activityLogsComponent.vue'));
// campaign timeTable:
Vue.component('campaign-timetable', require('./components/campaigns/timeTableComponent.vue'));


// search components :
Vue.component('search-freelancers', require('./components/search/searchComponent.vue'));
Vue.component('freelancer-card', require('./components/search/freelancerCardComponent.vue'));
Vue.component('freelancers-list', require('./components/search/freelancersListComponent.vue'));

// chat room:
Vue.component('new-chat', require('./components/newChat/newChat'));

// chat room:
Vue.component('business-support-users', require('./components/businessSupportComponent.vue'));

//
Vue.component('send-emails', require('./components/mails/sendEmailsComponent.vue'));
Vue.component('send-invitations', require('./components/mails/sendInvitationMail.vue'));

// Freelancers cards
Vue.component('freelancer-resume', require('./components/resumeAgent/resumeComponentLong.vue'));


Vue.component('freelancer-portfolio', require('./components/freelancerResume/portfolio'));
Vue.component('freelancer-portfolio-popup', require('./components/freelancerResume/PortfolioPopUp'));

if ($("#freelancerResume").length !== 0) {
    let freelancerResume = new Vue({
        el: "#freelancerResume"
    });
}


if ($("#searchFreelancers").length !== 0) {
    let searchFreelancers = new Vue({
        el: '#searchFreelancers'
    });
}


if ($("#record_input").length !== 0) {
    let record_input = new Vue({
        el: '#record_input'
    });
}

if ($("#freelancerPortfolio").length !== 0) {
    let freelancerPortfolio = new Vue({
        el: '#freelancerPortfolio'
    });
}

if ($("#freelancerPortfolioPopUp").length !== 0) {
    let freelancerPortfolioPopUp = new Vue({
        el: '#freelancerPortfolioPopUp'
    });
}

if ($("#faq_list").length !== 0) {
    let faq_list = new Vue({
        el: '#faq_list'
    });
}

if ($("#currentSubscriptions").length !== 0) {
    let currentSubscriptions = new Vue({
        el: '#currentSubscriptions'
    });
}

if ($("#activityLog").length !== 0) {
    let activityLog = new Vue({
        el: '#activityLog'
    });
}
if ($("#businessSupport").length !== 0) {
    let businessSupport = new Vue({
        el: '#businessSupport'
    });
}

if ($("#timeTable").length !== 0) {
    let timeTable = new Vue({
        el: '#timeTable'
    });
}

if ($("#terms_bar").length !== 0) {
    let terms_bar = new Vue({
        el: '#terms_bar'
    });
}

if ($("#agent_terms_bar").length !== 0) {
    let agent_terms_bar = new Vue({
        el: '#agent_terms_bar'
    });
}

if ($("#agents").length !== 0) {
    let agents = new Vue({
        el: '#agents'
    });
}

if ($("#bookings_calendar").length !== 0) {
    let bookings_calendar = new Vue({
        el: '#bookings_calendar'
    });
}


if ($("#clientJobs").length !== 0) {
    let clientJobs = new Vue({
        el: '#clientJobs'
    });
}
if ($("#send_emails_vue").length !== 0) {
    let send_emails_vue = new Vue({
        el: '#send_emails_vue'
    });
}
if ($("#send_invitations_vue").length !== 0) {
    let send_invitations_vue = new Vue({
        el: '#send_invitations_vue'
    });
}

if ($("#newChat").length !== 0) {
    let newChat = new Vue({
        el: '#newChat'
    });
}

if ($("#cbriefs").length !== 0) {
    let cbriefs = new Vue({
        el: '#cbriefs'
    });
}


if ($("#work_overview").length !== 0) {
    let work_overview = new Vue({
        el: '#work_overview'
    });
}

if ($("#freelancer_works").length !== 0) {
    let freelancer_works = new Vue({
        el: '#freelancer_works'
    });
}

if ($("#freelancer_educations").length !== 0) {
    let freelancer_educations = new Vue({
        el: '#freelancer_educations'
    });
}

if ($("#client_invoices").length !== 0) {
    let client_invoices = new Vue({
        el: '#client_invoices'
    });
}

if ($("#client_services").length !== 0) {
    let client_services = new Vue({
        el: '#client_services'
    });
}

if ($("#client_campaings").length !== 0) {
    let client_campaings = new Vue({
        el: '#client_campaings'
    });
}

if ($("#freelancer_records").length !== 0) {
    let freelancer_records = new Vue({
        el: '#freelancer_records'
    });
}

if ($("#freelancer_references").length !== 0) {
    let freelancer_references = new Vue({
        el: '#freelancer_references'
    });
}


if ($("#freelancer_skills").length !== 0) {
    let freelancer_skills = new Vue({
        el: '#freelancer_skills'
    });
}


if ($("#VueChat").length !== 0) {
    const app = new Vue({
        el: '#VueChat',
        data: {
            messages: [],
            usersInRoom: [],
            currentConvId: '',
            currentUser: ''
        },
        methods: {
            addMessage(message) {
                // add to the existing messages
                // message.created_at = new Date();
                this.messages.push({
                    message: message.message,
                    created_at: 'just now',
                    user: {
                        firstName: ''
                    },
                    client: {
                        firstName: ''
                    },
                    visitor: {
                        firstName: ''
                    }
                });
                //scroll down :
                if ($("#chatBox").length) {
                    $('#messagesBox').animate({scrollTop: $('#messagesBox')[0].scrollHeight}, 'slow');
                }
                if ($("#chatLogs").length && this.currentUser.admin == 1) {
                    setTimeout(function () {
                        $('html,body').animate({scrollTop: $("#sendMessage").offset().top}, 'slow');
                    }, 2000);
                }
                // save to DB and so on.
                axios.post('/messages', message);
            }
        },
        created() {
            var pageUrl = window.location.pathname;
            var partsOfUrl = pageUrl.split('/');
            var conversationID = partsOfUrl[partsOfUrl.length - 1];
            if (isNaN(conversationID)) {
                conversationID = '';
            }
            axios.get('/messages/' + conversationID).then(response => {
                this.messages = response.data;
            });

            Echo.channel('talkToSales')
                .listen('MessagePosted', (e) => {
                    // handle event here
                    // console.log(e.message);
                    // this.messages.push({
                    //     message:e.message.message,
                    //     created_at:e.message.created_at,
                    //     user: e.user
                    // });

                    var pageUrl = window.location.pathname;
                    var partsOfUrl = pageUrl.split('/');
                    var conversationID = partsOfUrl[partsOfUrl.length - 1];
                    if (isNaN(conversationID)) {
                        conversationID = '';
                    }
                    axios.get('/messages/' + conversationID).then(response => {
                        this.messages = response.data;
                    });

                    axios.get('/chat/get-conv-id/').then(response => {
                        this.currentConvId = response.data.conversationId;
                        this.currentUser = response.data.user;
                    });

                    // scroll down : only if message is to this conversation.
                    if (this.currentConvId == e.message.conversation_id) {
                        if ($("#chatLogs").length) {
                            setTimeout(function () {
                                $('html,body').animate({scrollTop: $("#sendMessage").offset().top}, 'slow');
                            }, 2000);
                        }
                        // play sound :
                        var chatAudio = document.getElementById("chatAudio");

                        // if user is not admin and message is from admin
                        if (this.currentUser.admin != 1 && e.message.user_id == 2) {
                            chatAudio.play();
                            // open the chat if it is closed.
                            if ($('#chatBox').css('opacity') == 0) {
                                $('#liveChat').click();
                            }
                            // write the head is new message
                            $('#chatText').html('New message !');
                            setTimeout(function () {
                                $('#messagesBox').animate({scrollTop: $('#messagesBox')[0].scrollHeight}, 'slow');
                            }, 1000);
                            //2 seconds and return it back
                            setTimeout(function () {
                                $('#chatText').html('Chat with us');
                            }, 4000);
                        }

                        // if message is to admin !
                        if (this.currentUser.admin == 1 && e.message.user_id != 2) {
                            chatAudio.play();
                        }
                    }

                })

        }
    });


}


// update Messaging unread messages :
window.Echo.channel('conversations')
    .listen('UpdateMessageCount', e => {
        if (e.message.user_id) {
            // sent from user  : update client unread messages
            axios.get('/chat-room/getUnreadMessagesClient/' + e.currClient_id).then((response) => {
                let countClient = response.data.unread_messages_client;
                $('#MessagingClient' + e.currClient_id).html(countClient);
            });
        } else if (e.message.client_id) {
            // sent from client  : update user unread messages
            axios.get('/chat-room/getUnreadMessagesUser/' + e.currFreelancer_id).then((response) => {
                let countClient = response.data.unread_messages_freelancer;
                $('#MessagingFreelancer' + e.currFreelancer_id).html(countClient);
            });
        }
    });


require('./record.js');
require('./side_nav.js');
