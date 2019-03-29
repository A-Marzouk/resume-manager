@extends('client.layouts.client_frame')
    @section('content')
        <div class="client_dashboard_content">
            <div class="row">
                <div class="col-lg-4">
                    <div class="menu-block active row">
                        <div class="imageContainer">
                            <img src="/resumeApp/public/images/client/menu_icons/campaign_manager.png" alt="icon">
                        </div>
                        <div class="menu-block-name">
                            Campaign manager
                        </div>
                    </div>
                    <div class="menu-block row">
                        <div class="imageContainer">
                            <img src="/resumeApp/public/images/client/menu_icons/chats.png" alt="icon">
                        </div>
                        <div class="menu-block-name">
                            Chats
                        </div>
                    </div>
                    <div class="menu-block row">
                        <div class="imageContainer">
                            <img src="/resumeApp/public/images/client/menu_icons/payments.png" alt="icon">
                        </div>
                        <div class="menu-block-name">
                            Payments
                        </div>
                    </div>
                    <div class="menu-block row">
                        <div class="imageContainer">
                            <img src="/resumeApp/public/images/client/menu_icons/agents.png" alt="icon">
                        </div>
                        <div class="menu-block-name">
                            Agents database
                        </div>
                    </div>
                    <div class="menu-block row">
                        <div class="imageContainer">
                            <img src="/resumeApp/public/images/client/menu_icons/account.png" alt="icon">
                        </div>
                        <div class="menu-block-name">
                            My account
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">

                </div>
            </div>
        </div>
    @endsection