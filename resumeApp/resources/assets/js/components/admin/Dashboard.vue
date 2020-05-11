<template>
    <v-app class="admin-container">
        <div style="height: 100%;" class="d-flex">
            <v-card height="100%" width="256px" class="overflow-hidden">
                <v-navigation-drawer
                        v-model="drawer"
                        :expand-on-hover="expandOnHover"
                        :mini-variant="miniVariant"
                        :right="right"
                        absolute
                        dark
                        class="side-bar"
                >
                    <v-list
                            dense
                            nav
                            class="py-0 side-bar-list"
                    >
                        <v-list-item two-line :class="miniVariant && 'px-0'" class="side-bar-header">
                            <v-list-item-content>
                                <v-list-item-title class="d-flex justify-content-center title">123WORKFORCE</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>

                        <v-divider></v-divider>

                        <v-list-item
                                v-for="item in items"
                                :key="item.title"
                                @click="setActiveTab(item)"
                                link
                                :to="item.url"
                                class="side-bar-item"
                                :class="{active : activeSideTab === item.value}"

                        >
                            <v-list-item-icon class="icon">
                                <img :src="item.icon" alt="">
                            </v-list-item-icon>

                            <v-list-item-content>
                                <v-list-item-title class="title">{{ item.title }}</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list>
                </v-navigation-drawer>
            </v-card>

            <div class="content">
                <router-view :users="users"></router-view>
            </div>
        </div>


        <div class="footer">

            <v-card>
                <v-footer
                        absolute
                        class="font-weight-medium footer-links"
                >
                    <v-col
                            class="text-center NoDecor"
                            cols="12"
                    >
                        <a href="javascript:void(0)">About</a>
                        <a href="/privacy">Privacy</a>
                        <a href="/terms">Terms</a>
                        <a href="javascript:void(0)">Settings</a>
                    </v-col>
                </v-footer>
            </v-card>

        </div>

    </v-app>
</template>

<script>
    import UsersTable from './tabs/UsersTable'
    export default {
        name: "Dashboard",
        props:['users'],
        components:{
            'users-table' : UsersTable
        },
        data() {
            return {

                activeSideTab:'general',

                //   navigation data
                drawer: true,
                items: [
                    {title: 'Home', icon: '/images/admin/general.svg', value:'general',url:'/'},
                    {title: 'Users', icon: '/images/admin/users.svg',value:'users',url:'users'},
                    {title: 'Account Settings', icon: '/images/admin/settings.svg',value:'acc_settings',url:'account-settings'},
                ],
                color: 'primary',
                right: false,
                miniVariant: false,
                expandOnHover: false,
                background: false,
            }
        },
        methods: {
            logout() {
                axios.post('/logout').then((response) => {
                        // remove access token from cookies:
                        Vue.$cookies.remove('access_token');
                        window.location.href = '/';
                    }
                )
            },
            setActiveTab(tab){
                this.activeSideTab = tab.value;
            }
        },

        mounted() {
            this.activeSideTab = this.$router.currentRoute.name ;
        }
    }
</script>

<style>
    body{
        margin: 0 !important;
    }
</style>
<style lang="scss" scoped>

    .admin-container {
        background: floralwhite;

        .content{
            width: 100%;
            padding-left: 50px;
            padding-right: 50px;
           .searchInput{
               .input{
                   width: 630px;
               }
           }

        }

        .admin-top-bar {
            height: 80px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-left: 45px;
            padding-right: 45+17px;

            background: #FFFFFF;
            box-shadow: 0 0 100px rgba(0, 23, 84, 0.1);


            .logout-btn {
                padding: 10px;
                font-weight: bold;
                font-size: 20px;
                background: whitesmoke;
            }
        }

        .side-bar {
            background-color: whitesmoke;
            .side-bar-list{
                padding-left:0;
                padding-right:0;

                .side-bar-item{
                    padding-top:15px;
                    padding-bottom:15px;
                    padding-left: 35px;
                    border-bottom:solid 1px #F6F9FF;

                    .icon{
                        margin-right:10px;
                        filter: grayscale(100%);
                    }

                    .title {
                        font-style: normal;
                        font-weight: 500;
                        font-size: 20px;
                        line-height: 24px;
                        color: #838CA3;
                    }

                    &.active{
                        background: #F6F9FF;
                        border-right: 4px solid #176BEF;
                        .title {
                            color: #176BEF;
                        }

                        .icon{
                            filter: grayscale(0%);
                        }
                    }
                }
                .side-bar-header{
                    margin-top:20px;
                    .title{
                        font-style: normal;
                        font-weight: 500;
                        font-size: 30px;
                        line-height: 35px;
                        color: #002178;
                    }
                }
            }

        }

        .footer{
            .footer-links{
                background: #F6F9FF;
                a{

                    font-style: normal;
                    font-weight: 500;
                    font-size: 16px;
                    line-height: 22px;
                    text-align: center;
                    color: #838CA3;
                    margin-right:40px;
                }
            }
        }
    }


</style>
