<template>
    <div class="d-flex flex-wrap">
        <div class="business-card v1">
            <div class="avatar">
                <img src="/images/resume_themes/theme5/profile.png" alt="">
            </div>
            <div class="info">
                <div class="card-name">
                    Beverly Andrews
                </div>
                <div class="title">
                    User interface designer
                </div>
            </div>
        </div>
        <div class="business-card v2">
            <div class="main">
                <div class="avatar">
                    <img src="/images/resume_themes/theme5/profile.png" alt="">
                </div>
                <div class="info">
                    <div class="card-name">
                        Beverly Andrews
                    </div>
                    <div class="title">
                        User interface designer
                    </div>
                </div>
            </div>
            <div class="contact">
                <div class="phone">
                    <img src="/images/resume_themes/theme8/whatsapp.png" alt="">
                    <div>
                        000 0000 000
                    </div>
                </div>
                <div class="phone">
                    <img src="/images/resume_themes/theme8/email.png" alt="">
                    <div>
                        BeverlyA@gmail.com
                    </div>
                </div>
            </div>
            <div class="icons">
                <img src="/images/resume_themes/theme8/workforce.png" alt="" style="width: 21px; height: 21px;">
                <img src="/images/resume_themes/theme8/behance (1).png" alt="" style="width: 29px; height: 18px;">
                <img src="/images/resume_themes/theme8/dribbble.png" alt="" style="width: 21px; height: 22px;">
                <img src="/images/resume_themes/theme8/instagram.png" alt="" style="width: 21px; height: 21px;">
                <img src="/images/resume_themes/theme8/XMLID_801_.png" alt="" style="width: 21px; height: 21px;">
                <img src="/images/resume_themes/theme8/icon.png" alt="" style="width: 14px; height: 20px;">
            </div>
        </div>

        <div class="business-card v3">
            <div class="contact">
                <div class="phone">
                    <img src="/images/resume_themes/theme8/whatsapp.png" alt="">
                    <div>
                        000 0000 000
                    </div>
                </div>
                <div class="email">
                    <img src="/images/resume_themes/theme8/email.png" alt="">
                    <div>
                        BeverlyA@gmail.com
                    </div>
                </div>
            </div>
            <div class="icons">
                <img src="/images/resume_themes/theme8/workforce.png" alt="" style="width: 21px; height: 21px;">
                <img src="/images/resume_themes/theme8/behance (1).png" alt="" style="width: 29px; height: 18px;">
                <img src="/images/resume_themes/theme8/dribbble.png" alt="" style="width: 21px; height: 22px;">
                <img src="/images/resume_themes/theme8/instagram.png" alt="" style="width: 21px; height: 21px;">
                <img src="/images/resume_themes/theme8/XMLID_801_.png" alt="" style="width: 21px; height: 21px;">
                <img src="/images/resume_themes/theme8/icon.png" alt="" style="width: 14px; height: 20px;">
            </div>
        </div>

        <div class="emailSignature">
            <div class="wrapper d-flex">
                <div class="signature_avatar">
                    <img src="/images/resume_themes/theme5/profile.png" alt="">
                </div>
                <div class="info">
                    <div class="name_title">
                        <div class="card-name">
                            Beverly Andrews
                        </div>
                        <div class="horizontal-divider"></div>
                        <div class="title">
                            User interface designer
                        </div>
                    </div>
                    <div class="contact">
                        <div class="phone">
                            <img src="/images/resume_themes/theme8/whatsapp.png" alt="">
                            <div>
                                000 0000 000
                            </div>
                        </div>
                        <div class="phone">
                            <img src="/images/resume_themes/theme8/email.png" alt="">
                            <div>
                                BeverlyA@gmail.com
                            </div>
                        </div>
                    </div>
                    <div class="icons">
                        <img src="/images/resume_themes/theme8/workforce.png" alt="" style="width: 21px; height: 21px;">
                        <img src="/images/resume_themes/theme8/behance (1).png" alt="" style="width: 29px; height: 18px;">
                        <img src="/images/resume_themes/theme8/dribbble.png" alt="" style="width: 21px; height: 22px;">
                        <img src="/images/resume_themes/theme8/instagram.png" alt="" style="width: 21px; height: 21px;">
                        <img src="/images/resume_themes/theme8/XMLID_801_.png" alt="" style="width: 21px; height: 21px;">
                        <img src="/images/resume_themes/theme8/icon.png" alt="" style="width: 14px; height: 20px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "businessCardV2"
    }
</script>

<style scoped lang="scss">

    @import url(//fonts.googleapis.com/earlyaccess/thabit.css);

    .business-card{
        margin: 50px;
        width: 355.27px;
        height:205px;
        background-size:cover ;
        background-image: url("/images/resume_themes/theme8/background.svg");
        font-family: 'Thabit', monospace !important;
    }

    .v1{
        display: flex;
        align-items: center;
        flex-direction: column;
        .avatar{
            margin-top: 38px;
            margin-bottom: 13px;
            img{
                width:76px;
                height:76px;
            }
        }
        .info{
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: 'Thabit', monospace !important;

            .card-name{
                font-style: normal;
                font-weight: bold;
                font-size: 24px;
                line-height: 32px;
                color: #005BD1;
            }

            .title{
                font-style: normal;
                font-weight: 500;
                font-size: 12px;
                line-height: 16px;
                color: #FFFFFF;
            }
        }
    }

    .v2{
        padding: 19px 24px;
        .main{
            display: flex;

            .avatar{
                img{
                    width:68px;
                    height:68px;
                    margin-right: 16px;
                }
            }

            .info{
                font-family: 'Thabit', monospace !important;

                .card-name{
                    font-style: normal;
                    font-weight: bold;
                    font-size: 24px;
                    line-height: 32px;
                    color: #005BD1;
                }
                .title{
                    font-weight: 500;
                    font-size: 12px;
                    line-height: 16px;
                    color: #FFFFFF;
                }
            }
        }

        .contact{
            display: flex;
            flex-direction: column;
            padding-top: 8px;

            .phone{
                display: flex;
                align-items: center;
                padding-left: 86px;
                padding-bottom: 8px;
                font-weight: bold;
                font-size: 12px;
                line-height: 16px;
                color: #FFFFFF;

                img{
                    width:12px;
                    height:12px;
                    margin-right: 10px;
                }
            }
        }

        .icons{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 24px;
            img{
                width: 16px;
                height: 16px;
                margin-right: 24px;
            }
            img:last-child{
                margin-right: 0;
            }
        }
    }

    .v3{
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;

        .contact{
            display: flex;
            flex-direction: column;
            align-items: center;

            .phone{
                display: flex;
                align-items: center;
                font-weight: bold;
                padding-bottom:12px;
                font-size: 12px;
                line-height: 16px;
                color: #FFFFFF;

                img{
                    width:12px;
                    height:12px;
                    margin-right: 10px;
                }
            }

            .email{
                display: flex;
                align-items: center;
                font-weight: bold;
                padding-bottom:12px;
                font-size: 14px;
                line-height: 19px;
                color: #FFFFFF;

                img{
                    width:12px;
                    height:12px;
                    margin-right: 10px;
                }
            }
        }

        .icons{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 28px;
            img{
                width: 19px;
                height: 19px;
                margin-right: 28px;
            }
            img:last-child{
                margin-right: 0;
            }
        }
    }


    .emailSignature{
        width: 600px;
        height: 150px;
        background-size: contain;
        background-image: url("/images/resume_themes/theme8/emailBackground.png");
        font-family: 'Thabit', monospace !important;

        .wrapper{
            padding: 18px;
        }

        .signature_avatar{
            img{
                width:117px;
                height:117px;
                margin-right: 15px;
            }
        }

        .info{
            display: flex;
            flex-direction: column;
            font-family: 'Thabit', monospace !important;

            .name_title{
                display: flex;
                align-items: center;
                .card-name{
                    font-style: normal;
                    font-weight: bold;
                    font-size: 24px;
                    line-height: 32px;
                    color: #005BD1;
                    margin-right: 19px;
                }
                .title{
                    margin-left: 19px;
                    font-style: normal;
                    font-weight: 500;
                    font-size: 12px;
                    line-height: 16px;

                    color: #FFFFFF;
                }

                .horizontal-divider {
                    height: 24px;
                    width: 1px;
                    background:  rgba(255, 255, 255, 0.38);;
                }

            }


            .contact{
                margin-top: 26px;
                display: flex;

                .phone{
                    margin-right: 33px;
                    display: flex;
                    align-items: center;

                    font-weight: bold;
                    font-size: 12px;
                    line-height: 16px;
                    color: #FFFFFF;

                    img{
                        width:12px;
                        height:12px;
                        margin-right: 10px;
                    }
                }

            }

            .icons{
                display: flex;
                align-items: flex-end;
                justify-content: flex-end;
                margin-top: 25px;
                img{
                    width: 21px;
                    height: 21px;
                    margin-right: 24px;
                }
                img:last-child{
                    margin-right: 0;
                }
            }

        }

    }


</style>
