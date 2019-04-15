<template>
    <div class="container">
        <div class="row">

            <!-- login header  -->
            <div class="container headerStyle">
                <div class="row">
                    <div class="col">
                        <div class="row center-align">
                            <a href="#">
                                <img src="assets/img/icon/ic/ic_arrow_back_app_bar.png" alt="" class="header-icon">
                            </a>
                            ADD NEW AGENT
                        </div>
                    </div>
                </div>
            </div>

            <!-- login header  -->

            <!-- form  -->
            <div class="container form-main-grid main-grid">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 header-text">
                        <img src="assets/img/icon/ic/search_40px.png" alt=""  class="icon-margin small-image">
                        ENTER THE PARAMETERS OF SEARCH
                    </div>

                    <!-- login form header -->

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr/>
                            </div>
                        </div>
                    </div>

                    <!-- login form -->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">

                                <form>
                                    <div class="form-row">

                                        <!--form first column  -->
                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 input_divider">
                                                    <label for="">Enter primary job title</label>
                                                    <input type="text" class="form-control form-control-sm borderinput" placeholder="e.g. Telesale">
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12 input_divider">
                                                    <label for="">Enter sector experience</label>
                                                    <input type="text" class="form-control form-control-sm borderinput" placeholder="PARAMETERS OF SEARCH">
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12 input_divider">
                                                    <label for="">Enter technologies/ frameworks/software</label>
                                                    <input type="text" class="form-control form-control-sm borderinput" placeholder="you can enter several ">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end form first column -->

                                        <!-- form second column -->
                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 form-group input_divider">
                                                    <label for="inState" class="">Choose voice character (for sales-agents)</label>
                                                    <select id="inState" class="form-control form-control-MD">
                                                        <option selected value="">Voice chapter 1 type</option>
                                                        <option value="">...</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-12 col-md-12 col-lg-12 input_divider">
                                                    <label for="">Specify available hours per week</label>
                                                    <input type="text" class="form-control form-control-sm borderinput" placeholder="25">
                                                </div>

                                                <div class="col-sm-12 col-md-12 col-lg-12 ">
                                                    <div class="row form-control-sm">

                                                        <div class="col-12 col-sm-12 col-md-6">
                                                            <div class="col-sm-12 form-control-sm input_divider">
                                                                <label for="" >Choose languages</label>
                                                                <div class="row">
                                                                    <div class="col-1 radio-grid">

                                                                        <!-- english flag icon -->
                                                                        <div class="radio-button">
                                                                            <input type="radio" name="language" class="sr-only" id="english">
                                                                            <label for="english">
                                                                                <img src="assets/img/icon/language/english_icon.png" alt="english">
                                                                            </label>
                                                                            <div class="">
                                                                                <label for="english">english</label>
                                                                            </div>
                                                                        </div>

                                                                        <!-- spanish flag -->
                                                                        <div class="">
                                                                            <input type="radio" name="language" class="sr-only" id="spanish">
                                                                            <label for="spanish">
                                                                                <img src="assets/img/icon/language/spanish_icon.png" alt="english">
                                                                            </label>
                                                                            <div class="">
                                                                                <label for="spanish">spanish</label>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="col-sm-12 form-control-sm input_divider">
                                                                <label for="">Choose gender</label>
                                                                <div class="row">

                                                                    <!-- male icon -->
                                                                    <div class="col-1 radio-grid">
                                                                        <div class="radio-button">
                                                                            <input type="radio" name="gender" class="sr-only" id="male">
                                                                            <label for="male">
                                                                                <img src="assets/img/icon/gender/male_icon.png" alt="male">
                                                                            </label>
                                                                            <div class="">
                                                                                <label for="male" class="icon-lable">male</label>
                                                                            </div>
                                                                        </div>

                                                                        <!-- female icon -->
                                                                        <div class="radio-button">
                                                                            <input type="radio" name="gender" class="sr-only" id="female">
                                                                            <label for="female">
                                                                                <img src="assets/img/icon/gender/female_icon.png" alt="female">
                                                                            </label>
                                                                            <div class="">
                                                                                <label for="female" class="icon-lable">female</label>
                                                                            </div>
                                                                        </div>

                                                                        <!-- both icon -->
                                                                        <div class="">
                                                                            <input type="radio" name="gender" class="sr-only" id="both">
                                                                            <label for="both">
                                                                                <img src="assets/img/icon/gender/both_gender_icon.png" alt="both">
                                                                            </label>
                                                                            <div class="">
                                                                                <label for="both" class="icon-lable">both</label>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- end form second column  -->

                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <hr/>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- form btns -->
                                        <div class="col-sm-12">
                                            <div class="form-row">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-6 col-md-8 right-side">
                                                            <button type="button" class="btn btn-left">VIEW SAVED SEARCH</button>
                                                        </div>
                                                        <div class="col-12 col-sm-6 col-md-4">
                                                            <div class="row">
                                                                <div class="col-12 center-content">
                                                                    <button type="button" class="btn btn-right-top">SEARCH FOR AGENTES</button>
                                                                </div>
                                                                <div class="col-12 center-content">
                                                                    <button type="button" class="btn btn-right-bottom">SAVE THIS SEARCH</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end from btns -->



                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- login form -->


                </div>
            </div>



        </div>
    </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Add agent Component mounted.')
        }
    }
</script>
