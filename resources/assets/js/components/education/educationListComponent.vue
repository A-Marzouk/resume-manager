<template>
    <div>
        <transition-group name="list"
                          class="row">
            <education-history v-for="(education,index) in educations"
                               v-bind:key="index"
                               class="list-item workExperience col-12"
                               style="margin: 0px 10px 20px;">
        <span class="deleteWorkBtn NoDecor" @click="deleteEducation(education)">
                    <a href="javascript:void(0)">
                        <img src="/images/close_blue.png" alt="edit profile">
                        Delete
                    </a>
                </span>
                <span class="deleteWorkBtn NoDecor" @click="editEducation(education.id)"
                      style=" width: 75px; margin-right:5px;">
                    <a href="javascript:void(0)" data-target="#addEducationModal" data-toggle="modal">
                        <img src="/images/edit_blue.png" alt="edit profile" style="width: 20px;
    padding-right: 7px;
    padding-bottom: 2px;
    height: 15px;">
                        Edit
                    </a>
                </span>
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">{{education.school_title}}</b><br/>
                Start :{{education.date_from}}
                <span v-show="education.date_to && education.is_currently_learning !== true"> End : {{education.date_to}}</span>
                <span v-show="education.is_currently_learning !== false"> - Present</span><br/>
                <div style="color: #30323D;font-family: Roboto;">{{education.description}}</div>
            </education-history>
        </transition-group>
        <span class="deleteWorkBtn NoDecor" v-show="this.canAdd" @click="clearData" style="width:137px">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#addEducationModal">
                <img src="/images/add_blue.png" alt="edit profile">
                Add education
            </a>
        </span>
        <br/>
        <add-education-modal @educationAdded="addEducationHistory"
                             :toBeEditedEducation="toBeEditedEducation"></add-education-modal>
    </div>
</template>
<script>
    import addEducationModal from './addEducationComponent';
    export default {
        props: ['user_id'],
        components:{
            'add-education-modal': addEducationModal
        },
        data() {
            return {
                educations: [],
                canAdd: true,
                toBeEditedEducation: {
                    'id': '',
                    'user_id': this.user_id,
                    'school_title': '',
                    'description': '',
                    'date_from': '',
                    'date_to': '',
                    'is_currently_learning': ''
                }
            }
        },

        methods: {
            getCurrentEducations() {
                axios.get('/freelancer/educationshistory?user_id=' + this.user_id).then(
                    (response) => {
                        let currEducations = response.data;
                        $.each(currEducations, function (i) {
                            if (currEducations[i].is_currently_learning == "0") {
                                currEducations[i].is_currently_learning = false;
                            } else {
                                currEducations[i].is_currently_learning = true;
                            }
                        });
                        this.educations = currEducations;
                        this.checkMaxEducations();
                    }
                );
            },

            addEducationHistory(newEducation) {
                this.educations.push(newEducation);
                this.checkMaxEducations();
            },

            deleteEducation(education) {
                if (!confirm('Are you sure you want to delete this education history ?')) {
                    return;
                }
                axios.post('/freelancer/deleteeducation', {educationHistoryID: education.id}).then((response) => {
                    let educations = this.educations;
                    $.each(educations, function (i) {
                        if (educations[i].id === education.id) {
                            educations.splice(i, 1);
                            return false;
                        }
                    });

                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    }, 2000);

                    this.checkMaxEducations();

                });
            },

            editEducation(educationID) {
                let educations = this.educations;
                let editedEducation = {};

                $.each(educations, function (i) {
                    if (educations[i].id === educationID) {
                        editedEducation = educations[i];
                    }
                });
                this.toBeEditedEducation = editedEducation;
            },

            checkMaxEducations() {
                if (this.educations.length > 4) {
                    this.canAdd = false;
                } else {
                    this.canAdd = true;
                }
            },

            clearData() {
                this.toBeEditedEducation = {
                    'id': '',
                    'user_id': this.user_id,
                    'school_title': '',
                    'description': '',
                    'date_from': '',
                    'date_to': '',
                    'is_currently_learning': ''
                };
            }
        },

        created() {
            this.getCurrentEducations();
        }
    }
</script>
<style lang="css">
    .list-item {
        display: inline-block;
        margin-right: 10px;
    }

    .list-enter-active,
    .list-leave-active {
        transition: all 1s;
    }

    .list-enter,
    .list-leave-to

        /* .list-leave-active below version 2.1.8 */
    {
        opacity: 0;
        transform: translateY(30px);
    }
</style>
