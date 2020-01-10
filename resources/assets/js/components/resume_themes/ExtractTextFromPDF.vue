<template>
    <div>
        <div class="pl-5 pr-5 d-flex flex-column align-items-start ">
            <h2>Please upload your cv in pdf format </h2>
            <hr>
            <div class="form-group">
                <input type="file" ref="file" @change="handleFileUpload">
            </div>
            <a href="javascript:void(0)" class="btn btn-dark" @click="uploadPDFFile">
                Extract text
            </a>

            <div class="row w-100">
                <div class="col-7 border-dark m-3 p-2" style="white-space: pre-line; border: 1px dotted;"
                     v-show="extractedText.length > 0">
                    {{extractedText}}
                </div>
                <div class="col-4 pt-2" v-show="extractedText.length > 0">
                    <div>
                        <div v-if="freelancerData.email">
                            Email: <b>{{freelancerData.email}}</b>
                        </div>
                        <div v-else>
                            Email : No Email.
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div v-if="freelancerData.phone">
                            Phone: <b>{{freelancerData.phone}}</b>
                        </div>
                        <div v-else>
                            Phone : No Phone.
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div v-if="freelancerData.job_title">
                            Job title: <b>{{freelancerData.job_title}}</b>
                        </div>
                        <div v-else>
                            Job title : No job title.
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div v-if="freelancerData.country">
                            Country: <b>{{freelancerData.country}}</b>
                        </div>
                        <div v-else>
                            Country : No country.
                        </div>
                    </div>
                </div>
            </div>

            <div v-show="errors.pdf_cv" style="color: red;" class="mt-3">
                {{errors.pdf_cv}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ExtractTextFromPDF",
        data() {
            return {
                file: '',
                extractedText: '',
                arrayOfExtractedText: '',
                errors: [],
                freelancerData: {
                    'name': '',
                    'phone': '',
                    'email': '',
                    'job_title': '',
                    'about': '',
                    'work_experience': '',
                    'education': '',
                    'references': '',
                    'skills': [],
                    'languages': [],
                },
                countryList : [
                    "Afghanistan",
                    "Albania",
                    "Algeria",
                    "American Samoa",
                    "Andorra",
                    "Angola",
                    "Anguilla",
                    "Antarctica",
                    "Antigua and Barbuda",
                    "Argentina",
                    "Armenia",
                    "Aruba",
                    "Australia",
                    "Austria",
                    "Azerbaijan",
                    "Bahamas (the)",
                    "Bahrain",
                    "Bangladesh",
                    "Barbados",
                    "Belarus",
                    "Belgium",
                    "Belize",
                    "Benin",
                    "Bermuda",
                    "Bhutan",
                    "Bolivia (Plurinational State of)",
                    "Bonaire, Sint Eustatius and Saba",
                    "Bosnia and Herzegovina",
                    "Botswana",
                    "Bouvet Island",
                    "Brazil",
                    "British Indian Ocean Territory (the)",
                    "Brunei Darussalam",
                    "Bulgaria",
                    "Burkina Faso",
                    "Burundi",
                    "Cabo Verde",
                    "Cambodia",
                    "Cameroon",
                    "Canada",
                    "Cayman Islands (the)",
                    "Central African Republic (the)",
                    "Chad",
                    "Chile",
                    "China",
                    "Christmas Island",
                    "Cocos (Keeling) Islands (the)",
                    "Colombia",
                    "Comoros (the)",
                    "Congo (the Democratic Republic of the)",
                    "Congo (the)",
                    "Cook Islands (the)",
                    "Costa Rica",
                    "Croatia",
                    "Cuba",
                    "Curaçao",
                    "Cyprus",
                    "Czechia",
                    "Côte d'Ivoire",
                    "Denmark",
                    "Djibouti",
                    "Dominica",
                    "Dominican Republic (the)",
                    "Ecuador",
                    "Egypt",
                    "El Salvador",
                    "Equatorial Guinea",
                    "Eritrea",
                    "Estonia",
                    "Eswatini",
                    "Ethiopia",
                    "Falkland Islands (the) [Malvinas]",
                    "Faroe Islands (the)",
                    "Fiji",
                    "Finland",
                    "France",
                    "French Guiana",
                    "French Polynesia",
                    "French Southern Territories (the)",
                    "Gabon",
                    "Gambia (the)",
                    "Georgia",
                    "Germany",
                    "Ghana",
                    "Gibraltar",
                    "Greece",
                    "Greenland",
                    "Grenada",
                    "Guadeloupe",
                    "Guam",
                    "Guatemala",
                    "Guernsey",
                    "Guinea",
                    "Guinea-Bissau",
                    "Guyana",
                    "Haiti",
                    "Heard Island and McDonald Islands",
                    "Holy See (the)",
                    "Honduras",
                    "Hong Kong",
                    "Hungary",
                    "Iceland",
                    "India",
                    "Indonesia",
                    "Iran (Islamic Republic of)",
                    "Iraq",
                    "Ireland",
                    "Isle of Man",
                    "Israel",
                    "Italy",
                    "Jamaica",
                    "Japan",
                    "Jersey",
                    "Jordan",
                    "Kazakhstan",
                    "Kenya",
                    "Kiribati",
                    "Korea (the Democratic People's Republic of)",
                    "Korea (the Republic of)",
                    "Kuwait",
                    "Kyrgyzstan",
                    "Lao People's Democratic Republic (the)",
                    "Latvia",
                    "Lebanon",
                    "Lesotho",
                    "Liberia",
                    "Libya",
                    "Liechtenstein",
                    "Lithuania",
                    "Luxembourg",
                    "Macao",
                    "Madagascar",
                    "Malawi",
                    "Malaysia",
                    "Maldives",
                    "Mali",
                    "Malta",
                    "Marshall Islands (the)",
                    "Martinique",
                    "Mauritania",
                    "Mauritius",
                    "Mayotte",
                    "Mexico",
                    "Micronesia (Federated States of)",
                    "Moldova (the Republic of)",
                    "Monaco",
                    "Mongolia",
                    "Montenegro",
                    "Montserrat",
                    "Morocco",
                    "Mozambique",
                    "Myanmar",
                    "Namibia",
                    "Nauru",
                    "Nepal",
                    "Netherlands (the)",
                    "New Caledonia",
                    "New Zealand",
                    "Nicaragua",
                    "Niger (the)",
                    "Nigeria",
                    "Niue",
                    "Norfolk Island",
                    "Northern Mariana Islands (the)",
                    "Norway",
                    "Oman",
                    "Pakistan",
                    "Palau",
                    "Palestine, State of",
                    "Panama",
                    "Papua New Guinea",
                    "Paraguay",
                    "Peru",
                    "Philippines (the)",
                    "Pitcairn",
                    "Poland",
                    "Portugal",
                    "Puerto Rico",
                    "Qatar",
                    "Republic of North Macedonia",
                    "Romania",
                    "Russian Federation (the)",
                    "Rwanda",
                    "Réunion",
                    "Saint Barthélemy",
                    "Saint Helena, Ascension and Tristan da Cunha",
                    "Saint Kitts and Nevis",
                    "Saint Lucia",
                    "Saint Martin (French part)",
                    "Saint Pierre and Miquelon",
                    "Saint Vincent and the Grenadines",
                    "Samoa",
                    "San Marino",
                    "Sao Tome and Principe",
                    "Saudi Arabia",
                    "Senegal",
                    "Serbia",
                    "Seychelles",
                    "Sierra Leone",
                    "Singapore",
                    "Sint Maarten (Dutch part)",
                    "Slovakia",
                    "Slovenia",
                    "Solomon Islands",
                    "Somalia",
                    "South Africa",
                    "South Georgia and the South Sandwich Islands",
                    "South Sudan",
                    "Spain",
                    "Sri Lanka",
                    "Sudan (the)",
                    "Suriname",
                    "Svalbard and Jan Mayen",
                    "Sweden",
                    "Switzerland",
                    "Syrian Arab Republic",
                    "Taiwan (Province of China)",
                    "Tajikistan",
                    "Tanzania, United Republic of",
                    "Thailand",
                    "Timor-Leste",
                    "Togo",
                    "Tokelau",
                    "Tonga",
                    "Trinidad and Tobago",
                    "Tunisia",
                    "Turkey",
                    "Turkmenistan",
                    "Turks and Caicos Islands (the)",
                    "Tuvalu",
                    "Uganda",
                    "Ukraine",
                    "United Arab Emirates (the)",
                    "United Kingdom of Great Britain and Northern Ireland (the)",
                    "United States Minor Outlying Islands (the)",
                    "United States of America (the)",
                    "Uruguay",
                    "Uzbekistan",
                    "Vanuatu",
                    "Venezuela (Bolivarian Republic of)",
                    "Viet Nam",
                    "Virgin Islands (British)",
                    "Virgin Islands (U.S.)",
                    "Wallis and Futuna",
                    "Western Sahara",
                    "Yemen",
                    "Zambia",
                    "Zimbabwe",
                    "Åland Islands"
                ],
            }
        },
        methods: {
            uploadPDFFile() {
                this.errors = [];
                let formData = new FormData();
                formData.append('pdf_cv', this.file);
                axios.post('/pdf/extract-text', formData)
                    .then((response) => {
                        if (response.data.length > 0) {
                            this.extractedText = response.data;
                            this.clearFreelancerData();
                        } else {
                            this.extractedText = 'This file does not contain any text to be extracted!';
                        }
                        this.arrayOfExtractedText = this.extractedText.split("\n");
                        this.searchForData();
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                            console.log(this.errors);
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },
            clearFreelancerData() {
                this.freelancerData = {
                    'name': '',
                    'phone': '',
                    'email': '',
                    'job_title': '',
                    'country': '',
                    'about': '',
                    'work_experience': '',
                    'education': '',
                    'references': '',
                    'skills': [],
                    'languages': [],
                };
            },
            handleFileUpload() {
                this.file = this.$refs.file.files[0];
            },
            searchForData() {
                let arrayOfData = this.arrayOfExtractedText;

                arrayOfData.forEach((textLine) => {
                    // check if this text line is email :
                    if (!this.freelancerData.email) {
                          this.checkForEmail(textLine);
                    }

                    if (!this.freelancerData.phone) {
                        this.checkForPhone(textLine);
                    }

                    if (!this.freelancerData.job_title) {
                         this.checkForJobTitle(textLine);
                    }

                    if (!this.freelancerData.country) {
                       this.checkForCountry(textLine);
                    }

                });

            },
            checkForEmail(textLine) {
                let cleanTextLine = textLine.replace(/\s/g, "");
                let emailRegex = /([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)/gi;
                if(cleanTextLine.match(emailRegex)){
                    this.freelancerData.email = textLine;
                }
            },
            checkForPhone(textLine) {
                let cleanTextLine = textLine.replace(/\s/g, "");
                cleanTextLine = cleanTextLine.replace(/-/g, "");
                let phoneRegex = /(?:(?:\+?([1-9]|[0-9][0-9]|[0-9][0-9][0-9])\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([0-9][1-9]|[0-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?/;
                let arrayOfNumbers =  cleanTextLine.match(phoneRegex);
                if(arrayOfNumbers){
                    this.freelancerData.phone = textLine;
                }
            },
            checkForLinks(textLine) {

            },
            checkForCountry(textLine){
                // check if any word of the text line is a country name
                let cleanTextLine = textLine.replace(/\s/g, "");
                cleanTextLine = cleanTextLine.replace(/-/g, "");
                for (let i = 0; i < this.countryList.length; i++) {
                    let countryRegex = new RegExp(this.countryList[i],'ig');
                    if (countryRegex.test(cleanTextLine)){
                        console.log('Country: ' + textLine);
                        this.freelancerData.country = textLine;
                        break;
                    }
                }

            },
            checkForJobTitle(textLine) {
                let cleanTextLine = textLine.replace(/\s/g, "");
                let jobTitleRegex = /engineer|developer|designer|programmer|senior|junior|middle/ig ;
                if(jobTitleRegex.test(cleanTextLine)){
                    this.freelancerData.job_title = textLine
                }
            }
        },
        mounted() {

        }
    }
</script>

<style scoped>

</style>
