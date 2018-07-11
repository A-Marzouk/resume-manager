
<div id="freelancersInfo">
    <div class="row text-center">
        <div class="col-md-12">
            <div class="freelancerItem">
                <img src="{{$user->photo}}" alt="freelancer" class="freelancerImg" width="150" height="150">
                <div class="freelancerData">
                    <div class="freelancerName">
                        {{$user->name}}
                    </div>
                    <div class="freelancerJob">
                        {{$user->jobTitle}}
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-2 offset-md-4">
            <div class="buttonMain whiteBg">
                <a class="hireBtn btn-block hire" href="#">Hire Me</a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="buttonMain">
                <a class="hireBtn btn-block" href="#">Send me message </a>
            </div>
        </div>
    </div>
</div>

<div id="quote">
    <div class="row">
        <div class="col-md-1 offset-md-1">
            <img src="resumeApp/resources/views/customTheme/images/newResume/quote.png" alt="quote">
        </div>
        <div class="col-md-10">
            <div class="quoteText">
                {{$user->intro}}
            </div>
        </div>
    </div>
</div>