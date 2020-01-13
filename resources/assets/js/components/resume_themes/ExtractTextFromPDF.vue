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
                    <hr>
                    <div>
                        <div v-if="freelancerData.skills.length > 0">
                            Skills:
                            <div v-for="(skill,index) in freelancerData.skills" :key="index">
                                <b>{{skill}}</b>
                            </div>
                        </div>
                        <div v-else>
                            Skills : No skills found.
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div v-if="freelancerData.languages.length > 0">
                            Languages:
                            <div v-for="(language,index) in freelancerData.languages" :key="index">
                                <b>{{language}}</b>
                            </div>
                        </div>
                        <div v-else>
                            Languages : No languages found.
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div v-if="freelancerData.links.length > 0">
                            Links:
                            <div v-for="(link,index) in freelancerData.links" :key="index">
                                <b><a href="javascript:void(0)" @click="goToExternalURL(link)" target="_blank">{{link}}</a></b>
                            </div>
                        </div>
                        <div v-else>
                            Links : No links found.
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div v-if="freelancerData.education" >
                            education:
                            <b class="pre-formatted">{{nl2br(freelancerData.education)}}</b>
                        </div>
                        <div v-else>
                            education : No education found.
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div v-if="freelancerData.work_experience" >
                            Work experience:
                            <b class="pre-formatted">{{nl2br(freelancerData.work_experience)}}</b>
                        </div>
                        <div v-else>
                            Work experience : No Work experience found.
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
                    'links': [],
                },
                countryList: [
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
                skillsList: [
                    'JavaScript',
                    'HTML',
                    'CSS.',
                    'SASS',
                    'SQL',
                    'Python',
                    'Java',
                    'Bash/Shell/PowerShell',
                    'C#',
                    'PHP',
                    'TypeScript',
                    // 'C++',
                    'C Language',
                    'Ruby',
                    'Go',
                    'Swift',
                    'Kotlin',
                    'R Language',
                    'VBA',
                    'Objective-C',
                    'Assembly',
                    'Scala',
                    'Rust',

                    'jQuery',
                    'Angular/Angular.js',
                    'React.js',
                    'Meteor.js',
                    'Socket.io',
                    'Cordova',
                    'Android',
                    'Bootstrap',
                    'Keystone.js',
                    'Vue.js',
                    'AWS',
                    'Redux',
                    'Hapi.js',
                    'React Native',
                    'Microservices',
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
                    'Wordpress',

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

                    'Adobe After Effects',
                    'Sketch',
                    'Adobe Illustrator',
                    'Adobe XD',
                    'Photoshop',
                    'Autocad',
                    'Solidworks',
                    'Adobe Flash',
                    'Digital Drawing Tablet',
                    'Adobe Indesign',
                    'CorelDraw',
                    '3d Max'
                ],
                languages : [
                    "Abkhaz",
                    "Afar",
                    "Afrikaans",
                    "Akan",
                    "Albanian",
                    "Amharic",
                    "Arabic",
                    "Aragonese",
                    "Armenian",
                    "Assamese",
                    "Avaric",
                    "Avestan",
                    "Aymara",
                    "Azerbaijani",
                    "Bambara",
                    "Bashkir",
                    "Basque",
                    "Belarusian",
                    "Bengali",
                    "Bihari",
                    "Bislama",
                    "Bosnian",
                    "Breton",
                    "Bulgarian",
                    "Burmese",
                    "Catalan; Valencian",
                    "Chamorro",
                    "Chechen",
                    "Chichewa; Chewa; Nyanja",
                    "Chinese",
                    "Chuvash",
                    "Cornish",
                    "Corsican",
                    "Croatian",
                    "Czech",
                    "Danish",
                    "Divehi; Dhivehi; Maldivian;",
                    "Dutch",
                    "English",
                    "Esperanto",
                    "Estonian",
                    "Faroese",
                    "Fijian",
                    "Finnish",
                    "French",
                    "Fula; Fulah; Pulaar; Pular",
                    "Galician",
                    "Georgian",
                    "German",
                    "Greek, Modern",
                    "Guaraní",
                    "Gujarati",
                    "Haitian; Haitian Creole",
                    "Hausa",
                    "Hebrew (modern)",
                    "Herero",
                    "Hindi",
                    "Hiri Motu",
                    "Hungarian",
                    "Interlingua",
                    "Indonesian",
                    "Interlingue",
                    "Irish",
                    "Igbo",
                    "Inupiaq",
                    "Ido",
                    "Icelandic",
                    "Italian",
                    "Inuktitut",
                    "Japanese",
                    "Javanese",
                    "Kalaallisut, Greenlandic",
                    "Kannada",
                    "Kanuri",
                    "Kashmiri",
                    "Kazakh",
                    "Khmer",
                    "Kikuyu, Gikuyu",
                    "Kinyarwanda",
                    "Kirghiz, Kyrgyz",
                    "Komi",
                    "Kongo",
                    "Korean",
                    "Kurdish",
                    "Kwanyama, Kuanyama",
                    "Latin",
                    "Luxembourgish, Letzeburgesch",
                    "Luganda",
                    "Limburgish, Limburgan, Limburger",
                    "Lingala",
                    "Lao",
                    "Lithuanian",
                    "Luba-Katanga",
                    "Latvian",
                    "Manx",
                    "Macedonian",
                    "Malagasy",
                    "Malay",
                    "Malayalam",
                    "Maltese",
                    "Māori",
                    "Marathi (Marāṭhī)",
                    "Marshallese",
                    "Mongolian",
                    "Nauru",
                    "Navajo, Navaho",
                    "Norwegian Bokmål",
                    "North Ndebele",
                    "Nepali",
                    "Ndonga",
                    "Norwegian Nynorsk",
                    "Norwegian",
                    "Nuosu",
                    "South Ndebele",
                    "Occitan",
                    "Ojibwe, Ojibwa",
                    "Old Church Slavonic, Church Slavic, Church Slavonic, Old Bulgarian, Old Slavonic",
                    "Oromo",
                    "Oriya",
                    "Ossetian, Ossetic",
                    "Panjabi, Punjabi",
                    "Pāli",
                    "Persian",
                    "Polish",
                    "Pashto, Pushto",
                    "Portuguese",
                    "Quechua",
                    "Romansh",
                    "Kirundi",
                    "Romanian, Moldavian, Moldovan",
                    "Russian",
                    "Sanskrit (Saṁskṛta)",
                    "Sardinian",
                    "Sindhi",
                    "Northern Sami",
                    "Samoan",
                    "Sango",
                    "Serbian",
                    "Scottish Gaelic; Gaelic",
                    "Shona",
                    "Sinhala, Sinhalese",
                    "Slovak",
                    "Slovene",
                    "Somali",
                    "Southern Sotho",
                    "Spanish; Castilian",
                    "Sundanese",
                    "Swahili",
                    "Swati",
                    "Swedish",
                    "Tamil",
                    "Telugu",
                    "Tajik",
                    "Thai",
                    "Tigrinya",
                    "Tibetan Standard, Tibetan, Central",
                    "Turkmen",
                    "Tagalog",
                    "Tswana",
                    "Tonga (Tonga Islands)",
                    "Turkish",
                    "Tsonga",
                    "Tatar",
                    "Tahitian",
                    "Uighur, Uyghur",
                    "Ukrainian",
                    "Urdu",
                    "Uzbek",
                    "Venda",
                    "Vietnamese",
                    "Volapük",
                    "Walloon",
                    "Welsh",
                    "Wolof",
                    "Western Frisian",
                    "Xhosa",
                    "Yiddish",
                    "Yoruba",
                    "Zhuang, Chuang"
                ],
            }
        },
        methods: {
            goToExternalURL(link) {
                if (link.includes('http')) {
                    window.open(link, '_blank');

                } else {
                    window.open('http://' + link, '_blank');
                }

            },
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
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },
            clearFreelancerData() {
                this.freelancerData = {
                    'name': '',
                    'phone': '', // done
                    'email': '', // done
                    'job_title': '', // done
                    'country': '', // done
                    'about': '',
                    'work_experience': [],
                    'education': [],
                    'references': [],
                    'skills': [], //done
                    'languages': [], // done
                    'links': [], // done (might need more work for special social links)
                };
            },
            handleFileUpload() {
                this.file = this.$refs.file.files[0];
            },
            searchForData() {
                let arrayOfData = this.arrayOfExtractedText;

                arrayOfData.forEach((textLine) => {
                    // check for single fields:

                    if (!this.freelancerData.email) {
                        this.searchForEmail(textLine);
                    }
                    if (!this.freelancerData.phone) {
                        this.searchForPhone(textLine);
                    }
                    if (!this.freelancerData.job_title) {
                        this.searchForJobTitle(textLine);
                    }
                    if (!this.freelancerData.country) {
                        this.searchForCountry(textLine);
                    }

                    // check for array fields :
                    this.searchForSkills(textLine);
                    this.searchForLanguages(textLine);
                    this.searchForLinks(textLine);

                });

                // check for long text fields like education, work experience and references :

                this.searchForEducationText();
                this.searchForExperienceText();

            },
            searchForEducationText(){
                 this.freelancerData.education = this.extractedText.match(/(?<=Education)[\S\s]*?(?=Languages)/);
            },
            searchForExperienceText(){
                this.freelancerData.work_experience = this.extractedText.match(/(((?<=Experience)[\S\s]*?(?=Education))|((?<=Experience)[\S\s]*?(?=Languages)))/);
            },
            nl2br(str) {
                let breakTag = ' ';
                return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
            },
            searchForEmail(textLine) {
                let cleanTextLine = textLine.replace(/\s/g, "");
                let emailRegex = /([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)/gi;
                if (cleanTextLine.match(emailRegex)) {
                    this.freelancerData.email = cleanTextLine;
                }
            },
            searchForPhone(textLine) {
                let cleanTextLine = textLine.replace(/\s/g, "");
                cleanTextLine = cleanTextLine.replace(/-/g, "");
                let phoneRegex = /(?:(?:\+?([1-9]|[0-9][0-9]|[0-9][0-9][0-9])\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([0-9][1-9]|[0-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?/;
                let arrayOfNumbers = cleanTextLine.match(phoneRegex);
                if (arrayOfNumbers) {
                    this.freelancerData.phone = cleanTextLine;
                }
            },
            searchForLinks(textLine) {
                let cleanTextLine = textLine.replace(/\s/g, "");
                let linkRegex     = /(https?:\/\/(?:www\.|(?!www))[^\s]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,}|[^\s]+\.com|[^\s]+\.net|[^\s]+\.org|[^\s]+\.gov)/gi;
                let link          = cleanTextLine.match(linkRegex);
                if (link !== null) {
                    // check and remove if email  :
                    let emailRegex = /([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)/gi;
                    if(!emailRegex.test(cleanTextLine)){
                        this.freelancerData.links.push(cleanTextLine);
                    }
                }

                this.freelancerData.links = Array.from(new Set(this.freelancerData.links))
            },
            searchForCountry(textLine) {
                // check if any word of the text line is a country name
                let cleanTextLine = textLine.replace(/\s/g, "");
                cleanTextLine = cleanTextLine.replace(/-/g, "");
                for (let i = 0; i < this.countryList.length; i++) {
                    let countryRegex = new RegExp(this.countryList[i], 'ig');
                    if (countryRegex.test(cleanTextLine)) {
                        this.freelancerData.country = textLine;
                        break;
                    }
                }

            },
            searchForJobTitle(textLine) {
                let cleanTextLine = textLine.replace(/\s/g, "");
                let jobTitleRegex = /engineer|developer|designer|programmer|senior|junior|middle/ig;
                if (jobTitleRegex.test(cleanTextLine)) {
                    this.freelancerData.job_title = textLine
                }
            },
            searchForSkills(textLine){
                let cleanTextLine = textLine.replace(/\s/g, "");
                let skillRegex = new RegExp(this.skillsList.join('|'),'ig');
                let skills = cleanTextLine.match(skillRegex) ;
                if(skills !== null){
                    this.freelancerData.skills.push(...skills);
                }
                // filter repeated elements in skills :
                this.freelancerData.skills = Array.from(new Set(this.freelancerData.skills))
            },
            searchForLanguages(textLine){
                let cleanTextLine = textLine.replace(/\s/g, "");
                let languageRegex = new RegExp(this.languages.join('|'),'ig');
                let languages = cleanTextLine.match(languageRegex) ;
                if(languages !== null){
                    this.freelancerData.languages.push(...languages);
                }
                // filter repeated elements in languages :
                this.freelancerData.languages = Array.from(new Set(this.freelancerData.languages))
            }
        },
        mounted() {

        }
    }
</script>

<style scoped>
    .pre-formatted{
        white-space: pre;
    }
</style>
