<template>
    <div id="profileTab" class="profile-hold">
        <div class="section-title">
            <div class="title-light">Edit</div>
            <h2>Profile</h2>
        </div>

        <div class="achievements-bar">
            <div class="bar-item" v-for="(tabName,i) in tabsProfile" :key="i" :index="i" :item="tabName" @click="selectedTab = tabName" :class="{ active : selectedTab === tabName}" >
                {{tabName}}
            </div>
        </div>
        
        <div class="achievements-bar sub-bar" v-show="selectedTab === 'manage'">
            <div class="bar-item" :class="{ active : selectedSubTab === 'PDF'}" @click="selectedSubTab = 'PDF'">
                PDF
            </div>
            <div class="bar-item" :class="{ active : selectedSubTab === 'Linkedin'}"
                 @click="selectedSubTab = 'Linkedin'">
                Linkedin
            </div>
            <div class="bar-item" :class="{ active : selectedSubTab === 'Github'}"
                 @click="selectedSubTab = 'Github'">
                Github
            </div>
            <div class="bar-item" :class="{ active : selectedSubTab === 'Behance'}"
                 @click="selectedSubTab = 'Behance'">
                Behance
            </div>
            <div class="bar-item" :class="{ active : selectedSubTab === 'Word'}" @click="selectedSubTab = 'Word'">
                Word/docs
            </div>
        </div>

        <div v-show="selectedTab === 'personal' ">
            <div class="hold-edit">
                <img class="user-cover" src="/images/resume_builder/default-user.jpg" alt="">
                <div class="upload-section">
                    <h5>Change profile photo</h5>
                    <p>Only use images that are greater than 500 pixels in both height and width.</p>
                    <div class="choose-photo-btn">
                        <a href="javascript:void(0)">
                            <img src="/images/resume_builder/profile/icon-file.png" alt="">
                            Choose photo now
                        </a>
                    </div>
                </div>
                <form class="form-edit_profile">
                    <div class="input-field">
                        <label for="fullname">My full-name</label>
                        <input type="text" placeholder="" id="fullname" name="fullname">
                    </div>
                    <div class="input-field">
                        <label for="email">Email adress</label>
                        <input type="email" id="email" placeholder="" name="email">
                    </div>
                    <div class="input-field">
                        <label for="designation">Designation</label>
                        <input type="text" id="designation" placeholder="" name="designation">
                    </div>
                    <div class="input-field">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" placeholder="" name="phone">
                    </div>
                    <div class="input-field">
                        <label for="aboutmyself">About myself <i class="hint-message">Maximum 80 words</i></label>
                        <textarea name="aboutmyself"  id="aboutmyself"></textarea>
                    </div>
                    <div class="actions">
                        <a href="#" class="btn-blue"><img src="/images/resume_builder/profile/icon-save.png">Save all information</a>
                    </div>
                </form>
            </div>
        </div>
        <div  v-show="selectedTab === 'links' ">
            <div class="achievements-bar sub-bar">
                <div class="bar-item" v-for="(tabName,i) in tabsLinks" :key="i" :index="i" :item="tabName" @click="selectedSubTab = tabName" :class="{ active : selectedSubTab === tabName}" >
                    {{tabName}}
                </div>
            </div>


            <div v-show="selectedSubTab === 'My profile link'">

                <div class="hold-tab">
                    <div class="input-field">
                        <label for="profilelink">My profile link</label>
                        <input type="text" placeholder="" name="profilelink">
                    </div>
                    <div class="quick-opts">
                        <a href=""><span class="edit"></span></a>
                        <a href=""><span class="copy"></span></a>
                        <a href=""><span class="share"></span></a>
                    </div>
                    <a href="#" class="btn-blue"><img src="/images/resume_builder/profile/icon-save2.png">Save this new link</a>

                </div>

            </div>
            <div v-show="selectedSubTab === 'Social link'">
                <div class="hold-tab social">
                    <div class="options-wrap" v-show="wrapNewItem">
                        <a href="" class="btn-outline" @click.prevent="showAddItem">Add new link</a>
                        <a href="" class="btn-outline">Auto import</a>
                    </div>
                    <div class="addItem-wrap animated fadeIn" v-show="addItem">
                        <div class="input-field">
                            <label for="sociallink">Add social link</label>
                            <input  id="sociallink" type="text" placeholder="" name="sociallink" v-model="social_link">
                        </div>
                        <a href="#" class="btn-blue" @click.prevent="addLink"><img src="/images/resume_builder/profile/icon-save2.png">Save new this link</a>
                        <a href="" class="btn-close ml-5" @click.prevent="closeAdd">x</a>
                    </div>

                    <div class="list-links" v-show="wrapNewItem">
                        <ul>
                            <li v-for="(item, index) in socialLinks" :key="index" class="animated fadeIn" :class="{'fadeIn': activeListItem === index, 'movingDown': movingDown === index, 'movingUp': movingUp === index }">
                                        <span class="move-item">
                                            <a href="" class="go_up" @click.prevent="reorder('social','mup',index,index-1)" :class="index==0?'disable':''"></a>
                                            <a href="" class="go_down" @click.prevent="reorder('social','mdown',index,index+1)" :class="index==(socialLinks.length-1)?'disable':''"></a>
                                        </span>
                                <span class="info-link">
                                            <img :src="getIconImage(item.name)" alt="">
                                            {{item.link}}
                                        </span>
                                <span class="input-select dropdown __md">
                                            <button class="audio-options dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Option
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">
                                                    <svg-vue class="option-icon" icon="edit-icon"></svg-vue>Edit
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <svg-vue class="option-icon" icon="trash-delete-icon"></svg-vue>Delete
                                                </a>
                                            </div>
                                        </span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div v-show="selectedSubTab === 'Portfolio link'">
                <div class="hold-tab social">
                    <div class="options-wrap">
                        <a href="" class="btn-outline">Add new link</a>
                        <a href="" class="btn-outline">Auto import</a>
                    </div>
                    <div class="list-links">
                        <ul>
                            <li v-for="(item, index) in porfolioLinks" :key="index" class="animated fadeIn" :class="{'fadeIn': activeListItem === index , 'movingDown': movingDown === index, 'movingUp': movingUp === index }">
                                        <span class="move-item">
                                            <a href="" class="go_up" @click.prevent="reorder('portfolio','mup',index,index-1)" :class="index==0?'disable':''"></a>
                                            <a href="" class="go_down" @click.prevent="reorder('portfolio','mdown',index,index+1)" :class="index==(socialLinks.length-1)?'disable':''"></a>
                                        </span>
                                <span class="info-link">
                                            <img :src="getIconImage(item.name)" alt="">
                                            {{item.link}}
                                        </span>
                                <span class="input-select dropdown __md">
                                            <button class="audio-options dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Option
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">
                                                    <svg-vue class="option-icon" icon="edit-icon"></svg-vue>Edit
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <svg-vue class="option-icon" icon="trash-delete-icon"></svg-vue>Delete
                                                </a>
                                            </div>
                                        </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div v-show="selectedSubTab === 'Payment link'">
                <v-card>
                    cuatro
                </v-card>
            </div>

        </div>
        <div v-show="selectedTab === 'languages' ">
            <div class="hold-tab wrapp">
                <div class="input-field">
                    <label for="profilelink">New language</label>
                    <input type="text" placeholder=""  id="profilelink" name="profilelink">
                </div>
                <a href="#" class="btn-blue"><img src="/images/resume_builder/profile/icon-check.png">Add language now</a>
                <a href="" class="btn-outline ml-5">Auto import</a>
                <ul class="lang-items">
                    <li class="lang-item">
                        <img class="flagLang" src="/images/resume_builder/profile/flag-france.png" alt="">
                        <span class="nameLang">French</span>
                        <span class="input-select dropdown __md">
                                <button class="audio-options dropdown-toggle" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Option
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">
                                        <svg-vue class="option-icon" icon="edit-icon"></svg-vue>Edit
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <svg-vue class="option-icon" icon="trash-delete-icon"></svg-vue>Delete
                                    </a>
                                </div>
                            </span>
                    </li>
                </ul>
            </div>
        </div>
        <div v-show="selectedTab === 'location' ">
            <div class="hold-tab wrapp">
                <div class="input-field">
                    <label for="profilelink">New location</label>
                    <input type="text" placeholder="" name="profilelink">
                </div>
                <a href="#" class="btn-blue"><img src="/images/resume_builder/profile/icon-check.png">Add location now</a>
                <a href="" class="btn-outline ml-5">Auto import</a>
                <ul class="lang-items">
                    <li class="lang-item">
                        <img class="flagLang" src="/images/resume_builder/profile/flag-france.png" alt="">
                        <span class="nameLang">French</span>
                        <span class="input-select dropdown __md">
                                <button class="audio-options dropdown-toggle" type="button" id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Option
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">
                                        <svg-vue class="option-icon" icon="edit-icon"></svg-vue>Edit
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <svg-vue class="option-icon" icon="trash-delete-icon"></svg-vue>Delete
                                    </a>
                                </div>
                            </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import vTabNames from './includes/vtab_onincludes'
    export default {
        name: "Profile",
        components: {
            vTabNames
        },
        data() {
            return {
                selectedTab:'personal',
                selectedSubTab:'My profile link',
                cTabProfile: 'tab-0',
                cTabLinks: null,
                tabColor: '#001CE2',
                tabsProfile: [
                    'personal',
                    'links',
                    'languages',
                    'location'
                ],
                tabsLinks: [
                    'My profile link',
                    'Social link',
                    'Portfolio link',
                    'Payment link'
                ],
                /** Add item list flow */
                activeListItem: undefined,
                movingUp: undefined,
                movingDown: undefined,
                socialLinks: [
                    {
                        'name':'Facebook',
                        'link': 'https://facebook.com/linksample'
                    },
                    {
                        'name':'Instagram',
                        'link': 'https://instagram.com/linksample'
                    },
                    {
                        'name':'Dribbble',
                        'link': 'https://www.Dribbble.com/in/hachibur-rahman-5913a5139/'
                    }
                ],
                porfolioLinks: [
                    {
                        'name':'Behance',
                        'link': 'https://www.Behance.com/hachib_rahman_/'
                    },
                    {
                        'name':'Dribbble',
                        'link': 'https://www.Dribbble.com/in/hachibur-rahman-5913a5139/'
                    }
                ],
                addItem: false,
                wrapNewItem: true,
                /** Fields add social link */
                social_link: '',
                namesocial: ''
            }
        },
        methods: {
            clicked_tab(name) {
               /** Logic click on tab espcific */ 
            },
            showAddItem(){
                
                /** State show */
                this.addItem = true;
                this.wrapNewItem = false;
            },
            addLink(){
                this.socialLinks.push(
                    {'name': this.social_link.indexOf('http|https')>-1?this.social_link.split('//')[1].split('.com')[0].toLowerCase():this.social_link.split('.com')[0].toLowerCase(),
                     'link': this.social_link.indexOf('http|https')>-1?this.social_link: 'http://'+this.social_link}
                )
                this.activeListItem = this.socialLinks.length-1
                setTimeout(()=>{
                    this.activeListItem = undefined;
                },500)
            },
            closeAdd(){
                /** Reset fields */
                this.social_link = '';
                this.namesocial = '';

                /**---*/
                this.addItem = false;
                this.wrapNewItem = true;
            },
            reorder(type,dir,from,to){            
                this.activeListItem = from;     
                
                if(dir == 'mup'){
                    this.movingUp = from;
                    this.movingDown = undefined
                }
                if(dir == 'mdown'){
                    this.movingDown = from;
                    this.movingUp = undefined
                }
                setTimeout(()=>{
                    switch (type) {
                        case 'social':
                            this.socialLinks.moveItem(from,to);
                        break;
                        case 'portfolio':
                            this.porfolioLinks.moveItem(from,to);
                        break;
                    }                   
                
                    this.activeListItem = undefined;
                    this.movingDown = undefined
                    this.movingUp = undefined
                },500)
            
            },
            getIconImage(name){

                let arrayIcons = {
                    'behance' : '/images/resume_builder/profile/behance.png',
                    'dribbble' : '/images/resume_builder/profile/dribbble.png',
                }

                if (arrayIcons.hasOwnProperty(name.toLowerCase())) {
                    return arrayIcons[name.toLowerCase()];
                }else{
                    return '/images/resume_builder/profile/icon-plus.png';
                }

            }
        }
    }

    Array.prototype.moveItem = function(from, to) {
        this.splice(to, 0, this.splice(from, 1)[0]);
        return this;
    };
</script>

<style lang="scss" scoped>


    .achievements-bar {
        display: flex;
        width: 100%;
        justify-content: space-between;
        margin-top: 55px;
        border-bottom: 3px solid #C9CFF8;
        padding-right: 50px;

        .bar-item {
            font: 700 35px Noto Sans;
            letter-spacing: 0;
            color: #505050;
            opacity: 1;
            padding-bottom: 23px;
            margin-bottom: -3px;
            border-bottom: 3px solid #C9CFF8;
            transition: all 300ms ease-in;
        }

        .bar-item:hover {
            cursor: pointer;
        }

        .bar-item.active {
            color: #001CE2;
            border-bottom-color: #001CE2;
        }
    }
    .achievements-bar.sub-bar {
        margin-top: 50px;
    }

    .title-blue{
        font-family: 'Nexa';
        font-size: 60px;
        line-height: 67px;
        color: #001CE2;
    }

    $colorPrimary: #001CE2;
    $colorGray: #505050;


    .profile-hold{
        justify-content: flex-start;
        width: 1363px;
        flex-flow: column;
    }

    .hold-edit{
        font-family: 'Noto Sans';
        padding: 40px 20px;

        .user-cover{
            max-width: 144px;
            min-height: 144px;
            border-radius: 100%;
            border: 5px solid #fff;
            box-shadow: -5px 16px 30px rgba(90, 90, 90, 0.12);
            background: #ddd;
        }
        .upload-section{
            display: inline-block;
            vertical-align: middle;
            margin-left: 22px;

            h5{
                
                font-size: 22px;
                font-weight: bold;
                color: $colorPrimary
            }
            p{
                font-size: 16px;
                color: $colorGray;
            }
        }
    }
    .input_photoFile{
        position: relative;
        text-decoration: none;
        font-size: 15px;
        max-width: 203px;
        color: #fff;
        min-height: 48px;
        padding: 0 24.5px;
        background: $colorPrimary;
        display: inline-block;
        border-radius: 8px;

        &:hover{
            opacity: .8;
            color: #fff;
            text-decoration: none;
        }
    }
    .input_photoFile::-webkit-file-upload-button {
        visibility: hidden;
    }
    .input_photoFile::before {
        content: "Choose photo now";
        outline: none;
        white-space: nowrap;
        -webkit-user-select: none;
        cursor: pointer;
        line-height: 47px;
        position: absolute;
        background: url('/images/resume_builder/profile/icon-file.png') center left no-repeat;
        padding-left:22px;
    }

    .form-edit_profile{
        display: flex;
        justify-content: center;
        flex-flow: column;
        margin-top: 40px;

        .actions{
            display: flex;
            max-width: 490px;
            margin-top: 12.5px;
        }
    }
    

    .btn-blue{
        text-decoration: none;
        font-size: 15px;
        min-width: 203px;
        max-width: 216px;
        color: #fff;
        min-height: 51px;
        padding: 0 15.8px 0 21.4px;
        background: $colorPrimary;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        font-family: 'Noto Sans';

        img{
            margin-right: 10.5px;
        }

        &:hover{
            opacity: .8;
            color: #fff;
            text-decoration: none;
        }
    }

    .hold-tab{
        justify-content: flex-start;
        display: flex;
        align-items: center;
        margin-top: 55px;

        .input-field{
            max-width: 100%;
            min-width: 50.8%;

            label{
                font-size: 23px;
                font-weight: 500;
                color: #3C3748;
            }

            input{
                font-size: 22px;
                min-height: 76px;
                color: #505050;
            }
        }

        .btn-blue{
            min-width: 294px;
            min-height: 75px;
            margin-left: 5%;
            font-size: 23px;
            font-weight: 500;
            border: 1.5px solid #1F5DE4;
        }
        &.social{
            flex-flow: column;
            align-items: flex-start;
        }
        &.wrapp{
            flex-wrap: wrap;
            align-items: center;
        }
    }

    .quick-opts{
        background: #F6F6F6;
        padding: 18.5px 30px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin-left: 29px;
        border-radius: 8px;

        a{
            text-decoration: none;
            margin-right: 37px;

            &:last-child{
                margin: 0;
            }

            .edit{
                background: url('/images/resume_builder/profile/icon-edit.png') no-repeat;
                width: 44px;
                height: 39px;
                display: block;                
            }
            .copy{
                background: url('/images/resume_builder/profile/icon-copy.png') no-repeat;
                width: 33.7px;
                height: 39px;
                display: block;                
            }
            .share{
                background: url('/images/resume_builder/profile/icon-share.png') no-repeat;
                width: 44px;
                height: 39px;
                display: block;                
            }
        }

        
    }

    /** Social tab */
    .btn-outline{
        min-width: 226px;
        min-height: 62px;
        font-family: 'Noto Sans';
        font-size: 21px;
        font-weight: 500;
        color: #001CE2;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #1F5DE4;
        border-radius: 8px;
        text-decoration: none;
        outline: none;
        background: #fff;

        &::before{
            content: "";
            width: 31.4px;
            height: 31.4px;
            background: url('/images/resume_builder/profile/icon-plus.png');
            margin-right: 12px;
        }

        &:hover{
            text-decoration: none;
        }

        +.btn-outline{
            margin-left: 46px;
        }
    }

    .btn-close{
        min-width: 62px;
        min-height: 62px;
        font-family: 'Noto Sans';
        font-size: 21px;
        font-weight: 500;
        color: #001CE2;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #1F5DE4;
        border-radius: 8px;
        text-decoration: none;
        outline: none;
        background: #fff;
        text-transform: uppercase;

        &:hover{
            text-decoration: none;
        }
    }

    /** Add new links flow */
    .addItem-wrap{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        min-width: 60%;

        .input-field{
            min-width: 100%;
        }
    }

    .list-links{

        margin-top: 56.2px;

        ul{
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            flex-direction: column;
            position: relative;

            li{
                
                display: flex;
                margin-bottom: 57.9px;
                min-height: 45px;
                opacity: 1;
                transition: all .5s ease-out;
                transform: translateY(0px);

                

                span{
                    font-size: 25px;
                    font-weight: 500;
                    font-family: 'Noto Sans';
                    color: #505050;

                    &.info-link{
                        img{
                            margin-right: 20px;
                            min-width: 45px;
                        }
                    }

                    a{
                        &.disable{
                            opacity: .5;
                            pointer-events: none
                        }
                    }
                }
            }
        }

        
    }

    .input-select{

        &.__md{
            margin-left: 27.6px;
            min-height: 39px;

            .dropdown-toggle{
                font-size: 19px;
                padding: 0 15px;
            }
            .dropdown-menu{
                .dropdown-item{
                    font-size: 19px;
                    padding: 5px 19px;

                    .option-icon{
                        height: 14px;
                    }
                }
                &.show{
                    transform: translate3d(0px, 40px, 0px) !important;
                }

            }
        }
        
    }

    /** Reorder items */
    .move-item{
        display: inline-flex;
        margin-right: 19.3px;
        flex-flow: column;
        justify-content: space-between;


        a{
            width: 18px;
            height: 12px;
        }

        .go_up{
            vertical-align: top;
            background: url('/images/resume_builder/profile/arrow-up.png');
            background-repeat: no-repeat;
        }
        .go_down{
            vertical-align: bottom;
            background: url('/images/resume_builder/profile/arrow-down.png');
            background-repeat: no-repeat;
        }
    }

    .lang-items{
        margin: 0;
        padding: 0;

        .lang-item{

            display: flex;
            justify-content: flex-start;
            align-items: center;

            .flagLang{
                margin: 0px 25px;
            }
            .nameLang{
                font-size: 39px;
                font-weight: 700;
                color: #001CE2;
            }
        }
    }


    /** Moving animate */
    .animated {
        -webkit-animation-duration: .5s;
        animation-duration: .5s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
        
    }
        
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .fadeIn {
        -webkit-animation-name: fadeIn;
        animation-name: fadeIn;

        &.movingUp{
            animation: transUp 1s ease-in;
        }
        &.movingDown{
            animation: transDown 1s ease-in;
        }
    }

    @keyframes transUp {
        50% {
            transform: translateY(-100px);
        }
    }
    @keyframes transDown {
        50% {
            transform: translateY(100px);
        }
    }


    .choose-photo-btn{
        a {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 203px;
            height: 48px;

            background: #001CE2 0% 0% no-repeat padding-box;
            border-radius: 8px;

            font: 500 15px Noto Sans;
            letter-spacing: 0;
            color: #FFFFFF;
            opacity: 1;

            img {
                width: 13px;
                height: 16px;
                margin-right: 7px;
            }
        }
    }

    // Main component transitions
    @for $j from 1 through 6 {
        @keyframes moveInputReverse#{$j} {
            from {
                transform: translate(0);
            } to {
                transform: translate(calc(50vw - 50% - 35px - 3rem), -370px);
            }
        }
    }

    .fade-leave-active {
        #profileTab {
            overflow: visible;

            @for $i from 1 through 6 {
                .input-field {
                    &:nth-child(#{ $i }) {
                        animation-name: moveInputReverse#{$i};
                        animation-duration: .62s;
                        animation-fill-mode: forwards;
                        animation-timing-function: cubic-bezier(0.8, 0.6, 0.45, 0.4);
                    }
                }
            }
        }
    }
</style>
