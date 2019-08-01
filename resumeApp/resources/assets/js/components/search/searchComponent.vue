<template>
    <div>
        <div>
            <div>
                <div class="col-12 col-md-6 pb-4 pt-0" v-show="freelancers.length > 0">
                    <span class="panelFormLabel" style="padding-bottom:10px;">Save search to client :</span>
                    <form @submit.prevent="saveSearch">
                        <div class="form-group">
                            <select class="custom-select" id="client_email" name="client_email" v-model="selectedClient" required>
                                <option value="" selected disabled>-- Client email --</option>
                                <option v-for="client in clients " :value="client.email">{{client.email}}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="search_name" class="panelFormLabel">Search name</label>
                            <input type="text" class="form-control" id="search_name" placeholder="" name="search_name" v-model="searchName" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary" id="saveSearchBtn">Save search</button>
                        </div>
                    </form>
                    <div v-show="savedSearchLink">
                        <a class="panelFormLabel" :href="savedSearchLink" target="_blank">Generated public link</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 searchFreelancers">
                <form method="post" action="" class="row" @submit.prevent="updateSearch">
                    <div class="form-group col-md-12">
                        <label for="job_title" class="panelFormLabel">Job title</label>
                        <input type="text" class="form-control" id="job_title" placeholder="Keywords.." name="jobTitle"
                               v-model="searchParams.jobTitle" @change="updateSearch">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="languages" class="panelFormLabel">Languages (en,ru...)</label>
                        <input type="text" class="form-control" id="languages" placeholder="" name="language"
                               v-model="searchParams.language" @change="updateSearch">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="country" class="panelFormLabel">Country</label>
                        <input type="text" class="form-control" id="country" placeholder="" name="country"
                               v-model="searchParams.country" @change="updateSearch">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="city" class="panelFormLabel">city</label>
                        <input type="text" class="form-control" id="city" placeholder="" name="city"
                               v-model="searchParams.city" @change="updateSearch">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="available_hours" class="panelFormLabel">Available hours (per week)</label>
                        <input type="text" class="form-control" id="available_hours" placeholder="" name="available_hours"
                               v-model="searchParams.available_hours" @change="updateSearch">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="salary_hour" class="panelFormLabel">Hourly Rate(max)</label>
                        <input type="text" class="form-control" id="salary_hour" placeholder="" name="salary_hour"
                               v-model="searchParams.salary_hour" @change="updateSearch">
                    </div>


                    <div class="form-group col-md-12">
                        <label for="skills_search" class="panelFormLabel">Skills</label>
                        <input type="text" class="form-control" id="skills_search" placeholder="" name="skills"
                               v-model="searchParams.skills" @change="updateSearch">
                    </div>


                    <div class="form-group col-md-12">
                        <label for="primary_skills" class="panelFormLabel"> Technologies / Frameworks   </label>
                        <input type="text" class="form-control" id="primary_skills" placeholder=""
                               name="primary_skills" v-model="searchParams.primary_skills" @change="updateSearch">
                    </div>
                </form>
                <hr>
            </div>
            <div class="col-md-10">
                <div>
                    <div class="panelFormLabel">Search Results : {{freelancers.length}}</div>
                </div><br/>
                <freelancer-resume v-for="developer in freelancers" :key="developer.id + developer.firstName + 'A'" :freelancer="developer" :hire="false" :search="false"></freelancer-resume>
            </div>
        </div>
    </div>
</template>

<script>
    import freelancerResume from '../freelancerResume/resumeComponent'

    export default {
        components: {
            'freelancer-resume': freelancerResume
        },

        data() {
            return{
                searchParams:{
                    language:'',
                    country:'',
                    city:'',
                    jobTitle:'',
                    salary_hour:'',
                    available_hours:'',
                    skills:'',
                    primary_skills:''
                },
                freelancers:[],
                clients:[],
                selectedClient:'',
                searchName:'',
                savedSearchLink:''
            }
        },

        methods: {
            // get search data
            updateSearch(){
                axios.post('/search',this.searchParams).then((response)=>{
                    this.freelancers = response.data;
                });

                $('#saveSearchBtn').prop('disabled',false);
                $('#saveSearchBtn').html('Save search');
            },
            saveSearch(){
                let freelancers_id = [] ;

                this.freelancers.forEach( (freelancer) => {
                    freelancers_id.push(freelancer.id);
                });
                let SaveData = {
                    client_email : this.selectedClient,
                    search_name : this.searchName,
                    freelancers_id :freelancers_id
                };

                axios.post('/save_search',SaveData).then( (response)=>{
                    let search_id = response.data.search_id;

                    $('#saveSearchBtn').prop('disabled',true);
                    $('#saveSearchBtn').html('Saved');
                    this.savedSearchLink = '/search/'+ search_id ;

                    // send mail to client by the new search
                    let searchMailData = {
                        search_id,
                        client_email:SaveData.client_email
                    };
                    axios.post('client/search_mail',searchMailData).then( (response)=>{
                        console.log(response.data);
                    });

                });

            }
        },

        created() {
            axios.get('/clients/emails').then( (response)=> {
                this.clients= response.data;
            });
        }
    }
</script>

<style lang="css">
    .list-item {
        display: inline-block;
        margin-right: 10px;
    }
    .list-enter-active, .list-leave-active {
        transition: all 1s;
    }
    .list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
        opacity: 0;
        transform: translateY(30px);
    }
</style>