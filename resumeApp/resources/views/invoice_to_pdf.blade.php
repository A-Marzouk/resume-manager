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
                        Name of Agent :  {{$invoice->agentName}}<br/>
                    </div>
                    <div class="termsText" style="padding-bottom: 30px;">
                        Status     : {{$invoice->status}}
                    </div>
                </div>
            </div>

            <table style="  border-top: 2px lightblue solid;">
                <tr class="clientInfo">
                    <th>
                        CLIENT NAME
                    </th>
                    <th>
                        CLIENT COMPANY
                    </th>
                    <th style="text-align: center">
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


            <table style="margin-top: 55px;  border-top: 2px lightblue solid;">
                <tr class="row clientInfo">
                    <th class="col-6">
                        SERVICE PROVIDED
                    </th>
                    <th class="col-2">
                        NO. OF HRS / WEEK
                    </th>
                    <th class="col-2">
                        RATE / HR
                    </th>
                    <th class="col-2">
                        TOTAL DUE
                    </th>
                </tr>

                <tr class="row clientInfo_detail">
                    <td class="col-6 text-left">
                        {{$invoice->service}}<br/><br>
                        {{$invoice->time_of_service}}<br/><br>
                        {{$invoice->client->timeZone}}
                    </td>
                    <td class="col-2">
                        {{$invoice->hours}}
                    </td>
                    <td class="col-2">
                        {{$invoice->rate}} USD
                    </td>
                    <td class="col-2" style="border: none;">
                        {{$invoice->total_amount}}
                    </td>
                </tr>
            </table>




            <br/><br/>
            <div class="row" style=" border-top: 2px lightblue solid;">
                <div class="col-12">
                    <div class="termsText">
                        Terms of payment - Weekly in advance <br/>
                        Contract - Weekly
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>