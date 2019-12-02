<template>
    <div>
        <div id="nav-taps-resume">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" @click="setCurrSkillType('programming')">
                    <a class="nav-link text-center active" href="javascript:void(0)" role="tab" data-toggle="tab">
                        Programming Languages
                    </a>
                </li>
                <li class="nav-item" @click="setCurrSkillType('frameworks')">
                    <a class="nav-link text-center" href="javascript:void(0)" role="tab" data-toggle="tab">
                        Frameworks / Databases
                    </a>
                </li>
                <li class="nav-item" @click="setCurrSkillType('design')">
                    <a class="nav-link text-center" href="javascript:void(0)" role="tab" data-toggle="tab">
                        Design Skills
                    </a>
                </li>
                <li class="nav-item" @click="setCurrSkillType('software')">
                    <a class="nav-link text-center" href="javascript:void(0)" role="tab" data-toggle="tab">
                        Software
                    </a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content" style="height: auto !important;">
                <div role="tabpanel" class="tab-pane active firstItem" id="languagesTab">
                    <div class="row" style="padding-top: 17px;background: #fdfdfd;">
                        <div class="col-md-12">
                            <form action="/freelancer/addskill/" method="post" @submit.prevent="addSkill">
                                <div class="form-group">
                                    <input type="text" placeholder="Add new skill" class="form-control" id="skill_title"
                                           name="skill_title"
                                           v-model="currSkill.skill_title"
                                           required
                                           style=" background:white url('/images/add_skill.png')  no-repeat right .75rem center;
                                        background-size: 15px 15px;"
                                    >

                                    <input type="number" min="50" max="100" step="10" placeholder="Percentage %"
                                           class="form-control" v-model="currSkill.percentage" required>

                                    <a href="javascript:void(0)"
                                       v-show="currSkill.skill_title.length > 0 && currSkill.percentage.length > 0"
                                       id="addSKillBtn" @click="addSkill" class="btn btn-outline-dark">Add</a>

                                </div>
                            </form>
                        </div>
                        <div class="col-md-12" style="padding-top: 5px;">
                             <span class="jobTitle" v-show="skills.length < 1">
                                   Your skills section looks empty. Please add your skills.
                             </span>

                            <div @mouseover="highlightSkill(skill,0)"
                                 @mouseleave="highlightSkill(skill,100)"
                                 v-for="(skill,index) in skills" :key="index"
                                 v-show="skill.type === currType"
                                 class="highlightSkill skills">
                                <!-- skill -->
                                <div class="skill text-left">
                                    <!-- title -->
                                    <div class="skill-title">
                                        <img style="width: 17px;padding-bottom: 3px;"
                                             :src="getSkillIconSrc(skill.skill_title)"
                                             alt="skill" :id="'skillImage_' + skill.id">
                                        {{skill.skill_title}}
                                        <button type="button" class="close" style="padding: 2px; outline: none;" @click="deleteSkill(skill)">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- bar -->
                                    <div class="skill-bar" :data-bar="skill.percentage">
                                        <span></span>
                                    </div>
                                </div>
                                <!-- #skill -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props:['user_id'],
        data() {
            return {
                skills: [],
                currSkill: {
                    skill_title: '',
                    type: '',
                    percentage: '',
                },
                currType: '',
            }
        },
        methods: {
            getSkills() {
                axios.get('/freelancer/skills?user_id=' + this.user_id).then(
                    (response) => {
                        this.skills = response.data;
                        setTimeout(() => {
                            this.skillsBar();
                        },500);

                    }
                );
            },
            deleteSkill(skill) {
                axios.post('/freelancer/deleteskill', {skillID: skill.id}).then((response) => {
                    let skills = this.skills;
                    $.each(skills, function (i) {
                        if (skills[i].id === skill.id) {
                            skills.splice(i, 1);
                            return false;
                        }
                    });

                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    }, 2000);

                });
            },
            addSkill() {
                // disable the input :
                $('#skill_title').attr('disabled', true);
                $('#skill_title').css('background-color', 'lightgrey');
                // post data :
                if(this.currSkill.percentage > 100){
                    alert('Percentage can not be greater than 100');
                    return;
                }
                axios.post('/freelancer/addskill',
                    {
                        skill_title: this.currSkill.skill_title,
                        type: this.currType,
                        percentage: this.currSkill.percentage,
                        user_id: this.user_id,
                    }
                ).then((response) => {
                    console.log(response.data);
                    let newSkill = {
                        id: response.data.id,
                        skill_title: this.currSkill.skill_title,
                        type: this.currType,
                        percentage: this.currSkill.percentage
                    };

                    this.skills.push(newSkill);
                    // clear input :
                    this.currSkill.skill_title = '';
                    this.currSkill.percentage = '';
                    // enable the input :
                    $('#skill_title').attr('disabled', false);
                    $('#skill_title').css('background-color', 'white');

                    setTimeout(() => {
                        this.skillsBar();
                    },500);


                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    }, 2000);
                });
            },
            setCurrSkillType(type) {
                this.currType = type;
            },
            highlightSkill(skill, percent) {
                $('#skillImage_' + skill.id).css('filter', 'grayscale(' + percent + '%)');
            },
            getSkillIconSrc(skill_title) {
                let arrayOfSkillImages = {
                    'ui design': '/images/skills_icons/user_interface.png',
                    'ux design': '/images/skills_icons/user_experience.png',
                    'logo design': '/images/skills_icons/logo_design.png',
                    'animation': '/images/skills_icons/animation.jpg',
                    'motion graphics': '/images/skills_icons/motion_graphics.png',
                    'illustration': '/images/skills_icons/illustration.png',
                    'advertising': '/images/skills_icons/advertising.png',
                    'branding': '/images/skills_icons/branding.png',
                    'brochure Design': '/images/skills_icons/brochure_design.png',
                    'website design': '/images/skills_icons/web_design.png',
                    'game designer': '/images/skills_icons/game_designer.png',
                    'character design': '/images/skills_icons/character_design.png',
                    'digital painting': '/images/skills_icons/digital_painting.png',
                    'creative director': '/images/skills_icons/creative_director.png',
                    'html / css': '/images/skills_icons/HTML.png',
                    // 2-

                    'adobe after effects': '/images/skills_icons/AE.png',
                    'sketch': '/images/skills_icons/Sketch.png',
                    'adobe illustrator': '/images/skills_icons/Illustrator.png',
                    'adobe xd': '/images/skills_icons/AdobeXD.png',
                    'photoshop': '/images/skills_icons/Photoshop.png',
                    'autocad': '/images/skills_icons/autocad.png',
                    'solidworks': '/images/skills_icons/solid_works.png',
                    'adobe flash': '/images/skills_icons/adobe_flash.png',
                    'digital drawing Tablet': '/images/skills_icons/digital_drawing_tablet.png',
                    'adobe indesign': '/images/skills_icons/indesign.png',
                    'coreldraw': '/images/skills_icons/corel_draw.png',
                    '3d max': '/images/skills_icons/3d_max.png',

                    // developer :
                    // 1-
                    'javascript': '/images/skills_icons/javascript.png',
                    'sql': '/images/skills_icons/mysql.png',
                    'java': 'resumeApp/resources/assets/images/skills_icons/java.png',
                    'c#': '/images/skills_icons/c#.png',
                    'python': '/images/skills_icons/python.png',
                    'php': '/images/skills_icons/php.png',
                    'c++': '/images/skills_icons/c_language.png',
                    'c': '/images/skills_icons/c_language.png',
                    'typescript': '/images/skills_icons/typescript.png',
                    'ruby': '/images/skills_icons/ruby.png',
                    'objective-C': '/images/skills_icons/objective_c.png',
                    'swift': '/images/skills_icons/swift.png',
                    'vb.net': '/images/skills_icons/vb_net.png',
                    'go': '/images/skills_icons/go.png',
                    'perl': '/images/skills_icons/perl.png',
                    'scala': '/images/skills_icons/scala.png',
                    'groovy': '/images/skills_icons/groovy.png',
                    'assembly': '/images/skills_icons/assembly.png',
                    'coffeescript': '/images/skills_icons/coffeeScript.png',
                    'vba': '/images/skills_icons/vba.png',
                    'r': '/images/skills_icons/r_lang.png',
                    'matlab': '/images/skills_icons/matlab.png',
                    'visual basic 6': '/images/skills_icons/matlab.png',
                    'lua': '/images/skills_icons/lua.png',
                    'haskell': '/images/skills_icons/haskell.png',
                    'html': '/images/skills_icons/HTML.png',
                    'css': '/images/skills_icons/CSS.png',

                    //2-
                    'angularjs': '/images/skills_icons/Angularjs.png',
                    'angular.js': '/images/skills_icons/Angularjs.png',
                    'node.js': '/images/skills_icons/node_js.png',
                    'nodejs': '/images/skills_icons/node_js.png',
                    '.net Core': '/images/skills_icons/netcore.png',
                    'react': '/images/skills_icons/react.png',
                    'cordova': '/images/skills_icons/cordava.png',
                    'firebase': '',
                    'xamarin': '',
                    'hadoop': '/images/skills_icons/hadoop.png',
                    'spark': '/images/skills_icons/spark.png',
                    'mysql': '/images/skills_icons/mysql.png',
                    'sql server': '/images/skills_icons/sql server.png',
                    'postgresql': '/images/skills_icons/postgreSQL.png',
                    'sqlite': '/images/skills_icons/SQLite.png',
                    'mongodb': '/images/skills_icons/mongoDB.png',
                    'oracle': '/images/skills_icons/Oracle.png',
                    'redis': '/images/skills_icons/redis.png',
                    'cassandra': '/images/skills_icons/cassandra.png'
                };
                if (arrayOfSkillImages.hasOwnProperty(skill_title.toLowerCase())) {
                    return arrayOfSkillImages[skill_title.toLowerCase()];
                }
                return '/images/skills_icons/skill.png';
            },
            skillsBar() {
                $(".skills").addClass("active");

                $(".skills .skill .skill-bar span").each(function () {
                    $(this).animate({
                        "width": $(this).parent().attr("data-bar") + "%"
                    }, 1000);
                });

                setTimeout(function () {
                    $(".skills .skill .skill-bar span b").animate({"opacity": "1"}, 1000);
                }, 2000);
            },
        },
        created() {
            this.getSkills();
            this.currType = 'programming';
        },
        mounted() {

        },
    }
</script>

<style lang="scss" scoped>
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

    #addSKillBtn {
        border: 1px lightgray solid;
        margin-bottom: 8px;
        margin-top: 8px;
    }

    @media only screen and (max-width: 600px) {
        #addSKillBtn {
            margin-left: 0px;
        }
    }


    .skills,
    .skills .skill,
    .skills .skill .skill-title,
    .skills .skill .skill-bar {
        width: 100% !important;
        float: left;
    }

    .skills {
        padding: 0px 15px 10px 15px;
    }

    .skills .skill {
        margin-bottom: 30px;
    }

    .skills .skill .skill-title {
        color: #808080;
        margin-bottom: 15px;
        font-weight: 400;
        font-size: 14px;
    }

    .skills .skill .skill-bar {
        width: 0;
        height: 6px;
        background: #f0f0f0;
        transition: 1s cubic-bezier(1, 0, .5, 1);
        -webkit-transition: 1s cubic-bezier(1, 0, .5, 1);
        -ms-transition: 1s cubic-bezier(1, 0, .5, 1);
    }

    .skills.active .skill .skill-bar {
        width: 100%;
    }

    .skills .skill .skill-bar span {
        float: left;
        width: 0%;
        background: #1D91F2;
        height: 6px;
        position: relative;
        transition: 1s cubic-bezier(1, 0, .5, 1);
        -webkit-transition: 1s cubic-bezier(1, 0, .5, 1);
        -ms-transition: 1s cubic-bezier(1, 0, .5, 1);
    }

    .skills .skill .skill-bar span b {
        float: left;
        width: 100%;
        position: relative;
        text-align: right;
        opacity: 0;
        font-size: 14px;
        color: #1D91F2;
        font-weight: 400;
        top: -13px;
    }

</style>


