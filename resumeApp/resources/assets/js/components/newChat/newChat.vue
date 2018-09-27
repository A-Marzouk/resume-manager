<template>
    <div>
        <div class="row">
            <div class="col-md-3 text-left">
                <!-- here goes all conversations related to the signed in client -->
                <div v-for="data in conversations" class="NoDecor">
                    <a href="javascript:void(0)" @click="setCurrentConversation(data.conversation.id)">
                        <div class="freelancerChatBox">
                            <div v-show="client_id">
                                Freelancer : {{data.freelancer.firstName}} {{data.freelancer.lastName}} <br/>
                            </div>
                            <div v-show="user_id">
                                Client : {{data.client.firstName}}
                            </div>
                            <!--Unreaded messages : {{data.conversation.unread_messages_count}}-->
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-8">
                <!-- here goes the chat itself -->
                <div v-for="message in currentMessagesList">
                    <div :class="{ clientMessage : message.client_id , freelancerMessage : message.user_id, defaultMessage: !message.user_id && !message.client_id}">
                        <span v-show="message.client_id" class="panelFormLabel">{{currClient.firstName}} : </span>
                        <span v-show="message.user_id" class="panelFormLabel">{{currFreelancer.firstName}} : </span>
                        {{message.message}}
                        <div class="text-right">
                            <small v-show="message.created_at !== undefined">{{new Date(message.created_at).toDateString()}}</small>
                        </div>
                    </div>
                </div>
                <small id="status" class="panelFormLabel" style="margin: 10px;"></small>

                <div class="form-group" style="padding-top: 25px;">
                    <input type="text" class="form-control panelFormInput" v-model="newMessage" @keyup.enter="sendMessage">
                </div> <!-- message input -->
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
                newMessage:'',
                currFreelancer:{},
                currClient:{}
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

                // listen to this conversation to add the message.
                window.Echo.channel('chat.'+this.currentConversation.id)
                    .listen('MessageSent', e => {
                        if(e.message.conversation_id === this.currentConversation.id){
                            this.currentMessagesList.push(e.message);
                        }else{
                            this.conversations.forEach( (data) => {
                                if(data.conversation.id === e.message.conversation_id){
                                    data.conversation.unread_messages_client = data.conversation.unread_messages_client +1 ;
                                    data.conversation.unread_messages_freelancer = data.conversation.unread_messages_freelancer +1 ;
                                }
                            });
                        }
                    });

                this.currentConversation.unread_messages_count_client = 0 ;
                this.currentConversation.unread_messages_count_freelancer = 0 ;
                axios.post('/chat-room/allRead',{conversation_id:this.currentConversation.id}).then( (response)=>{
                    console.log('cleared');
                });
                this.setConversationMessages();
            },
            setConversationMessages(){
                axios.get('/chat-room/messages/'+this.currentConversation.id).then( (response) => {
                    this.currentMessagesList = response.data;
                });
            },
            sendMessage(){
                let message = {
                    conversation_id : this.currentConversation.id,
                    message : this.newMessage,
                    client_id: this.client_id,
                    user_id: this.user_id
                };
                // clear input :
                this.currentMessagesList.push(message);
                $('#status').html('Sending..');
                this.newMessage = '' ;
                axios.post('/chat-room/addMessage',message).then((response) => {
                   $('#status').html('Sent');
                });

            },

            setDefaultConversation(){
                if(this.currentConversation.id !== undefined){
                    this.setCurrentConversation(this.currentConversation.id);
                }
                else if( this.conversations.length > 0){
                    this.setCurrentConversation(this.conversations[0].conversation.id);
                }
            },
            updateUnReadMessageCount($conversation_id , $newNumber){

            }
        },

        mounted(){
            this.getAuthorConversations();
        }
    }
</script>