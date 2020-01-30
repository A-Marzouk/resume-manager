<template>
    <div>

        <router-link to="/">
            My account
        </router-link>
        <router-link to="/freelancer/resume-builder/edit">
           Edit CV
        </router-link>
        <router-link to="/freelancer/resume-builder/view">
           View CV
        </router-link>

        <br>
        resume builder
        <br/>

        <keep-alive>
            <router-view></router-view>
        </keep-alive>
    </div>
</template>

<script>
    export default {
        name: "Main",
        data(){
            return{

            }
        },
        methods:{

        },
        mounted() {
            console.log();
        }
    }
</script>

<style scoped>

</style>
