
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
