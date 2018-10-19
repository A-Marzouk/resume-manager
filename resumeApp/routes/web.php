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


use App\Message;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::prefix('client')->group(function (){
    Route::get('/login','Auth\ClientLoginController@showLoginForm')->name('client.login');
    Route::post('/logout','Auth\ClientLoginController@logout')->name('client.logout');
    Route::post('/login/submit','Auth\ClientLoginController@login')->name('client.login.submit');
    Route::post('/search_mail','NotificationsController@mailSearchToClient');
    Route::get('/login/submit',function(){
        return redirect()->back();
    });
    Route::get('/','ClientsController@index')->name('client.dashboard');
    Route::get('/has_agreed','ClientsController@hasAgreed');
    Route::post('/set_terms','ClientsController@setTerms');
    Route::get('/register','Auth\ClientRegisterController@showRegistrationForm')->name('client.register');
    Route::post('/register/submit','Auth\ClientRegisterController@register')->name('client.register.submit');
    Route::get('/register/submit',function(){
        return redirect()->back();
    });

//Password reset routes for client
    Route::get('/password/reset', 'Auth\ClientForgotPasswordController@showLinkRequestForm')->name('client.password.reset');
    Route::post('/password/email', 'Auth\ClientForgotPasswordController@sendResetLinkEmail');
    Route::get('/password/reset/{token}', 'Auth\ClientResetPasswordController@showResetForm');
    Route::post('/password/reset', 'Auth\ClientResetPasswordController@reset');
// delete a client
    Route::get('/delete/{id}','AdminsController@deleteClient')->name('client.delete');
});

Route::prefix('freelancer')->group(function (){
    Route::get('/login','Auth\LoginController@showLoginForm')->name('freelancer.login');
    Route::get('/logout','Auth\LoginController@logout')->name('freelancer.logout');
    Route::get('/','FreelancersController@form')->name('freelancer.dashboard');
    Route::post('/store','UserDataController@store')->name('freelancer.data.store');
    Route::get('/store',function(){
        return redirect()->back();
    });
    Route::post('/login/submit','Auth\LoginController@login')->name('freelancer.login.submit');
    Route::get('/login/submit',function(){
        return redirect()->back();
    });

    Route::get('/workforce/register','Auth\RegisterController@showRegistrationForm')->name('freelancer.register');
    Route::post('/register/submit','Auth\RegisterController@register')->name('freelancer.register.submit');
    Route::get('/register/submit',function(){
        return redirect()->back();
    });
    Route::get('/delete/{id}','AdminsController@deleteFreelancer')->name('freelancer.delete');
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return redirect()->back();
});

// admin area :
Route::get('/admin','AdminsController@welcomePage')->name('admin.dashboard');
Route::get('/admin/client/{client_id}','AdminsController@logInAsClient')->name('logInAsClient');
Route::get('/admin/{user_id}','AdminsController@logInAsUser')->name('logInAsUser');

// delete users, clients and conversations :
Route::post('/admin/delete_multiple','AdminsController@deleteMultiple');
// approve users
Route::post('/admin/control_approval','AdminsController@controlApproval');

// release booked hours
Route::post('/admin/releaseBooking','AdminsController@releaseBookingsHours');

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

// stripe integration test
Route::get('/stripe/payments','\App\classes\StripePayments@stripeTest');
Route::post('/stripe/payments/pay','\App\classes\StripePayments@stripePayment');
Route::get('/stripe/hire','\App\classes\StripePayments@showHirePage');
// stripe custom payment :
Route::get('/payment','\App\classes\StripePayments@customPayment');
Route::get('/stripe/payments/pay',function(){
    return redirect()->back();
});

// work history
Route::get('/freelancer/workshistory','WorksHistoryController@getWorks')->name('get.work');
Route::post('/freelancer/addwork/','WorksHistoryController@addWork')->name('add.work');
Route::post('/freelancer/deletework/','WorksHistoryController@deleteWork')->name('delete.work');

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

//test search functions :
Route::post('/search','AdminsController@searchFreelancers');
Route::post('/save_search','AdminsController@saveSearch');
Route::get('/search','AdminsController@showSearchPage');
Route::post('/search_delete','AdminsController@deleteSearch');
Route::post('/search_delete_freelancer','AdminsController@deleteSearchFreelancer');
Route::get('/clients/emails','AdminsController@getClientsEmails');

// audio record :
Route::post('/audio/save','UserDataController@saveAudio');
Route::post('/audio/save_for_chat','UserDataController@saveAudioForChat');

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


// public routes :
Route::get('/','HomeController@welcomePage')->name('welcome');
Route::get('/search/{search_id}','HomeController@getSearch')->name('public.search');
Route::get('/workforce/terms_and_conditions','HomeController@termsView')->name('terms');
Route::get('/workforce/privacy_policy','HomeController@privacyView')->name('privacy');
Route::get('/resume_sample/{username}','HomeController@ResumeSample');
Route::get('/{username}','HomeController@ResumePage');


