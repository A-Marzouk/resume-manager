<template>
    <div>
       <work-history></work-history>
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