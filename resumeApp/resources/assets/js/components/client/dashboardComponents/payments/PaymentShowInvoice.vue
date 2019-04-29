<template>
  <div >
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#myModal" style="background: transparent">
      <img src="/resumeApp/public/images/client/payments/show_invoice.png"/>
    </button>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-width">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header close-button" style="">

            <button type="button" class="close" data-dismiss="modal">
              <img src="/resumeApp/public/images/client/close.png"/>
            </button>
          </div>
          <div class="invoice-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="invoice-style"> INVOICE </div>
              <div class="modal-logo"></div>
              <!-- <img src="/resumeApp/public/images/client/logo_123.png" class="modal-logo"/> -->
            </div>
            <div class="invioce-top-text">
              123 Workforce
              <br/>
              5th floor Portview House Thorn Castle st Dublin Ireland
              <br/>
              00442037000685
              <br/>
              info@123workforce.com
            </div>

            <div class="d-flex justify-content-between align-items-center invioce-title">
              <div>№ 059-004-038</div>
              <div> other services</div>
              <div  class="d-flex justify-content-between align-items-center"> $400  <span class="invoice-outstand"> outstand</span> </div>
              <div class="invoice-download"> <img src="/resumeApp/public/images/client/payments/export_invoice.png"/>   copy invioce link </div>
            </div>

            <div class="invoice-date">
              Invoice issue date:
              <br/> 26.03.2019
            </div>

            <div class="client-info">
              <div style=" font-weight: 500;">Client info:</div>
              <div>Name: Kim Coe</div>
              <div>Company: Urban HQ LTD</div>
              <div class="d-flex">
                <div >
                  Contact:
                </div>
                <div style="width:200px; margin-left: 3px;" >  +447711228204
                  kim@urbanhqgroup.com </div></div>
                </div>

                <div class="client-info invoice-info-client">
                  <div class="d-flex align-items-center">
                    <img src="/resumeApp/public/IMG/client/payments/icon/people_24px.png" class="invoice-info-icon"/>
                    <span class="invoice-info-title"> Name of agents: </span> Analiza Belleza, Cheska Ramos
                  </div>

                  <div class="d-flex align-items-center">
                    <img src="/resumeApp/public/IMG/client/payments/icon/assignment_turned_in_24px.png" class="invoice-info-icon"/>
                    <span class="invoice-info-title"> Name of agents: </span>
                    Analiza Belleza, Cheska Ramos
                  </div>

                  <div class="d-flex align-items-center">
                    <img src="/resumeApp/public/IMG/client/payments/icon/account_balance_wallet_24px.png" class="invoice-info-icon"/>
                    <span class="invoice-info-title"> Name of agents: </span>
                    Analiza Belleza, Cheska Ramos
                  </div>

                  <div class="d-flex align-items-center">
                    <img src="/resumeApp/public/IMG/client/payments/icon/watch_later_24px.png" class="invoice-info-icon"/>
                    <span class="invoice-info-title"> Name of agents: </span>
                    Analiza Belleza, Cheska Ramos
                  </div>

                  <div class="d-flex align-items-center">
                    <img src="/resumeApp/public/IMG/client/payments/icon/Subtract.png" class="invoice-info-icon"/>
                    <span class="invoice-info-title"> Name of agents: </span>
                    Analiza Belleza, Cheska Ramos
                  </div>

                  <div class="d-flex align-items-center">
                    <img src="/resumeApp/public/IMG/client/payments/icon/account_balance_wallet_24px.png" class="invoice-info-icon"/>
                    <span class="invoice-info-title"> Name of agents: </span>
                    Analiza Belleza, Cheska Ramos
                  </div>
                </div>


              </div>


            </div>

          </div>
        </div>
      </div>
    </template>
