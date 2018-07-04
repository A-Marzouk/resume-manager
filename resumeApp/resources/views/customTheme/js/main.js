$(document).ready(function () {
    var portfolioScripts = 'resumeApp/resources/views/customTheme/js/portfolio.js';
    $("head").append('<script type="text/javascript" src="' + portfolioScripts + '"></script>');

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
        $('#audioFile').attr('type','text');
        $('#audioFile').attr('value',0);
        $('#works0').change();
        $('#audioFile').attr('type','file');
        $('#audioLabel').html('Upload audio');
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
        $('#videoLabel').html(fileName);
        // change the src of the video
        $('#videoFileFrame').attr('src','resumeApp/uploads/videos/'+fileName);
    });

    // delete video :
    $('#deleteVideo').on('click', function(e){
        $('#video_file').attr('type','text');
        $('#video_file').attr('value',0);
        $('#works0').change();
        $('#video_file').attr('type','file');
        $('#videoLabel').html('Upload video');
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

    // image as browse button :

    var src = '' ;
    $('#portfolioImg0').hover(function () {
         src = $('#portfolioImg0').attr('src');
       });
    $('#portfolioImg0').on('click',function () {
        if(src !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png'){
            $('#deletePhoto0').click();
        }else{
            $('#works0').click();
        }
    });


    $('#portfolioImg1').on('click',function () { $('#works1').click();});
    $('#portfolioImg2').on('click',function () { $('#works2').click();});
    $('#portfolioImg3').on('click',function () { $('#works3').click();});
    $('#portfolioImg4').on('click',function () { $('#works4').click();});
    $('#portfolioImg5').on('click',function () { $('#works5').click();});
    $('#portfolioImg6').on('click',function () { $('#works6').click();});
    $('#portfolioImg7').on('click',function () { $('#works7').click();});

    // deleting photo :
    $('#deletePhoto0').on('click', function(e){
        $('#portfolioImg0').attr('src','resumeApp/resources/views/customTheme/images/add_profile_photo.png');
        $('#works0').attr('type','text');
        $('#works0').attr('value',0);
        $('#works0').change();
        $('#deletePhoto0').addClass('d-none');
    });
    $('#deletePhoto1').on('click', function(e){
        $('#portfolioImg1').attr('src','resumeApp/resources/views/customTheme/images/add_profile_photo.png');
        $('#works1').attr('type','text');
        $('#works1').attr('value',1);
        $('#works1').change();
        $('#deletePhoto1').addClass('d-none');
    });
    $('#deletePhoto2').on('click', function(e){
        $('#portfolioImg2').attr('src','resumeApp/resources/views/customTheme/images/add_profile_photo.png');
        $('#works2').attr('type','text');
        $('#works2').attr('value',2);
        $('#works2').change();
        $('#deletePhoto2').addClass('d-none');
    });
    $('#deletePhoto3').on('click', function(e){
        $('#portfolioImg3').attr('src','resumeApp/resources/views/customTheme/images/add_profile_photo.png');
        $('#works3').attr('type','text');
        $('#works3').attr('value',3);
        $('#works3').change();
        $('#deletePhoto3').addClass('d-none');
    });
    $('#deletePhoto4').on('click', function(e){
        $('#portfolioImg4').attr('src','resumeApp/resources/views/customTheme/images/add_profile_photo.png');
        $('#works4').attr('type','text');
        $('#works4').attr('value',4);
        $('#works4').change();
        $('#deletePhoto4').addClass('d-none');
    });
    $('#deletePhoto5').on('click', function(e){
        $('#portfolioImg5').attr('src','resumeApp/resources/views/customTheme/images/add_profile_photo.png');
        $('#works5').attr('type','text');
        $('#works5').attr('value',5);
        $('#works5').change();
        $('#deletePhoto5').addClass('d-none');
    });
    $('#deletePhoto6').on('click', function(e){
        $('#portfolioImg6').attr('src','resumeApp/resources/views/customTheme/images/add_profile_photo.png');
        $('#works6').attr('type','text');
        $('#works6').attr('value',6);
        $('#works6').change();
        $('#deletePhoto6').addClass('d-none');
    });
    $('#deletePhoto7').on('click', function(e){
        $('#portfolioImg7').attr('src','resumeApp/resources/views/customTheme/images/add_profile_photo.png');
        $('#works7').attr('type','text');
        $('#works7').attr('value',7);
        $('#works7').change();
        $('#deletePhoto7').addClass('d-none');
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
            $('#audioLabel').html(fileName);
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
    })

});