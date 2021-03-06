<div id="freelancers">
    <div class="row customContainer">
        <div class="col-md-8 offset-md-1 offset-lg-0">
            <div class="secondSectionHeading">
                Hire<br/><span>Great Developers.</span>
                <div class="lineDivider"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <section class="freelancers">
                <div class="slickSlide">
                    @foreach($homeFreelancers as $freelancer)
                        <div class="col-md-12 freelancerBox">
                        <a <? if(!$isClient): ?> href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCenter" <? else:?> href="/client" <? endif;?> class="itemLink">
                            <div class="freelancerItem">
                                <img src="{{$freelancer->userData->photo}}"
                                     alt="freelancer" class="slickFreelancerImg" style="filter: grayscale(100%);">
                                <div class="freelancerData">
                                    <div class="freelancerName nohover">
                                        {{$freelancer->firstName}} {{$freelancer->lastName}}
                                    </div>
                                    <div class="freelancerJob">
                                        {{$freelancer->userData->jobTitle}}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

            </section>
        </div>
    </div>

  
</div>