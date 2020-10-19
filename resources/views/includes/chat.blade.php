<div id="chatBox" class="col-12 d-none" style="z-index:9999999999;">
    <div class="chatHeading">
        <div class="row">
            <div class="col-2 col-md-1 col-lg-2 chatImage">
                <span>
                    <img src="/images/textsms_24px copy.png" width="16px">
                </span>
            </div>
            <div class="col-10 text">
                <span id="chatText">Chat with us</span>
                <a href="javascript:void(0)" id="closeChat"> <img src="/images/Rectangle.png" width="13px"> </a>
            </div>
        </div>
        <div class="secondText btn-block" style="border-bottom: 0.7px solid #EBEDF8;">
            <div class="row">
                <div style="padding-top: 8px;">
                    <img src="/images/logo123.png" width="36px">
                </div>
                <div class="">
                    <span style="font-weight:bold;color: #637280;font-family: Roboto;font-size: 12px;">We're Here to Help!</span><br/>
                    <span style="color: #00CE6B;font-family: Roboto;font-size: 14px;">online</span>
                </div>
            </div>
        </div>
    </div>
    <div id="VueChat">
        <div>
            <chat-log :messages="messages" style="margin-top:112px;"></chat-log>
        </div>
        <div class="container">
            {{-- v-on:messageSent means when the event is emited --}}
            {{-- addMessage method should be defiened on the root scope not components--}}
            <chat-composer v-on:messagesent="addMessage"></chat-composer>
        </div>
    </div>
</div>