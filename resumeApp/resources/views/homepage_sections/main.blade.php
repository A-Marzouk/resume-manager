<div id="mainSection">
    <div class="row customContainer">
        <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-8">
            <div class="mainSectionHeading">
                Ensure your <span>business success</span> by hiring approved Freelancers.
            </div>
            <div class="mainSectionSubHeading">
                Access our global talent network of professional Freelancers, they are<br/>reliable, qualified
                and ready to join your team.
            </div>
            <div class="buttonMain col-lg-6 col-md-6 offset-md-3 offset-lg-0">
                <? if(auth()->guard('client')->guest()):?>
                <a class="hireBtn" href="#" data-toggle="modal" data-target="#exampleModalCenter">Hire
                    Talent</a>
                <? else:?>
                {{-- client --}}
                <a class="hireBtn" href="/client">Hire Talent</a>
                <? endif;?>

            </div>
        </div>
    </div>

</div>