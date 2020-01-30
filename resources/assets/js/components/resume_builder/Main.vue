<template>
    <div class="container">

        <h1 class="mb-5">
            resume builder main structure
        </h1>

        <div class="w-100 d-flex justify-content-around mb-4">
            <router-link to="/resume-builder">
                My account
            </router-link>
            <router-link to="/resume-builder/edit">
                Edit CV
            </router-link>
            <router-link to="/resume-builder/view">
                View CV
            </router-link>
        </div>

        <keep-alive class="mt-5">
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
