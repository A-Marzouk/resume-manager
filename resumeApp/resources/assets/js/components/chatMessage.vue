<template lang="html">
    <div>
        <div v-if="message.visitor !== null">
            <div class="messageText">{{ message.message }}</div>
            <div class="name">{{ message.visitor.firstName }} - {{message.created_at}}</div>
        </div>
        <div v-else-if="message.user !== null">
            <div v-if="message.user.firstName === 'Admin' ">
                <div class="messageTextAdmin">{{ message.message }}</div>
                <div class="name">{{ message.user.firstName }} - {{message.created_at}}</div>
            </div>
            <div v-else>
                <div class="messageText">{{ message.message }}</div>
                <div class="name">{{ message.user.firstName }} - {{message.created_at}}</div>
            </div>
        </div>
        <div v-else-if="message.client !== null">
            <div class="messageText">{{ message.message }}</div>
            <div class="name">{{ message.client.firstName }} - {{message.created_at}}</div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['message']
    }
</script>

<style lang="css">
    .name{
        opacity: 0.6;	color: #697786;
        font-family: Roboto;
        font-size: 12px;
        letter-spacing: 0.08px;
        line-height: 14px;
        padding-bottom:15px;
        padding-top:4px;
    }

    .messageText{
        border-radius: 5px 0 5px 5px;
        background-color: #0D96DB;
        box-shadow: 0 2px 4px 0 rgba(167,169,197,0.55);
        padding:10px;
        color:white;
    }
    .messageTextAdmin{
        border-radius: 5px 5px 5px 0px;
        background-color: whitesmoke;
        box-shadow: 0 2px 4px 0 rgba(167,169,197,0.55);
        padding:10px;
        color:black;
    }
</style>
