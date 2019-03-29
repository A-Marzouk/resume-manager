<template>
    <div>
        <div class="client_dashboard_content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="menu-block row" :class="{'active' : activeTab === 'campaign_manager'}" @click="selectTab('campaign_manager')">
                        <div class="imageContainer">
                            <img  :src="getMenuBlockIcon('campaign_manager')" alt="icon">
                        </div>
                        <div class="menu-block-name">
                            Campaign manager
                        </div>
                    </div>
                    <div class="menu-block row" :class="{'active' : activeTab === 'chats'}" @click="selectTab('chats')">
                        <div class="imageContainer">
                            <img :src="getMenuBlockIcon('chats')" alt="icon">
                        </div>
                        <div class="menu-block-name">
                            Chats
                        </div>
                    </div>
                    <div class="menu-block row" :class="{'active' : activeTab === 'payments'}" @click="selectTab('payments')">
                        <div class="imageContainer">
                            <img :src="getMenuBlockIcon('payments')" alt="icon">
                        </div>
                        <div class="menu-block-name">
                            Payments
                        </div>
                    </div>
                    <div class="menu-block row" :class="{'active' : activeTab === 'agents_database'}" @click="selectTab('agents_database')">
                        <div class="imageContainer">
                            <img :src="getMenuBlockIcon('agents_database')"  alt="icon">
                        </div>
                        <div class="menu-block-name">
                            Agents database
                        </div>
                    </div>
                    <div class="menu-block row" :class="{'active' : activeTab === 'my_account'}" @click="selectTab('my_account')">
                        <div class="imageContainer">
                            <img :src="getMenuBlockIcon('my_account')" alt="icon">
                        </div>
                        <div class="menu-block-name">
                            My account
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">

                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props:['client'],
        data(){
            return{
                activeTab: 'campaign_manager',
            }
        },
        methods:{
            selectTab(tabName){
                this.activeTab = tabName ;
            },
            getMenuBlockIcon(tabName){
                if(this.activeTab === tabName){
                   return '/resumeApp/public/images/client/menu_icons/active/'+ tabName + '.png';
                }
                return '/resumeApp/public/images/client/menu_icons/inactive/'+ tabName + '.png';
            }
        },
        mounted(){

        }

    }
</script>