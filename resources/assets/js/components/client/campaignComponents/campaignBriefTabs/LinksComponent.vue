<template>
    <div class="faq-question-input">
        <label class="faq-input-label">
            <i class="icon icon-point"></i>
            List of links
        </label>
        <div class="faq-input">
            <input class="bg-gray-input" type="text" placeholder="Add a link you want to share"
                   v-model="newLink">
            <img src="/images/client/campaign_activity/close_black.png"
                 v-on:click="newLink = ''" alt="delete icon" v-show="newLink.length > 0"
            >
        </div>
        <a v-on:click="addLink(newLink)" class="btn btn-link" :class="{disabled: newLink === ''}"
           href="javascript:;">ADD LINK</a>
        <div class="links-saved">
            <div class="faq-question-input" :key="index + 'G'" v-for="(link, index) in links">
                <div class="faq-input">
                    <input :disabled="index !== editingLink" class="saved-link bg-gray-input"
                           type="text" :value="link.url">
                    <img src="/images/client/campaign_activity/edit.png"
                         v-on:click="editingLink = index" alt="edit icon"
                    >
                </div>
                <a v-if="editingLink === index" v-on:click="editLink(index,link.id)"
                   class="btn btn-link" :class="{disabled: links[index] === ''}"
                   href="javascript:;">SAVE LINK</a>
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
            addLink(link) {
                axios.post('/client/camp/links/create', {url: link, campaign_id: this.campaign.id})
                    .then((response) => {
                        this.links.push(response.data);
                        this.newLink = '';
                        this.$emit('showPositiveNotification','Link has been successfully added!');

                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            editLink(index, link_id) {
                let link = document.getElementsByClassName('saved-link')[index].value;
                this.links[index] = {
                    id: link_id,
                    url: link,
                    campaign_id: this.campaign.id
                };
                this.editingLink = -1;


                axios.post('/client/camp/links/update', {id: link_id, url: link})
                    .then((response) => {
                        this.$emit('showPositiveNotification','Link has been successfully edited!');
                    })
                    .catch((error) => {
                        console.log(error);
                    });

            },
        },
        mounted() {
            this.links = this.campaign.links;
        }
    }
</script>

<style scoped>

</style>