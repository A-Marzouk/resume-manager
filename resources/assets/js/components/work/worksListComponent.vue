<template>
    <div>
        <transition-group name="list"
                          class="row">
            <work-history v-for="(work,index) in works" v-bind:key="index" class="list-item workExperience col-12" style="margin: 0px 10px 20px;">

                <div class="d-flex flex-row  justify-content-between">
                    <div>
                        <div class="job-title d-flex align-items-center">
                            <img :src="tab_default_icon" alt="tab icon" class="mr-2 tab-icon">
                            <div>
                                {{work.job_title}}
                            </div>
                        </div>
                        <div>
                            {{work.company}}
                        </div>
                        <div class="d-flex">
                            <div class="mr-2">
                                Start :{{work.date_from}}
                            </div>
                            <div class="mr-2" v-show="work.date_to && work.is_currently_working !== true">
                                End : {{work.date_to}}
                            </div>
                            <div class="mr-2" v-show="work.is_currently_working !== false">
                                - Present
                            </div>
                        </div>

                        <div class="desc" style="color: black;font-family: Roboto;">
                            {{work.job_description}}
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="deleteWorkBtn NoDecor mr-3" @click="deleteWork(work)">
                            <a href="javascript:void(0)">
                                <img src="/images/close_blue.png" alt="edit profile">
                                Delete
                            </a>
                        </div>
                        <div class="deleteWorkBtn NoDecor" @click="editWork(work.id)" style=" width: 75px; margin-right:5px;">
                            <a href="javascript:void(0)" data-target="#addWorkModal" data-toggle="modal">
                                <img src="/images/edit_blue.png" alt="edit profile" style="width: 20px;
            padding-right: 7px;
            padding-bottom: 2px;
            height: 15px;">
                                Edit
                            </a>
                        </div>
                    </div>
                </div>

            </work-history>
        </transition-group>
        <span class="deleteWorkBtn NoDecor" v-show="this.canAdd" @click="clearData" style="width:137px">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#addWorkModal">
                <img src="/images/add_blue.png" alt="edit profile">
                Add work
            </a>
        </span>
        <br/>
        <add-work-modal @workAdded="addWorkHistory"
                        :toBeEditedWork="toBeEditedWork"></add-work-modal>
    </div>
</template>
<script>
    import addWorkModal from './addWorkComponent';

    export default {
        props: ['user_id', 'tab_default_icon'],
        components: {
            'add-work-modal': addWorkModal
        },
        data() {
            return {
                works: [],
                canAdd: true,
                toBeEditedWork: {
                    'id': '',
                    'user_id': this.user_id,
                    'job_title': '',
                    'job_description': '',
                    'company': '',
                    'date_from': '',
                    'date_to': '',
                    'is_currently_working': ''
                }
            }
        },

        methods: {
            getCurrentWorks() {
                axios.get('/freelancer/workshistory?user_id=' + this.user_id).then(
                    (response) => {
                        let currWorks = response.data;
                        $.each(currWorks, function (i) {
                            if (currWorks[i].is_currently_working == "0") {
                                currWorks[i].is_currently_working = false;
                            } else {
                                currWorks[i].is_currently_working = true;
                            }
                        });
                        this.works = currWorks;
                        this.checkMaxWorks();
                    }
                );
            },

            addWorkHistory(newWork) {
                this.works.push(newWork);
                this.checkMaxWorks();
            },

            deleteWork(work) {
                if (!confirm('Are you sure you want to delete this work experience ?')) {
                    return;
                }
                axios.post('/freelancer/deletework', {workHistoryID: work.id}).then((response) => {
                    let works = this.works;
                    $.each(works, function (i) {
                        if (works[i].id === work.id) {
                            works.splice(i, 1);
                            return false;
                        }
                    });

                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    }, 2000);

                    this.checkMaxWorks();

                });
            },

            editWork(workID) {
                let works = this.works;
                let editedWork = {};

                $.each(works, function (i) {
                    if (works[i].id === workID) {
                        editedWork = works[i];
                    }
                });
                this.toBeEditedWork = editedWork;
            },

            checkMaxWorks() {
                if (this.works.length > 4) {
                    this.canAdd = false;
                } else {
                    this.canAdd = true;
                }
            },

            clearData() {
                this.toBeEditedWork = {
                    'id': '',
                    'user_id': this.user_id,
                    'job_title': '',
                    'job_description': '',
                    'company': '',
                    'date_from': '',
                    'date_to': '',
                    'is_currently_working': ''
                };
            }
        },

        created() {
            this.getCurrentWorks();
        }
    }
</script>
<style lang="scss" scoped>
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

    .job-title{
        font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold;
    }

    .tab-icon{
        width:12px;
        height:12px;
    }
</style>
