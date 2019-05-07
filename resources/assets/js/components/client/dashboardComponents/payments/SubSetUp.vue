<template>
    <div>
        <nav class="navbar navbar-light fixed-top client_navbar">
            <div class="backBtn">
                <a href="#">
                    <img src="/resumeApp/public/images/client/arrow_back.png" alt="back-icon">
                </a>
                SUBSCRIPTION PLAN UPDATE
            </div>
        </nav>
        <!--navbar-->
        <div class="d-flex justify-content-center">
        <div class="main-grid">
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
                <img src="/resumeApp/public/images/client/payments/date_range_24px.svg" style="margin-right: 20px;"/>
                Total number of weeks
            </div>

            <div class="row d-flex justify-content-between align-items-end">

                <select id="set" class="form-control form-control-MD check-width">
                    <option selected value="">2 weeks</option>
                    <option value="">...</option>
                </select>

                <div class="col-12 col-sm-4 col-md-6 col-lg-8 d-flex align-items-center check-position" style="display: block;">
                    <input type="checkbox" class="chechbox-blue" onclick="" id="checked"/>
                    <label class="agreement-text" style="margin-bottom: 0;"> no end date</label>
                </div>
            </div>
                <div class="grey-text" id="text">Campaign period: 4.04.19 — 4.01.20</div>

            <hr/>
            <div class="sub-text orange-color">
                Agent № 1
            </div>
            <div class="text d-flex align-items-center">
                <img src="/resumeApp/public/images/client/payments/watch_later_24px.svg" style="margin-right: 20px;"/>
                Total number of weeks
            </div>
            <select id="Setset" class="form-control form-control-MD  check-width">
                <option selected value="">15 Hours</option>
                <option value="">16 Hours</option>
            </select>


            <div class="d-flex justify-content-center">
                <button class="blue-button">ADD OTHER AGENT</button>
            </div>

            <hr/>

            <div class="d-flex justify-content-end">
                <button class="agreement-button button-size">CONTINUE</button>
            </div>
        </div>
        </div>
    </div>
</template>
<script type="text/javascript">
    $(document).ready(function(){

    $(":checkbox[class=chechbox-blue]").on("change",function(){
        var red = document.getElementById('checked').checked;
        var text = document.getElementById('text');
        console.log(red);
        if (red == true) {
            $(text).css({visibility: 'hidden'});
        }
        else {
            $(text).css({visibility: 'visible'});
        }

    })

})
</script>
