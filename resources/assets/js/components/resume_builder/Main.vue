<template>
    <div class="resume-container">

        <nav class="resume-builder-nav d-flex align-items-start">
            <a href="/freelancer/dashboard" class="brand-link">
                <img class="brand-image" src="/images/resume_builder/123 icon.png" alt="123workforce icon"/>
            </a>

            <!-- Replace this with vue-tabs -->
            <div class="links-group d-flex alig-items-center justify-content-between">
                <router-link to="/resume-builder">
                    My account
                </router-link>
                <router-link to="/resume-builder/edit" class="has-inside-routes">
                    Edit CV
                </router-link>
                <router-link to="/resume-builder/view" class="has-inside-routes">
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

        <div class="info-wrapper">
            <div class="avatar">
                <img src="/images/resume_themes/theme5/profile.png" alt="profile-pic">
            </div>
            <div class="name-title-wrapper">
                <div class="user-name">
                    Carolyn Meyer
                </div>
                <div class="job-title">
                    User interface designer
                </div>
            </div>
        </div>


        <transition class="mt-5 content" name="fade" mode="out-in">
            <router-view></router-view>
        </transition>
    </div>
</template>

<script>

    export default {
        name: "Main",
        components: {},
        data() {
            return {
                activeMainTab: 'my-account'
            }
        },
        methods: {
            setActiveMainTab(tab) {
                console.log(tab);
                this.activeMainTab = tab
            }
        },
        mounted() {
            console.log();
        }
    }
</script>

<style lang="scss">

    .info-wrapper {
        display: flex;
        align-items: center;

        .avatar {
            margin-right: 32px;

            img {
                width: 167px;
                height: 167px;
            }
        }

        .name-title-wrapper {
            .user-name {
                margin-bottom: 4px;
                font: Bold 34px/46px Noto Sans;
                letter-spacing: 0;
                color: #413A5D;
                opacity: 1;
            }

            .job-title {
                margin-left: 4px;
                font: Medium 18px/24px Noto Sans;
                letter-spacing: 0;
                color: #413A5D;
                opacity: 1;
            }
        }
    }

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
                transition: border-bottom-color 3s, color 3s;
                border-bottom-color: transparent;

                &:hover,
                &:active {
                    text-decoration: none;
                }

                &.router-link-exact-active  {
                    position: relative;
                    color: $mainColor;
                    border-bottom: 5px solid;
                    border-bottom-color: $mainColor;
                    padding-bottom: 75px;
                    border-bottom-right-radius: 5px;
                    border-bottom-left-radius: 5px;
                }

                &.router-link-active.has-inside-routes{
                    position: relative;
                    color: $mainColor;
                    border-bottom: 5px solid;
                    border-bottom-color: $mainColor;
                    padding-bottom: 75px;
                    border-bottom-right-radius: 5px;
                    border-bottom-left-radius: 5px;
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

    .fade-enter-active {
        transition: all .3s ease;
    }

    .fade-leave-active {
        transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }

    .fade-enter, .fade-leave-to
        /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0;
    }
</style>
