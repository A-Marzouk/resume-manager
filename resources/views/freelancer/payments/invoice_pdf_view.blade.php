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
        123Workforce Invoice ({{$invoice->identifier}})
    </div>
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="invoiceNumber">
                        <br/>
                        <br/>
                    </div>

                    <div class="agentName"  style="padding-bottom: 50px;">
                        123 Workforce
                        <br/>
                        <br/>
                        5th floor Portview House Thorn Castle st Dublin Ireland
                        <br/>
                        00442037000685
                        <br/>
                        info@123workforce.com
                    </div>


                    <div class="termsText">
                        Invoice issue date    : {{$invoice->created_at->format('d.m.Y')}}
                    </div>
                    <div class="termsText" style="padding-bottom: 50px;">
                        Status     : @if($invoice->status == 1) Paid @elseif($invoice->status == 2) Outstanding @elseif($invoice->status == 3) Cancelled @endif
                    </div>
                </div>
            </div>

            <table style="  border-top: 2px lightblue solid; padding-bottom: 40px;" >
                <tr class="clientInfo">
                    <th style="width: 370px!important;">
                        AGENT NAME
                    </th>
                    <th style="width: 380px!important;">
                        AGENT JOB TITLE
                    </th >
                    <th style="width: 380px!important;">
                        AGENT CONTACT
                    </th>
                </tr>
                <tr class="row clientInfo_detail">
                    <td class="col-4">
                        {{$invoice->agent->user->userData->first_name}} {{$invoice->agent->user->userData->last_name}}
                    </td>
                    <td class="col-4">
                        {{$invoice->agent->user->userData->job_title}}
                    </td>
                    <td style="border: none; word-break: break-word;" class="col-4">
                        {{$invoice->agent->user->userData->phone}}<br/>
                        {{$invoice->agent->user->email}}
                    </td>
                </tr>
            </table>


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
                        {{$invoice->service_title}}
                    </td>
                    <td class="col-2">
                        {{$invoice->hours}}
                    </td>
                    <td class="col-2" >
                        {{$invoice->total}}
                    </td>
                    <td class="col-2" style="border: none;">
                        $
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
