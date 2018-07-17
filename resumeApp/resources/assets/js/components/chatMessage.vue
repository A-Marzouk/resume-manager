<template lang="html">
    <div>
        <div v-if="message.user !== null">
            <div v-if="message.user.firstName === 'Admin' ">
                <div class="messageTextAdmin">{{ message.message }}</div>
                <div class="name"><b>{{ message.user.firstName }}</b> - {{message.created_at}}</div>
            </div>
            <div v-else-if="message.user.lastName == null">
                <div class="messageTextVisitor">{{ message.message }}</div>
                <div class="name"><b>{{ message.user.firstName }} </b> - {{message.created_at}}</div>
            </div>
            <div v-else-if="message.user.lastName !== null">
                <div class="messageText">{{ message.message }}</div>
                <div class="name"><b>{{ message.user.firstName }}</b> - {{message.created_at}}</div>
            </div>
        </div>
        <div v-else-if="message.visitor !== null">
            <div class="messageText">{{ message.message }}</div>
            <div class="name"><b>{{ message.visitor.firstName }}</b> - {{message.created_at}}</div>
        </div>
        <div v-else-if="message.client !== null">
            <div class="messageText">{{ message.message }}</div>
            <div class="name"><b>{{ message.client.firstName }}</b> - {{message.created_at}}</div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['message']
    }
</script>

<style lang="css">

</style>
