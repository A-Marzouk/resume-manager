<template>
    <div>
        <div class="d-flex flex-column align-items-center">
            <div class="marginMobile-0">
                <div class="freelancerCard ml-0 mr-0 freelancerCard_updated" style="margin-bottom:-3px">
                    <div class="row actionRow d-flex justify-content-between"  :style="getBackgroundColor()">
                        <div class="importBtn NoDecor whiteHover border-0">
                            <span>Import : </span>&nbsp;
                            <a href="javascript:void(0)" id="importBehanceData" data-toggle="modal"
                               data-target="#behanceDataModal">Behance </a> &nbsp; | &nbsp;
                            <a href="javascript:void(0)"> linkedIn</a>
                        </div>
                        <div class="d-flex mr-3">
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
                </div>


                <div>
                    <div class="freelancerCard m-0 freelancerCard_updated">
                        <div class="resumeCardRight">
                            <div class="row nameRow d-flex flex-column" :style="'background-color:' + colors.hex">
                                <div class="d-flex justify-content-end w-100">
                                    <img src="/images/changeColor.png" alt="changeColro" @click="showColorPicker = true" style="width:20px; height:20px;">
                                </div>
                                <form class="container freelancerForm formDisplay">
                                    <div class="col-lg-2 col-6 imageCol">
                                        <div class="imageContainer" style="padding: 10px;">
                                            <img :src="getImageSrc(freelancer.user_data.profile_picture)"
                                                 alt="freelancer" class="freelancerImg"
                                                 width="108" height="108" id="photoPreview_card">
                                            <div class="row NoDecor">
                                                <a class="addImageContainer" href="javascript:void(0)"
                                                   @click="browseFile">
                                                    <img src="/images/add_photo.png" alt="add photo">
                                                </a>
                                            </div>
                                            <input type="file" ref="profile_picture" id="profile_picture"
                                                   style="width: 1px; height: 1px; opacity: 0; right:145%;"
                                                   @change=handleProfilePictureUpload>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-12 freelancerCardLeft freelancerCardLeft_edit_card mobile-auto-margin">
                                        <div class="nameArea nameArea_edit_Card">
                                            <div class="nameCard">
                                                <input type="text" class="form-control cardInput"
                                                       placeholder="Name" v-model="freelancer.user_data.first_name"
                                                       @blur="updateFreelancerCardData">
                                            </div>
                                            <div class="jobTitle jobTitle_edit_card"
                                                 style="color: white; font-size: 14px; padding-top: 7px;">
                                                <input type="text" class="form-control cardSelect"
                                                       placeholder="Job title" v-model="freelancer.user_data.job_title"
                                                       @blur="updateFreelancerCardData">
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
                                                               class="dollarsMinus" @click="changeHourlyRate(-1)">
                                                                <img src="/images/newResume/minus copy 6.png"
                                                                     style="width: 18px; padding-right: 8px;"
                                                                     alt="minus">
                                                            </a>
                                                        </div>

                                                        <div class="col-md-8 col-8 textBox">
                                                            <span>{{Math.trunc(freelancer.agent.hourly_rate)}}</span>
                                                            $<br/>
                                                            <span style="font-size: 13px; font-weight: normal">Hourly Rate</span>
                                                        </div>

                                                        <div class="col-md-2 col-2" style="padding: 9px 0 0 0;">
                                                            <a href="javascript:void(0)"
                                                               class="dollarsPlus" @click="changeHourlyRate(1)">
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
                                                               class="hoursMinus" @click="changeAvailableHours(-5)">
                                                                <img src="/images/newResume/minus copy 6.png"
                                                                     style="width: 18px; padding-right: 8px;"
                                                                     alt="minus">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-8 col-8 textBox">
                                                            <span>{{Math.trunc(freelancer.agent.available_hours_per_week)}}</span>
                                                            hours<br/>
                                                            <span style="font-size: 13px; font-weight: normal">Weekly Availability</span>
                                                        </div>
                                                        <div class="col-md-2 col-2" style="padding: 9px 0 0 0;">
                                                            <a href="javascript:void(0)"
                                                               class="hoursPlus" @click="changeAvailableHours(5)">
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
                                    <input type="text" name="salary"
                                           style="width: 1px; height: 1px; opacity: 0; right:145%;">
                                    <input type="text" name="availableHours"
                                           style="width: 1px; height: 1px; opacity: 0; right:145%;">
                                </form>
                            </div>
                        </div>

                        <div id="nav-taps-resume-card">
                            <ul class="nav nav-tabs navRow" role="tablist">
                                <li class="nav-item col-md-2 col-4 NoDecor" v-for="(tab,index) in mainTabs"
                                    :key="index + 'tab'" :class="{halfOpacity : !tab.is_active}">
                                    <a class="nav-link navTab text-center d-flex align-items-center"
                                       :class="{active : tab.name === currentMainTab.name}"
                                       @click="currentMainTab = tab" :href="'#' + tab.name" :id=" tab.name + '_ref'" role="tab"
                                       data-toggle="tab">
                                        <img src="/images/new_theme/arrow@2x.png" alt="change order" @click="tabToLeft(tab)"
                                             style="transform: rotate(180deg); margin-right:10px; width:7.5px; height:12px;"
                                             class="cursorPointer" v-show="index != 0">
                                        <div>
                                            {{tab.label}}
                                        </div>
                                        <img src="/images/new_theme/arrow@2x.png" class="cursorPointer" alt="" @click="tabToRight(tab)"
                                             style="margin-left:10px; width:7.5px; height:12px;" v-show="index != mainTabs.length-1">
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane firstItem"
                                     :class="{active : currentMainTab.name === 'skills'}" id="skills">
                                    <div class="row" style="padding-bottom: 16px;background: #fdfdfd;">
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-start flex-column align-items-start">
                                                <a href="javascript:void(0)" class="btn btn-sm activeBtn mb-2 mt-2"
                                                   :class="{active : currentMainTab.is_active}"
                                                   @click="toggleTabActive(currentMainTab)">
                                                    <span v-show="currentMainTab.is_active">TAB IS ACTIVE (CLICK TO DEACTIVATE)</span>
                                                    <span v-show="!currentMainTab.is_active">TAB IS NOT ACTIVE (CLICK TO ACTIVATE)</span>
                                                </a>
                                            </div>
                                            <skills-list :user_id="user.id"></skills-list>
                                        </div>
                                    </div>
                                </div>


                                <div role="tabpanel" class="tab-pane firstItem"
                                     :class="{active : currentMainTab.name === 'recordings'}" id="recordings">
                                    <div class="row"
                                         style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-start flex-column align-items-start">
                                                <a href="javascript:void(0)" class="btn btn-sm activeBtn mb-2 mt-2"
                                                   :class="{active : currentMainTab.is_active}"
                                                   @click="toggleTabActive(currentMainTab)">
                                                    <span v-show="currentMainTab.is_active">TAB IS ACTIVE (CLICK TO DEACTIVATE)</span>
                                                    <span v-show="!currentMainTab.is_active">TAB IS NOT ACTIVE (CLICK TO ACTIVATE)</span>
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary" @click="openIconsBar(currentMainTab)">
                                                    Choose tab default icon
                                                </a>
                                                <div class="icons-bar d-flex" v-if="this.openedIconsTabID === currentMainTab.id">
                                                    <div v-for="(icon,index) in iconsList" class="icon" @click="setTabIcon(currentMainTab,'/images/resume_tabs_icons/' + icon)">
                                                        <img :src="'/images/resume_tabs_icons/' + icon"  alt="icon" class="tab-icon">
                                                    </div>
                                                </div>
                                            </div>
                                            <records-list class="mt-3" :user_id="user.id" :tab_default_icon="currentMainTab.default_icon_src"></records-list>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane firstItem"
                                     :class="{active : currentMainTab.name === 'portfolio'}" id="portfolio">
                                    <div class="row"
                                         style="padding-top:17px; padding-bottom: 16px;background: #fdfdfd;">
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-start flex-column align-items-start">
                                                <a href="javascript:void(0)" class="btn btn-sm activeBtn mb-2 mt-2"
                                                   :class="{active : currentMainTab.is_active}"
                                                   @click="toggleTabActive(currentMainTab)">
                                                    <span v-show="currentMainTab.is_active">TAB IS ACTIVE (CLICK TO DEACTIVATE)</span>
                                                    <span v-show="!currentMainTab.is_active">TAB IS NOT ACTIVE (CLICK TO ACTIVATE)</span>
                                                </a>
                                            </div>
                                            <projects-list :user_id="user.id"></projects-list>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="work"
                                     :class="{active : currentMainTab.name === 'work'}">
                                    <div style="padding-top: 17px; padding-bottom: 17px;">
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-start flex-column align-items-start">
                                                <a href="javascript:void(0)" class="btn btn-sm activeBtn mb-2 mt-2"
                                                   :class="{active : currentMainTab.is_active}"
                                                   @click="toggleTabActive(currentMainTab)">
                                                    <span v-show="currentMainTab.is_active">TAB IS ACTIVE (CLICK TO DEACTIVATE)</span>
                                                    <span v-show="!currentMainTab.is_active">TAB IS NOT ACTIVE (CLICK TO ACTIVATE)</span>
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary" @click="openIconsBar(currentMainTab)">
                                                    Choose tab default icon
                                                </a>
                                                <div class="icons-bar d-flex" v-if="this.openedIconsTabID === currentMainTab.id">
                                                    <div v-for="(icon,index) in iconsList" class="icon" @click="setTabIcon(currentMainTab,'/images/resume_tabs_icons/' + icon)">
                                                        <img :src="'/images/resume_tabs_icons/' + icon"  alt="icon" class="tab-icon">
                                                    </div>
                                                </div>
                                            </div>
                                            <works-list class="mt-3" :user_id="user.id" :tab_default_icon="currentMainTab.default_icon_src"></works-list>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="education"
                                     :class="{active : currentMainTab.name === 'education'}">
                                    <div class="" style="padding-top: 17px; padding-bottom: 17px;">
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-start flex-column align-items-start">
                                                <a href="javascript:void(0)" class="btn btn-sm activeBtn mb-2 mt-2"
                                                   :class="{active : currentMainTab.is_active}"
                                                   @click="toggleTabActive(currentMainTab)">
                                                    <span v-show="currentMainTab.is_active">TAB IS ACTIVE (CLICK TO DEACTIVATE)</span>
                                                    <span v-show="!currentMainTab.is_active">TAB IS NOT ACTIVE (CLICK TO ACTIVATE)</span>
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary" @click="openIconsBar(currentMainTab)">
                                                    Choose tab default icon
                                                </a>
                                                <div class="icons-bar d-flex" v-if="this.openedIconsTabID === currentMainTab.id">
                                                    <div v-for="(icon,index) in iconsList" class="icon" @click="setTabIcon(currentMainTab,'/images/resume_tabs_icons/' + icon)">
                                                        <img :src="'/images/resume_tabs_icons/' + icon"  alt="icon" class="tab-icon">
                                                    </div>
                                                </div>
                                            </div>
                                            <educations-list class="mt-3" :user_id="user.id" :tab_default_icon="currentMainTab.default_icon_src"></educations-list>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="references"
                                     :class="{active : currentMainTab.name === 'references'}">
                                    <div class="" style="padding-top: 17px; padding-bottom: 17px;">
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-start flex-column align-items-start">
                                                <a href="javascript:void(0)" class="btn btn-sm activeBtn mb-2 mt-2"
                                                   :class="{active : currentMainTab.is_active}"
                                                   @click="toggleTabActive(currentMainTab)">
                                                    <span v-show="currentMainTab.is_active">TAB IS ACTIVE (CLICK TO DEACTIVATE)</span>
                                                    <span v-show="!currentMainTab.is_active">TAB IS NOT ACTIVE (CLICK TO ACTIVATE)</span>
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary" @click="openIconsBar(currentMainTab)">
                                                    Choose tab default icon
                                                </a>
                                                <div class="icons-bar d-flex" v-if="this.openedIconsTabID === currentMainTab.id">
                                                    <div v-for="(icon,index) in iconsList" class="icon" @click="setTabIcon(currentMainTab,'/images/resume_tabs_icons/' + icon)">
                                                        <img :src="'/images/resume_tabs_icons/' + icon"  alt="icon" class="tab-icon">
                                                    </div>
                                                </div>
                                            </div>
                                            <references-list class="mt-3" :user_id="user.id" :tab_default_icon="currentMainTab.default_icon_src"></references-list>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="behanceDataModal" tabindex="-1" role="dialog"
             aria-labelledby="behanceDataModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="border: none;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                id="closeBehanceModal"
                                style="outline: none;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modalBody">
                        <form method="post" action="" id="behanceDataForm">
                            <div class="form-group d-flex flex-column align-items-start">
                                <label for="behanceLink" class="panelFormLabel">Your Behance profile link :</label>
                                <input type="text" class="form-control panelFormInput" id="behanceLink"
                                       name="behanceLink"
                                       value="" required>
                                <div id="behanceLinkError" class="d-none" style="color: red;">Link is not correct.</div>
                                <div id="behanceLinkWait" class="d-none" style="color: gray;">
                                    Please wait, importing your data from Behance..
                                </div>
                            </div>

                            <div class="modal-footer" style="border: none;">
                                <div class="buttonMain col-md-3 offset-md-9" style="margin-top: 0;">
                                    <button type="submit" class="btn-block hireBtn" id="importBtn">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="colorPicker d-flex flex-column">
            <div class="d-flex mb-2 justify-content-end align-items-center" v-if="showColorPicker">
                <img src="/images/check_black.png" alt="save" class="mr-3 editIcon" style="width:20px; height:18px;" @click="saveColorEdit">
                <img src="/images/close_black.png" alt="cancel" class="editIcon" style="width:24px; height:24px;" @click="cancelColorEdit">
            </div>
            <chrome-picker v-model="colors" v-show="showColorPicker" />
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
    import chrome from 'vue-color/src/components/Chrome'


    export default {
        name: "ResumeEditor",
        components: {
            'skills-list': skillList,
            'records-list': recordsList,
            'projects-list': projectsList,
            'works-list': worksList,
            'educations-list': educationsList,
            'references-list': referencesList,
            'chrome-picker': chrome,
        },
        props: ['user'],
        data() {
            return {
                showColorPicker:false,
                colors:{
                    hex: '#4E75E8',
                },
                oldColors:{
                    hex: '#4E75E8',
                },
                freelancer: {
                    user_data: {},
                    agent: {},
                },
                errors: [],
                profile_picture: '',
                currentMainTab: {},
                mainTabs:[],
                iconsList:[
                    'listicon_1.png',
                    'listicon_2.png',
                    'listicon_3.png',
                    'listicon_4.png',
                    'listicon_5.png',
                    'listicon_6.png',
                    'listicon_7.png',
                    'listicon_8.png',
                    'listicon_9.png',
                    'listicon_10.png',
                ],
                openedIconsTabID:0
            }
        },
        methods: {
            cancelColorEdit(){
                this.colors = this.oldColors;
                this.showColorPicker = false ;
            },

            saveColorEdit(){
                this.oldColors = this.colors;
                this.showColorPicker = false ;
            },
            updateFreelancerCardData() {
                let updatedData = {
                    agent: {
                        hourly_rate: this.freelancer.agent.hourly_rate,
                        available_hours_per_week: this.freelancer.agent.available_hours_per_week,
                    },
                    user_data: {
                        first_name: this.freelancer.user_data.first_name,
                        job_title: this.freelancer.user_data.job_title,
                    },
                    user_id: this.user.id
                };
                axios.post('/agent/resume/editor/submit', updatedData)
                    .then((response) => {

                    })
                    .catch(error => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },
            updateTab(tab) {
                axios.post('/agent/resume/tab/update', tab)
                    .then((response) => {})
                    .catch()
            },
            tabToLeft(myTab){
                let tabs = this.mainTabs ;
                tabs.forEach( (tab,index) => {
                    if(myTab.view_order == tab.view_order){
                        tabs[index].view_order--;
                        tabs[index-1].view_order++;

                        this.updateTab(tabs[index]);
                        this.updateTab(tabs[index-1]);
                    }
                });
                this.sortTabs();
            },
            tabToRight(myTab){
                let tabs = this.mainTabs ;
                tabs.forEach( (tab,index) => {
                    if(myTab.view_order == tab.view_order){
                        tabs[index].view_order++;
                        tabs[index+1].view_order--;

                        this.updateTab(tabs[index]);
                        this.updateTab(tabs[index+1]);
                    }
                });
                this.sortTabs();
            },
            toggleTabActive(tab) {
                tab.is_active = !tab.is_active;
                this.updateTab(tab);
            },
            getImageSrc(src) {
                if (!src) {
                    return '/images/placeholder.png';
                }

                if (src.charAt(0) !== '/' && src.charAt(0) !== 'h' && src.charAt(0) !== 'b') {
                    return '/' + src;
                }

                return src;
            },
            handleProfilePictureUpload() {
                this.profile_picture = this.$refs.profile_picture.files[0];
                this.freelancer.user_data.profile_picture = URL.createObjectURL(this.profile_picture);
                this.uploadProfilePicture();
            },
            uploadProfilePicture() {
                let form_data = new FormData();
                if (this.profile_picture) {
                    form_data.append('profile_picture', this.profile_picture);
                }
                form_data.append('user_id', this.user.id);

                axios.post('/freelancer/account/media/profile_picture', form_data)
                    .then((response) => {
                        if (response.data.errors) {
                            this.errors = response.data.errors;
                            return;
                        }
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    })
            },
            browseFile() {
                $('#profile_picture').click();
            },
            changeAvailableHours(value) {
                this.freelancer.agent.available_hours_per_week = parseInt(this.freelancer.agent.available_hours_per_week) + value;
                this.updateFreelancerCardData();
            },
            changeHourlyRate(value) {
                this.freelancer.agent.hourly_rate = parseInt(this.freelancer.agent.hourly_rate) + value;
                this.updateFreelancerCardData();
            },
            setCurrentTab() {
                this.currentMainTab = this.mainTabs[0];
            },
            createDefaultResumeTab() {
                axios.get('/agent/resume/create-default-tabs/' + this.user.id)
                    .then((response) => {
                            this.user.agent.resume_tabs = response.data;
                            this.setMainTabs();
                        }
                    )
                    .catch()
            },
            setMainTabs(){
                this.mainTabs = this.user.agent.resume_tabs.filter((tab) => {
                    return tab.type === 'main_tab'
                });
                this.setCurrentTab();
            },
            sortTabs(){
                this.mainTabs = _.orderBy(this.mainTabs, 'view_order');
                setTimeout( () => {
                    this.mainTabs.forEach( (tab) => {
                        if(this.currentMainTab.id != tab.id){
                            $('#' + tab.name + '_ref').removeClass('active');
                        }
                    });
                },200);
            },
            setTabIcon(tab,src){
                tab.default_icon_src = src ;
                this.updateTab(tab);
                this.openedIconsTabID = 0 ;
            },
            openIconsBar(tab){
                if(this.openedIconsTabID === tab.id){
                    this.openedIconsTabID = 0 ;
                }else{
                    this.openedIconsTabID = tab.id ;
                }
            },
            getBackgroundColor(){
                if(!this.colors.rgba){
                    return;
                }
                let currentBG = this.colors.rgba ;
                let r = currentBG.r;
                let b = currentBG.b;
                let g = currentBG.g;
                let a = 0.7;

                let bg = `background-color:rgba(${r},${g},${b},${a})`;

                return bg;
            }
        },
        mounted() {
            this.freelancer = this.user;
            if (this.user.agent.resume_tabs.length < 1) {
                this.createDefaultResumeTab();
            } else {
                this.setMainTabs();
            }
        }
    }
</script>

<style scoped lang="scss">

    .whiteHover {
        a:hover {
            color: white;
        }
    }

    #skills {
        padding-top: 17px;
    }

    #work {
        padding-top: 0;
    }

    #nav-taps-resume-card .navRow .navTab.active {
        border-bottom: 5px solid #4E75E8 !important;
    }


    .activeBtn {
        background-color: lightgrey;
        color: black;
    }

    .activeBtn.active {
        background-color: lightgreen;
        color: white;
        font-weight: bold;
    }

    .halfOpacity {
        opacity: 0.5;
    }

    .tab-icon{
        width:25px;
        height:25px;
        margin:10px;
        cursor : pointer ;
    }

    .icons-bar{
        border: #007bff 1px solid;
        border-radius: 5px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .colorPicker{
        position:fixed;
        bottom:40px;
        right:40px;
    }

    .editIcon:hover {
        cursor: pointer;
    }


</style>
