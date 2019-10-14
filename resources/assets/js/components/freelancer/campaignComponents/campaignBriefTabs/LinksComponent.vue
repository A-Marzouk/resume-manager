<template>
    <div class="faq-question-input">
        <label class="faq-input-label">
            <i class="icon icon-point"></i>
            List of links
        </label>

        <div class="links-saved">
            <div class="" :key="index + 'G'" v-for="(link, index) in links">
               <div class="NoDecor mt-3">
                   <a :href="link.url" target="_blank">- {{link.url}}</a>
               </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LinksComponent",
        props:['campaign'],
        data(){
            return{
                newLink: '',
                editingLink: -1,
                links: [],
            }
        },
        methods:{
        },
        mounted() {
            this.links = this.campaign.links;
        }
    }
</script>

<style scoped>

</style>
