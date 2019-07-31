<template>
    <div class="agentsSection">
        <img class="agentsBg-1" src="/resumeApp/public/images/home/agentsBg-1.svg" alt="">
        <img class="agentsBg-2" src="/resumeApp/public/images/home/agentsBg-2.svg" alt="">
        <img class="agentsBg-3" src="/resumeApp/public/images/home/agentsBg-3.svg" alt="">
        <img src="/resumeApp/public/images/home/pencilsBg.png" alt="" class="pencilsBg">
        <div class="agentsContainer__searchTools">
            <button @click="hideSearchDesignersSection" class="btn-first" :class="{active:!searchDesignersSection}">
                Search developers
            </button>
            <button @click="showSearchDesignersSection" class="btn-second" :class="{active:searchDesignersSection}">
                Search designers
            </button>
        </div>

        <div class="agentsContainer__searchSelects">
            <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'jobTitle'}">
                <select name="jobTitle" v-model="searchParams.jobTitle" @focus="activeBox = 'jobTitle'"
                        @change="searchDesigners">
                    <option value="">Choose job title</option>
                    <option v-for="(jobTitle, index) in customValues.jobTitles" :value="jobTitle"
                            :key="jobTitle + index">{{jobTitle}}
                    </option>
                </select>
            </div>
            <div class="agentsContainer__customSelect">
                <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'rate'}">
                    <select name="rate" v-model="searchParams.salary_hour" @focus="activeBox = 'rate'"
                            @change="searchDesigners">
                        <option value="">Choose a rate</option>
                        <option v-for="(rate, index) in customValues.rates" :value="rate.value"
                                :key="rate.value + index"> {{rate.name}} hourly
                        </option>
                    </select>
                </div>
                <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'availability'}">
                    <select name="availability" v-model="searchParams.available_hours"
                            @focus="activeBox = 'availability'" @change="searchDesigners">
                        <option value="">Choose an availability</option>
                        <option v-for="(availability, index) in customValues.availabilities" :value="availability.value"
                                :key="availability.value + index">{{availability.name}} hours weekly
                        </option>
                    </select>
                </div>
                <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'country'}">
                    <select name="country" v-model="searchParams.country" @focus="activeBox = 'country'"
                            @change="searchDesigners">
                        <option value="">Choose a country</option>
                        <option v-for="(country, index) in customValues.countries" :value="country"
                                :key="country + index">{{country}}
                        </option>
                    </select>
                </div>
                <div v-show="!searchDesignersSection" class="agentsContainer__selectContainer" :class="{active: activeBox === 'skills'}">
                    <input type="text" name="skills" v-model="searchParams.skills" @focus="activeBox = 'skills'"
                            @change="searchDesigners" placeholder="Languages, Frameworks.."/>
                </div>
            </div>
        </div>

        <img src="/resumeApp/public/images/home/computer.png" alt="computer" class="bottomBg">
        <div v-show="!searchDesignersSection" class="agentsContainer">              <!-- search developers -->

                <freelancer-resume-long v-for="developer in featuredDevelopers" :key="developer.id + developer.firstName + 'A'"
                                   :freelancer="developer" :hire="false" :search="false"></freelancer-resume-long>

            <div v-if="featuredDevelopers.length < 1">
                <div class="mainSection__content__description">
                    Please choose try to change search parameters
                </div>
            </div>
        </div>
        <div v-show="searchDesignersSection" class="agentsContainer">
                <freelancer-resume v-for="designer in featuredDesigners" :key="designer.id + designer.firstName + 'B'" :freelancer="designer"
                                   :hire="false" :search="true"></freelancer-resume>

            <div v-if="featuredDesigners.length < 1">
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

        props: ['featured_developers','featured_designers'],

        data() {
            return {
                results: [],
                searchDesignersSection: false,

                featuredDevelopers: [],
                featuredDesigners: [],

                searchParams: {
                    jobTitle: '',
                    salary_hour: '',
                    available_hours: '',
                    country: '',
                    skills: '',
                },

                activeBox: 'jobTitle',

                customValues: {
                    jobTitles: [
                        'UI/UX designer',
                        'Illustrator',
                        'Motion designer',
                        'Digital artist'
                    ],
                    rates: [
                        {
                            value: '10',
                            name: 'Max of 10$'
                        },
                        {
                            value: '20',
                            name: 'Max of 20$'
                        },
                        {
                            value: '30',
                            name: 'Max of 30$'
                        },
                        {
                            value: '40',
                            name: 'Max of 40$'
                        },
                        {
                            value: '1000',
                            name: '$$$'
                        },
                    ],
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
                }
            }
        },

        methods: {
            searchDesigners() {
                if(!this.searchDesignersSection){
                    this.searchDevelopers();
                    return ;
                }
                axios.post('/search-designers', this.searchParams).then((response) => {
                    this.featuredDesigners = response.data;
                });
            }, 
            
            searchDevelopers() {
                axios.post('/search-developers', this.searchParams).then((response) => {
                    this.featuredDevelopers = response.data;
                });
            },
            showSearchDesignersSection() {
                this.searchDesignersSection = true;
                this.$emit('update');
            },
            hideSearchDesignersSection() {
                this.searchDesignersSection = false;
                this.$emit('update');
            }
        },


        mounted() {
            this.searchParams = {
                jobTitle: '',
                salary_hour: '',
                available_hours: '',
                country: ''
            };

            this.featuredDevelopers = this.featured_developers ;
            this.featuredDesigners = this.featured_designers ;
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
    .list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
        opacity: 0;
        transform: translateY(30px);
    }
</style>
