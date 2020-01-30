<template>
    <div class="resume-container">
        <resume-builder-nav></resume-builder-nav>

        <keep-alive class="mt-5 content">
            <router-view></router-view>
        </keep-alive>
    </div>
</template>

<script>
    import ResumeBuilderNav from './includes/nav.vue'
    
    export default {
        name: "Main",
        components: {
            ResumeBuilderNav
        },
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

<style lang="scss">
    .resume-container {
        padding: 160px 100px 30px;
    }
</style>
