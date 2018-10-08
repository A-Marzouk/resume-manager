
// hours selection :
$('.hoursPlus').on('click',function(){
    let ID  = this.id.replace('hoursPlus','');
    let currentHours = parseInt($('#numberOfHours' + ID ).html());
    let newHours = currentHours + 5;
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
        let href1 = hireBtn.attr('href');
        let href2 = href1.replace('hours='+currentHours,'hours='+newHours);
        hireBtn.attr('href',href2);
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
        let href1 = hireBtn.attr('href');
        let href2 = href1.replace('hours='+currentHours,'hours='+newHours);
        hireBtn.attr('href',href2);
    }
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
    let text         = $('#welcomeText' + freelancerID).html().trim();
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
    resumeRightArea.fadeOut(700);
    setTimeout(function () {
        resumeRightArea.html(audioContent);
        resumeRightArea.fadeIn(700);
    },650)
});

resumeCardContent.on('click','.openVideo',function(){
    let ID = this.id.replace('_open_video','');
    let videoContent = $('#videoContent'+ID).html();
    // change the content :
    let resumeRightArea  =  $('#resumeCardRight' + ID) ;
    resumeRightArea.fadeOut(700);
    setTimeout(function () {
        resumeRightArea.html(videoContent);
        resumeRightArea.fadeIn(700);
    },650)
});

resumeCardContent.on('click','.audioDismiss',function () {
    let ID = this.id.replace('audio_dismiss','');
    let defaultContent     = $('#defaultContent'+ID).html();
    let resumeRightArea    = $('#resumeCardRight' + ID) ;
    resumeRightArea.fadeOut(700);
    setTimeout(function () {
        resumeRightArea.html(defaultContent);
        resumeRightArea.fadeIn(700);
    },650)
});



// client page ( resume cards )

// skills images :
resumeCardContent.on('mouseover','.highlightSkill',function () {
    // hover in
    let ID         = this.id.replace('skillContainer','');
    let skillImg   = $('#skillImage'+ID);
    skillImg.css('filter','grayscale(0)');
    skillImg.css('width','21');
});

resumeCardContent.on('mouseout','.highlightSkill',function () {
    // hover out
    let ID         = this.id.replace('skillContainer','');
    // change the src of the image to colored
    let skillImg   = $('#skillImage'+ID);
    skillImg.css('filter','grayscale(100%)');
    skillImg.css('width','20');
});


// nav row :

resumeCardContent.on('click','.showPortfolio',function(){
    if(!$(this).hasClass('active')){
        // add class active
        $(this).addClass('active');
        // remove class from other taps :
        $('.showWork').removeClass('active');
        $('.showEducation').removeClass('active');

        // change the content :
        let freelancerID = this.id.replace('showPortfolio','');
        let portfolioContent     = $('#portfolioContent'+freelancerID).html();
        let tapsArea    = $('#tapsArea' + freelancerID) ;
        tapsArea.fadeOut(700);
        setTimeout(function () {
            tapsArea.html(portfolioContent);
            tapsArea.fadeIn(700);
        },650)

    }
});

resumeCardContent.on('click','.showWork',function(){
    if(!$(this).hasClass('active')){
        // add class active
        $(this).addClass('active');
        // remove class from other taps :
        $('.showPortfolio').removeClass('active');
        $('.showEducation').removeClass('active');

        // change the content :
        let freelancerID = this.id.replace('showWork','');
        let workContent     = $('#workContent'+freelancerID).html();
        let tapsArea    = $('#tapsArea' + freelancerID) ;
        tapsArea.fadeOut(700);
        setTimeout(function () {
            tapsArea.html(workContent);
            tapsArea.fadeIn(700);
        },650)

    }
});


resumeCardContent.on('click','.showEducation',function(){
    if(!$(this).hasClass('active')){
        // add class active
        $(this).addClass('active');
        // remove class from other taps :
        $('.showWork').removeClass('active');
        $('.showPortfolio').removeClass('active');
        // change the content :
        let freelancerID = this.id.replace('showEducation','');
        let educationContent     = $('#educationContent'+freelancerID).html();
        let tapsArea    = $('#tapsArea' + freelancerID) ;
        tapsArea.fadeOut(700);
        setTimeout(function () {
            tapsArea.html(educationContent);
            tapsArea.fadeIn(700);
        },650)

    }
});
