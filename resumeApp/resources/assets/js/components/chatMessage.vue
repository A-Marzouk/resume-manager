<template lang="html">
    <div>
        <div v-if="message.user !== null">
            <div v-if="message.user.firstName === 'Admin' ">
                <div class="messageTextAdmin">{{ message.message }}</div>
                <div class="name">{{ message.user.firstName }} - {{message.created_at}}</div>
            </div>
            <div v-else-if="message.user.lastName == null">
                <div class="messageTextVisitor">{{ message.message }}</div>
                <div class="name">{{ message.user.firstName }}  {{message.created_at}}</div>
            </div>
            <div v-else-if="message.user.lastName !== null">
                <div class="messageText">{{ message.message }}</div>
                <div class="name">{{ message.user.firstName }}  {{message.created_at}}</div>
            </div>
        </div>
        <div v-else-if="message.visitor !== null">
            <div class="messageText">{{ message.message }}</div>
            <div class="name">{{ message.visitor.firstName }} - {{message.created_at}}</div>
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
       	border-radius: 0px 10px 10px 10px;
        background-color: #0D96DB;
        box-shadow: 0 2px 4px 0 rgba(167,169,197,0.55);
        padding:10px;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0.1px;
        line-height: 16px;
    }
    .messageTextAdmin{
        border: 1px solid #D5D8DE;
        border-radius: 10px 0 10px 10px;
        background-color: #FFFFFF;
        padding:10px;
        color: #697786;	font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0.1px;
        line-height: 16px;
    }

    .messageTextVisitor{
        border-radius: 10px 10px 10px 10px;
        background-color: #b3d7ff;
        box-shadow: 0 2px 4px 0 rgba(167,169,197,0.55);
        padding:10px;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0.1px;
        line-height: 16px;
    }
</style>
