<template>
    <div>
       <work-history v-for="work in works"  v-bind:key="work.text">
           <b>{{work.job_title}}</b><br/>
               {{work.company}}<br/>
               {{work.job_description}}<br/>
               {{work.date_from}} <span v-show="work.date_to"> - {{work.date_to}}</span>
       </work-history>
        <br/>
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addWorkModal">
            Add work experience
        </button>
        <add-work-modal @workAdded="addWorkHistory"></add-work-modal>
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
                    }
                );
            },

            addWorkHistory(newWork){
                this.works.push(newWork);
            }
        },

        created(){
            this.getCurrentWorks();
        }
    }
</script>