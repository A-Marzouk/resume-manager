<template>
  <div>
    <nav class="navbar navbar-light fixed-top client_navbar">
      <div class="backBtn">
        <a href="#">
                   <img src="/images/client/arrow_back.png" alt="back-icon">
               </a>
        FINISH YOUR SUBSCRIPTION PLAN UPDATE
      </div>
    </nav>
    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-12 col-md-11 col-lg-10 main-grid header-text">
          <div class="header-text"> <img src="/images/client/plan.png" alt=""  class="icon-margin small-image">
                       SUBSCRIPTION PLAN UPDATE</div>
            <!--header-->
            <hr />
            <!--CAMPAIGN MANAGER part-->
            <div class="manager-blue-text">
              CAMPAIGN MANAGER
            </div>
            <div class="manager-text">We recommend that you add a campaign manager to communicate with you about your campaign. Managers are experienced agents that will be effective at optimizing your campaign to achieve the best results</div>
            <div class="manager-text"
                 style="margin:25px 0;"> We recommend 4 hours of campaign management time based upon your subscription of 40 hours per week.</div>
            <!--will active when checked-->
            <div>
              <input type="text"
                     name="new"
                     id="quantity"
                     class="able"
                     disabled>
              <label for="red"
                     class="label label_sm">= 10% of your subscription </label>
              <br />
              <label for="red"
                     class="label"
                     style="display: inline-block; margin: 25px 0 0;"> If you wish to proceed with adding a campaign manager your manager will be</label>
              <label for="red"
                     class="blue-label">Conor Marjoram</label>
            </div>
            <div class="d-flex align-items-center"
                 style="margin-bottom: 20px; margin-top: 20px;">
              <input type="checkbox"
                     class="chechbox-blue"
                     name="new"
                     id="red"
                     value="able">
              <label class="manager-text"
                     style="margin: 0;"> I agree with the privacy agreemen</label>
            </div>
            <hr />
            <div class="d-flex justify-content-lg-start align-items-baseline">
              <img src="/images/client/payments/amount.png" style="margin-right: 10px; position: relative; top: 10px;"/>
              <div>
                <div class="manager-blue-text d-flex align-items-center"
                     style="margin-top: 5px;">
                  WEEKLY RATE CALCULATION
                </div>
                <div class="manager-text">40 agent hours <span style="color: #FFA368; margin: 0 7px;">$400</span> + 10% (4 manager hours <span style="color: #FFA368; margin: 0 7px;"> $ 40</span></div>
                <div class="manager-blue-text d-flex align-items-center">
                  TOTAL WEEKLY AMOUNT
                </div>
                <div style="color: #FFA368; margin: -15px 7px 7px;"
                     class="manager-text">$400</div>
              </div>
            </div>
            <hr />
            <div class="d-flex justify-content-end">
              <button class="blue-button">FINISH PAYMENT</button>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>
<script>
$(document).ready(function() {

  $(":checkbox[class=chechbox-blue]").on("change", function() {
    $("input[class = " + $(this).attr("value") + "]").prop("disabled", !$(this).prop("checked"));
    var red = document.getElementById('red').checked;
    console.log(red);
    if (red == true) {
      $('label[for=red]').css({ opacity: 1 });
    } else {
      $('label[for=red]').css({ opacity: 0.4 });
    }

  })

})
</script>
