<template>
    <div>
        <div class="section-title">
            <h2>Imports</h2>
        </div>
        <div class="section-body-wrapper">
            <div class="achievements-bar">
                <div class="bar-item" :class="{ active : selectedTab === 'Downloads'}"
                     @click="selectedTab = 'Downloads'">
                    Downloads
                </div>
                <div class="bar-item" :class="{ active : selectedTab === 'Manage'}" @click="selectedTab = 'Manage'">
                    Manage imports
                </div>
                <div class="bar-item" :class="{ active : selectedTab === 'links'}" @click="selectedTab = 'links'">
                    URL links
                </div>
            </div>
            <div class="achievements-bar sub-bar">
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
            <div class="imports-list">
                <div class="import-item">
                    <div class="import-name">
                        PDF import 1
                    </div>
                    <div class="import-date">
                        01/17/2022
                    </div>
                    <div class="import-icon-view">
                        <img src="/images/resume_builder/imports/eye.png" alt="eye-icon">
                    </div>
                    <div class="import-edit-icon">
                        <img src="/images/resume_builder/imports/edit.svg" alt="eye-icon">
                    </div>
                    <div class="import-delete-iceon">
                        <img src="/images/resume_builder/imports/trash.png" alt="eye-icon">
                    </div>
                </div>
                <div class="import-item">
                    <div class="import-name">
                        PDF import 2
                    </div>
                    <div class="import-date">
                        01/17/2022
                    </div>
                    <div class="import-icon-view">
                        <img src="/images/resume_builder/imports/eye.png" alt="eye-icon">
                    </div>
                    <div class="import-edit-icon">
                        <img src="/images/resume_builder/imports/edit.svg" alt="eye-icon">
                    </div>
                    <div class="import-delete-iceon">
                        <img src="/images/resume_builder/imports/trash.png" alt="eye-icon">
                    </div>
                </div>
                <div class="import-item">
                    <div class="import-name">
                        PDF import 3
                    </div>
                    <div class="import-date">
                        01/23/2022
                    </div>
                    <div class="import-icon-view">
                        <img src="/images/resume_builder/imports/eye.png" alt="eye-icon">
                    </div>
                    <div class="import-edit-icon">
                        <img src="/images/resume_builder/imports/edit.svg" alt="eye-icon">
                    </div>
                    <div class="import-delete-iceon">
                        <img src="/images/resume_builder/imports/trash.png" alt="eye-icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "imports",
        data() {
            return {
                selectedTab: 'Manage',
                selectedSubTab: 'PDF'
            }
        }
    }
</script>

<style scoped lang="scss">
    .section-body-wrapper {
        width: 1337px;

        .achievements-bar {
            display: flex;
            width: 100%;
            justify-content: space-between;
            margin-top: 75px;
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
            margin-top: 74px;
        }

        .imports-list {
            padding-right: 80px;

            .import-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 63px;

                .import-name {
                    font: 600 30px Noto Sans;
                    font-size: 30px;
                    text-align: left;
                    color: #001ce2;
                }

                .import-date {
                    font: 600 30px Noto Sans;
                    font-size: 30px;
                    text-align: left;
                    color: #001ce2;
                }

                .import-view-icon {
                    img{
                        width: 42.75px;
                        height: 27.24px;
                    }
                }

                .import-edit-icon {
                   img{
                       width: 30.32px;
                       height: 30.17px;
                   }

                }

                .import-delete-icon {
                   img{
                       width: 29px;
                       height: 31px;
                   }
                }
            }
        }


    }
</style>
