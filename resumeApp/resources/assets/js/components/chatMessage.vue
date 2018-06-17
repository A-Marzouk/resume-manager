<template lang="html">
    <div>
        {{ message.message }}<br>
        <small>{{ message.user.firstName }} {{message.user.lastName}}</small>
    </div>
</template>

<script>
    export default {
        props:['message']
    }
</script>

<style lang="css"></style>