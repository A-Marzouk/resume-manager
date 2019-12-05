<template>
    <div>
        <div class="d-flex flex-column align-items-center">
            <div class="marginMobile-0">
                <div class="freelancerCard ml-0 mr-0 freelancerCard_updated" style="margin-bottom:-3px">
                    <div class="row actionRow">
                        <div class="importBtn NoDecor">
                            <span>Import : </span>&nbsp;
                            <a href="javascript:void(0)" id="importBehanceData" data-toggle="modal"
                               data-target="#behanceDataModal">Behance </a> &nbsp; | &nbsp;
                            <a href="javascript:void(0)"> linkedIn</a>
                        </div>
                        <div class="importBtn importBtn_upload NoDecor">
                            <a href="javascript:void(0)" class="uploadReferences">
                                Upload References / Testimonials
                            </a>
                        </div>
                        <div class="col-md-2">

                        </div>
                        <div class="progressBtn NoDecor">
                            <a href="javascript:void(0)">
                       <span>
                            70% Complete
                       </span>
                            </a>
                        </div>
                        <div class="editBtn NoDecor" style="margin-left: 10px;">
                            <a href="/freelancer/developer-card">
                                <img src="/images/check_24px.png" alt="finish profile">
                                Finish editing
                            </a>
                        </div>
                    </div>
                </div>


                <div>
                    <div class="freelancerCard m-0 freelancerCard_updated">
                        <div class="resumeCardRight">
                            <div class="row nameRow">
                                <form class="container freelancerForm formDisplay">

                                    <div class="col-lg-2 col-6 imageCol">
                                        <div class="imageContainer" style="padding: 10px;">
                                            <img :src="getImageSrc('')" alt="freelancer" class="freelancerImg"
                                                 width="108" height="108" id="photoPreview_card">
                                            <div class="row NoDecor">
                                                <a class="addImageContainer" href="javascript:void(0)"
                                                   id="addPhoto_card">
                                                    <img src="/images/add_photo.png" alt="add photo">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-12 freelancerCardLeft freelancerCardLeft_edit_card mobile-auto-margin">
                                        <div class="nameArea nameArea_edit_Card">
                                            <div class="nameCard">
                                                <input type="text" class="form-control cardInput"
                                                       id="fullName" name="name"
                                                       placeholder="Enter your name..">
                                            </div>
                                            <div class="jobTitle jobTitle_edit_card"
                                                 style="color: white; font-size: 14px; padding-top: 7px;">
                                                <select class="custom-select cardSelect"
                                                        style="
                                        background-color: rgba(67,103,211,0.5);
                                        background:rgba(67,103,211,0.5) url('/images/white_arrow.png')  no-repeat right .75rem center;
                                        background-size: 19px 11px;
                                        border-radius: 5px;
                                        height: 38px;
                                        border: 1px solid #FFFFFF;
                                        color: #FDFDFD;
                                        font-family: Roboto;
                                        font-size: 13px;
                                        font-weight: bold;
                                        letter-spacing: 0.09px;
                                        line-height: 15px;"
                                                        id="jobTitle" name="jobTitle">
                                                    <option value=""> Option</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-8 col-12 freelancerCardRight">
                                        <div class="row interviewIcons">
                                            <div class="col-md-4 jobTitle text-right d-none d-md-inline"
                                                 style="font-size:12px;color: white; padding-top: 13px; padding-right: 30px;">
                                                Your interviews :
                                            </div>
                                            <div class="col-12 col-lg-4 audioTransArea text-center NoDecor">
                                                <a href="javascript:void(0)" style="outline: none;" id="browseBtn">
                                                    <div class="cardIconsCon  cardIconsCon_edit">
                                                        <span>
                                                            <img src="/images/audio_resume_Card.png"
                                                                 alt="" style="padding-right: 5px; width: 23px;">
                                                            <span class="audioText">
                                                                Upload Audio
                                                            </span>
                                                        </span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-12 col-lg-4 videoArea NoDecor">
                                                <a href="javascript:void(0)" style="outline: none;" class=""
                                                   id="browseBtnVideo">
                                                    <div class="cardIconsCon2 cardIconsCon2_edit text-center">
                                                        <span>
                                                            <img src="/images/video_resume_card.png"
                                                                 alt="" style="padding-right: 5px; width: 23px;">
                                                            <span class="audioText">Upload Video</span>
                                                        </span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="text-center hireRow calculateBox">
                                                <div class="hoursBtn NoDecor"
                                                     style="color:white; background: none; border:none;">
                                                    <div class="row">
                                                        <div class="col-md-2 col-2" style="padding: 9px 0 0 0;">
                                                            <a href="javascript:void(0)"
                                                               class="dollarsMinus">
                                                                <img src="/images/newResume/minus copy 6.png"
                                                                     style="width: 18px; padding-right: 8px;"
                                                                     alt="minus">
                                                            </a>
                                                        </div>

                                                        <div class="col-md-8 col-8 textBox">
                                                            <span>999</span>
                                                            $<br/>
                                                            <span style="font-size: 13px; font-weight: normal">Hourly Rate</span>
                                                        </div>

                                                        <div class="col-md-2 col-2" style="padding: 9px 0 0 0;">
                                                            <a href="javascript:void(0)"
                                                               class="dollarsPlus">
                                                                <img src="/images/newResume/plus copy 6.png"
                                                                     style="width: 18px; padding-left: 8px;" alt="plus">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-center hireRow calculateBox" style="margin-left: 7px;">
                                                <div class="hoursBtn NoDecor"
                                                     style="color:white; background: none; border:none;">
                                                    <div class="row">
                                                        <div class="col-md-2 col-2" style="padding: 9px 0 0 0;">
                                                            <a href="javascript:void(0)"
                                                               class="hoursMinus">
                                                                <img src="/images/newResume/minus copy 6.png"
                                                                     style="width: 18px; padding-right: 8px;"
                                                                     alt="minus">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-8 col-8 textBox">
                                                            <span>0</span>hours<br/>
                                                            <span style="font-size: 13px; font-weight: normal">Weekly Availability</span>
                                                        </div>
                                                        <div class="col-md-2 col-2" style="padding: 9px 0 0 0;">
                                                            <a href="javascript:void(0)"
                                                               class="hoursPlus">
                                                                <img src="/images/newResume/plus copy 6.png"
                                                                     style="width: 18px; padding-left: 8px;" alt="plus">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="file" id="audioFile" name="audioFile"
                                           style="width: 1px; height: 1px; opacity: 0; right:145%;">
                                    <input type="file" id="video_file" name="video_file"
                                           style="width: 1px; height: 1px; opacity: 0; right:145%;">
                                    <input type="file" id="photoInput" name="photo"
                                           style="width: 1px; height: 1px; opacity: 0; right:145%;">
                                    <input type="text" name="salary"
                                           style="width: 1px; height: 1px; opacity: 0; right:145%;">
                                    <input type="text" name="availableHours"
                                           style="width: 1px; height: 1px; opacity: 0; right:145%;">
                                </form>
                            </div>
                        </div>

                        <div id="nav-taps-resume-card">
                            <ul class="nav nav-tabs navRow" role="tablist">

                                <li class="offset-md-2 nav-item col-md-2 col-4 NoDecor">
                                    <a class="nav-link navTab text-center active" href="#skills" role="tab"
                                       data-toggle="tab">
                                        Skills
                                    </a>
                                </li>

                                <li class="col-md-2 col-4 nav-item NoDecor">
                                    <a class="nav-link navTab text-center " href="#recordings" role="tab"
                                       data-toggle="tab">
                                        Recordings
                                    </a>
                                </li>

                                <li class="col-md-2 col-4 nav-item NoDecor">
                                    <a class="nav-link navTab text-center " href="#portfolio" role="tab"
                                       data-toggle="tab">
                                        Projects
                                    </a>
                                </li>


                                <li class="nav-item col-md-2 col-4 NoDecor">
                                    <a class="nav-link navTab text-center" href="#work" role="tab" data-toggle="tab">
                                        Work
                                    </a>
                                </li>
                                <li class="nav-item col-md-2 col-4 NoDecor d-none">
                                    <a class="nav-link navTab text-center" id="showReferences"
                                       href="#references" role="tab" data-toggle="tab">
                                    </a>
                                </li>

                                <li class="nav-item col-md-2 col-4 NoDecor">
                                    <a class="nav-link navTab text-center" href="#education" role="tab"
                                       data-toggle="tab">
                                        Education
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active firstItem" id="skills">
                                    <div class="row" style="padding-bottom: 16px;background: #fdfdfd;">
                                        <div class="col-md-12">
                                            <skills-list :user_id="freelancer.id"></skills-list>
                                        </div>
                                    </div>
                                </div>


                                <div role="tabpanel" class="tab-pane  firstItem" id="recordings">
                                    <div class="row"
                                         style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                                        <div class="col-md-12">
                                            <records-list :user_id="freelancer.id"></records-list>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane firstItem" id="portfolio">
                                    <div class="row"
                                         style="padding-top:17px; padding-bottom: 16px;background: #fdfdfd;">
                                        <div class="col-md-12">
                                            <projects-list :user_id="freelancer.id"></projects-list>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="work">
                                    <div style="padding-top: 17px; padding-bottom: 17px;">
                                        <div class="col-md-12">
                                            <works-list :user_id="freelancer.id"></works-list>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="education">
                                    <div class="" style="padding-top: 17px; padding-bottom: 17px;">
                                        <div class="col-md-12">
                                            <educations-list :user_id="freelancer.id"></educations-list>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="references">
                                    <div class="" style="padding-top: 17px; padding-bottom: 17px;">
                                        <div class="col-md-12">
                                            <references-list :user_id="freelancer.id"></references-list>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import skillList from '../skills/skillsComponent' ;
    import recordsList from '../recordings/recordsListComponent' ;
    import projectsList from '../projects/projectsListComponent' ;
    import worksList from '../work/worksListComponent' ;
    import educationsList from '../education/educationListComponent' ;
    import referencesList from '../references/referencesListComponent' ;

    export default {
        name: "ResumeEditor",
        components: {
            'skills-list': skillList,
            'records-list': recordsList,
            'projects-list': projectsList,
            'works-list': worksList,
            'educations-list': educationsList,
            'references-list': referencesList,
        },
        props: ['freelancer'],
        data() {
            return {}
        },
        methods: {
            getImageSrc(src) {
                if (!src) {
                    return '/images/placeholder.png';
                }

                if (src.charAt(0) !== '/' && src.charAt(0) !== 'h') {
                    return '/' + src;
                }

                return src;
            },
        },
        mounted() {
            console.log(this.freelancer);
        }
    }
</script>

<style scoped>

</style>
