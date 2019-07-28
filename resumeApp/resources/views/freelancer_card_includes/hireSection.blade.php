<div id="hireContent{{$freelancer->id}}{{$value['id']}}" style="border-top: 1px solid #EBEDEF; ">
    <div class="row">
        <div class="offset-md-4 col-md-4 col-12">
            <div class="hireText">
                Select the number of Hours you need per week:
            </div>
            <div class="hoursBtn NoDecor">
                <a href="javascript:void(0)" id="hoursMinus{{$freelancer->id}}{{$value['id']}}" class="hoursMinus">
                    <img src="/resumeApp/public/images/newResume/minus.png" style="width: 18px; padding-right: 8px;" alt="minus">
                </a>
                <span id="numberOfHours{{$freelancer->id}}{{$value['id']}}">@if($freelancer->userData->availableHours==0) 0 @else {{$freelancer->userData->availableHours}} @endif</span> hours
                <a href="javascript:void(0)" id="hoursPlus{{$freelancer->id}}{{$value['id']}}" class="hoursPlus">
                    <img src="/resumeApp/public/images/newResume/plus.png" style="width: 18px; padding-left: 8px;" alt="plus">
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="offset-md-4 col-md-4 col-12">
            <div class="hireText">
                How many weeks would you like to book for?
            </div>
            <div class="hoursBtn NoDecor">
                <a href="javascript:void(0)" id="weeksMinus{{$freelancer->id}}{{$value['id']}}" class="weeksMinus">
                    <img src="/resumeApp/public/images/newResume/minus.png" style="width: 18px; padding-right: 8px;" alt="minus">
                </a>
                <span id="numberOfWeeks{{$freelancer->id}}{{$value['id']}}">4</span> weeks
                <a href="javascript:void(0)" id="weeksPlus{{$freelancer->id}}{{$value['id']}}" class="weeksPlus">
                    <img src="/resumeApp/public/images/newResume/plus.png" style="width: 18px; padding-left: 8px;" alt="plus">
                </a>
            </div>
        </div>
    </div>

    <div class="row" style="padding-top:50px; padding-bottom: 50px;">
        <div class="offset-md-2 col-12 col-md-8" style="border-top: 1px solid #EBEDEF;">
            <div class="row">
                <div class="col-md-2 col-4 text-left jobTitle" style="font-size: 12px; color: #30323D;">
                    Monthly rate
                </div>
                <div class="col-md-2 col-3 offset-5 offset-md-8 text-right jobTitle" style="font-weight: bold;font-size: 12px; color: #30323D;">
                    {{$freelancer->userData->salary_month}} $
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="border-top: 1px solid #EBEDEF;">
        <div class="col-md-4 offset-md-2 col-12 NoDecor" style="padding-top: 17px;">
            <a href="javascript:void(0)" class="btn d-flex btn-block cancelBtn cancelBooking" id="cancelBooking{{$freelancer->id}}{{$value['id']}}">Cancel Booking</a>
        </div>
        <div class="col-md-4 col-12 NoDecor whiteOnHover" style="padding-top: 17px; padding-bottom: 30px;">
            <a class="btn d-flex btn-block summaryBtn" href="/stripe/hire?freelancerID={{$freelancer->id}}&hours={{$freelancer->userData->availableHours}}&weeks=4" id="hireMeBtn{{$freelancer->id}}{{$value['id']}}">Booking Summary</a>
        </div>
    </div>
</div>
