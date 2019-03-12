<style>
    #invoice .agentName {
        color: #2997c8;
        font-family: Roboto;
        font-size: 25px;
        font-weight: bold;
        text-align: justify;
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
    #invoice .termsText {
        color: #2997c8;
        padding-top: 10px;
        font-family: Roboto;
        font-size: 25px;
        font-weight: bold;
    }

    #invoice .invoiceNumber {
        color: #767676;
        font-family: Roboto;
        font-size: 25px;
        text-align: justify;
        padding-top: 10px;
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
        text-align: center;
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
    }

</style>
<div class="container" id="invoice">
    <div class="title">
        123Workforce Invoice ({{$invoice->unique_number}})
    </div>
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="invoiceNumber">
                       <br/>
                    </div>

                    <div class="agentName">
                        Name of Agents :<br/>
                        @foreach($invoice->services as $service)
                            @foreach($service->agents as $user)
                                <?
                                $users[$user->id] = $user->firstName . ' ' .$user->lastName ;
                                ?>
                            @endforeach
                        @endforeach
                        @foreach(array_unique($users) as $name)
                            - {{$name}} <br/>
                        @endforeach
                    </div>


                    <div class="termsText" style="padding-bottom: 50px;">
                        Invoice issue date    : {{$invoice->created_at->format('d.m.Y')}}
                    </div>
                    <div class="termsText" style="padding-bottom: 50px;">
                        Status     : {{$invoice->status}}
                    </div>
                </div>
            </div>

            <table style="  border-top: 2px lightblue solid; padding-bottom: 40px;" >
                <tr class="clientInfo">
                    <th style="width: 370px!important;">
                        CLIENT NAME
                    </th>
                    <th style="width: 380px!important;">
                        CLIENT COMPANY
                    </th >
                    <th style="width: 380px!important;">
                        CLIENT CONTACT
                    </th>
                </tr>
                <tr class="row clientInfo_detail">
                    <td class="col-4">
                        {{$invoice->client->name}}
                    </td>
                    <td class="col-4">
                        {{$invoice->client->agency}}
                    </td>
                    <td style="border: none; word-break: break-word;" class="col-4">
                        {{$invoice->client->phone}}<br/>
                        {{$invoice->client->email}}
                    </td>
                </tr>
            </table>

            @if(count($invoice->services) > 0)

                <div class="termsText">
                    Custom services :
                </div>
                @foreach($invoice->services as $service)
                    <table style="margin-top: 55px;  border-top: 2px lightblue solid;">
                        <tr class="clientInfo">
                            <th style="width: 350px!important;">
                                SERVICE
                            </th>
                            <th  style="width: 240px!important;">
                               HOURS
                            </th>
                            <th style="width: 240px!important;">
                                RATE
                            </th>
                            <th  style="width: 300px!important;">
                                DAYS
                            </th>
                        </tr>
                        <tr class="clientInfo_detail">
                            <td>
                                {{$service->title}}
                            </td>
                            <td >
                                {{$service->hours}} hours
                            </td>
                            <td >
                                {{$service->rate}}
                            </td>
                            <td style="border: none; word-break: break-word;">
                                @if($service->days === 'all_days') All business days @else {{$service->days}} @endif
                            </td>
                        </tr>
                    </table>
                @endforeach
            @endif

            <table style="margin-top: 55px;  border-top: 2px lightblue solid;">
                <tr class="row clientInfo">
                    <th class="col-6" style="width: 380px!important;">
                        SERVICES PROVIDED
                    </th>
                    <th class="col-2" style="width: 185px!important;">
                        NO. OF HRS / WEEK
                    </th>
                    <th class="col-2" style="width: 185px!important;">
                        TOTAL DUE
                    </th>
                    <th class="col-2" style="width: 185px!important;">
                        CURRENCY
                    </th>
                </tr>

                <tr class="row clientInfo_detail">
                    <td class="col-6 text-left">
                        @foreach($invoice->services as $service)
                            {{$service->title}}<br/>
                        @endforeach
                    </td>
                    <td class="col-2">
                        {{$invoice->hours}}
                    </td>
                    <td class="col-2" >
                        {{$invoice->total_amount}}
                    </td>
                    <td class="col-2" style="border: none;">
                        {{$invoice->currency}}
                    </td>
                </tr>
            </table>




            <br/><br/>
            <div class="row" style=" border-top: 2px lightblue solid;">
                <div class="col-12">
                    <div class="termsText">
                        Terms of payment - Weekly in advance <br/>
                        Contract - Weekly
                        <div class="NoDecor">
                            <a href="https://123workforce.com/workforce/campaign_briefs/{{$invoice->campaign_brief_id}}" target="_blank">
                                View related Campaign Brief
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>