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
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active firstItem" id="languagesTab">
                    <div class="row" style="padding-top: 17px;background: #fdfdfd;">
                        <div class="col-md-9" style="padding-top: 5px;">
                             <span class="jobTitle" v-show="skills.length < 1">
                                   Your skills section looks empty. Please add your skills.
                             </span>
                           <transition-group name="list" class="row">
                               <div v-show="skill.type == currType" v-for="(skill,index) in skills"
                                    v-bind:key="index"
                                    class="list-item text-center skillView col-3"
                                    style="background: whitesmoke;border-radius: 10px; margin-top:5px; margin-bottom:5px;"
                               >
                                   <b style="color: #697786;font-family: Roboto;font-size: 16px;font-weight: 300;line-height: 24px;">
                                       {{skill.skill_title}}
                                       <button type="button" class="close" style="padding: 2px; outline: none;" @click="deleteSkill(skill)">
                                           <span aria-hidden="true">&times;</span>
                                       </button>
                                    </b>
                                </div>
                            </transition-group>
                        </div>
                        <div class="col-md-3">
                            <form action="/freelancer/addskill/" method="post" @submit.prevent="addSkill">
                                <div class="form-group">
                                    <input type="text" placeholder="Add new skill" class="form-control" id="skill_title"
                                           name="skill_title"
                                           v-model="currSkill.skill_title"
                                           required
                                           style=" background:white url('/resumeApp/resources/assets/images/add_skill.png')  no-repeat right .75rem center;
                                        background-size: 15px 15px;"
                                    >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data(){
            return{
                skills:[],
                currSkill:{
                    skill_title:'',
                    type:''
                },
                currType:''
            }
        },
        methods:{
            getSkills(){
                axios.get('/freelancer/skills').then(
                    (response) => {
                        this.skills = response.data;
                    }
                );
            },
            deleteSkill(skill){
                axios.post('/freelancer/deleteskill',{skillID:skill.id}).then((response)=>{
                    let skills = this.skills;
                    $.each(skills, function(i){
                        if(skills[i].id === skill.id) {
                            skills.splice(i,1);
                            return false;
                        }
                    });

                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);

                });
            },
            addSkill(){
                // disable the input :
                $('#skill_title').attr('disabled',true);
                $('#skill_title').css('background-color','lightgrey');
                // post data :
                axios.post('/freelancer/addskill',
                    {
                        skill_title : this.currSkill.skill_title,
                        type: this.currType
                    }
                    ).then( (response) => {
                    let newSkill = {
                        id:response.data.id,
                        skill_title : this.currSkill.skill_title,
                        type :this.currType
                    };

                    this.skills.push(newSkill);
                    // clear input :
                    this.currSkill.skill_title = '';
                    // enable the input :
                    $('#skill_title').attr('disabled',false);
                    $('#skill_title').css('background-color','white');
                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);
                });
            },
            setCurrSkillType(type){
                this.currType = type ;
            }
        },
        created() {
            this.getSkills();
            this.currType = 'programming';
        }
    }
</script>

<style lang="css">
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


