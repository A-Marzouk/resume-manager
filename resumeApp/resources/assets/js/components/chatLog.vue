<template lang="html">
    <div class="chat-log">
        <chat-message v-for="message in messages" :message="message"
                      v-bind:key="message.text">
        </chat-message>

        <div class="empty" v-show="messages.length === 0" style="padding-top:330px;">
            <div class="messageTextAdmin">Hi, how can I hep you ?</div>
        </div>
    </div>
</template>

<script>
    export default {
       props:['messages']
    }
</script>

<style lang="css"></style>