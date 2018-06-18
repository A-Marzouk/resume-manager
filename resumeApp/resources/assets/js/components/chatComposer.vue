<template lang="html">
    <div class="chat-composer">
        <input type="text" placeholder="Type your message.." v-model="messageText"
        v-on:keydown.enter="sendMessage">
        <button class="btn btn-primary" @click="sendMessage">Send</button>
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
                    }
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

</style>