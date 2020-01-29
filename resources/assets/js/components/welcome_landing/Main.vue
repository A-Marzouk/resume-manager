<template>
    <v-app>
        <v-content>
            <v-container>
                <HeroSection />
                <VideoSection />
                <SliderSection />
                <TestimonioSection />
                <ContactSection />
            </v-container>
            <div class="footer-section">
                <img src="/images/welcome_landing_page/icons/logo-white.png" alt="">
            </div>
        </v-content>
    </v-app>
</template>
<script>
    import HeroSection from './sections/HeroSection';
    import VideoSection from './sections/VideoSection';
    import SliderSection from './sections/SliderSection';
    import TestimonioSection from './sections/TestimonioSection';
    import ContactSection from './sections/ContactSection';

    export default {
        name: 'App',

        components: {
            HeroSection,
            VideoSection,
            SliderSection,
            TestimonioSection,
            ContactSection
        },

        data: () => ({
            //
        }),
    };
</script>
<style lang="scss">

    @import '/images/welcome_landing_page/styles/slick.css';
    @import url('//fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap');
    @import url('//fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap');

    /** General carousel duration scroll transition */
    .v-window-x-transition-enter-active,
    .v-window-x-transition-leave-active{
        transition-duration: 1.5s
    }

    body{

        .v-content{
            background-image: url('/images/welcome_landing_page/icons/new-background.png');
            background-position: 0 53px;
            background-repeat: no-repeat;
            background-color: #f8f8f8;

            @media screen and (max-width: 769px) {
                background-color: #fff;
                background-image: url('/images/welcome_landing_page/icons/bg-new-tablet.png');
                background-position: center 6em;

            }
        }

    }
    .hideOnTab{
        display: block;
        @media screen and (max-width: 769px) {
            display: none !important;
        }
    }

    .container{
        padding: 70px 12px 125px 12px;

        @media (min-width: 960px){
            max-width: 85%;
        }

        @media (min-width: 1264px){
            max-width: 90%;

        }
        @media (min-width: 1904px){
            max-width: 81%;
        }
        @media screen and (max-width: 769px) {
            padding: 40px 12px 148px 12px;
            width: auto;
            margin: 0px 20px !important;
        }
        @media only screen
        and (min-device-width: 320px)
        and (max-device-width: 480px)
        and (-webkit-min-device-pixel-ratio: 2) {

            margin: 0px 10px !important;
            padding: 30px 12px 100px 12px;
        }

        @media only screen
        and (min-device-width: 769px)
        and (max-device-width: 1264px) {


            max-width: 95%;


            .hero-wrap{
                .form-wrap{
                    justify-content: center;
                    margin-top: 3em;

                    .hold-form{
                        max-width: 70%;
                    }
                }
                .intro-section h1{
                    padding-top: 0px;
                }
            }
            .video-wrap{
                .video-section{
                    padding-top: 0px;
                }
                .player-wrap{
                    .hold-video{
                        min-height: auto;
                        padding: 10px 15px;

                        .video__poster,video{
                            min-height: 460px;
                        }
                        .video__poster{
                            min-width:96.5%;

                            a{
                                width: 100px;
                                height: 100px;
                                border: 20px solid #2410A4;
                                line-height: 50px;

                                i{
                                    font-size: 60px;
                                }
                            }
                        }
                    }
                }
                .vicon-set{

                    img{
                        max-height: 80vh;
                    }
                }
            }

            .slider-wrap{

                .iconset-slider{
                    justify-content: center;

                    img{
                        margin: 0;
                        max-height: 80vh;
                    }
                }

                .text-section{
                    padding-top: 0px;
                }

                .hold-slider{
                    .nav-slider{
                        width: 25%;
                        top: 3em;
                        right: 1%;
                        left: auto;

                        a{
                            width: 50px;
                            height: 50px;

                            img{
                                max-width: 20px;
                            }
                        }
                    }
                    .slick-dots li{
                        margin: 0px 6px;

                        button{
                            width: 20px;
                            height: 20px;
                        }
                    }
                }

                .slider-section{
                    margin-bottom: 5em;
                }
            }
            .comments-wrap{
                margin-bottom: 30px;

                .top-resumes{
                    margin-top: 50px;
                    display: flex;
                    justify-content: center;
                    flex-flow: wrap;

                    .item-top{
                        max-width: 100%;
                        width: 600px;

                        .top-info{
                            min-width: 75%;
                        }
                    }
                }
            }

            .contact-wrap{
                .contact-section{
                    .follow-section{
                        .item-follow{
                            font-size: 20px;
                            line-height: 30px;
                            margin:0px 5%;
                        }
                    }
                }
            }

            .link_next{
                margin-top: 30px;
            }

            .hold-slider .slick-slide.slick-current{
                width: 480px !important;
                min-height: auto;
                height: 400px;
            }
            .hold-slider .slick-slide.slick-current .slide-resume{
                min-width: 480px;
            }
            .hold-slider .slick-slide.slick-current img{
                min-width: 480px;
            }

        }



    }

    .footer-section{
        justify-content: center;
        align-items: center;
        display: flex;
        background: #0F4CEE;
        min-height: 150px;

        @media only screen
        and (min-device-width: 320px)
        and (max-device-width: 480px)
        and (-webkit-min-device-pixel-ratio: 2) {
            min-height: 140px;

            img{
                max-width: 250px;
            }
        }

    }

    /** General landing elements */
    h1,.title-two,.title-three{
        font-family: "Montserrat";
        font-style: normal;
        font-weight: bold;
        color: #272944;
        text-transform: capitalize;
    }

    h1{
        font-size: 72px;
        line-height: 80px;
    }
    .title-two{
        font-size: 64px;
        line-height: 80px;

        @media screen and (max-width: 769px) {
            font-size: 50px;
            line-height: 60px;
        }

        @media only screen
        and (min-device-width: 320px)
        and (max-device-width: 480px)
        and (-webkit-min-device-pixel-ratio: 2) {
            font-size: 30px;
            line-height: 40px;
        }
    }
    .title-three{
        font-size: 52px;
        line-height: 63px;
        color: #272944;

        @media screen and (max-width: 769px) {
            font-size: 50px;
            line-height: 60px;
        }

        @media only screen
        and (min-device-width: 320px)
        and (max-device-width: 480px)
        and (-webkit-min-device-pixel-ratio: 2) {
            font-size: 28px;
            line-height: 38px;
        }

    }
    p{
        font-family: "Open Sans";
        font-style: normal;
        font-weight: 300;
        font-size: 24px;
        line-height: 36px;
        color: #575757;

        @media only screen
        and (min-device-width: 320px)
        and (max-device-width: 480px)
        and (-webkit-min-device-pixel-ratio: 2) {
            font-size: 20px;
            line-height: 30px;
        }
    }
    .btn-inset{
        width: 299px;
        min-height: 103px;
        line-height: 103px;
        text-decoration: none;
        justify-content: center;
        align-items: center;
        display: flex;

        font-family: "Montserrat";
        font-style: normal;
        font-weight: bold;
        font-size: 18px;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: #FFFFFF !important;

        background: #F8F8F8;
        box-shadow: inset 6px 4px 10px rgba(185, 185, 185, 0.6),
        inset -6px -4px 16px #FFFFFF;
        border-radius: 20px;
        transition: all 200ms ease;

        &.full{
            width: 100%;

            i{
                min-width: 92%;
            }
        }

        &.light__red{
            i{
                background: #E91E63;
                box-shadow: -6px -6px 16px #FFFFFF,
                6px 6px 16px rgba(221, 219, 216, 0.4),
                4px 4px 50px rgba(233, 30, 99, 0.2);
            }
        }
        &.light__blue{
            i{
                background: #0046FE;
                box-shadow: -6px -6px 16px #FFFFFF,
                6px 6px 16px rgba(221, 219, 216, 0.4),
                4px 4px 20px rgba(25, 0, 180, 0.2);
            }
        }
        &.light__purple{
            i{
                background: #C228D6;
                box-shadow: -6px -6px 16px #FFFFFF,
                6px 6px 16px rgba(221, 219, 216, 0.4),
                4px 4px 50px rgba(194, 40, 214, 0.2);
            }
        }
        &.light__green{
            i{
                background: #00E4D7;
                box-shadow: -6px -6px 16px #FFFFFF,
                6px 6px 16px rgba(221, 219, 216, 0.4),
                4px 4px 50px rgba(0, 238, 224, 0.2);
            }
        }




        i{
            font-style: normal;
            min-width: 266px;
            min-height: 78px;
            line-height: 78px;
            text-align: center;
            background: #ccc;
            border-radius: 20px;
        }

        &:hover{
            opacity: .8;
        }

        @media only screen
        and (min-device-width: 320px)
        and (max-device-width: 480px)
        and (-webkit-min-device-pixel-ratio: 2) {

            box-shadow: inset 3px 2px 5px rgba(185, 185, 185, 0.6),
            inset -3px -2px 8px #FFFFFF;
            border-radius: 15px;
            min-height: 70px;
            line-height: 70px;

            i{
                min-height: 50px;
                line-height: 50px;
                border-radius: 15px;
                min-width: 90%;
            }
        }

    }

    .form-wrap{
        justify-content: flex-end;
        display: flex;

        .v-input input:invalid, .v-input textarea:invalid{
            box-shadow: -6px -6px 16px #FFFFFF,
            inset 6px 4px 12px rgba(0, 0, 0, 0.25),
            inset -6px -4px 12px #FFFFFF;
            border: 1px solid #fff;

            @media only screen
            and (min-device-width: 320px)
            and (max-device-width: 480px)
            and (-webkit-min-device-pixel-ratio: 2) {
                box-shadow: -3px -3px 8px #FFFFFF,
                inset 3px 2px 6px rgba(0, 0, 0, 0.25),
                inset -3px -2px 6px #FFFFFF;
                border: 1px solid #fff;
            }
        }
    }


    /** Forms fixes landing */
    .v-text-field{
        input{
            background: #F8F8F8;
            box-shadow: -6px -6px 16px #FFFFFF,
            inset 6px 4px 12px rgba(0, 0, 0, 0.25),
            inset -6px -4px 12px #FFFFFF;
            border-radius: 15px;
            min-height: 81px;
            padding-left: 30px;


            &::placeholder{
                color: rgba(97, 97, 97, 0.3) !important;
            }
        }

        .v-input__slot{

            &::before,
            &::after{
                border: 0px !important;
            }
        }

        padding-bottom: 10px;

        @media screen and (max-width: 769px) {

            input{
                padding-left: 55px;
            }

        }
        @media only screen
        and (min-device-width: 320px)
        and (max-device-width: 480px)
        and (-webkit-min-device-pixel-ratio: 2) {

            padding-bottom: 0;
            padding-top: 0;

            input{
                padding-left: 30px;
                min-height: 50px;
            }
        }
    }

    .v-carousel{
        .v-responsive__content{
            display: flex;
            justify-content: space-between;
            align-items: flex-start;

            @media only screen
            and (min-device-width: 320px)
            and (max-device-width: 480px)
            and (-webkit-min-device-pixel-ratio: 2) {
                justify-content: center;
                align-items: center;
                flex-flow: column;
                text-align: center;
            }
        }
    }



</style>
