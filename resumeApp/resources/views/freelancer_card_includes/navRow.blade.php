<div class="row navRow">
    <div class="col-md-2 offset-md-3 col-4 text-center" style="border-right:1px solid #EBEDEF;">
        @if($freelancer->profession == 'businessSupport')
            <div class="navTab showPortfolio active NoDecor" id="showPortfolio{{$freelancer->id}}{{$value['id']}}">
                <a href="javascript:void(0)">
                    Recordings
                </a>
            </div>
        @else
            <div class="navTab showPortfolio active NoDecor" id="showPortfolio{{$freelancer->id}}{{$value['id']}}">
                <a href="javascript:void(0)">
                    Portfolio
                </a>
            </div>
        @endif
    </div>

    <div class="col-md-2 col-4 text-center" style="border-right:1px solid #EBEDEF;">
        <div class="navTab showWork NoDecor" id="showWork{{$freelancer->id}}{{$value['id']}}">
            <a href="javascript:void(0)">
                Work
            </a>
        </div>
    </div>

    <div class="col-md-2 col-4 text-center">
        <div class="navTab showEducation NoDecor" id="showEducation{{$freelancer->id}}{{$value['id']}}">
            <a href="javascript:void(0)">
                Education
            </a>
        </div>
    </div>

</div>