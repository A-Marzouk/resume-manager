
// hours selection :
$('.hoursPlus').on('click',function(){
    let ID  = this.id.replace('hoursPlus','');
    let currentHours = parseInt($('#numberOfHours' + ID ).html());
    let  newHours = currentHours + 5;
    let maxHours = parseInt($('#maxHours'+ID).html()) ;
    // set new hours :
    if(newHours < maxHours+1){
        $('#numberOfHours' + ID ).fadeOut(150);
        setTimeout(function () {
            $('#numberOfHours' + ID ).html(newHours);
            $('#numberOfHours' + ID ).fadeIn(150);
        },100);
        // change href of the hire me button :
        let hireBtn = $('#hireMeBtn'+ ID);
        if(hireBtn.length > 0){
            let href1 = hireBtn.attr('href');
            let href2 = href1.replace('hours='+currentHours,'hours='+newHours);
            hireBtn.attr('href',href2);
        }
        // change available hours :
        $('#availableHours'+ID).val(newHours).change();
    }

});

$('.hoursMinus').on('click',function(){
    let ID  = this.id.replace('hoursMinus','');
    let currentHours = parseInt($('#numberOfHours' + ID ).html());
    let newHours = currentHours - 5;
    // set new hours :
    if(newHours > 9){
        $('#numberOfHours' + ID ).fadeOut(150);
        setTimeout(function () {
            $('#numberOfHours' + ID ).html(newHours);
            $('#numberOfHours' + ID ).fadeIn(150);
        },100);
        let hireBtn = $('#hireMeBtn'+ ID);
        if(hireBtn.length > 0) {
            let href1 = hireBtn.attr('href');
            let href2 = href1.replace('hours=' + currentHours, 'hours=' + newHours);
            hireBtn.attr('href', href2);
        }

        // change available hours :
        $('#availableHours'+ID).val(newHours).change();
    }
});

// dollars selection :
$('.dollarsPlus').on('click',function(){
    let ID  = this.id.replace('dollarsPlus','');
    let currentDollars = parseInt($('#numberOfDollars' + ID ).html());
    let newDollars = currentDollars + 1;
    let maxDollars = 100 ;
    // set new hours :
    if(newDollars <= maxDollars){
        $('#numberOfDollars' + ID ).fadeOut(150);
        setTimeout(function () {
            $('#numberOfDollars' + ID ).html(newDollars);
            $('#numberOfDollars' + ID ).fadeIn(150);
        },100);
        // change the salary :
        $('#salary'+ID).val(newDollars).change();
    }

});

$('.dollarsMinus').on('click',function(){
    let ID  = this.id.replace('dollarsMinus','');
    let currentDollars = parseInt($('#numberOfDollars' + ID ).html());
    let newDollars = currentDollars - 1;
    // set new hours :
    if(newDollars >= 1){
        $('#numberOfDollars' + ID ).fadeOut(150);
        setTimeout(function () {
            $('#numberOfDollars' + ID ).html(newDollars);
            $('#numberOfDollars' + ID ).fadeIn(150);
        },100);
    }
    // change the salary :
    $('#salary'+ID).val(newDollars).change();
});

// weeks selection
$('.weeksPlus').on('click',function(){
    let ID  = this.id.replace('weeksPlus','');
    let currentWeeks = parseInt($('#numberOfWeeks' + ID ).html());
    let newWeeks = currentWeeks + 1;
    let maxWeeks = 4 ;
    // set new hours :
    if(newWeeks <= maxWeeks){
        $('#numberOfWeeks' + ID ).fadeOut(150);
        setTimeout(function () {
            $('#numberOfWeeks' + ID ).html(newWeeks);
            $('#numberOfWeeks' + ID ).fadeIn(150);
        },100);
        // change href of the hire me button :
        let hireBtn = $('#hireMeBtn'+ ID);
        let href1 = hireBtn.attr('href');
        let href2 = href1.replace('weeks='+currentWeeks,'weeks='+newWeeks);
        hireBtn.attr('href',href2);
    }

});

$('.weeksMinus').on('click',function(){
    let ID  = this.id.replace('weeksMinus','');
    let currentWeeks = parseInt($('#numberOfWeeks' + ID ).html());
    let newWeeks = currentWeeks - 1;
    // set new hours :
    if(newWeeks > 0){
        $('#numberOfWeeks' + ID ).fadeOut(150);
        setTimeout(function () {
            $('#numberOfWeeks' + ID ).html(newWeeks);
            $('#numberOfWeeks' + ID ).fadeIn(150);
        },100);
        let hireBtn = $('#hireMeBtn'+ ID);
        let href1 = hireBtn.attr('href');
        let href2 = href1.replace('weeks='+currentWeeks,'weeks='+newWeeks);
        hireBtn.attr('href',href2);
    }
});


// animated text :
$('.freelancerCard').one('mouseenter',function () {
    let freelancerID = this.id.replace('card','');
    let text         = $('#welcomeText' + freelancerID).html();
    if(text !== undefined){
        text = text.trim();
    }else{
        return;
    }
    let animateTextID  = 'animatedText' + freelancerID;
    // clear current text :
    $('#' + animateTextID).html('');
    let i     = 0;
    let txt   = text; /* The text */
    let speed = 50; /* The speed/duration of the effect in milliseconds */
    typeWriter();
    function typeWriter() {
        if (i < txt.length) {
            document.getElementById(animateTextID).innerHTML += txt.charAt(i);
            i++;
            setTimeout(typeWriter, speed);
        }
    }
});


// change content

let resumeCardContent = $('.resumeCardRight');

resumeCardContent.on('click','.openAudio',function(){
    let ID = this.id.replace('_open_audio','');
    let audioContent = $('#audioContent'+ID).html();
    // change the content :
    let resumeRightArea  =  $('#resumeCardRight' + ID) ;
    resumeRightArea.fadeOut(300);
    setTimeout(function () {
        resumeRightArea.html(audioContent);
        resumeRightArea.fadeIn(300);
    },250)
});

$('.openReferences').on('click',function(){
    let ID = this.id.replace('_open_references','');
    let referencesContent = $('#referencesContent'+ID).html();
    // change the content :
    let resumeRightArea  =  $('#resumeCardRight' + ID) ;
    resumeRightArea.fadeOut(300);
    setTimeout(function () {
        resumeRightArea.html(referencesContent);
        resumeRightArea.fadeIn(300);
    },250)
});


resumeCardContent.on('click','.openVideo',function(){
        let ID = this.id.replace('_open_video','');
        let videoContent = $('#videoContent'+ID).html();
        // change the content :
        let resumeRightArea  =  $('#resumeCardRight' + ID) ;
        resumeRightArea.fadeOut(300);
        setTimeout(function () {
            resumeRightArea.html(videoContent);
            resumeRightArea.fadeIn(300);
        },250)
    });

resumeCardContent.on('click','.audioDismiss',function () {
    let ID = this.id.replace('audio_dismiss','');
    let defaultContent     = $('#defaultContent'+ID).html();
    let resumeRightArea    = $('#resumeCardRight' + ID) ;
    resumeRightArea.fadeOut(300);
    let portfolioContent_mob = $('#portfolioContent'+ID+'_mob') ;
    setTimeout(function () {
        resumeRightArea.html(defaultContent);
        portfolioContent_mob.removeClass('d-none');
        resumeRightArea.fadeIn(300);
    },250)
});

resumeCardContent.on('click','.showHireSection',function(){
    // add d-none class to the portfolio row and show the other content
    let ID =  this.id.replace('showHireSection','');
    $('#hireSection' + ID).removeClass('d-none').show(300);
    $('#portfolioFull' + ID).hide(300);
});

resumeCardContent.on('click','.showHireSection_mob',function(){
    // add d-none class to the portfolio row and show the other content
    let ID =  this.id.replace('showHireSection_mob','');
    $('#hireSection' + ID).removeClass('d-none').show(300);
    $('#portfolioFull' + ID).hide(300);
});

resumeCardContent.on('click','.cancelBooking',function(){
    // add d-none class to the portfolio row and show the other content
    let ID =  this.id.replace('cancelBooking','');
    $('#hireSection' + ID).hide(300);
    $('#portfolioFull' + ID).show(300);
});



// client page ( resume cards )

// skills images :
resumeCardContent.on('mouseover','.highlightSkill',function () {
    // hover in
    let ID         = this.id.replace('skillContainer','');
    let skillImg   = $('#skillImage'+ID);
    skillImg.css('filter','grayscale(0)');
});

resumeCardContent.on('mouseout','.highlightSkill',function () {
    // hover out
    let ID         = this.id.replace('skillContainer','');
    // change the src of the image to colored
    let skillImg   = $('#skillImage'+ID);
    skillImg.css('filter','grayscale(100%)');
});


// nav row :

resumeCardContent.on('click','.showPortfolio',function(){
    let freelancerID = this.id.replace('showPortfolio','');

    if(!$(this).hasClass('active')){
        // add class active
        $(this).addClass('active');
        // remove class from other taps :
        $('#showWork'+freelancerID).removeClass('active');
        $('#showEducation'+freelancerID).removeClass('active');
        $('#showInterviews'+freelancerID).removeClass('active');
        $('#showSkills'+freelancerID).removeClass('active');


        // change the content :
        let portfolioContent     = $('#portfolioContent'+freelancerID).html();
        let tapsArea    = $('#tapsArea' + freelancerID) ;
        tapsArea.fadeOut(500);
        setTimeout(function () {
            let portfolioContent_mob = $('#portfolioContent'+freelancerID+'_mob') ;
            tapsArea.html(portfolioContent + portfolioContent_mob.html());
            portfolioContent_mob.addClass('d-none');
            tapsArea.fadeIn(500);
        },450);

    }
});

resumeCardContent.on('click','.showWork',function(){
    let freelancerID = this.id.replace('showWork','');

    if(!$(this).hasClass('active')){
        // add class active
        $(this).addClass('active');
        // remove class from other taps :
        $('#showPortfolio'+freelancerID).removeClass('active');
        $('#showEducation'+freelancerID).removeClass('active');
        $('#showSkills'+freelancerID).removeClass('active');

        // change the content :
        let workContent     = $('#workContent'+freelancerID).html();
        let tapsArea    = $('#tapsArea' + freelancerID) ;
        tapsArea.fadeOut(500);
        // show the portfolio content on phone :
        let portfolioContent_mob = $('#portfolioContent'+freelancerID+'_mob') ;
        setTimeout(function () {
            tapsArea.html(workContent);
            tapsArea.fadeIn(500);
            portfolioContent_mob.addClass('d-none');
        },450);

    }
});

resumeCardContent.on('click','.showEducation',function(){
    let freelancerID = this.id.replace('showEducation','');

    if(!$(this).hasClass('active')){
        // add class active
        $(this).addClass('active');
        // remove class from other taps :
        $('#showWork'+freelancerID).removeClass('active');
        $('#showPortfolio'+freelancerID).removeClass('active');
        $('#showSkills'+freelancerID).removeClass('active');


        // change the content :
        let educationContent     = $('#educationContent'+freelancerID).html();
        let tapsArea    = $('#tapsArea' + freelancerID) ;
        tapsArea.fadeOut(500);
        // show the portfolio content on phone :
        let portfolioContent_mob = $('#portfolioContent'+freelancerID+'_mob') ;
        setTimeout(function () {
            tapsArea.html(educationContent);
            tapsArea.fadeIn(500);
            portfolioContent_mob.addClass('d-none');
        },450)
    }
});

resumeCardContent.on('click','.showSkills',function(){
    let freelancerID = this.id.replace('showSkills','');

    if(!$(this).hasClass('active')){
        // add class active
        $(this).addClass('active');
        // remove class from other taps :
        $('#showWork'+freelancerID).removeClass('active');
        $('#showPortfolio'+freelancerID).removeClass('active');
        $('#showEducation'+freelancerID).removeClass('active');
        $('#showInterviews'+freelancerID).removeClass('active');

        // change the content :
        let skillsContent     = $('#skillsContent'+freelancerID).html();
        let tapsArea    = $('#tapsArea' + freelancerID) ;
        tapsArea.fadeOut(500);
        // show the portfolio content on phone :
        let portfolioContent_mob = $('#portfolioContent'+freelancerID+'_mob') ;
        setTimeout(function () {
            tapsArea.html(skillsContent);
            tapsArea.fadeIn(500);
            portfolioContent_mob.addClass('d-none');
        },450)
    }
});

resumeCardContent.on('click','.showInterviews',function(){
    let freelancerID = this.id.replace('showInterviews','');

    if(!$(this).hasClass('active')){
        // add class active
        $(this).addClass('active');
        // remove class from other taps :
        $('#showWork'+freelancerID).removeClass('active');
        $('#showPortfolio'+freelancerID).removeClass('active');
        $('#showEducation'+freelancerID).removeClass('active');
        $('#showSkills'+freelancerID).removeClass('active');


        // change the content :
        let interviewsContent     = $('#interviewsContent'+freelancerID).html();
        let tapsArea    = $('#tapsArea' + freelancerID) ;
        tapsArea.fadeOut(500);
        // show the portfolio content on phone :
        let portfolioContent_mob = $('#portfolioContent'+freelancerID+'_mob') ;
        setTimeout(function () {
            tapsArea.html(interviewsContent);
            tapsArea.fadeIn(500);
            portfolioContent_mob.addClass('d-none');
        },450)
    }
});



// controlling slides numbers :
resumeCardContent.on('click','.prevSlide',function(){
    let id = this.id.replace('prevSlide','');
    let maxNum = parseInt($('#maxNumSlide'+id).html());
    let currSlide = parseInt($('#slideNumber'+id).html());
    let newNum = currSlide-1;

    if(newNum > 0){
        $('#slideNumber'+id).html(newNum);
    }else{
        $('#slideNumber'+id).html(maxNum);
    }
});

resumeCardContent.on('click','.nextSlide',function(){
    let id = this.id.replace('nextSlide','');
    let currSlide = parseInt($('#slideNumber'+id).html());
    let newNum = currSlide+1;
    let maxNum = parseInt($('#maxNumSlide'+id).html());

    if(newNum <= maxNum){
        $('#slideNumber'+id).html(newNum);
    }else{
        $('#slideNumber'+id).html('1');
    }
});


// education and training description section
// show the full desc
resumeCardContent.on('click','.desc',function () {
    $(this).css('width','auto');
    $(this).css('text-overflow','unset');
    $(this).css('overflow','normal');
    $(this).css('white-space','normal');
});

$('.uploadReferences').on('click',function () {
    let id = this.id.replace('uploadReferences','');
    $('#showReferences'+id).click();
    alert(id);
});
