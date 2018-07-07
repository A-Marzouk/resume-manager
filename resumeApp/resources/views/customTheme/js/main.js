$(document).ready(function () {
    function readURL(input,imgID) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(imgID).attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#photoInput").change(function() {
        readURL(this,'#photoPreview');
    });


    // delete Audio :
    $('#deleteAudio').on('click', function(e){
        if(!confirm('are you sure you want to delete this Audio file ?')){
            return;
        }
        $('#audioFile').attr('type','text');
        $('#audioFile').attr('value',0);
        $('#works0').change();
        $('#audioFile').attr('type','file');
        $('#audioText').val('Upload audio');
        // change the src of the Audio
        $('#audioIntroForm').attr('src','');
        $('#audioIntro')[0].load();
    });

    // when a link to google drive is added :
    $('#audio_intro').on('change',function () {
        $('#audioIntroForm').attr('src',$(this).val());
        $('#audioIntro')[0].load();
        $('#loadingText').removeClass('d-none');
        setTimeout(function(){
            location.reload();
          },6000);
    });

    // link to video :
    $('#video').on('change',function () {
        var videoID = getSecondPart( $(this).val());
        var videoSrc = 'https://www.youtube.com/embed/'+videoID;
        $('#videoFrame').attr('src',videoSrc);
        console.log('video src changed')
    });

    // show video name whn upload :
    $('#video_file').change(function(e){
        var fileName = e.target.files[0].name;
        $('#videoText').val(fileName);
        // change the src of the video
        $('#videoFileFrame').attr('src','resumeApp/uploads/videos/'+fileName);
    });

    // brose for video :
    $('#browseBtnVideo').on('click',function () {
        $('#video_file').click();
    });

    // delete video :
    $('#deleteVideo').on('click', function(e){
        if(!confirm('Are you sure you want to delete this video ?')){
            return;
        }
        $('#video_file').attr('type','text');
        $('#video_file').attr('value',0);
        $('#works0').change();
        $('#video_file').attr('type','file');
        $('#videoText').val('Upload video');
        // change the src of the video
        $('#videoFileFrame').attr('src','');
    });


    function getSecondPart(str) {
        if(str.includes('=')){
            return str.split('=')[1];
        }
    }

    // click on browse photo :
    $('#photoPreview').on('click',function () {
        $('#photoInput').click();
    });
    $('#photoPreview').hover(function () {
        $('#photoPreview').fadeTo(500, .1);
        $('#photoPreview').css('cursor', 'pointer');
        $('#profileImgBox').css('background', 'url("/resumeApp/resources/views/customTheme/images/add_profile_photo.png")');
        $('#profileImgBox').css('background-repeat','no-repeat');
        $('#profileImgBox').css('background-position','center');
    },function () {
        $('#profileImgBox').css('background', '');
        $('#photoPreview').fadeTo(500,1);
    });




    ////////////////////////////////////////// portfolio scripts  //////////////////////////////

    // load photo directly :

    $("#works0").change(function() {
        readURL(this,'#portfolioImg0');
    });
    $("#works1").change(function() {
        readURL(this,'#portfolioImg1');
    });
    $("#works2").change(function() {
        readURL(this,'#portfolioImg2');
    });
    $("#works3").change(function() {
        readURL(this,'#portfolioImg3');
    });
    $("#works4").change(function() {
        readURL(this,'#portfolioImg4');
    });
    $("#works5").change(function() {
        readURL(this,'#portfolioImg5');
    });
    $("#works6").change(function() {
        readURL(this,'#portfolioImg6');
    });
    $("#works7").change(function() {
        readURL(this,'#portfolioImg7');
    });

    // image as browse and delete button :
    var src0 = '' ;
    $('#portfolioImg0').hover(function () {
        src0 = $('#portfolioImg0').attr('src');
        if(src0 !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png'){
            $('#portfolioImg0').fadeTo(500, .1);
            $('#imgBox0').css('background', 'url("/resumeApp/resources/views/customTheme/images/delete.png")');
            $('#imgBox0').css('background-repeat','no-repeat');
            $('#imgBox0').css('background-position','center');
        }
       },function () {
        $('#portfolioImg0').fadeTo(500, 1);
        $('#imgBox0').css('background', '');

    });

    $('#portfolioImg0').on('click',function () {
        if(src0 !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png'){
            $('#deletePhoto0').click();
        }else{
            $('#works0').click();
        }
    });

    var src1 = '' ;
    $('#portfolioImg1').hover(function () {
        src1 = $('#portfolioImg1').attr('src');
        if(src1 !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png'){
            $('#portfolioImg1').fadeTo(500, .1);
            $('#imgBox1').css('background', 'url("/resumeApp/resources/views/customTheme/images/delete.png")');
            $('#imgBox1').css('background-repeat','no-repeat');
            $('#imgBox1').css('background-position','center');
        }
    },function () {
        $('#portfolioImg1').fadeTo(500, 1);
        $('#imgBox1').css('background', '');

    });

    $('#portfolioImg1').on('click',function () {
        if(src1 !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png'){
            $('#deletePhoto1').click();
        }else{
            $('#works1').click();
        }
    });

    var src2 = '' ;
    $('#portfolioImg2').hover(function () {
        src2 = $('#portfolioImg2').attr('src');
        if(src2 !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png'){
            $('#portfolioImg2').fadeTo(500, .1);
            $('#imgBox2').css('background', 'url("/resumeApp/resources/views/customTheme/images/delete.png")');
            $('#imgBox2').css('background-repeat','no-repeat');
            $('#imgBox2').css('background-position','center');
        }
    },function () {
        $('#portfolioImg2').fadeTo(500, 1);$('#imgBox2').css('background', '');
    });


    $('#portfolioImg2').on('click',function () {
        if(src2 !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png'){
            $('#deletePhoto2').click();
        }else{
            $('#works2').click();
        }
    });

    var src3 = '' ;
    $('#portfolioImg3').hover(function () {
        src3 = $('#portfolioImg3').attr('src');
        if(src3 !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png'){
            $('#portfolioImg3').fadeTo(500, .1);
            $('#imgBox3').css('background', 'url("/resumeApp/resources/views/customTheme/images/delete.png")');
            $('#imgBox3').css('background-repeat','no-repeat');
            $('#imgBox3').css('background-position','center');
        }
    },function () {
        $('#portfolioImg3').fadeTo(500, 1);
        $('#imgBox3').css('background', '');
    });

    $('#portfolioImg3').on('click',function () {
        if(src3 !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png'){
            $('#deletePhoto3').click();
        }else{
            $('#works3').click();
        }
    });

    var src4 = '' ;
    $('#portfolioImg4').hover(function () {
        src4 = $('#portfolioImg4').attr('src');
        if(src4 !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png'){
            $('#portfolioImg4').fadeTo(500, .1);
            $('#imgBox4').css('background', 'url("/resumeApp/resources/views/customTheme/images/delete.png")');
            $('#imgBox4').css('background-repeat','no-repeat');
            $('#imgBox4').css('background-position','center');
        }
    },function () {
        $('#portfolioImg4').fadeTo(500, 1);
        $('#imgBox4').css('background', '');
    });
    $('#portfolioImg4').on('click',function () {
        if(src4 !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png'){
            $('#deletePhoto4').click();
        }else{
            $('#works4').click();
        }
    });

    var src5 = '' ;
    $('#portfolioImg5').hover(function () {
        src5 = $('#portfolioImg5').attr('src');
        if(src5 !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png'){
            $('#portfolioImg5').fadeTo(500, .1);
            $('#imgBox5').css('background', 'url("/resumeApp/resources/views/customTheme/images/delete.png")');
            $('#imgBox5').css('background-repeat','no-repeat');
            $('#imgBox5').css('background-position','center');
        }
    },function () {
        $('#portfolioImg5').fadeTo(500, 1);
        $('#imgBox5').css('background', '');
    });

    $('#portfolioImg5').on('click',function () {
        if(src5 !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png'){
            $('#deletePhoto5').click();
        }else{
            $('#works5').click();
        }
    });


    var src6 = '' ;
    $('#portfolioImg6').hover(function () {
        src6 = $('#portfolioImg6').attr('src');
        if(src6 !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png'){
            $('#portfolioImg6').fadeTo(500, .1);
            $('#imgBox6').css('background', 'url("/resumeApp/resources/views/customTheme/images/delete.png")');
            $('#imgBox6').css('background-repeat','no-repeat');
            $('#imgBox6').css('background-position','center');
        }
    },function () {
        $('#portfolioImg6').fadeTo(500, 1);
        $('#imgBox6').css('background', '');
    });

    $('#portfolioImg6').on('click',function () {
        if(src6 !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png'){
            $('#deletePhoto6').click();
        }else{
            $('#works6').click();
        }
    });


    var src7 = '' ;
    $('#portfolioImg7').hover(function () {
        src7 = $('#portfolioImg7').attr('src');
        if(src7 !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png'){
            $('#portfolioImg7').fadeTo(500, .1);
            $('#imgBox7').css('background', 'url("/resumeApp/resources/views/customTheme/images/delete.png")');
            $('#imgBox7').css('background-repeat','no-repeat');
            $('#imgBox7').css('background-position','center');
        }
    },function () {
        $('#portfolioImg7').fadeTo(500, 1);
        $('#imgBox7').css('background', '');
    });

    $('#portfolioImg7').on('click',function () {
        if(src7 !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png'){
            $('#deletePhoto7').click();
        }else{
            $('#works7').click();
        }
    });



    // deleting photo :
    $('#deletePhoto0').on('click', function(){
        if(!confirm('Are you sure you want to delete this project?')){
           return;
        }
        $('#portfolioImg0').attr('src','resumeApp/resources/views/customTheme/images/add_profile_photo.png');
        $('#works0').attr('type','text');
        $('#works0').attr('value',0);
        $('#works0').change();
    });
    $('#deletePhoto1').on('click', function(e){
        if(!confirm('Are you sure you want to delete this project?')){
            return;
        }
        $('#portfolioImg1').attr('src','resumeApp/resources/views/customTheme/images/add_profile_photo.png');
        $('#works1').attr('type','text');
        $('#works1').attr('value',1);
        $('#works1').change();
    });
    $('#deletePhoto2').on('click', function(e){
        if(!confirm('Are you sure you want to delete this project?')){
            return;
        }
        $('#portfolioImg2').attr('src','resumeApp/resources/views/customTheme/images/add_profile_photo.png');
        $('#works2').attr('type','text');
        $('#works2').attr('value',2);
        $('#works2').change();
    });
    $('#deletePhoto3').on('click', function(e){
        if(!confirm('Are you sure you want to delete this project?')){
            return;
        }
        $('#portfolioImg3').attr('src','resumeApp/resources/views/customTheme/images/add_profile_photo.png');
        $('#works3').attr('type','text');
        $('#works3').attr('value',3);
        $('#works3').change();
    });
    $('#deletePhoto4').on('click', function(e){
        if(!confirm('Are you sure you want to delete this project?')){
            return;
        }
        $('#portfolioImg4').attr('src','resumeApp/resources/views/customTheme/images/add_profile_photo.png');
        $('#works4').attr('type','text');
        $('#works4').attr('value',4);
        $('#works4').change();
    });
    $('#deletePhoto5').on('click', function(e){
        if(!confirm('Are you sure you want to delete this project?')){
            return;
        }
        $('#portfolioImg5').attr('src','resumeApp/resources/views/customTheme/images/add_profile_photo.png');
        $('#works5').attr('type','text');
        $('#works5').attr('value',5);
        $('#works5').change();
    });
    $('#deletePhoto6').on('click', function(e){
        if(!confirm('Are you sure you want to delete this project?')){
            return;
        }
        $('#portfolioImg6').attr('src','resumeApp/resources/views/customTheme/images/add_profile_photo.png');
        $('#works6').attr('type','text');
        $('#works6').attr('value',6);
        $('#works6').change();
    });
    $('#deletePhoto7').on('click', function(e){
        if(!confirm('Are you sure you want to delete this project?')){
            return;
        }
        $('#portfolioImg7').attr('src','resumeApp/resources/views/customTheme/images/add_profile_photo.png');
        $('#works7').attr('type','text');
        $('#works7').attr('value',7);
        $('#works7').change();
    });

    $("[id*=portfolioImg]").hover(function () {
        $(this).css('cursor','pointer');
    });


    $('#customFile0').on('click',function () {
        $('#works0').attr('type','file');
    });
    $('#customFile1').on('click',function () {
        $('#works1').attr('type','file');
    });
    $('#customFile2').on('click',function () {
        $('#works2').attr('type','file');
    });
    $('#customFile3').on('click',function () {
        $('#works3').attr('type','file');
    });
    $('#customFile4').on('click',function () {
        $('#works4').attr('type','file');
    });
    $('#customFile5').on('click',function () {
        $('#works5').attr('type','file');
    });
    $('#customFile6').on('click',function () {
        $('#works6').attr('type','file');
    });
    $('#customFile7').on('click',function () {
        $('#works7').attr('type','file');
    });

    $("[id*=To]").on('change',function () {
        var totalHours = calculateTotalHours();
        if(totalHours <= 0){
            $('#totalHours').html('Please choose correct hours');
        }else{
            $('#totalHours').html(totalHours + ' Hours');
        }
    });

    $("[id*=From]").on('change',function () {
        var totalHours = calculateTotalHours();
        if(totalHours <= 0){
            $('#totalHours').html('Please choose correct hours');
        }else{
            $('#totalHours').html(totalHours + ' Hours');
        }
    });

    function calculateTotalHours() {
        var fromValues = (parseInt($('#MondayFrom').val()) || 0) +
            (parseInt($('#TuesdayFrom').val())||0) +
            (parseInt($('#WednesdayFrom').val())||0) +
            (parseInt($('#ThursdayFrom').val()) || 0 ) +
            (parseInt($('#FridayFrom').val()) ||0) +
            (parseInt($('#SaturdayFrom').val())||0) +
            (parseInt($('#SundayFrom').val())||0) ;

        var toValues  =  (parseInt($('#MondayTo').val()) || 0) +
            (parseInt($('#TuesdayTo').val())||0) +
            (parseInt($('#WednesdayTo').val())||0) +
            (parseInt($('#ThursdayTo').val()) || 0 ) +
            (parseInt($('#FridayTo').val()) ||0) +
            (parseInt($('#SaturdayTo').val())||0) +
            (parseInt($('#SundayTo').val())||0) ;

        return  toValues - fromValues ;

    }



    $(':input').blur(function () {
        if(this.type != 'checkbox'){
            if( $(this).val() ) {
                $('#tickMark'+this.name).removeClass('d-none');
            }else{
                $('#tickMark'+this.name).addClass('d-none');
            }
        }
    });

    $(':input').blur();


    var salaryPerH = $('#salary');
    salaryPerH.change(function () {
        $('#hours1').change();
        $('#hours2').change();
        $('#hours3').change();
        $('#hours4').change();
    });

    $('#hours1').on('change',function(){
        var timeString = $(this).val();
        var times = timeString.match(/\d+/)[0];
        if( $('#hours1').is(':checked')){
            $('#paidSalary1').removeClass('d-none');
            $('#totalPaid1').html(parseInt(times) * parseInt(salaryPerH.val()));
            $('#paidDays1').html(timeString);
        }else{
            $('#paidSalary1').addClass('d-none');
        }
    });
    $('#hours2').on('change',function(){
        var timeString = $(this).val();
        var times = timeString.match(/\d+/)[0];
        if( $('#hours2').is(':checked')){
            $('#paidSalary2').removeClass('d-none');
            $('#totalPaid2').html(parseInt(times) * parseInt(salaryPerH.val()));
            $('#paidDays2').html(timeString);
        }else{
            $('#paidSalary2').addClass('d-none');
        }
    });
    $('#hours3').on('change',function(){
        var timeString = $(this).val();
        var times = timeString.match(/\d+/)[0];
        if( $('#hours3').is(':checked')){
            $('#paidSalary3').removeClass('d-none');
            $('#totalPaid3').html(parseInt(times) * parseInt(salaryPerH.val()));
            $('#paidDays3').html(timeString);
        }else{
            $('#paidSalary3').addClass('d-none');
        }
    });
    $('#hours4').on('change',function(){
        var timeString = $(this).val();
        var times = timeString.match(/\d+/)[0];
        if( $('#hours4').is(':checked')){
            $('#paidSalary4').removeClass('d-none');
            $('#totalPaid4').html(parseInt(times) * parseInt(salaryPerH.val()));
            $('#paidDays4').html(timeString);
        }else{
            $('#paidSalary4').addClass('d-none');
        }
    });

    salaryPerH.change();

    // save to data base when change !
    $(function () {
        $('.freelancerForm :input').on('change', function (e) {
            e.preventDefault();
            var form = document.getElementsByClassName('freelancerForm')[0];
            $.ajax({
                type: 'post',
                url: 'freelancer/store',
                data: new FormData(form),
                contentType: false,
                cache: false,
                processData:false,
                success: function () {
                }
            });
        });
    });


    // when item is active :
    $(function(){
        var hash = window.location.hash;
        hash && $('ul.nav a[href="' + hash + '"]').tab('show');

        $('.nav-tabs a').click(function (e) {
            $(this).tab('show');
            var scrollmem = $('body').scrollTop() || $('html').scrollTop();
            window.location.hash = this.hash;
            $('html,body').scrollTop(scrollmem);
        });
    });

    var heading =  $('#tabMainHeading');

    // clicking on different taps change the main heading !
    $('#tap1').on('click',function () {
        heading.html('1.Overview and personal info');
    });
    $('#tap2').on('click',function () {
       heading.html('2.Availability and payment');
    });
    $('#tap3').on('click',function () {
       heading.html('3.Multimedia (Audio / Video)');
    });
    $('#tap4').on('click',function () {
       heading.html('4.Career overview (Education / Training)');
    });
    $('#tap5').on('click',function () {
       heading.html('5.Portfolio');
    });
    $('#tap6').on('click',function () {
       heading.html('6.Professional skills');
    });
    $('#tap7').on('click',function () {
       heading.html('7.Personal attributes');
    });

    // keep the heading when page is loaded :
    checkHash();

    function checkHash() {
        var hash    = window.location.hash;
        switch(hash) {
            case '#overview':
                heading.html('1.Overview and personal info');
                break;
            case '#pay':
                heading.html('2.Availability and payment');
                break;
            case '#multimedia':
                heading.html('3.Multimedia (Audio / Video)');
                break;
            case '#career':
                heading.html('4.Career overview (Education / Training)');
                break;
            case '#portfolio':
                heading.html('5.Portfolio');
                break;
            case '#skills':
                heading.html('6.Professional skills');
                break;
            case '#attributes':
                heading.html('7.Personal attributes');
                break;
            default:
                heading.html('1.Overview and personal info');
        }
    }

    // show audio file name :
    $(document).ready(function(){
        $('#audioFile').change(function(e){
            var fileName = e.target.files[0].name;
            $('#audioText').val(fileName);
            // change the src of the Audio
            $('#audioIntroForm').attr('src','resumeApp/uploads/'+fileName);
            $('#audioIntro')[0].load();
            $('#loadingText').removeClass('d-none');
            setTimeout(function(){
                location.reload();
            }, 6000);
        });
    });


    // change taps on click :
    $('.nextBtn').click(function(e){
        var href = $(this).attr("href");
        e.preventDefault();
        $('#mytabs a[href="'+href+'"]').tab('show');
        window.location.hash = href;
        checkHash();
        $('html, body').animate({scrollTop:$('#tabMainHeading').position().top}, 'slow');
    });

    // click on browse btn:
    $('#browseBtn').on('click',function () {
        $('#audioFile').click();
    });


});