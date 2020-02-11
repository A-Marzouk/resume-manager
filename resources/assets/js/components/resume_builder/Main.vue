<template>
    <div class="resume-container">

        <nav class="resume-builder-nav d-flex align-items-start">
            <a href="/freelancer/dashboard" class="brand-link">
                <img class="brand-image" src="/images/resume_builder/123 icon.png" alt="123workforce icon" />
            </a>

            <!-- Replace this with vue-tabs -->
            <div class="links-group d-flex alig-items-center justify-content-between">
                <router-link v-on:click="setActiveMainTab('my-account')" :class="{ active: activeMainTab === 'my-account' }" to="/resume-builder">
                    My account
                </router-link>
                <router-link v-on:click="setActiveMainTab('edit-cv')" :class="{ active: activeMainTab === 'edit-cv' }" to="/resume-builder/edit">
                    Edit CV
                </router-link>
                <router-link v-on:click="setActiveMainTab('view-cv')" :class="{ active: activeMainTab === 'view-cv' }" to="/resume-builder/view">
                    View CV
                </router-link>
            </div>

            <div class="actions-group d-flex align-items-center justify-content-between">
                <button class="action-btn">
                    <img src="/images/resume_builder/notification.png" alt="notification icon">
                </button>
                <button class="action-btn">
                    <img src="/images/resume_builder/settings-icon.svg" alt="settings icon">
                </button>
                <button class="action-btn user-profile">
                    <img src="/images/resume_builder/default-user.jpg" alt="user profile picture">
                </button>
            </div>
        </nav>
        
        <keep-alive class="mt-5 content">
            <router-view></router-view>
        </keep-alive>
    </div>
</template>

<script>
    
    export default {
        name: "Main",
        components: {
        },
        data(){
            return{
                activeMainTab: 'my-account'
            }
        },
        methods:{
            setActiveMainTab (tab) {
                this.activeMainTab = tab
            }
        },
        mounted() {
            console.log();
        }
    }
</script>

<style lang="scss">
$mainColor: #001CE2;
    .resume-container {
        padding: 160px 100px 30px;
    }

    .resume-builder-nav {
        width: 100vw;
        position: absolute;
        left: 0;
        top: 0;
        box-shadow: 0 6px 12px #6565653b;
        padding: 50px 100px;
        height: 129px;

        .brand-image {
            width: 40px;
            margin-right: 262px;
        }

        .links-group {
            height: 100%;
            a {
                margin-right: 100px;
                color: #747474;
                font-weight: bold;
                display: block;
                padding: 0 30px;
                height: 100%;
                font-size: 25px;

                &:hover,
                &:active {
                    text-decoration: none;
                }

                &.active {
                    position: relative;
                    color: $mainColor;

                    &::after {
                        content: "";
                        position: absolute;
                        display: block;
                        bottom: -53px;
                        left: 0;
                        width: 100%;
                        height: 5px;
                        background-color: $mainColor;
                        border-radius: 5 5 0 0;
                    }
                }

                &:last-child {
                    margin: 0;
                }
            }
        }

        .actions-group {
            position: absolute;
            right: 100px;

            .action-btn {
                background: transparent;
                border: 0;
                width: 40px;
                margin-right: 58px;
                position: relative;

                img { 
                    width: 100%;
                }

                &.user-profile {
                    width: 46px;
                    margin: 0;

                    img {
                        border-radius: 50%;
                        width: 100%;
                    }
                }
            }

        }

    }
</style>
