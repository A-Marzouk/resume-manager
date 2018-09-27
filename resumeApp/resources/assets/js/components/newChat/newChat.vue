<template>
    <div>
        <div class="row">
            <div class="col-md-3 text-left">
                <!-- here goes all conversations related to the signed in client -->
                <div v-for="data in conversations">
                    <a href="javascript:void(0)" @click="setCurrentConversation(data.conversation.id)">
                        <div class="freelancerChatBox">
                            {{data.freelancer.firstName}}
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-8">
                <!-- here goes the chat itself -->
                <div v-for="message in currentMessagesList" :class="{ clientMessage : message.client_id , freelancerMessage : message.user_id, defaultMessage: !message.user_id && !message.client_id}">
                    {{message.message}}
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
                newMessage:''
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
                    }
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
                if( this.conversations.length > 0){
                    this.setCurrentConversation(this.conversations[0].conversation.id);
                }
            }
        },

        mounted(){
            this.getAuthorConversations();
        }
    }
</script>