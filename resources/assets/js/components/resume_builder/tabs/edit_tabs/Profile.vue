<template>
    <div class="profile-hold">
        <div class="section-title">
            <div class="title-light">Edit</div>
            <h2>Profile</h2>
        </div>
        <v-tabs
            v-model="cTabProfile"
            :slider-color="tabColor"
            height="85"
        >
            <vTabNames v-for="(nametab,i) in tabsProfile" :key="i" :index="i" :item="nametab" @clicked="clicked_tab(nametab)" />
        </v-tabs>
        <v-tabs-items v-model="cTabProfile">
            <v-tab-item value="tab-0">
                <div class="hold-edit">
                    <img class="user-cover" src="/images/resume_builder/default-user.jpg" alt="">
                    <div class="upload-section">
                        <h5>Change profile photo</h5>
                        <p>Only use images that are greater than 500 pixels in both height and width.</p>
                        <input type="file" class="input_photoFile"> 
                    </div>
                    <form class="form-edit_profile">
                        <div class="input-field">
                            <label for="fullname">My full-name</label>
                            <input type="text" placeholder="" name="fullname">
                        </div>
                        <div class="input-field">
                            <label for="email">Email adress</label>
                            <input type="email" placeholder="" name="email">
                        </div>
                        <div class="input-field">
                            <label for="designation">Designation</label>
                            <input type="text" placeholder="" name="designation">
                        </div>
                        <div class="input-field">
                            <label for="phone">Phone</label>
                            <input type="tel" placeholder="" name="phone">
                        </div>
                        <div class="input-field">
                            <label for="aboutmyself">About myself <i class="hint-message">Maximum 80 words</i></label>
                            <textarea name="aboutmyself"></textarea>
                        </div>
                        <div class="actions">
                            <a href="#" class="btn-blue"><img src="/images/resume_builder/profile/icon-save.png">Save all information</a>
                        </div>
                    </form>
                </div>
            </v-tab-item>
            <v-tab-item value="tab-1">
                <v-tabs
                    v-model="cTabLinks"
                    :slider-color="tabColor"
                    height="85"
                    class="tabs_inside"
                    centered="true"
                >
                    <vTabNames v-for="(nametab,i) in tabsLinks" :key="i" :index="i" :item="nametab" />
                </v-tabs>
                <v-tabs-items v-model="cTabLinks">
                    <v-tab-item value="tab-0">
                        
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
                        
                    </v-tab-item>
                    <v-tab-item value="tab-1">
                        <div class="hold-tab social">
                            <div class="options-wrap">
                                <a href="" class="btn-outline">Add new link</a>
                                <a href="" class="btn-outline">Auto import</a>
                            </div>
                            <div class="list-links">
                                <ul>
                                    <li>
                                        <span class="move">
                                            <a href="" class="up-item"></a>
                                            <a href="" class="down-item"></a>
                                        </span>
                                        <span>
                                            https://www.Behance.com/hachib_rahman_/
                                        </span>
                                        <select class="mdb-select md-form">
                                            <option value="" disabled selected>Choose your option</option>
                                            <option value="" data-icon="https://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg" class="rounded-circle">
                                                example
                                                1</option>
                                            <option value="" data-icon="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle">
                                                example
                                                2</option>
                                            <option value="" data-icon="https://mdbootstrap.com/img/Photos/Avatars/avatar-3.jpg" class="rounded-circle">
                                                example
                                            1</option>
                                        </select>                                    
                                    </li>
                                    <li></li>
                                </ul>
                            </div>
                           
                        </div>
                    </v-tab-item>
                    <v-tab-item value="tab-2">
                        <v-card>
                            tres
                        </v-card>
                    </v-tab-item>
                    <v-tab-item value="tab-3">
                        <v-card>
                            cuatro
                        </v-card>
                    </v-tab-item>
                </v-tabs-items>
            </v-tab-item>
            <v-tab-item value="tab-2">
                <v-card flat>
                    <v-card-text>
                        tab 3
                    </v-card-text>
                </v-card>
            </v-tab-item>
            <v-tab-item value="tab-3">
                <v-card flat>
                    <v-card-text>
                        tab 4
                    </v-card-text>
                </v-card>
            </v-tab-item>
        </v-tabs-items>
    </div>
</template>
<script>
    import vTabNames from '../../includes/vtabs.vue';

    export default {
        name: "Profile",
        components: {
            vTabNames
        },
        data() {
            return {
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
                ]
            }
        },
        methods: {
            clicked_tab(name) {
                
            }
        }
    }
</script>

<style lang="scss" scope>

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

     .input-field{
        flex-flow: column;
        display: flex;
        max-width: 490px;
        margin-bottom: 31.5px;

        label{
            font-size: 22px;
            line-height: 30px;
            color: #505050;
            font-family: 'Noto Sans';
            font-weight: 300;

            .hint-message{
                font-size: 18px;
                color: #1F5DE4;
                float: right;
                font-style: normal;
            }
        }

        input{
            min-height: 54.6px;
            border: 1.5px solid #505050;
            border-radius: 8px;
            padding: 0px 0px 0px 16.8px;
            color: #A5A5A5;
            font-size: 15px;
            font-family: 'Noto Sans';
            font-weight: 500;
            outline: none;
        }

        textarea{
            min-height: 181px;
            padding: 23px 25px;
            font-size: 22px;
            font-family: 'Noto Sans';
            font-weight: 500;
            outline: none;
            color: #A5A5A5;
            border: 1.5px solid #505050;
            border-radius: 8px;
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
            margin-left: 62px;
            font-size: 23px;
            font-weight: 500;
            border: 1.5px solid #1F5DE4;
        }

        &.social{
            flex-flow: column;
            align-items: flex-start;
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

</style>
