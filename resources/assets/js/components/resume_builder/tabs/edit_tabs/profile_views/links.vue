<template>
    <div>
        <div class="achievements-bar sub-bar links-group" id="linksWrapper">
            <div class="bar-item" v-for="(tabName,i) in tabs" :key="i" :index="i" :item="tabName" @click="activeTab = tabName" :class="{ active : activeTab === tabName}" >
                {{tabName}}
            </div>
        </div>


        <div v-show="activeTab === 'My profile link'">

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
        <div v-show="activeTab === 'Social link'">
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
        <div v-show="activeTab === 'Portfolio link'">
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
        <div v-show="activeTab === 'Payment link'">
            <v-card>
                cuatro
            </v-card>
        </div>

    </div>
</template>

<script>
import { moveTabsHelper } from '../../../helpers/tab-animations';
export default {
    data: () => ({        
        tabs: [
            'My profile link',
            'Social link',
            'Portfolio link',
            'Payment link'
        ],
        activeTab: 'My profile link',
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
    }),
    methods: {
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

        },
        setActiveTab (tab) {
            this.activeTab = tab
        },
        changeTab (e) {

            // Here will be the animations between transitions
            
            moveTabsHelper(e, 'linksWrapper', this)
        }
    }
}
</script>

<style lang="scss">
$mainColor: #001CE2;
</style>