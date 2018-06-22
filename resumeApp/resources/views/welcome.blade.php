@extends('layouts.client-app')

@section('content')
    <div id="content">
        <div>
            <div id="chatBox" class="col-md-3 col-12 col-lg-3">
                <div class="chatHeading">
                    <div class="text btn-block">
                        <span style="padding-right: 5px;">
                            <img src="resumeApp/resources/views/customTheme/images/textsms_24px copy.png" width="20px">
                        </span>
                        Chat with us
                        <a href="#" id="closeChat"> <img src="resumeApp/resources/views/customTheme/images/Rectangle.png"
                                                   width="15px"> </a>
                    </div>
                    <div class="secondText btn-block">
                        <div class="row">
                            <div style="padding-top: 8px;">
                                <img src="resumeApp/resources/views/customTheme/images/logo123.png" width="36px">
                            </div>
                            <div class="">
                                <span style="color: #637280;font-family: Roboto;font-size: 12px;">We're Here to Help!</span><br/>
                                <span style="color: #00CE6B;font-family: Roboto;font-size: 12px;">online</span>
                            </div><hr>
                        </div>
                    </div>
                </div>
                <div id="app">
                    <div class="container">
                        <div class="empty" v-show="messages.length === 1" style="padding-top:330px;">
                            <div class="text-info text text-chat">Hi, how can I hep you ?</div>
                        </div>
                        <div class="empty" v-show="messages.length === 2" style="padding-top:330px;">
                            <div class="text-info text text-chat">Hi, how can I hep you ?</div>
                        </div>
                        <div class="empty" v-show="messages.length === 3" style="padding-top:330px;">
                            <div class="text-info text text-chat">Hi, how can I hep you ?</div>
                        </div>
                        <div class="empty" v-show="messages.length === 4" style="padding-top:330px;">
                            <div class="text-info text text-chat">Hi, how can I hep you ?</div>
                        </div>
                        <chat-log :messages="messages" style="padding-top:150px;"></chat-log>
                    </div><br/>
                    <div class="container">
                        {{-- v-on:messageSent means when the event is emited --}}
                        {{-- addMessage method should be defiened on the root scope not components--}}
                        <chat-composer v-on:messagesent="addMessage"></chat-composer>
                    </div>
                </div>
            </div>
        </div>
        <!-- Success Messages  -->
        @if(session()->has('successMessage'))
            <div class="alert alert-success col-md-4 offset-md-1 successMessage">
                {{ session()->get('successMessage') }}
            </div>
        @endif
        <div id="mainSection">
            <div class="row customContainer">
                <div class="col-md-8">
                    <div class="mainSectionHeading">
                        Ensure your <span>business success</span> by hiring approved Freelancers.
                    </div>
                    <div class="mainSectionSubHeading">
                        Access our global talent network of professional Freelancers, they are<br/>reliable, qualified and ready to join your team.
                    </div>
                    <div class="buttonMain col-md-6">
                        <a class="hireBtn" href="#">Hire Talent</a>
                    </div>
                </div>
            </div>

        </div>

        <div id="freelancers">
            <div class="row customContainer">
                <div class="col-md-8">
                    <div class="secondSectionHeading">
                        Hire Top<br/><span>Freelancers.</span>
                        <div class="lineDivider"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <section class="freelancers">
                        <div class="slickSlide">
                            <div class="col-md-12 freelancerBox">
                                <a href="#" class="itemLink">
                                    <div class="freelancerItem">
                                        <img src="/resumeApp/resources/views/customTheme/images/freelancers/Dmitri.jpg" alt="freelancer" class="slickFreelancerImg">
                                        <div class="freelancerData">
                                            <div class="freelancerName nohover">
                                                Dmitri
                                            </div>
                                            <div class="freelancerJob">
                                                Full-Stack Developer
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-12 freelancerBox">
                                <a href="#" class="itemLink">
                                    <div class="freelancerItem">
                                        <img src="/resumeApp/resources/views/customTheme/images/freelancers/Anton.jpg" alt="freelancer"  class="slickFreelancerImg">
                                        <div class="freelancerData">
                                            <div class="freelancerName">
                                                Anton
                                            </div>
                                            <div class="freelancerJob">
                                                Python Developer
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-12 freelancerBox">
                                <a href="#" class="itemLink">
                                    <div class="freelancerItem">
                                        <img src="/resumeApp/resources/views/customTheme/images/freelancers/Arnold.jpg" alt="freelancer"  class="slickFreelancerImg">
                                        <div class="freelancerData">
                                            <div class="freelancerName">
                                                Arnold
                                            </div>
                                            <div class="freelancerJob">
                                                UX_UI Designer
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-12 freelancerBox">
                                <a href="#" class="itemLink">
                                    <div class="freelancerItem">
                                        <img src="/resumeApp/resources/views/customTheme/images/freelancers/Costa.jpg" alt="freelancer"  class="slickFreelancerImg">
                                        <div class="freelancerData">
                                            <div class="freelancerName">
                                                Costa
                                            </div>
                                            <div class="freelancerJob">
                                                Front-End Developer
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-12 freelancerBox">
                                <a href="#" class="itemLink">
                                    <div class="freelancerItem">
                                        <img src="/resumeApp/resources/views/customTheme/images/freelancers/Evgeny.jpg" alt="freelancer"  class="slickFreelancerImg">
                                        <div class="freelancerData">
                                            <div class="freelancerName">
                                                Evgeny
                                            </div>
                                            <div class="freelancerJob">
                                                PHP Developer
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-12 freelancerBox">
                                <a href="#" class="itemLink">
                                    <div class="freelancerItem">
                                        <img src="/resumeApp/resources/views/customTheme/images/freelancers/Jon.png" alt="freelancer"  class="slickFreelancerImg">
                                        <div class="freelancerData">
                                            <div class="freelancerName">
                                                Jon
                                            </div>
                                            <div class="freelancerJob">
                                                UI Designer
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-12 freelancerBox">
                                <a href="#" class="itemLink">
                                    <div class="freelancerItem">
                                        <img src="/resumeApp/resources/views/customTheme/images/freelancers/Lars.jpg" alt="freelancer"  class="slickFreelancerImg">
                                        <div class="freelancerData">
                                            <div class="freelancerName">
                                                Lars
                                            </div>
                                            <div class="freelancerJob">
                                                Javascript Developer
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-12 freelancerBox">
                                <a href="#" class="itemLink">
                                    <div class="freelancerItem">
                                        <img src="/resumeApp/resources/views/customTheme/images/freelancers/Michelle.jpg" alt="freelancer"  class="slickFreelancerImg">
                                        <div class="freelancerData">
                                            <div class="freelancerName">
                                                Michelle
                                            </div>
                                            <div class="freelancerJob">
                                                UI Designer
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-12 freelancerBox">
                                <a href="#" class="itemLink">
                                    <div class="freelancerItem">
                                        <img src="/resumeApp/resources/views/customTheme/images/freelancers/Shen.jpg" alt="freelancer"  class="slickFreelancerImg">
                                        <div class="freelancerData">
                                            <div class="freelancerName">
                                                Shen
                                            </div>
                                            <div class="freelancerJob">
                                                iOS Developer
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-12 freelancerBox">
                                <a href="#" class="itemLink">
                                    <div class="freelancerItem">
                                        <img src="/resumeApp/resources/views/customTheme/images/freelancers/Vitaly.jpg" alt="freelancer"  class="slickFreelancerImg">
                                        <div class="freelancerData">
                                            <div class="freelancerName">
                                                Vitaly
                                            </div>
                                            <div class="freelancerJob">
                                                UX Designer
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <div class="line"></div>

        <div id="freelanceTalent">
            <div class="row customContainer">
                <div class="col-md-6">
                    <div class="secondSectionHeading">
                        Global<br/><span>Freelance Talent</span>
                        <div class="lineDivider"></div>
                    </div>
                    <div class="talentText">
                        We connect companies to a distributed global network of highly skilled developers & designers - available for hire - on demand.
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="/resumeApp/resources/views/customTheme/images/new_theme/map_freelancer.png" alt="freelancers map" width="100%">
                </div>
            </div>
        </div>

        <div id="devDesBoxes">
            <div class="row">
                <div class="col-md-5 addMargin offset-md-1">
                    <div id="designerBox">
                        <div class="designerBox">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 borderRight">
                                    <div class="designerLeftSide">
                                        <img src="/resumeApp/resources/views/customTheme/images/new_theme/design_icon.png" alt="design image">
                                        <h2>
                                            Access to a network of insightful, emotionally intelligent & professional designers specializing in UI & UX Design , with artistic creative vision , inspiration and understanding  of user engagement.
                                        </h2>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="designerRightSide">
                                        <h2>
                                            <img src="/resumeApp/resources/views/customTheme/images/new_theme/rec_developers@2x.png" alt="rec"> Designers
                                        </h2>
                                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter"><img src="/resumeApp/resources/views/customTheme/images/new_theme/arrow@2x.png" alt="arrow"> Website/ App Design</a><br/>
                                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter"><img src="/resumeApp/resources/views/customTheme/images/new_theme/arrow@2x.png" alt="arrow"> UX/ UI Design</a><br>
                                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter"><img src="/resumeApp/resources/views/customTheme/images/new_theme/arrow@2x.png" alt="arrow"> Branding & Marketing</a><br/>

                                        <div class="getStartBtn col-md-8">
                                            <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                                                Get Started <img src="/resumeApp/resources/views/customTheme/images/new_theme/arrow@2x.png" alt="arrow">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-5">
                    <div id="developerBox">
                        <div class="designerBox" >
                            <div class="row">
                                <div class="col-md-6 borderRight">
                                    <div class="designerLeftSide">
                                        <img src="/resumeApp/resources/views/customTheme/images/new_theme/code_icon.png" alt="design image">
                                        <h2>
                                            Access Highly Skilled Developers proficient in programming languages such as Javascript, node.js, PHP, HTML/CSS, Python, Java, .NET                                    </h2>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="designerRightSide">
                                        <h2>
                                            <img src="/resumeApp/resources/views/customTheme/images/new_theme/reg_developers@2x.png" alt="rec"> Developers
                                        </h2>
                                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter"><img src="/resumeApp/resources/views/customTheme/images/new_theme/arrow@2x.png" alt="arrow"> Full-Stack Developers</a><br/>
                                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter"><img src="/resumeApp/resources/views/customTheme/images/new_theme/arrow@2x.png" alt="arrow"> Front-end Developers</a><br>
                                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter"><img src="/resumeApp/resources/views/customTheme/images/new_theme/arrow@2x.png" alt="arrow"> Back-end Developers</a><br/>
                                        <div class="getStartBtn col-md-8">
                                            <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                                                Get Started <img src="/resumeApp/resources/views/customTheme/images/new_theme/arrow@2x.png" alt="arrow">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div id="ourClients">
            <div class="heading">
                <h2>
                    We’re here to help you get started today
                </h2>
            </div>
            <div class="row clientsBox">
                <div class="col-md-6 leftSide">
                    <div class="secondSectionHeading">
                        We love<br/><span>Our clients.</span>
                        <div class="lineDivider"></div>
                    </div>
                    <div class="talentText">
                        Register your company today & we will connect you with the talent you need.
                    </div>
                </div>
                <div class="col-md-6 rightSide">
                    <form id="contact-form" method="POST" class="clientForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div><label for="bussinessName" class="formLabel">Business Name</label></div>
                                    <input type="text" id="bussinessName" name="Business Name" placeholder="" class="form-control panelFormInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="name" class="formLabel">Name *</label>
                                </div>
                                <input type="text" placeholder="" id="name" name="Name" required="required" class="form-control panelFormInput">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <label for="telephone" class="formLabel">Telephone *</label>
                                </div>
                                <input type="tel" placeholder="" name="" class="panelFormInput form-control">
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="telephone" class="formLabel">Email *</label>
                                </div>
                                <input type="text" placeholder="" name="Email" required="required" class="form-control panelFormInput">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6 designerBtn">
                                <!--                                <input type="checkbox" id="bookkeper" name="bookkeper" class="check-input">-->
                                <a href="javascript:void(0)">
                                    <img src="resumeApp/resources/views/customTheme/images/Circle-PNG-HD.png" width="30" height="30"> I need a Designer
                                </a>
                            </div>
                            <div class="col-md-6 designerBtn">
                                <!--                            <input type="checkbox" id="accountant" name="accountant" class="check-input">-->
                                <a href="javascript:void(0)">
                                    <img src="resumeApp/resources/views/customTheme/images/img_143278 (2).png" width="30" height="30"> I need a Developer
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <select name="Select-time" class="form-control">
                                    <option value="partTime">Part time</option>
                                    <option value="fullTime">Full time</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="buttonMain col-md-6 offset-md-3" style="padding-bottom: 30px;">
                                <input type="submit" value="Send" class="hireBtn btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



