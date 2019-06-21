<div class="col-md-2">
    <h3 class="panelFormLabel text-center">Admin-dashboard</h3>
    <ul class="nav nav-tabs" role="tablist">
        <li class="col-md-12">
            <a class="btn btn-block btn-outline-primary active" style="margin-bottom: 6px;" href="#home" role="tab" data-toggle="tab">
                Home
            </a>
        </li>
        @if(in_array('Freelancers',$permissions))
            <li class="col-md-12">
                <a class="btn btn-block btn-outline-primary" href="#freelancers"  style="margin-bottom: 6px;" role="tab" data-toggle="tab">
                    Freelancers
                </a>
            </li>
        @endif
        @if(in_array('Clients and invoices',$permissions))
            <li class="col-md-12">
                <a class="btn btn-block btn-outline-primary" href="#clients"  style="margin-bottom: 6px;" role="tab" data-toggle="tab">
                    Clients
                </a>
            </li>
        @endif

        @if(in_array('Subscriptions',$permissions))
            <li class="col-md-12">
                <a class="btn btn-block btn-outline-primary" href="#subscriptions"  style="margin-bottom: 6px;" role="tab" data-toggle="tab">
                    Subscriptions
                </a>
            </li>
        @endif
        @if(in_array('Campaigns',$permissions))
            <li class="col-md-12">
                <a class="btn btn-block btn-outline-primary" href="{{route('view.campaigns')}}"  style="margin-bottom: 6px;">
                    Campaigns
                </a>
            </li>
        @endif

        @if(in_array('Agents',$permissions))
            <li class="col-md-12">
                <a class="btn btn-block btn-outline-primary" href="{{route('view.agents')}}"  style="margin-bottom: 6px;">
                    Agents
                </a>
            </li>
        @endif

        @if(in_array('Camp Briefs',$permissions))
            <li class="col-md-12">
                <a class="btn btn-block btn-outline-primary" href="{{route('view.cBriefs')}}"  style="margin-bottom: 6px;">
                    Camp Briefs
                </a>
            </li>
        @endif
        @if(in_array('Bookings',$permissions))
            <li class="col-md-12">
                <a class="btn btn-block btn-outline-primary" href="#bookings"  style="margin-bottom: 6px;" role="tab" data-toggle="tab">
                    Bookings
                </a>
            </li>
        @endif

        <li class="col-md-12">
            <a class="btn btn-block btn-outline-primary" href="#affiliates"  style="margin-bottom: 6px;" role="tab" data-toggle="tab">
                Affiliates
            </a>
        </li>
        @if(in_array('Jobs',$permissions))
            <li class="col-md-12">
                <a class="btn btn-block btn-outline-primary" href="#jobs"  style="margin-bottom: 6px;" role="tab" data-toggle="tab">
                    Jobs
                </a>
            </li>
        @endif
        @if(in_array('Public search links',$permissions))
            <li class="col-md-12">
                <a class="btn btn-block btn-outline-dark" href="#search_links"  style="margin-bottom: 6px;">
                    Public search links
                </a>
            </li>
        @endif
        @if(in_array('Search Freelancers',$permissions))
            <li class="col-md-12">
                <a class="btn btn-block btn-outline-dark" href="/search"  style="margin-bottom: 6px;">
                    Search Freelancers
                </a>
            </li>
        @endif

        @if(in_array('Send emails',$permissions))
            <li class="col-md-12">
                <a class="btn btn-block btn-outline-dark" href="/send_emails"  style="margin-bottom: 6px;">
                    Send emails
                </a>
            </li>
        @endif


        <div id="actionBtns" class="d-none">
            <li class="col-md-12" style="margin-top: 25px;">
                <a href="javascript:void(0)" class="btn btn-outline-danger btn-sm" id="deleteSelectedBtn">Delete selected</a>
            </li>
            <li class="col-md-12" style="margin-top: 5px;">
                <div class="btn-group" role="group">
                    <a href="javascript:void(0)" class="btn btn-outline-dark btn-sm" id="approve">Approve</a>
                    <a href="javascript:void(0)" class="btn btn-outline-dark btn-sm" id="disApprove">Disapprove</a>
                </div>
            </li>
            <br>
        </div>
    </ul>
</div>