<template>
    <div class="agentsSection">
        <img class="agentsBg-1" src="/resumeApp/public/images/home/agentsBg-1.svg" alt="">
        <img class="agentsBg-2" src="/resumeApp/public/images/home/agentsBg-2.svg" alt="">
        <img class="agentsBg-3" src="/resumeApp/public/images/home/agentsBg-3.svg" alt="">
        <img src="/resumeApp/public/images/home/pencilsBg.png" alt="" class="pencilsBg">
        <div class="agentsContainer__searchTools">
            <button class="btn-first active">
                Search developers
            </button>
        </div>

        <div class="agentsContainer__searchSelects">

            <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'language'}">
                <select name="language" @change="addSkill($event,'language')" @focus="activeBox = 'language'">
                    <option value="">Programming language</option>
                    <option v-for="(language, index) in customValues.programmingLanguages" :value="language"
                            :key="language + index">{{language}}
                    </option>
                </select>
            </div>

            <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'framework'}">
                <select name="framework" @focus="activeBox = 'framework'"
                        @change="addSkill($event,'framework')">
                    <option value="">Framework/Library</option>
                    <option v-for="(framework, index) in customValues.frameworks" :value="framework"
                            :key="framework + index">{{framework}}
                    </option>
                </select>
            </div>


            <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'database'}">
                <select name="database" @focus="activeBox = 'database'"
                        @change="addSkill($event,'database')">
                    <option value="">Database</option>
                    <option v-for="(database, index) in customValues.databases" :value="database"
                            :key="database + index">{{database}}
                    </option>
                </select>
            </div>

            <div class="agentsContainer__customSelect">
                <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'availability'}">
                    <select name="availability" v-model="searchParams.available_hours"
                            @focus="activeBox = 'availability'" @change="searchDevelopers">
                        <option value="">Availability (all)</option>
                        <option v-for="(availability, index) in customValues.availabilities" :value="availability.value"
                                :key="availability.value + index">{{availability.name}} hours weekly
                        </option>
                    </select>
                </div>
                <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'country'}">
                    <select name="country" v-model="searchParams.country" @focus="activeBox = 'country'"
                            @change="searchDevelopers">
                        <option value="">Country(all)</option>
                        <option v-for="(country, index) in customValues.countries" :value="country"
                                :key="country + index">{{country}}
                        </option>
                    </select>
                </div>
            </div>

            <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'sort'}">
                <select name="sort" v-model="sortValue" @focus="activeBox = 'sort'"
                        @change="sort($event)">
                    <option value="">Sort by</option>
                    <option v-for="(rate, index) in customValues.rateSort" :value="rate.value"
                            :key="rate.value + index">{{rate.label}}
                    </option>
                </select>
            </div>

        </div>

        <img src="/resumeApp/public/images/home/computer.png" alt="computer" class="bottomBg">
        <div>              <!-- search developers -->
            <freelancer-resume-long v-for="developer in featuredDevelopers"
                                    :key="developer.id + developer.firstName + 'A'"
                                    :freelancer="developer" :hire="false" :search="false"></freelancer-resume-long>

            <div v-if="featuredDevelopers.length < 1">
                <div class="mainSection__content__description">
                    Please choose try to change search parameters
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import freelancerCardSmall from '../../components/homeDesigners/freelancerSmallCard'
    import freelancerResume from '../freelancerResume/resumeComponent'
    import freelancerResumeLong from '../freelancerResume/resumeComponentLong'

    export default {
        components: {
            freelancerCardSmall,
            'freelancer-resume': freelancerResume,
            'freelancer-resume-long': freelancerResumeLong
        },

        props: ['featured_developers'],

        data() {
            return {
                results: [],
                sortValue:'',
                featuredDevelopers: [],
                searchParams: {
                    available_hours: '',
                    country: '',
                    skills: '',
                },
                skills:[],

                activeBox: 'jobTitle',

                customValues: {
                    availabilities: [
                        {
                            value: '10',
                            name: '10+'
                        },
                        {
                            value: '20',
                            name: '20+'
                        },
                        {
                            value: '30',
                            name: '30+'
                        },
                        {
                            value: '40',
                            name: '40+'
                        },

                    ],
                    countries: ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua &amp; Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas"
                        , "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia &amp; Herzegovina", "Botswana", "Brazil", "British Virgin Islands"
                        , "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Chad", "Chile", "China", "Colombia", "Congo", "Cook Islands", "Costa Rica"
                        , "Cote D Ivoire", "Croatia", "Cruise Ship", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea"
                        , "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "French West Indies", "Gabon", "Gambia", "Georgia", "Germany", "Ghana"
                        , "Gibraltar", "Greece", "Greenland", "Grenada", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India"
                        , "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kuwait", "Kyrgyz Republic", "Laos", "Latvia"
                        , "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Mauritania"
                        , "Mauritius", "Mexico", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Namibia", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia"
                        , "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal"
                        , "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Pierre &amp; Miquelon", "Samoa", "San Marino", "Satellite", "Saudi Arabia", "Senegal", "Serbia", "Seychelles"
                        , "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "South Africa", "South Korea", "Spain", "Sri Lanka", "St Kitts &amp; Nevis", "St Lucia", "St Vincent", "St. Lucia", "Sudan"
                        , "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor L'Este", "Togo", "Tonga", "Trinidad &amp; Tobago", "Tunisia"
                        , "Turkey", "Turkmenistan", "Turks &amp; Caicos", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay"
                        , "Uzbekistan", "Venezuela", "Vietnam", "Virgin Islands (US)", "Yemen", "Zambia", "Zimbabwe"],
                    programmingLanguages: [
                        'JavaScript',
                        'HTML/CSS',
                        'SQL',
                        'Python',
                        'Java',
                        'Bash/Shell/PowerShell',
                        'C#',
                        'PHP',
                        'TypeScript',
                        'C++',
                        'C',
                        'Ruby',
                        'Go',
                        'Swift',
                        'Kotlin',
                        'R',
                        'VBA',
                        'Objective-C',
                        'Assembly',
                        'Scala',
                        'Rust',
                    ],
                    frameworks: [
                        'jQuery',
                        'Angular/Angular.js',
                        'React.js',
                        'ASP.NET',
                        'Express',
                        'Spring',
                        'Vue.js',
                        'Django',
                        'Flask',
                        'Laravel',
                        'Ruby,on,Rails',
                        'Drupal',
                        'Node.js',
                        '.NET',
                        '.NET,Core',
                        'Pandas',
                        'React,Native',
                        'Ansible',
                        'TensorFlow',
                        'Unity,3D',
                        'Cordova',
                        'Xamarin',
                        'Apache,Spark',
                        'Hadoop',
                        'Flutter',
                        'Wordpress'
                    ],
                    databases: [
                        'MySQL',
                        'PostgreSQL',
                        'Microsoft,SQL,Server',
                        'SQLite',
                        'MongoDB',
                        'Redis',
                        'MariaDB',
                        'Oracle',
                        'Elasticsearch',
                        'Firebase',
                        'DynamoDB',
                        'Cassandra',
                        'Couchbase',
                    ],
                    rateSort:[
                        {
                            label:'Highest rate',
                            value:'high'
                        },
                        {
                            label:'Lowest rate',
                            value:'low'
                        }

                    ]
                }
            }
        },

        methods: {
            searchDevelopers() {
                axios.post('/search-developers', this.searchParams).then((response) => {
                    this.featuredDevelopers = response.data;
                });
            },
            sort(event){
                if(event.target.value === 'high'){
                    this.sortHighest();
                }else{
                    this.sortLowest();
                }
            },
            addSkill(event,type){
                let skill = event.target.value;

                if(this.skills.length < 1){
                    this.searchParams.skills = skill ;
                }else{
                    this.searchParams.skills = this.searchParams.skills + ',' + skill ;
                }

                this.skills.push({
                    title: skill,
                    type: type
                });

                this.searchDevelopers();
            },

            sortLowest(){
                this.featuredDevelopers =  this.featuredDevelopers.sort((a, b) => a.user_data.salary - b.user_data.salary );
            },

            sortHighest(){
                this.featuredDevelopers =  this.featuredDevelopers.sort((b, a) => a.user_data.salary - b.user_data.salary );
            }

        },


        mounted() {
            this.searchParams = {
                available_hours: '',
                country: '',
                skills:''
            };

            this.featuredDevelopers = this.featured_developers;
        }
    }
</script>

<style scoped>
    *:focus {
        outline: 0;
    }

    .list-item {
        display: inline-block;
        margin-right: 10px;
    }

    .list-enter-active, .list-leave-active {
        transition: all 1s;
    }

    .list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */
    {
        opacity: 0;
        transform: translateY(30px);
    }

    .btn-first {
        border-radius: 60px 60px 60px 60px !important;
    }
</style>
