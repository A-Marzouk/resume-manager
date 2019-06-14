<template>
  <div>
    <nav class="navbar navbar-light fixed-top dashboard_navbar">
      <div class="backBtn">
        <a href="/client/dashboard/payments">
                    <img src="/images/client/arrow_back.png" alt="back-icon">
                </a>
        059-004-038 INVOICE DETAILS
      </div>
    </nav>
    <!--navbar  -->
    <div class="d-flex justify-content-center">
      <div class="main-grid search-main-grid">
        <div>
          <div class="d-flex justify-content-between align-items-center">
            <div class="invoice-style"> INVOICE </div>
            <div class="modal-logo"></div>
          </div>
        </div>
        <!-- logos -->
        <div class="pay-top-text">
          123 Workforce
          <br />
          5th floor Portview House Thorn Castle st Dublin Ireland
          <br />
          00442037000685
          <br />
          info@123workforce.com
        </div>
        <div class="row justify-content-between align-items-baseline invoice-title">
          <div class="col-6">
            <div class="row justify-content-between responsive-title">
              <div class=""
                   style="font-weight: 500;">№ 059-004-038</div>
              <div class="export-invoice">other services</div>
              <div class="export-invoice"
                   style="font-weight: 500;">$400</div>
            </div>
          </div>
          <div class="col-6">
            <div class="row justify-content-between align-content-between align-items-center responsive-title">
              <div class="invoice-outstand"
                   style="padding: 0px 16px!important; display: inline; margin-left:0; line-height: 24px;">OUTSTANDING</div>
              <div class="justify-content-end mobile-display">
                <div class="export-invoice"
                     style="margin-right: 43px;"><img src="/images/client/payments/export_invoice.png"/></div>
                  <div class="invoice-download export-invoice payment-pay-text">COPY INVOICE LINK</div>
                </div>
              </div>
            </div>
          </div>
          <!-- title -->
          <div class="payment-pay-date">
            Invoice issue date: 26.03.2019
          </div>
          <!-- date -->
          <div class="payment-pay-text">
            <div style=" font-weight: 500;">Client info:</div>
            <div style="margin:22px 0 18px;">Name: Kim Coe</div>
            <div style="margin:18px 0;">Company: Urban HQ LTD</div>
            <div class="d-flex">
              <div>
                Contact:
              </div>
              <div style="width:200px; margin-left: 3px;"> +447711228204
                kim@urbanhqgroup.com </div>
            </div>
          </div>
          <!--payment info  -->
          <div class="payment-pay-text invoice-info-client d-flex align-items-start align-items-sm-start align-items-md-center align-items-lg-centert">
            <img src="/images/client/payments/people_24px.png" class="pay-icons"/>
            <div>
              <div class="display-content-block payment-pay-title">
                Name of agents:
              </div>
              <div class="display-content-block">
                Analiza Belleza, Cheska Ramos
              </div>
            </div>
          </div>
          <!--  agent name-->
          <div class="payment-pay-text d-flex align-items-start align-items-sm-start align-items-md-center align-items-lg-center"
               style="margin-top: 24px;">
            <img src="/images/client/payments/assignment_turned_in_24px.png" class="pay-icons"/>
            <div>
              <div class="display-content-block payment-pay-title">
                Services provided:
              </div>
              <div class="display-content-block">
                Appointment setting & Campaign Managemens
              </div>
            </div>
          </div>
          <!-- srevice provided -->
          <div class="payment-pay-text d-flex align-items-start align-items-sm-start align-items-md-center align-items-lg-center"
               style="margin-top: 24px;">
            <img src="/images/client/payments/watch_later_24px.png" class="pay-icons"/>
            <div>
              <div class="display-content-block payment-pay-title">
                Hours:
              </div>
              <div class="display-content-block">
                45 per week
              </div>
            </div>
          </div>
          <!--  hours-->
          <div class="payment-pay-text d-flex align-items-start align-items-sm-start align-items-md-center align-items-lg-center"
               style="margin-top: 24px;">
            <img src="/images/client/payments/date_range_24px.png" class="pay-icons"/>
            <div>
              <div class="display-content-block payment-pay-title">
                Date:
              </div>
              <div class="display-content-block">
                Mon, Tue, Wed, Sat
              </div>
            </div>
          </div>
          <!-- date -->
          <div class="payment-pay-text d-flex align-items-start align-items-sm-start align-items-md-center align-items-lg-center"
               style="margin-top: 24px;">
            <img src="/images/client/payments/Subtract.png" class="pay-icons"/>
            <div>
              <div class="display-content-block payment-pay-title">
                Rate:
              </div>
              <div class="display-content-block">
                $ 10
              </div>
            </div>
          </div>
          <!-- rate -->
          <div class="payment-pay-text d-flex align-items-start align-items-sm-start align-items-md-center align-items-lg-center"
               style="margin-top: 24px;">
            <img src="/images/client/payments/account_balance_wallet_24px.png" class="pay-icons"/>
            <div>
              <div class="display-content-block payment-pay-title">
                Total due:
              </div>
              <div class="display-content-block">
                $ 450
              </div>
            </div>
          </div>
          <!-- total due -->
          <hr style="margin: 30px 0;" />
          <div class="d-flex justify-content-end">
            <button class="agreement-button payment-button">GO TO PAYMENT</button>
          </div>
        </div>
        <!-- payments info -->
      </div>
    </div>
</template>
