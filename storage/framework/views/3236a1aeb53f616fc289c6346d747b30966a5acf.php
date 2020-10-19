<div id="mainSection">
    <div class="row customContainer">
        <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-8">
            <div class="mainSectionHeading">
                Connecting companies with Top - <span> Tech Talent</span>.
            </div>
            <div class="mainSectionSubHeading">
                Access our global talent network of professional developers, they are<br/>reliable, qualified
                and ready to join your team.
            </div>
            <div class="buttonMain col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                <? if(auth()->guard('client')->guest()):?>
                <a class="hireBtn btn-block" href="#" data-toggle="modal" data-target="#exampleModalCenter">Hire
                    Talent</a>
                <? else:?>
                
                <a class="hireBtn btn-block" href="/client">Hire Talent</a>
                <? endif;?>

            </div>
        </div>
    </div>

</div>