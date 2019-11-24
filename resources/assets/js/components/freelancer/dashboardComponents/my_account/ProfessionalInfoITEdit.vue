<template>
    <div class="d-flex justify-content-center">
        <div class="account-info-edit-wrapper flex-column d-flex align-items-center">
            <nav class="navbar navbar-light fixed-top dashboard_navbar">
                <div class="backBtn">
                    <a href="/freelancer/dashboard/my-account">
                        <img src="/images/client/arrow_back.png" alt="back-icon">
                    </a>
                    PROFESSIONAL INFORMATION
                </div>
            </nav>


            <div class="container" style="display: flex;justify-content: center;">
                <div class="notificationBar" id="notificationBar" style=" display:none; position:fixed;">
                    <div>
                        {{notificationMessage}}
                    </div>
                    <a href="javascript:void(0)" @click="hideNotification" class="no-decoration" style="color: white;">
                        x
                    </a>
                </div>
            </div>

            <div class="account-info-edit dashboard-box">
                <div class="account-info-edit-heading dashboard-box-heading">
                    <div class="left">
                        <img src="/images/client/my_account/info_40px.png" alt="info icon">
                        <span>
                        EDIT PROFESSIONAL INFORMATION
                    </span>
                    </div>
                </div>

                <div class="account-edit-section">
                    <div class="account-edit-section-inputs">
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter primary job title
                            </label>
                            <div class="faq-input">
                                <input type="text" v-model="agentData.job_title" name="faq"
                                       placeholder="Full-stack developer">
                                <img src="/images/client/campaign_activity/close_black.png" v-show="agentData.job_title" alt="delete icon"
                                     @click="clearInput('job_title')">
                            </div>
                            <div class="error" v-if="errors.job_title">
                                {{errors.job_title[0]}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Specify available hours per week
                            </label>
                            <div class="faq-input">
                                <input type="number" min="0" max="99" step="1" name="faq" placeholder="40"
                                       v-model="agentData.available_hours_per_week">
                                <img src="/images/client/campaign_activity/close_black.png" v-show="agentData.available_hours_per_week" alt="delete icon"
                                     @click="clearInput('available_hours_per_week')">
                            </div>
                            <div class="error" v-if="errors.available_hours_per_week">
                                {{errors.available_hours_per_week[0]}}
                            </div>
                        </div>
                    </div>

                    <div class="account-edit-section-heading">
                        SALARY DETAILS
                    </div>

                    <div class="account-edit-section-inputs">
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter rate per hour
                            </label>
                            <div class="faq-input small">
                                <input type="number" min="3" max="99" v-model="agentData.hourly_rate"
                                       name="faq"
                                       placeholder="Rate in USD">
                                <img src="/images/client/campaign_activity/close_black.png" v-show="agentData.hourly_rate"  alt="delete icon"
                                     @click="clearInput('hourly_rate')">
                            </div>
                            <div class="error" v-if="errors.hourly_rate">
                                {{errors.hourly_rate[0]}}
                            </div>
                        </div>

                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter monthly salary (Part-time)
                            </label>
                            <div class="faq-input small">
                                <input type="number" min="50" max="10000" v-model="agentData.monthly_salary_part_time" placeholder="Part-time salary in USD">
                                <img src="/images/client/campaign_activity/close_black.png" v-show="agentData.monthly_salary_part_time"    alt="delete icon"
                                     @click="clearInput('monthly_salary_part_time')">
                            </div>
                            <div class="error" v-if="errors.monthly_salary_part_time">
                                {{errors.monthly_salary_part_time[0]}}
                            </div>
                        </div>

                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter monthly salary (Full-time)
                            </label>
                            <div class="faq-input small">
                                <input type="number" min="100" max="10000" v-model="agentData.monthly_salary" placeholder="Full-time salary in USD">
                                <img src="/images/client/campaign_activity/close_black.png" v-show="agentData.monthly_salary"   alt="delete icon"
                                     @click="clearInput('monthly_salary')">
                            </div>
                            <div class="error" v-if="errors.monthly_salary">
                                {{errors.monthly_salary[0]}}
                            </div>
                        </div>


                    </div>

                    <div class="account-edit-section-heading">
                        PRIMARY SKILLS
                    </div>
                    <div class="account-edit-section-inputs">
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Programming language
                            </label>
                            <div class="faq-input small">
                                <div class="select-icon"></div>
                                <select class="form-control" id="language" style="height: 56px;"
                                        v-model="agentData.programming_language1">
                                    <option value="" disabled>-- Language --</option>
                                    <option :value="language" v-for="(language,index) in customValues.programmingLanguages"
                                            :key="index">
                                        {{language}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Framework
                            </label>
                            <div class="faq-input small">
                                <div class="select-icon"></div>
                                <select class="form-control" id="framework" style="height: 56px;"
                                        v-model="agentData.framework1">
                                    <option value="" disabled>-- Framework --</option>

                                    <option :value="framework" v-for="(framework,index) in customValues.frameworks"
                                            :key="index">
                                        {{framework}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Database
                            </label>
                            <div class="faq-input small">
                                <div class="select-icon"></div>
                                <select class="form-control" id="database1" style="height: 56px;"
                                        v-model="agentData.database1">
                                    <option value="" disabled>-- Database --</option>
                                    <option :value="database" v-for="(database,index) in customValues.databases"
                                            :key="index">
                                        {{database}}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="account-edit-section-heading">
                        SECONDRY SKILLS
                    </div>
                    <div class="account-edit-section-inputs">
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Programming language
                            </label>
                            <div class="faq-input small">
                                <div class="select-icon"></div>
                                <select class="form-control" id="language2" style="height: 56px;"
                                        v-model="agentData.programming_language2">
                                    <option value="" disabled>-- Language --</option>

                                    <option :value="language" v-for="(language,index) in customValues.programmingLanguages"
                                            :key="index">
                                        {{language}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Framework
                            </label>
                            <div class="faq-input small">
                                <div class="select-icon"></div>
                                <select class="form-control" id="framework2" style="height: 56px;"
                                        v-model="agentData.framework2">
                                    <option value="" disabled>-- Framework --</option>
                                    <option :value="framework" v-for="(framework,index) in customValues.frameworks"
                                            :key="index">
                                        {{framework}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Database
                            </label>
                            <div class="faq-input small">
                                <div class="select-icon"></div>
                                <select class="form-control" id="database2" style="height: 56px;"
                                        v-model="agentData.database2">
                                    <option value="" disabled>-- Database --</option>
                                    <option :value="database" v-for="(database,index) in customValues.databases"
                                            :key="index">
                                        {{database}}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="account-edit-section flex-row flex-wrap justify-content-between sub-section">

                    <div class="account-edit-section-edit-btn no-decoration">
                        <a href="javascript:void(0)" @click="submitForm">
                            SAVE & CONTINUE
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {},
                agent: {},
                errors: [],
                agentData: {
                    'job_title': this.$attrs.current_user.user_data.job_title,
                    'available_hours_per_week': this.$attrs.current_user.agent.available_hours_per_week,


                    'framework1':  this.getSkill('frameworks',0),
                    'framework2':  this.getSkill('frameworks',1),

                    'programming_language1': this.getSkill('programming',0),
                    'programming_language2': this.getSkill('programming',1),



                    'database1': this.getSkill('database',0),
                    'database2':  this.getSkill('database',1),

                    'hourly_rate':  this.$attrs.current_user.agent.hourly_rate,
                    'monthly_salary_part_time': this.$attrs.current_user.agent.monthly_salary_part_time,
                    'monthly_salary': this.$attrs.current_user.agent.monthly_salary,
                },
                customValues: {
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
                },
                isLoading: false,
                notificationMessage: '',
            }
        },
        methods: {
            getSkill(skillType,order){
                let filteredSkills = this.$attrs.current_user.skills.map( (skill) => {
                    if(skill.type === skillType){
                        return skill.skill_title;
                    }
                });

                let filtered = filteredSkills.filter(function (el) {
                    return el != null;
                });

                return filtered[order];
            },
            submitForm() {
                let form_data = new FormData();

                $.each(this.agentData, (field) => {
                    form_data.append(field, this.agentData[field]);
                });

                this.clearErrors();

                axios.post('/freelancer/developer/professional/submit', form_data)
                    .then((response) => {
                        this.showSuccessMessage();
                        window.location.href = '/freelancer/media/edit';
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    })
            },
            clearErrors() {
                $.each(this.errors, (error) => {
                    this.errors[error] = '';
                });

            },
            clearInput(field) {
                this.agentData[field] = '';
            },
            showSuccessMessage() {
                $('.notificationBar').css('background', '#FFBA69');
                this.notificationMessage = 'Professional information has been successfully updated!';
                $('#notificationBar').fadeIn(600);
                setTimeout(() => {
                    $('#notificationBar').fadeOut(1500);
                }, 4000);
            },
            hideNotification() {
                $('#notificationBar').css('display', 'none');
            },
        },
        create() {

        }
    }
</script>

<style scoped lang="scss">

    .notificationBar {
        margin-top: -8px;
        z-index: 2;
        width: 1164px;
    }


    @media screen and (max-width: 1270px) {
        .notificationBar {
            width: 96%;
        }
    }

    .main-box-margin {
        margin-top: 22px;
    }


    .faq-input.small {
        width: 250px !important;
        max-width: 100%;


        @media (max-width: 1240px) {
            width: 307px !important;
        }
        @media (max-width: 600px) {
            width: 100% !important;
        }
    }

    .no-decoration{
        a:hover{
            color:white;
        }
    }

</style>
