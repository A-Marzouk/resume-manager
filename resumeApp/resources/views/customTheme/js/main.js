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

    // deleting photo :
    $('#deletePhoto0').on('click', function(e){
        $('#portfolioImg0').attr('src','resumeApp/resources/views/customTheme/images/no-foto.png');
        $('#works0').attr('type','text');
        $('#works0').attr('value',0);
    });
    $('#deletePhoto1').on('click', function(e){
        $('#portfolioImg1').attr('src','resumeApp/resources/views/customTheme/images/no-foto.png');
        $('#works1').attr('type','text');
        $('#works1').attr('value',1);
    });
    $('#deletePhoto2').on('click', function(e){
        $('#portfolioImg2').attr('src','resumeApp/resources/views/customTheme/images/no-foto.png');
        $('#works2').attr('type','text');
        $('#works2').attr('value',2);
    });
    $('#deletePhoto3').on('click', function(e){
        $('#portfolioImg3').attr('src','resumeApp/resources/views/customTheme/images/no-foto.png');
        $('#works3').attr('type','text');
        $('#works3').attr('value',3);
    });
    $('#deletePhoto4').on('click', function(e){
        $('#portfolioImg4').attr('src','resumeApp/resources/views/customTheme/images/no-foto.png');
        $('#works4').attr('type','text');
        $('#works4').attr('value',4);
    });
    $('#deletePhoto5').on('click', function(e){
        $('#portfolioImg5').attr('src','resumeApp/resources/views/customTheme/images/no-foto.png');
        $('#works5').attr('type','text');
        $('#works5').attr('value',5);
    });
    $('#deletePhoto6').on('click', function(e){
        $('#portfolioImg6').attr('src','resumeApp/resources/views/customTheme/images/no-foto.png');
        $('#works6').attr('type','text');
        $('#works6').attr('value',6);
    });
    $('#deletePhoto7').on('click', function(e){
        $('#portfolioImg7').attr('src','resumeApp/resources/views/customTheme/images/no-foto.png');
        $('#works7').attr('type','text');
        $('#works7').attr('value',7);

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

    var toValuePrev;
    $("[id*=To]").on('focus',function(){
        toValuePrev   = parseInt(this.value);
    }).on('change',function () {
        var toValue   = parseInt(this.value);
        var changeInTo   = toValue - toValuePrev ;
        var totalHours     = parseInt($('#totalHours').html()) + changeInTo;
        $('#totalHours').html(totalHours);
    });

    var fromValuePrev;
    $("[id*=From]").on('focus',function(){
        fromValuePrev   = parseInt(this.value);
    }).on('change',function () {
        var fromValue    = parseInt(this.value);
        var changeInFrom = fromValue - fromValuePrev ;
        var totalHours     = parseInt($('#totalHours').html()) - changeInFrom;
        $('#totalHours').html(totalHours);
    });



});