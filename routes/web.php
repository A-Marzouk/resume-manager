<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */


use App\Campaign;
use App\Message;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

Auth::routes();

// UserPhoto Routes...
Route::get('users/photos', 'UserPhotoController@index')
    ->name('me.photos.index');
Route::get('users/{user}/photos', 'UserPhotoController@show')
    ->name('users.photos.show');

// UserPhoto Routes (may be protected)...
Route::patch('users/photos', 'UserPhotoController@updateCurrentUserPhoto')
    ->name('me.photos.update');
Route::delete('users/photos', 'UserPhotoController@destroyCurrentUserPhoto')
    ->name('me.photos.destroy');
Route::patch('users/{user}/photos', 'UserPhotoController@update')
    ->name('users.photos.update');
Route::delete('users/{user}/photos', 'UserPhotoController@destroy')
    ->name('users.photos.destroy');


// admin routs :
Route::prefix('admin')->group(function (){
    Route::get('/applicant-profile/{user_id}','AdminsController@showApplicantProfile')->name('admin.front.applicant_profile');
    Route::get('/agent-profile/{user_id}','AdminsController@showApprovedAgentProfile')->name('admin.front.agent_profile');
    Route::get('/advanced-search','AdminsController@showAdvancedSearchPage')->name('admin.search');
    Route::get('/add-behance-designer','AdminsController@addBehanceDesigner')->name('add.behance.designer');

    // fetching data routs
    Route::get('/api/agents/{professionName}','AdminsController@getAgentsByProfessionName')->name('get.agents');
    Route::get('/api/agent/{user_id}','AdminsController@getAgentByID')->name('get.agent.by.id');
    Route::get('/api/clients','AdminsController@getClients')->name('get.clients');

    // create agent :
    Route::get('/register-agent','AdminsController@showRegisterAgentPage')->name('admin.register.agent');
    Route::get('/register-agent/{any?}','AdminsController@showRegisterAgentPage')->name('admin.register.agent');
    Route::post('/agent/create','AdminsController@createAgent')->name('create.agent.from.admin');

    // update agent :
    Route::post('/agent/rate/update','AdminsController@updateAgentsHourlyRate')->name('update.agent.rate.from.admin');
    Route::post('/agent/technologies/update','AdminsController@updateAgentsTechnologies')->name('update.agent.skills.from.admin');

    Route::get('/agent/update/{user_id}/personal','AdminsController@showEditPersonalInfo')->name('view.agent.update.personal');
    Route::get('/agent/update/professional','AdminsController@showEditProfessionalInfo')->name('view.agent.update.professional');
    Route::get('/agent/update/resume','AdminsController@showEditResumeInfo')->name('view.agent.update.resume');

    Route::post('/agent/update','AdminsController@editAgent')->name('agent.update');



    // create client :
    Route::get('/register-client','AdminsController@showRegisterClientPage')->name('admin.register.client');
    Route::post('/client/create','AdminsController@createClient')->name('create.client.from.admin');

    Route::get('/{any?}','AdminsController@welcomePage');
});


Route::prefix('client')->group(function (){
    Route::get('/login','Auth\ClientLoginController@showLoginForm')->name('client.login');
    Route::post('/logout','Auth\ClientLoginController@logout')->name('client.logout');
    Route::post('/login/submit','Auth\ClientLoginController@login')->name('client.login.submit');
    Route::post('/search_mail','NotificationsController@mailSearchToClient');
    Route::get('/login/submit',function(){
        return redirect()->back();
    });

    // front-end routes :
    Route::get('/','ClientsController@index')->name('client.dashboard');
    Route::get('/dashboard/{any?}','ClientsController@index')->name('client.dashboard.campaing-manager');
    Route::get('/campaign/{campaign_id}','ClientsController@campaignActivity')->name('campaign.main');
    Route::get('/campaigns-archive','ClientsController@campaignArchives')->name('campaign.archives');
    Route::get('/account/edit','ClientsController@viewAccountEditPage')->name('account.edit');
    // service agreement route
    Route::get('/account/service-agreement','ClientsController@viewClientServiceAgreement')->name('service.agreement');
    Route::get('/payments/pay','ClientsController@viewClientPaymentPay')->name('payment.pay');
    Route::get('/payments/manager-calculation','ClientsController@viewClientManagerCalculation')->name('manager.calculation');
    //sub set up router
    Route::get('/payments/sub-set-up','ClientsController@viewClientSubSetUp')->name('payment.sub');
    // privacy agreement route
    Route::get('/account/privacy-agreement','ClientsController@viewClientPrivacyAgreement')->name('privacy.agreement');

    //campaign agents
    Route::get('/payments/campaign-agents','ClientsController@viewClientCampaignAgents')->name('campaign.agents');
    //////////////////
    Route::get('/has_agreed','ClientsController@hasAgreed');
    Route::post('/set_terms','ClientsController@setTerms');
    Route::get('/register','Auth\ClientRegisterController@showRegistrationForm')->name('client.register');
    Route::post('/register/submit','Auth\ClientRegisterController@register')->name('client.register.submit');
    Route::get('/register/submit',function(){
        return redirect()->back();
    });


//client jobs :
    Route::get('/jobs','ClientsController@viewJobsPage')->name('client.jobs');
    Route::get('/get_jobs','ClientsController@getJobs')->name('get.jobs');
    Route::post('/jobs/delete','ClientsController@deleteJob');
    Route::post('/jobs/add/','JobsController@addJobPost')->name('add.job');
    Route::post('/jobs/delete','JobsController@deleteJobPost')->name('delete.job');
    Route::post('/jobs/applied_freelancers','JobsController@appliedFreelancers')->name('job.freelancers');

//Password reset routes for client
    Route::get('/password/reset', 'Auth\ClientForgotPasswordController@showLinkRequestForm')->name('client.password.reset');
    Route::post('/password/email', 'Auth\ClientForgotPasswordController@sendResetLinkEmail');
    Route::get('/password/reset/{token}', 'Auth\ClientResetPasswordController@showResetForm');
    Route::post('/password/reset', 'Auth\ClientResetPasswordController@reset');
// delete a client
    Route::get('/delete/{id}','AdminsController@deleteClient')->name('client.delete');
// client profile
    Route::get('/profile/{client_id}','ClientsController@viewProfilePage')->name('client.profile');
// client agreements :
    Route::get('/agreement','ClientsController@viewClientAgreement')->name('client.agreement');
    Route::get('/privacy_policy','ClientsController@viewClientPrivacyPolicy')->name('client.agreement');


// get current client :
    Route::get('/current','ClientsController@getCurrentClient')->name('get.current.client');

// update client (from client dashboard)
    Route::post('/update', 'ClientsController@updateClient');

// get client campaigns
    Route::get('/get/campaigns','CampaignsController@getClientCamps')->name('client.campaigns');

// get client campaign members :
    Route::get('/camp/members/{camp_id}','CampaignsController@getClientCampMembers')->name('client.camp.members');
    Route::post('/camp/update','CampaignsController@updateCampaignStatus')->name('client.camp.update');

// campaign faqs :
    Route::post('/camp/faqs/add','FAQsController@addFAQ')->name('client.camp.faqs.add');
    Route::post('/camp/faqs/update','FAQsController@updateFAQ')->name('client.camp.faqs.update');
    Route::post('/camp/faqs/delete','FAQsController@deleteFAQ')->name('client.camp.faqs.delete');

// save campaign process flow
    Route::post('/camp/process-flow/update','CampaignsController@saveCampaignProcessFLow')->name('client.camp.process_flow.update');

// campaign links
    Route::post('/camp/links/create','LinksController@create')->name('client.camp.links.create');
    Route::post('/camp/links/update','LinksController@update')->name('client.camp.links.update');


// client subsriptions
    Route::get('/subs/get','SubscriptionsController@getClientSubscription')->name('client.subs.get');
    Route::post('/subs/create','SubscriptionsController@create')->name('client.subs.create');
// update subscription plan route
    Route::get('/subs/update/{sub_id}','SubscriptionsController@showUpdatePage')->name('client.subs.show.update');
    Route::post('/subs/update','SubscriptionsController@update')->name('client.subs.update');

// client campaign agents :
    Route::get('/camp/add-agent','ClientsController@viewCampaignAddAgentPage')->name('campaign.add.agent');

// client search agents :
    Route::post('/agents/search','SearchesController@searchAgentsForCampaign')->name('client.search.agents');
// add agent to camp
    Route::post('/camp/add-agent','ClientsController@campaignAddAgent')->name('client.camp.add_agent');
// client sign contract :
    Route::post('/contracts/sign','ClientsController@signContract')->name('client.sign.contract');


});

Route::prefix('freelancer')->group(function (){
    Route::get('/login','Auth\LoginController@showLoginForm')->name('freelancer.login');
    Route::get('/logout','Auth\LoginController@logout')->name('freelancer.logout');
    Route::get('/campaigns-archive','FreelancersController@campaignArchives')->name('freelancer.campaign.archives');
    Route::get('/campaign','FreelancersController@campaignActivity')->name('freelancer.campaign.main');
    Route::get('/account/edit','FreelancersController@viewAccountEditPage')->name('freelancer.account.edit');
    Route::get('/professional/edit','FreelancersController@viewProfessionalEditPage')->name('freelancer.professional.edit');
//    Route::get('/portfolio','FreelancersController@form')->name('freelancer.dashboard');
    Route::get('/account/service-agreement','FreelancersController@viewFreelancerServiceAgreement')->name('service.agreement');
    Route::get('/account/privacy-agreement','FreelancersController@viewFreelancerPrivacyAgreement')->name('privacy.agreement');

    // frontend routes
    Route::get('/',function (){
        return redirect(route('freelancer.dashboard'));
    })->name('show.edit_form');
    Route::get('/dashboard/{any?}','FreelancersController@index')->name('freelancer.dashboard');
    
    Route::post('/store','UserDataController@store')->name('freelancer.data.store');
    Route::get('/store',function(){
        return redirect()->back();
    });
    Route::post('/login/submit','Auth\LoginController@login')->name('freelancer.login.submit');
    Route::get('/login/submit',function(){
        return redirect()->back();
    });
    
    Route::get('/register/{any?}', 'Auth\FreelancerRegisterController@showRegistrationForm')->name('freelancer.register');
    Route::post('/register/submit','Auth\RegisterController@register')->name('freelancer.register.submit');
    Route::get('/register/submit',function(){
        return redirect()->back();
    });
    //////////////
    // new register for business support  :
    Route::get('/workforce/register','BusinessSupportController@showRegistrationForm')->name('freelancer.register');
    Route::post('/apply/register_business','BusinessSupportController@register')->name('business.apply.submit');
    Route::get('/workforce/success','BusinessSupportController@applicationSuccess');
    Route::post('/workforce/form/validate','BusinessSupportController@validateForm');

    //////////
    Route::get('/delete/{id}','AdminsController@deleteFreelancer')->name('freelancer.delete');
    Route::get('/old_form/','FreelancersController@showOldForm')->name('show.old_form');
    Route::get('/jobs/','FreelancersController@showFreelancerJobs')->name('show.freelancer.jobs');
    Route::post('/jobs/apply','FreelancersController@applyToJob')->name('freelancer.apply.job');
    Route::post('/jobs/leave','FreelancersController@leaveJob')->name('freelancer.leave.job');
    // freelancer agreements :
    Route::get('/requirements','FreelancersController@viewAgentRequirements')->name('agent.requirements');
    Route::get('/contractor_agreement','FreelancersController@viewAgentContractorAgreement')->name('agent.contractor.agreement');

    Route::get('/has_agreed','FreelancersController@hasAgreed');
    Route::post('/set_terms','FreelancersController@setTerms');

});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return redirect()->back();
});

// admin area :
Route::get('/admin','AdminsController@welcomePage')->name('admin.dashboard');
//Route::get('/admin/send_mail/approved_users','AdminsController@sendMailApprovedUsers')->name('admin.dashboard');
Route::get('/admin/client/{client_id}','AdminsController@logInAsClient')->name('logInAsClient');

// view and edit campaigns is only for admin,
Route::get('/admin/get_camps','CampaignsController@getAllCamps')->name('get.camps');
Route::get('/admin/view/business_support_users','AdminsController@viewBusinessSupportUsers')->name('view.business.support.users');
Route::get('admin/get_clients','CampaignsController@getAllClients')->name('get.clients');
Route::get('admin/get_users','CampaignsController@getBusinessSupportUsers')->name('get.users');
Route::post('/admin/camps/delete','CampaignsController@deleteCamp')->name('delete.camp');
Route::post('/admin/camps/add','CampaignsController@addCamp')->name('add.camp');
Route::post('/admin/camp/members','CampaignsController@getCampMembers')->name('camp.members');
Route::post('/admin/camp/update_members','CampaignsController@addMembersToCamp')->name('add.members.to.camp');
Route::get('/admin/campaigns','CampaignsController@viewCampaigns')->name('view.campaigns');
Route::get('/camps/view/{campID}','CampaignsController@viewSingleCampaign')->name('view.single.campaign');
    // campaign shifts
Route::post('/admin/camp/add_shift','ShiftsController@addShiftToCamp')->name('add.shift.to.camp');
Route::post('/admin/camps/delete_shift','ShiftsController@deleteShift')->name('delete.shift');
    // activiy logs
Route::get('/admin/camps/get_camp_logs/{camp_id}','ActivityLogsController@getLogsByCampaignID')->name('get.logs');
Route::get('/admin/camps/get_camp_members/{camp_id}','ActivityLogsController@getMembersByCampaignID')->name('get.members');
Route::get('/admin/camps/get_camp_shifts/{camp_id}','ActivityLogsController@getShiftsByCampaignID')->name('get.shifts');
Route::post('/admin/camps/add_log','ActivityLogsController@addLog')->name('add.log');
Route::post('/admin/camps/delete_log','ActivityLogsController@deleteActivityLog')->name('delete.log');
Route::post('/admin/camps/add_user_to_day','ShiftsController@addUserToShiftDay')->name('add.user.to.day');
Route::post('/admin/camps/remove_user_from_day','ShiftsController@removeUserFromShiftDay')->name('remove.user.from.day');

    // update status :
Route::post('/admin/business_support/update_status','BusinessSupportController@updateBusinessUserStatus');
Route::post('/admin/business_support/update_shaded_status','BusinessSupportController@updateBusinessShadedStatus');
Route::post('/admin/business_support/update_stage','BusinessSupportController@updateBusinessUserStage');

    // business users :
Route::get('/admin/get/business_support_users/{items_count}','AdminsController@getBusinessUsersOrdered');


// delete users, clients and conversations :
Route::post('/admin/delete_multiple','AdminsController@deleteMultiple');
// approve users
Route::post('/admin/control_approval','AdminsController@controlApproval');
Route::post('/admin/control_homepage_freelancers','AdminsController@controlHomepageFreelancers');
Route::post('/admin/invite','AdminsController@inviteToJob')->name('admin.invite.to.job');
Route::get('/admin/invite/{job_id}','AdminsController@invitePage')->name('admin.invite.page');

// release booked hours
Route::post('/admin/releaseBooking','AdminsController@releaseBookingsHours');

// show bookings history of client
Route::get('/admin/client/booking_history/{client_id}','AdminsController@showBookingsHistory')->name('show.bookings_history');


// chatting routes :
Route::get('/chat','ChatController@showChatRoom');
Route::post('/messages/','ChatController@storeMessages');
Route::get('/chat/store/message','ChatController@storeMessageFromMail');
Route::get('/messages/','ChatController@getMessages');
Route::get('/chat/get-conv-id/','ChatController@getConversationId');
Route::get('/messagesent',function (){
  return view('messageSent');
});
Route::get('/messages/{conv_id}','ChatController@getMessages');
Route::get('/chat/{id}','ChatController@showAdminChatRoom')->middleware('admin');

Route::get('/conversation/delete/{id}','ConversationsController@deleteConversation')->name('conversation.delete');

// notification :
Route::post('/','NotificationsController@messageToSales')->name('message.to.sales');
Route::post('/message/freelancer','NotificationsController@messageToFreelancer')->name('message.to.freelancer');

// stripe integration
Route::post('/stripe/payments/pay','\App\classes\StripePayments@stripePayment');
Route::get('/stripe/hire','\App\classes\StripePayments@showHirePage');
Route::post('/stripe/webhocks','\App\classes\StripePayments@webhocks');
// stripe custom payment :
Route::get('/payment/stripe','\App\classes\StripePayments@customPayment');
Route::get('/stripe/payments/pay',function(){
    return redirect()->back();
});

// work history
Route::get('/freelancer/workshistory','WorksHistoryController@getWorks')->name('get.work');
Route::post('/freelancer/addwork/','WorksHistoryController@addWork')->name('add.work');
Route::post('/freelancer/deletework/','WorksHistoryController@deleteWork')->name('delete.work');

// education history
Route::get('/freelancer/educationshistory','EducationHistoryController@getEducations')->name('get.education');
Route::post('/freelancer/addeducation/','EducationHistoryController@addEducation')->name('add.education');
Route::post('/freelancer/deleteeducation/','EducationHistoryController@deleteEducation')->name('delete.education');

// invoices
Route::get('/admin/client/all_invoices/{client_id}','InvoicesController@viewInvoicesPage')->name('show.invoices.page');

Route::get('/admin/client/invoices/{client_id}','InvoicesController@getInvoices')->name('get.invoices');
Route::post('/admin/client/addinvoice/','InvoicesController@addInvoice')->name('add.invoice');
Route::post('/admin/client/deleteinvoice/','InvoicesController@deleteInvoice')->name('delete.invoice');
Route::post('/admin/update_invoice_number','InvoicesController@updateInvoiceNumber')->name('edit.unique.number');

    // invoice public link
Route::get('/invoice/pdf/{unique_number}','InvoicesController@invoiceToPDF')->name('invoice.to.pdf');
Route::get('/workforce/invoices/{unique_number}','InvoicesController@viewInvoicePublicPage')->name('show.invoice.public.page');
Route::get('/workforce/invoices/get_unique_number/{id}','InvoicesController@getInvoiceUniqueNumberByID');

// services
Route::get('/admin/client/services_view/{client_id}','ServicesController@viewServicesPage')->name('show.services.page');
Route::get('/admin/client/services/{client_id}','ServicesController@getServices')->name('get.services');
Route::post('/admin/client/addservice/','ServicesController@addService')->name('add.service');
Route::post('/admin/client/deleteservice/','ServicesController@deleteService')->name('delete.service');
Route::post('/admin/client/generate_service_invoice/','ServicesController@generateInvoiceForServices')->name('generate.service.invoice');


// bookings calendar:
Route::get('/admin/bookings/calendar','BookingsController@viewBookingsCalendar')->name('bookings.calendar.page');
Route::get('/admin/permissions','AdminsController@showPermissionsPage')->name('admin.permissions.page');
Route::post('/admin/permissions/update','AdminsController@saveAdminPermissions');
Route::get('/admin/get/bookings','BookingsController@getBookings')->name('get.bookings');
Route::get('/admin/view/booking/{id}','BookingsController@viewSingleBooking')->name('single.booking');

// campaign briefs:

Route::get('/admin/workforce/get_cbriefs','CampaignBriefsController@getCBriefs')->name('get.cBriefs');
Route::get('/admin/workforce/campaign_briefs','CampaignBriefsController@viewCBriefsPage')->name('view.cBriefs');
Route::get('/admin/workforce/campaign_briefs/{client_id}','CampaignBriefsController@getCBriefsByClient')->name('view.cBriefs.client');
Route::get('/admin/campaign_brief/pdf/{id}','CampaignBriefsController@cBriefToPDF')->name('cBrief.to.pdf');
Route::get('/workforce/campaign_briefs/{id}','CampaignBriefsController@viewCampaignBriefPublicPage')->name('show.cBrief.public.page');

Route::post('/admin/workforce/add_cbrief','CampaignBriefsController@addCBrief')->name('add.cBrief');
Route::post('/admin/workforce/delete_cbrief','CampaignBriefsController@deleteCBrief')->name('delete.cBrief');

// services of brief camp
Route::post('/admin/workforce/add_cbrief_service','CampaignBriefsController@addServiceToCamp')->name('add.cBrief.service');
Route::post('/admin/workforce/delete_cbrief_service','CampaignBriefsController@deleteCBriefService')->name('delete.cBrief.service');
Route::get('/admin/workforce/get_cbrief_services/{cBriefID}','CampaignBriefsController@getCBriefServices')->name('get.cBrief_services');



// recordings
Route::get('/freelancer/records','RecordingsController@getRecords')->name('get.records');
Route::post('/freelancer/addrecord/','RecordingsController@addRecord')->name('add.record');
Route::post('/freelancer/deleterecord/','RecordingsController@deleteRecord')->name('delete.record');

// references
Route::get('/freelancer/references','ReferencesController@getReferences')->name('get.references');
Route::post('/freelancer/addreference/','ReferencesController@addReference')->name('add.reference');
Route::post('/freelancer/deletereference/','ReferencesController@deleteReference')->name('delete.reference');


// agents page:
Route::get('/workforce/agents','AgentsController@viewAgents')->name('view.agents');
Route::get('/workforce/isAdmin','AgentsController@isAdmin')->name('check.admin');
Route::get('/workforce/get_agents','AgentsController@getAgents')->name('get.agents');
Route::get('/workforce/get_agent_records/{agent_id}','AgentsController@getAgentRecords')->name('get.agent.records');

Route::post('/workforce/add_agent','AgentsController@addAgent')->name('add.agent');
Route::post('/workforce/delete_agent','AgentsController@deleteAgent')->name('delete.agent');
Route::post('/workforce/agent/add_record','AgentsController@addRecordToAgent')->name('add.agent.record');
Route::post('/workforce/agent/delete_record','AgentsController@deleteAgentRecord')->name('delete.agent.record');



// skills
Route::get('/freelancer/skills','SkillsController@getskills')->name('get.skills');
Route::post('/freelancer/addskill/','SkillsController@addSkill')->name('add.skill');
Route::post('/freelancer/deleteskill/','SkillsController@deleteSkill')->name('delete.skill');

// projects overview
Route::get('/freelancer/projects','ProjectsController@getProjects')->name('get.project');
Route::post('/freelancer/addproject/','ProjectsController@addProject')->name('add.project');
Route::post('/freelancer/deleteproject/','ProjectsController@deleteProject')->name('delete.project');
Route::post('/freelancer/delete_project_image/','ProjectsController@deleteProjectImage')->name('delete.project.image');

// behance api :
Route::get('/freelancer/behance/{behanceUsername}','UserDataController@dataFromBehance');
Route::post('/freelancer/behance/save_img','UserDataController@saveImgLink');
Route::post('/freelancer/behance/save_user','FreelancersController@registerDesignerFromBehance');

// Linked in api :
Route::get('/freelancer/linkedin/','UserDataController@dataFromLinkedIn');
Route::get('/freelancer/instagram/','UserDataController@dataFromInstagram');

// search functions :
Route::post('/search','SearchesController@searchFreelancers');
Route::post('/searchAgents','SearchesController@searchAgents');
Route::post('/save_search','SearchesController@saveSearch');
Route::get('/search','SearchesController@showSearchPage');
Route::post('/search_delete','SearchesController@deleteSearch');
Route::post('/search_delete_freelancer','SearchesController@deleteSearchFreelancer');
Route::get('/clients/emails','AdminsController@getClientsEmails');

// open client search page
Route::get('/client/search','ClientsController@showClientSearchPage')->name('client.search');


// send Emails:
Route::get('/send_emails','EmailsController@showSendEmailsPage')->name('show.send_emails_page');
Route::post('/send_emails','EmailsController@sendCustomEmails')->name('send.emails');
Route::post('/get_emailTemplate','EmailsController@getEmailTemplate')->name('get.email_template');

// add owner
Route::post('/freelancer/owners/add_owner','OwnersController@addOwner')->name('add.owner');
Route::get('/freelancer/owners/show_owner_page/{owner_id}','OwnersController@showSingleOwnerPage')->name('view.owner.single.page');

// audio record :
Route::post('/audio/save','UserDataController@saveAudio');
Route::post('/audio/save_for_chat','UserDataController@saveAudioForChat');
Route::post('/audio/save_for_register','BusinessSupportController@saveAudioForRegister');

// chat new :
Route::get('/chat-room','NewChatController@showChatPage')->name('chat-room');
Route::get('/chat-room/conversations','NewChatController@getAuthorConversations');
Route::get('/chat-room/messages/{conversation_id}','NewChatController@getMessagesByConversationID');
Route::get('/chat-room/getUnreadMessagesClient/{client_id}','NewChatController@getUnreadMessagesClient');
Route::get('/chat-room/getUnreadMessagesUser/{user_id}','NewChatController@getUnreadMessagesUser');
Route::get('/chat-room/download/{filePath}/{conversation_id}','NewChatController@getDownload');
Route::post('/chat-room/addMessage','NewChatController@addMessage');
Route::post('/chat-room/allRead','NewChatController@zeroUnread');
Route::post('/chat-room/start_conversation','NewChatController@startConversation');
Route::post('/chat-room/message_file','NewChatController@handleFileMessage');

// affiliates routs :
Route::get('/affiliate','Auth\Affiliates\AffiliateLoginController@showLoginForm');
Route::get('affiliate/register','Auth\Affiliates\AffiliateRegisterController@showRegistrationForm')->name('affiliate.register');
Route::get('affiliate/dashboard','AffiliatesController@showDashboard')->name('affiliate.dashboard');
Route::post('affiliate/register/submit','Auth\Affiliates\AffiliateRegisterController@register')->name('affiliate.register.submit');
Route::post('affiliate/logout','Auth\Affiliates\AffiliateLoginController@logout')->name('affiliate.logout');
Route::get('affiliate/login','Auth\Affiliates\AffiliateLoginController@showLoginForm')->name('affiliate.login');
Route::post('affiliate/login/submit','Auth\Affiliates\AffiliateLoginController@login')->name('affiliate.login.submit');
Route::post('/affiliate/update_affiliate','AffiliatesController@updateAffiliate')->name('update.affiliate');
Route::post('/affiliate/update_affiliate_client','AffiliatesController@updateClientAffiliate')->name('update.affiliate.client');
Route::get('/affiliate/view_profile/{affiliate_id}','AdminsController@logInAsAffiliate')->name('view.affiliate.profile');
//Password reset routes for affiliates
Route::get('affiliate/password/reset', 'Auth\Affiliates\AffiliateForgotPasswordController@showLinkRequestForm')->name('affiliate.password.reset');
Route::post('affiliate/password/email', 'Auth\Affiliates\AffiliateForgotPasswordController@sendResetLinkEmail');
Route::get('affiliate/password/reset/{token}', 'Auth\Affiliates\AffiliateResetPasswordController@showResetForm');
Route::post('affiliate/password/reset', 'Auth\Affiliates\AffiliateResetPasswordController@reset');


// paypal routes
//Route::get('payment/paypal','PaypalController@showForm')->name('show.paypal.form');
//Route:: post('payment/paypal/submit','PaypalController@payWithPaypal')->name('submit.paypal.form');
//Route::get('/paypal/status','PaypalController@getPayPalPaymentStatus')->name('paypal.status');

Route::get('payment/paypal','\App\classes\PayPalPayments@showForm')->name('show.paypal.form');

// paypal - express checkout routes :
Route::get('/paypal/pay-form', '\App\classes\PayPalPayments@viewPayPalForm')->name('paypal.express-checkout.form');
Route::post('/paypal/express-checkout', '\App\classes\PayPalPayments@expressCheckout')->name('paypal.express-checkout');
Route::get('/paypal/express-checkout-success', '\App\classes\PayPalPayments@expressCheckoutSuccess');
Route::post('/paypal/notify', '\App\classes\PayPalPayments@notify');

// subscriptions :
Route::get('/admin/get/subscriptions', 'AdminsController@getCurrentSubscriptions');
Route::post('/paypal/cancel/subscription', '\App\classes\PayPalPayments@cancelSubscription');
Route::post('/stripe/cancel/subscription', '\App\classes\StripePayments@cancelSubscription');

// metered subscriptions
Route::post('/stripe/create/subscription/metered', '\App\classes\StripePayments@createMeteredPlan')
    ->name('create.metered.subscription');

Route::post('/stripe/create/usage_report/', '\App\classes\StripePayments@makeUsageReport')
    ->name('create.usage.report');

Route::get('/admin/client/subscriptions_view/{client_id}','AdminsController@viewMeteredSubscriptionsPage')
    ->name('show.subscriptions.page');


// send payments to our users.
//Route::get('payment/paypal/send','PaypalController@showSendForm')->name('show.paypal.form');
//Route:: post('payment/paypal_send/submit','PaypalController@sendPaymentByPayPal')->name('submit.paypal.send.form');
//Route::get('/paypal/status','PaypalController@getPayPalPaymentStatus')->name('paypal.status');

Route::get('dashboard', 'DashboardController@showDashboard')
    ->middleware('auth')
    ->name('dashboard.index');

// Authentication Routes...
// Route::get('login', 'Auth\LoginController@showLoginForm')
//     ->name('login');
Route::post('login', 'Auth\ClientLoginController@login')
    ->name('login');
Route::get('logout', 'Auth\LoginController@logout')
    ->name('logout');


// public routes :
Route::get('/apply','BusinessSupportController@showRegistrationForm')->name('freelancer.register');
Route::get('/','HomeController@welcomePage')->name('welcome');
Route::get('/jobs/view_post/{job_id}','JobsController@viewSingleJobPost')->name('jobs.view_single');
Route::get('/search/{search_id}','HomeController@getSearch')->name('public.search');
Route::get('/workforce/terms_and_conditions','HomeController@termsView')->name('terms');
Route::get('/workforce/privacy_policy','HomeController@privacyView')->name('privacy');
Route::get('/resume_sample/{username}','HomeController@ResumeSample');
//Route::get('/admin/{user_id}','AdminsController@logInAsUser')->name('logInAsUser');
Route::get('/{username}','HomeController@ResumePage');

Route::get('/home_test/designers', 'HomeController@homeDesigners')->name('home-desginers');

Route::get('/home_test/sales', function () {
    return view('new_home_sales');
});

Route::get('/create/new_agents', 'TestController@createAgents');
