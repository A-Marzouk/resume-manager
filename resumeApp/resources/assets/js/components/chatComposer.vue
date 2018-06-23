<template lang="html">
    <div>
        <div class="chat-composer">
            <input type="text" class="" placeholder=" Type your message.." v-model="messageText"
                   v-on:keydown.enter="sendMessage" autofocus id="sendMessage">
            <button class="btn btn-primary" @click="sendMessage">Send</button>
        </div>
        <div>
            <!--<small class="typing">Typing...</small>-->
        </div>
    </div>

</template>

<script>
    export default {
        data(){
            return {
                messageText: ''
            }
        },
        methods:{
            sendMessage(){
                // emit an event : ( event name, data )
                this.$emit('messagesent',{
                    message: this.messageText,
                    user : {
                        firstName : 'Current',
                        lastName  : 'User'
                    },
                    pageUrl       : window.location.pathname
                });
                this.messageText = '';
            }
        }
    }
</script>

<style lang="css">
    .chat-composer{
        display:flex;
    }
    .chat-composer input{
        flex: 1 auto;
    }

    .typing{
        opacity: 0.6;	color: #697786;
        font-family: Roboto;
        font-size: 12px;
        letter-spacing: 0.08px;
        line-height: 14px;
        padding-bottom:15px;
        padding-top:4px;
    }

</style>