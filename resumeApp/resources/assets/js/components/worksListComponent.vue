<template>
    <div>
       <work-history v-for="work in works"  v-bind:key="work.text">
           <b>{{work.job_title}}</b><br/>
               {{work.company}}<br/>
               {{work.job_description}}
       </work-history>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                works:[],
            }
        },

        methods:{
            getCurrentWorks(){
                axios.get('/freelancer/workshistory').then(
                    (response) => {
                        this.works = response.data;
                        console.log(this.works);
                    }
                );
            }
        },

        created(){
            this.getCurrentWorks();
        }
    }
</script>