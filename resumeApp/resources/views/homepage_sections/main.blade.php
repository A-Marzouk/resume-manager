<div id="mainSection">
    <div class="row customContainer">
        <div class="col-md-8">
            <div class="mainSectionHeading">
                Ensure your <span>business success</span> by hiring approved Freelancers.
            </div>
            <div class="mainSectionSubHeading">
                Access our global talent network of professional Freelancers, they are<br/>reliable, qualified
                and ready to join your team.
            </div>
            <div class="buttonMain col-md-6">
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