<style>
    #invoice .termsText {
        color: #2997c8;
        padding-top: 10px;
        font-family: Roboto;
        font-size: 13px;
        font-weight: bold;
    }

    #invoice .clientInfo {
        background-color: #dbedf7;
        margin-top: 15px;
    }

    #invoice .clientInfo th {
        text-align: center;
        color: #2997c8;
        padding: 10px 0 10px 0;
        font-weight: bold;
        word-break: break-word;
    }

    #invoice .clientInfo_detail {
        border-top: 2px lightblue solid;
        padding-top: 15px;
        margin-top: 10px;
    }

    #invoice .clientInfo_detail td {
        text-align: center;
        color: #939498;
        padding-top: 15px;
        border-right: 1.5px lightblue solid;
    }

    #invoice .buttonsRow {
        border-top: 2px lightblue solid;
        border-bottom: 2px lightblue solid;
        margin-top: 15px;
    }

    #invoice .title{
        color: #2997c8;
        padding-top: 10px;
        padding-bottom: 25px;
        font-family: Roboto;
        font-size: 40px;
        font-weight: bold;
        text-align: center;
    }

    .campaignRow {
        margin-top: 35px;
        padding-left: 40px;
    }

    .campaignRow .campaignInfo {
        background-color: #dbedf7;
        width: 300px;
        display: inline-block;
        text-align: center;
        color: #2997c8;
        padding:10px ;
        font-weight: bold;
        word-break: break-word;
        /*border-right: 15px white solid;*/
    }

    .campaignRow .campaignData {
        display: inline-block;
        padding:10px ;
        width: 700px;
        background: whitesmoke;
        text-align: center;
        color: #939498;
    }

    .clientInfo_detail_cBrief {
        padding-top: 15px;
        margin-top: 10px;
        background: whitesmoke;
    }

    .clientInfo_detail_cBrief td {
        text-align: center;
        color: #939498;
        padding-bottom: 10px;
    }

    .blueLine {
        background-color: #2997c8;
        -webkit-transform: scaleY(-1);
        transform: scaleY(-1);
        padding: 2px 0 0 0;
        margin-top: 10px;
    }

</style>

<div class="container" id="invoice">
    <div class="row">
        <div class="offset-md-2 col-md-8" style="background: white; padding: 20px;">
            <div class="row">
                <div class="title">
                    123Workforce Campaign Brief ({{$cBrief->client_name}})
                </div>
            </div>

            <table style="  border-top: 2px lightblue solid; padding-bottom: 40px; border-bottom: 2px lightblue solid;" >
                <tr class="clientInfo">
                    <th style="width: 370px!important;">
                        CLIENT NAME
                    </th>
                    <th style="width: 380px!important;">
                        COMPANY WEBSITE
                    </th >
                    <th style="width: 380px!important;">
                        CLIENT CONTACT
                    </th>
                </tr>
                <tr class="row clientInfo_detail_cBrief">
                    <td class="col-4">
                        {{$cBrief->client_name}}
                    </td>
                    <td class="col-4">
                        {{$cBrief->company_website}}
                    </td>
                    <td style="border: none; word-break: break-word;" class="col-4">
                        {!! nl2br($cBrief->client_contact) !!}
                    </td>
                </tr>
            </table>

            <div class="campaignRow">
                <div class="campaignInfo">
                    CAMPAIGN OBJECTIVE
                </div>
                <div class="campaignData">
                    {{$cBrief->objective}}
                </div>
            </div>
            <div class="campaignRow">
                <div class="campaignInfo">
                    COMPANY VALUES / DESCRIPTION
                </div>
                <div class="col-md-8 campaignData">
                    {!! nl2br($cBrief->company_values) !!}
                </div>
            </div>

            <div class="row campaignRow">
                <div class="col-md-4 campaignInfo">
                    EMAIL PITCH
                </div>
                <div class="col-md-8 campaignData">
                    {!! nl2br($cBrief->email_pitch) !!}
                </div>
            </div>

            <div class="row campaignRow">
                <div class="col-md-4 campaignInfo">
                    PHONE PITCH
                </div>
                <div class="col-md-8 campaignData">
                    {!! nl2br($cBrief->phone_pitch) !!}
                </div>
            </div>
            <div class="row campaignRow">
                <div class="col-md-4 campaignInfo">
                    PHONE / EMAIL / DATA / CRM SYSTEMS
                </div>
                <div class="col-md-8 campaignData">
                    {!! nl2br($cBrief->data_systems) !!}
                </div>
            </div>

            @foreach($cBrief->services as $service)
                <table style="margin-top: 35px;  border-top: 2px lightblue solid; padding-bottom: 40px;">
                    <tr class="clientInfo">
                        <th class="col-2">
                            SERVICE REQUIRED
                        </th>
                        <th class="col-2">
                            HOURLY RATE
                        </th>
                        <th class="col-1">
                            NO. OF HOURS
                        </th>
                        <th class="col-2">
                            LANGUAGE NEEDED
                        </th>
                        <th class="col-2">
                            AGENT LOCATION / ACCENT
                        </th>
                        <th class="col-1">
                            NO. OF AGENTS
                        </th>
                        <th class="col-2">
                            AGENT CHARACTER AND EXPERIENCE REQUIREMENT
                        </th>
                    </tr>
                    <tr class="clientInfo_detail_cBrief">
                        <td>
                            {{$service->service_required}}
                        </td>
                        <td>
                            {{$service->hourly_rate}} USD
                        </td>
                        <td>
                            {{$service->hours}}
                        </td>
                        <td>
                            {{$service->language}}
                        </td>
                        <td>
                            {{$service->agent_location}}
                        </td>
                        <td>
                            {{$service->number_of_agents}}
                        </td>
                        <td>
                            {!! nl2br($service->agent_experience) !!}
                        </td>
                    </tr>
                </table>
            @endforeach


            <table style="margin-top: 35px; border-top: 2px lightblue solid;">
                <tr class=" clientInfo" style="margin-top: 35px;">
                    <th class="col-3">
                        ESTIMATED DURATION OF CAMPAIGN
                    </th>
                    <th class="col-2">
                        TIME ZONE
                    </th>
                    <th class="col-2">
                        SPECIFIC TIMES NEEDED
                    </th>

                    <th class="col-2">
                        START DATE
                    </th>

                    <th class="col-3">
                        CONTRACT TERM
                    </th>
                </tr>
                <tr class="clientInfo_detail_cBrief">
                    <td class="col-3">
                        {!! nl2br($cBrief->estimated_duration) !!}
                    </td>
                    <td class="col-2">
                        {!! nl2br($cBrief->time_zone) !!}
                    </td>
                    <td class="col-2">
                        {!! nl2br($cBrief->time_needed) !!}
                    </td>

                    <td class="col-2">
                        {{$cBrief->start_date}}
                    </td>

                    <td class="col-3">
                        {{$cBrief->contract_terms}}
                    </td>
                </tr>
            </table>

            <div style="padding-top: 100px;">

            </div>

            <table style=" margin-top:35px; border-top: 2px lightblue solid;">
                <tr class="clientInfo" style="margin-top: 35px;">
                    <th class="col-4" style="width: 380px!important;">
                        TOTAL HOURS WORKING PER WEEK
                    </th>
                    <th class="col-4" style="width: 370px!important;">
                        TOTAL WEEKLY RATE
                    </th>
                    <th class="col-4" style="width: 370px!important;">
                        PAYMENT METHOD
                    </th>
                </tr>

                <tr class=" clientInfo_detail_cBrief">
                    <td class="col-4">
                        {{$cBrief->hours_per_week}}
                    </td>
                    <td class="col-4">
                        {{$cBrief->weekly_rate}}
                    </td>
                    <td class="col-4" style="word-break: break-word;">
                        {!! nl2br($cBrief->payment_method) !!}
                    </td>
                </tr>
            </table>


            <div class="row">
                <div class="col-12">
                    <div class="termsText" style="font-size: 30px;">
                        <br>
                        Campaign Manager (for reporting) - <span style="color: grey;">{{$cBrief->campaign_manager}}</span> <br/>
                        Report Requirement - <span style="color: grey;">{{$cBrief->report_requirement}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>