<template>
    <div>
        <div class="row">
            <div class="col-md-3 text-left">
                <!-- here goes all conversations related to the signed in client -->
                <div v-for="data in conversations" class="NoDecor">
                    <a href="javascript:void(0)" @click="setCurrentConversation(data.conversation.id)">
                        <div class="freelancerChatBox">
                            <div v-show="client_id">
                                <img v-show="data.freelancer.userData.photo" :src="data.freelancer.userData.photo" alt="img" width="25px" style="border-radius: 50%">
                                <img v-show="!data.freelancer.userData.photo" src="/resumeApp/resources/views/customTheme/images/no-image-icon-.png" alt="img" width="25px" style="border-radius: 50%">
                                 {{data.freelancer.firstName}} {{data.freelancer.lastName}}
                                <span class="unread" v-show="data.conversation.unread_messages_client> 0"> {{data.conversation.unread_messages_client}} </span>
                            </div>
                            <div v-show="user_id">
                                {{data.client.firstName}}
                                <span class="unread" v-show="data.conversation.unread_messages_freelancer > 0"> {{data.conversation.unread_messages_freelancer}} </span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-8 chatMessagesArea" id="newChatMessagesArea" v-show="conversations.length > 0">
                <!-- here goes the chat itself -->
                <div>
                    {{this.currFreelancer.firstName}} - {{this.currClient.firstName}}
                </div><br/>
                <div v-show="currentMessagesList.length < 1">
                    <span class="panelFormLabel">No messages yet</span>
                </div>
                <div v-for="message in currentMessagesList">
                    <div :class="{ clientMessage : message.client_id , freelancerMessage : message.user_id, defaultMessage: !message.user_id && !message.client_id}">
                        <span v-show="message.client_id" class="panelFormLabel">{{currClient.firstName}} : </span>
                        <span v-show="message.user_id" class="panelFormLabel">{{currFreelancer.firstName}} : </span>
                        <span v-if="message.type == 'application' || message.type == 'txt' ">
                            <a :href="'/chat-room/download/'+getFileName(message.message)+'/'+currentConversation.id">
                                <img src="/resumeApp/resources/assets/images/file-icon.png" alt="file" width="45px">
                                {{getFileName(message.message)}}
                            </a>
                        </span>
                        <span v-else-if="message.type == 'video' " class="NoDecor">

                            {{getFileName(message.message)}}
                            <div class="text-center col-md-6">
                                <video width="100%" height="auto" controls>
                                    <source :src="message.message">
                                </video>
                            </div>
                             <a :href="'/chat-room/download/'+getFileName(message.message)+'/'+currentConversation.id">
                                 <small style="padding-left:20px;">Download</small>
                            </a>
                        </span>
                        <span v-else-if="message.type == 'audio' ">
                            <span>
                                {{getFileName(message.message)}}
                            </span>
                            <div style="padding-top: 30px;">
                                <audio controls preload="auto">
                                <source :src="message.message">
                                Your browser does not support the audio element.
                            </audio>
                            </div>
                            <a :href="'/chat-room/download/'+getFileName(message.message)+'/'+currentConversation.id">
                                 <small style="padding-left:20px;">Download</small>
                            </a>
                        </span>
                        <span v-else-if="message.type == 'image' ">
                             <span>
                                {{getFileName(message.message)}}
                            </span>
                            <div>
                                <a href="javascript:void(0)" data-toggle="modal" :data-target="'#chatImage'+message.id">
                                    <img :src="message.message" alt="image" width="250px" height="auto">
                                </a>
                            </div>
                              <a :href="'/chat-room/download/'+getFileName(message.message)+'/'+currentConversation.id">
                                 <small style="padding-left:20px;">Download</small>
                              </a>

                            <div class="modal fade" :id="'chatImage'+message.id" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document" style="">
                                    <div class="modal-content" data-dismiss="modal" aria-label="Close">
                                        <div class="modal-body" style="padding: 0;">
                                            <div class="row">
                                                <img :src="message.message" alt="image" width="100%" height="auto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </span>
                        <span v-else-if="message.type == 'text'">
                            {{message.message}}
                        </span>
                        <span v-else>
                            File can not be uploaded.
                        </span>
                        <div class="text-right">
                            <small v-show="message.created_at !== undefined">{{new Date(message.created_at).toDateString()}}</small>
                        </div>
                    </div>
                </div>
                <small id="status" class="panelFormLabel" style="margin: 10px;"></small>
            </div>
        </div>
        <hr/>
        <div class="row" v-show="conversations.length > 0">
            <div class="col-md-6 offset-md-3">
                <div class="form-group" style="padding-top: 25px;">
                    <input type="text" class="form-control panelFormInput" v-model="newMessage.body" @keyup.enter="sendMessage">
                </div> <!-- message input -->
            </div>
            <div class="col-md-1 NoDecor" style="padding-top: 33px;">
                <a href="javascript:void(0)" @click="openFileSelect" class="btn btn-primary">Share file</a>
                <input type="file" name="shared_file" ref="file" id="shared_file" @change="handleChatFile" class="d-none">
            </div>
            <div class="col-md-2 NoDecor" style="padding-top: 33px;">
                <div class="recorder_wrapper">
                    <div class="recorder">
                        <div id="recordImg">
                            <a href="javascript:void(0)"  id="startRecord" @click="startCount">
                                <img src="/resumeApp/resources/assets/images/Microphone_1.png" alt="mic" width="25px">
                            </a>
                        </div>
                        <p>
                            <span id="record_status"></span> <span id="counter" class="panelFormLabel"></span>
                        </p>
                        <div class="NoDecor" style="padding-top:20px;">
                            <a href="javascript:void(0)" id="stopAudio" class="d-none" @click="stopCount">Stop</a>
                            <a href="javascript:void(0)" id="playAudio" class="d-none">Play</a>
                            <a href="javascript:void(0)" id="sendAudio" class="d-none" @click="sendAudioRecord">Send </a>
                            <a href="javascript:void(0)" id="discardAudio" class="d-none" @click="resetAudio"a>Discard</a>
                            <span class="d-none" id="currAudioChatSrc"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row text-center" v-show="conversations.length === 0">
            <div class="col-md-12">
                <div class="pageHeading" style="padding-bottom: 50px; padding-top: 50px;">
                    You have no conversations yet.
                </div><br/>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['client_id','user_id'],
        data(){
            return{
                conversations:[],
                currentConversation:{},
                currentMessagesList:[],
                newMessage:{
                    body:'',
                    type:'text'
                },
                currFreelancer:{},
                currClient:{},
                time:''
            }
        },

        methods:{
            getAuthorConversations(){
                axios.get('/chat-room/conversations').then((response)=>{
                    this.conversations = response.data;
                    this.setDefaultConversation();
                });
            },
            setCurrentConversation(conversation_id){

                this.conversations.forEach( (data) => {
                    if(data.conversation.id === conversation_id){
                       this.currentConversation = data.conversation ;
                       this.currFreelancer = data.freelancer;
                       this.currClient = data.client;
                    }
                });

                // clear unread messages :
                axios.post('/chat-room/allRead',{conversation_id:this.currentConversation.id,client_id:this.client_id,user_id:this.user_id})
                    .then( (response)=>{
                        if(this.client_id){
                            this.currentConversation.unread_messages_client = 0 ;
                        }
                        if(this.user_id){
                            this.currentConversation.unread_messages_freelancer = 0 ;
                        }
                });


                this.setConversationMessages();

                // listen to this conversation to add the message.
                window.Echo.channel('chat.'+this.currentConversation.id)
                    .listen('MessageSent', e => {
                        if(e.message.conversation_id == this.currentConversation.id){
                            // i am on this conversation
                            this.currentMessagesList.push(e.message);

                            // scroll down:
                            $("#newChatMessagesArea").animate({ scrollTop: $('#newChatMessagesArea').prop("scrollHeight")}, 1000);
                        }
                        else{
                            // i am on another conversation :
                            this.updateUnReadMessageCount(e.message.conversation_id);
                        }
                    });

                // clear status :
                $('#status').html('');

            },
            setConversationMessages(){
                axios.get('/chat-room/messages/'+this.currentConversation.id).then( (response) => {
                    this.currentMessagesList = response.data;

                    // scroll down to the messages
                    setTimeout(function(){
                        $("#newChatMessagesArea").animate({ scrollTop: $('#newChatMessagesArea').prop("scrollHeight")}, 1000);
                    },2000);

                });
            },
            sendMessage(){
                let message = {
                    conversation_id : this.currentConversation.id,
                    message : this.newMessage.body,
                    client_id: this.client_id,
                    user_id: this.user_id,
                    type:this.newMessage.type
                };
                // clear input :
                this.currentMessagesList.push(message);
                $('#status').html('Sending..');
                this.newMessage.body = '' ;
                axios.post('/chat-room/addMessage',message).then((response) => {
                   $('#status').html('Sent');
                });

                $("#newChatMessagesArea").animate({ scrollTop: $('#newChatMessagesArea').prop("scrollHeight")}, 1000);

            },

            setDefaultConversation(){
                if(this.currentConversation.id !== undefined){
                    this.setCurrentConversation(this.currentConversation.id);
                }
                else if( this.conversations.length > 0){
                    this.setCurrentConversation(this.conversations[0].conversation.id);
                }
            },
            updateUnReadMessageCount($conversation_id){
                this.conversations.forEach( (data) => {
                    if(data.conversation.id == $conversation_id){
                        if(this.client_id){
                            data.conversation.unread_messages_client +=1  ;
                        }
                        if(this.user_id){
                            data.conversation.unread_messages_freelancer += 1 ;
                        }
                    }
                })
            },
            handleChatFile(){
                let chat_form_data = new FormData;
                let chatFile = this.$refs.file.files[0];
                chat_form_data.append('shared_file',chatFile);

                axios.post('/chat-room/message_file',chat_form_data).then( (response) => {
                    // response.data is the file path
                    this.sendFileMessage(response.data);
                });

            },
            openFileSelect(){
                $('#shared_file').click();
            },
            sendFileMessage(fileInfo){
                let message = {
                    conversation_id : this.currentConversation.id,
                    message :fileInfo.path,
                    client_id: this.client_id,
                    user_id: this.user_id,
                    type:fileInfo.type
                };
                // clear input :
                this.currentMessagesList.push(message);
                $('#status').html('Sending..');
                this.newMessage.body = '' ;
                axios.post('/chat-room/addMessage',message).then((response) => {
                    $('#status').html('Sent');
                });
                $("#newChatMessagesArea").animate({ scrollTop: $('#newChatMessagesArea').prop("scrollHeight")}, 1000);
            },
            getFileName(path){
                let parts = path.split('/');
                return parts.pop() || parts.pop();
            },
            sendAudioRecord(){
                let currAudioSrc = $('#currAudioChatSrc').html() ;
                if( currAudioSrc !== ''){
                    let fileInfo ={
                        path: currAudioSrc,
                        type: 'audio'
                    };

                    let message = {
                        conversation_id : this.currentConversation.id,
                        message :fileInfo.path,
                        client_id: this.client_id,
                        user_id: this.user_id,
                        type:fileInfo.type
                    };

                    this.currentMessagesList.push(message);

                    // save the message to the database of messages :
                    axios.post('/chat-room/addMessage',message).then((response) => {
                        $('#status').html('Sent');
                    });

                    // scroll down:
                    $("#newChatMessagesArea").animate({ scrollTop: $('#newChatMessagesArea').prop("scrollHeight")}, 1000);

                    $('#currAudioChatSrc').html('');

                    // hide play and send
                    $('#sendAudio').fadeOut().addClass('d-none');
                    $('#playAudio').fadeOut().addClass('d-none');
                    $('#record_status').fadeOut().addClass('d-none');
                    $('#discardAudio').fadeOut().addClass('d-none');
                    $('#startRecord').fadeIn().removeClass('d-none');
                }else{
                    setTimeout(this.sendAudioRecord,3000);
                }
            },
            resetAudio(){
                $('#currAudioChatSrc').html('');

                // hide play and send
                $('#sendAudio').fadeOut().addClass('d-none');
                $('#playAudio').fadeOut().addClass('d-none');
                $('#record_status').fadeOut().addClass('d-none');
                $('#discardAudio').fadeOut().addClass('d-none');
                $('#startRecord').fadeIn().removeClass('d-none');
                $('#record_status').html('');
            },
            startCount(){
                let counter = 0 ;
                this.timer = setInterval(function () {
                    counter++;
                    if(counter < 10 ){
                        $('#counter').html('0'+counter);
                    }else{
                        $('#counter').html(counter);
                    }
                },1000);
            },
            stopCount(){
                clearInterval(this.timer);
                $('#counter').addClass('d-none');
            }
        },

        mounted(){
            this.getAuthorConversations();

            // listen to new conversations made :
            window.Echo.channel('conversations')
                .listen('ConversationStarted', e => {
                    this.getAuthorConversations();
                });

            // clear messaging :
            if(this.client_id){
                $('#MessagingClient'+this.client_id).addClass('d-none');
            }
            if(this.user_id){
                $('#MessagingFreelancer'+this.user_id).addClass('d-none');
            }
        }
    }
</script>