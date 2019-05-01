<template>
    <div>
        <nav class="navbar navbar-light fixed-top client_navbar">
            <div class="backBtn">
                <a href="#">
                    <img src="/resumeApp/public/images/client/arrow_back.png" alt="back-icon">
                </a>
                FINISH YOUR SUBSCRIPTION PLAN UPDATE
            </div>
        </nav>
        <!--navbar-->

        <div class="form-main-grid main-grid">
            <div class="header-text">
                <img src="/resumeApp/public/images/client/plan.png" alt=""  class="icon-margin small-image">
                SUBSCRIPTION PLAN UPDATE
            </div>
            <!--title-->
            <hr/>
            <div class="sub-text blue-color">
                SET UP YOUR SUBSCRIPTION PLAN
            </div>

            <div class="text d-flex align-items-center">
                <img src="/resumeApp/public/images/client/payments/week.png" style="margin-right: 20px;"/>
                Total number of weeks
            </div>

            <div class="row d-flex justify-content-between align-items-end">

                <select id="set" class="form-control form-control-MD check-width">
                    <option selected value="">2 weeks</option>
                    <option value="">...</option>
                </select>

                <div class="col-12 col-sm-4 col-md-6 col-lg-8 d-flex align-items-center check-position" style="display: block;">
                    <input type="checkbox" class="chechbox-blue" title=""/>
                    <label class="agreement-text" style="margin-bottom: 0;"> no end date</label>
                </div>
            </div>
                <div class="grey-text">Campaign period: 4.04.19 — 4.01.20</div>



            <hr/>
            <div class="sub-text orange-color">
                Agent № 1
            </div>
            <div class="text d-flex align-items-center">
                <img src="/resumeApp/public/images/client/payments/time.png" style="margin-right: 20px;"/>
                Total number of weeks
            </div>
            <select id="Setset" class="form-control form-control-MD  check-width">
                <option selected value="">15 Hours</option>
                <option value="">16 Hours</option>
            </select>


            <div class="">
                <button class="blue-button">ADD OTHER AGENT</button>
            </div>

            <hr/>

            <div class="d-flex justify-content-end">
                <button class="agreement-button button-size">COUNTINU</button>
            </div>
        </div>
    </div>
</template>
