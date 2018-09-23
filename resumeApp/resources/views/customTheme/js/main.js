$(document).ready(function () {

    /////////////////////////   Freelancer form scripts ////////////////////////
        // overall scripts ( used in all sections )
             // cursor pointer on hover :
                $('.cursorPointerOnHover').hover(function () {
                    $(this).css('cursor','pointer');
                });
             // change content
            $('.resumeCardRight').on('click','.openAudio',function(){
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

            $('.resumeCardRight').on('click','.openVideo',function(){
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

            $('.resumeCardRight').on('click','.audioDismiss',function () {
                let ID = this.id.replace('audio_dismiss','');
                let defaultContent     = $('#defaultContent'+ID).html();
                let resumeRightArea    = $('#resumeCardRight' + ID) ;
                resumeRightArea.fadeOut(700);
                setTimeout(function () {
                    resumeRightArea.html(defaultContent);
                    resumeRightArea.fadeIn(700);
                },650)
            });

            // tap to chat
            $('.resumeCardRight').on('click','.tap-to-chat',function () {
                $('#liveChat').click();
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

            // client page ( resume cards )

                // skills images :
            $('.resumeCardRight').on('mouseover','.highlightSkill',function () {
                // hover in
                let ID         = this.id.replace('skillContainer','');
                let skillImg   = $('#skillImage'+ID);
                skillImg.css('filter','grayscale(0)');
                skillImg.css('width','21');
            });

            $('.resumeCardRight').on('mouseout','.highlightSkill',function () {
                // hover out
                let ID         = this.id.replace('skillContainer','');
                // change the src of the image to colored
                let skillImg   = $('#skillImage'+ID);
                skillImg.css('filter','grayscale(100%)');
                skillImg.css('width','20');
            });

            $(".viewEducationLink").on('click',function () {
                let portfolioArea = $('#area_'+this.id.replace('Education','Portfolio'));
                if(!portfolioArea.hasClass('d-none')){
                    portfolioArea.addClass('d-none');
                }
                $('#area_'+this.id).fadeIn(800).removeClass('d-none');
            });

            $(".Minimize").on('click',function () {
                $('#area_viewPortfolioBtn'+this.id.replace('minimize','')).fadeOut(1500);
                $('#area_viewEducationBtn'+this.id.replace('minimize','')).fadeOut(1500);
            });


            // client page : delete search
            $('.deleteSearch').click(
                function () {
                    if(!confirm('Are you sure you want to delete this search ?')){
                        return;
                    }
                    let search_id = this.id;
                    let deleteData = {
                        'search_id':search_id
                    };
                    axios.post('/search_delete',deleteData).then((response)=>{
                        // hide the deleted column slowly :
                        $('#selectedSearch'+ search_id).fadeOut(2000);

                        // changes are saved on - off
                        $('#changesSaved').fadeIn('slow');
                        setTimeout(function () {
                            $('#changesSaved').fadeOut();
                        },2000);

                    });

                }
            );

            // client page : agree with terms and conditions :
            termsBar();

            // if client agreed on terms and conditions :
            $('#termsBar').on('click',function () {
                if($('#terms').prop('checked')){
                    // send to post request to axios to save it :
                    let data = {
                      terms: 'AGREED'
                    };
                    axios.post('/client/set_terms',data).then((response) => {
                        setTimeout(function () {
                            $('#termsLabel').hide().html("Thank you !").fadeIn('slow');
                            $('#termsBar').animate({opacity:0},5000);
                            setTimeout(function () {
                                $('#termsBar').addClass('d-none');
                            },5000);
                        },1000);
                    });
                }
            });
            // client page : delete search without realoding the page :


    // public search page : delete freelancer search without realoding the page :
    $('.deleteFreelancerSearch').on('click',function () {
        if(!confirm('Are you sure you want to delete this freelancer from search ?')){
            return;
        }

        let id = this.id ;
        let idArr = id.split('_');
        let freelancer_id = idArr[0];
        let search_id = idArr[1];
        let deleteData = {
            freelancer_id,
            search_id
        };
        axios.post('/search_delete_freelancer',deleteData).then((response)=>{
            console.log(response.data);

            // hide the deleted column slowly :
            $('#selectedFreelancerSearch'+ freelancer_id).fadeOut(2000);

            // changes are saved on - off
            $('#changesSaved').fadeIn('slow');
            setTimeout(function () {
                $('#changesSaved').fadeOut();
            },2000);

        });

    });
// indicators for each section :
    // we need to get if any section is completed.
            highlightCompletedSecs();

            // hiding changes saved :
            $('#changesSaved').removeClass('d-none');
            $('#changesSaved').hide();

            // hide success message
            if($('#successMessage').length !== 0){
                setTimeout(function () {
                    $('#successMessage').fadeOut('slow');
                },4000);
            }

            // chat on typing change send button :
                $('#sendMessage').on('keyup',function () {
                    let chatIcon =   $('#chatIcon');
                    if($('#sendMessage').val()){
                        chatIcon.css({
                            'background-position-x':'-39px',
                            'pointer-events':'auto',
                            'cursor':'pointer',
                        });
                    }else{
                        chatIcon.css({
                            'background-position-x':'7px',
                            'pointer-events':'none',
                            'cursor':'default',
                        });
                    }
                });

                let chatIcon =   $('#chatIcon');
                chatIcon.on('click',function () {
                    $(this).css({
                        'background-position-x':'7px',
                        'pointer-events':'none',
                        'cursor':'default',
                    });
                });

            // add tick mark when data is filled :
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

            // handeling hashes all over the Freelancer form page :
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
                $('#tap1,#tap1phone').on('click',function () {
                    heading.html('1.Overview and personal info');
                });
                $('#tap2,#tap2phone').on('click',function () {
                    heading.html('2.Availability and payment');
                });
                $('#tap3,#tap3phone').on('click',function () {
                    heading.html('3.Multimedia (Audio / Video)');
                });
                $('#tap4,#tap4phone').on('click',function () {
                    heading.html('4.Career overview (Education / Training)');
                });
                $('#tap5,#tap5phone').on('click',function () {
                    heading.html('5.Portfolio');
                });
                $('#tap6,#tap6phone').on('click',function () {
                    heading.html('6.Professional skills');
                });
                $('#tap7,#tap7phone').on('click',function () {
                    heading.html('7.Personal attributes');
                });

                // keep the heading when page is loaded :
                checkHash();

            // change taps on click :
            $('.nextBtn').click(function(e){
                var href = $(this).attr("href");
                e.preventDefault();
                $('#mytabs a[href="'+href+'"]').tab('show');
                window.location.hash = href;
                checkHash();
                $('html, body').animate({scrollTop:$('#tabMainHeading').position().top}, 'slow');
            });


            // save to data base when any data changes !
            $(function () {
                $('.freelancerForm :input').on('change', function (e) {
                    e.preventDefault();
                    // if inputs from Job form ( do not submit here )
                    let dontSaveFields = ['job_title','job_description','company','date_from','date_to','currently_working',
                        'projectName','link','mainImage','projectDesc','isActive'];
                    if(dontSaveFields.includes(this.id)){
                        return;
                    }
                    var form = document.getElementsByClassName('freelancerForm')[0];

                    // disable all empty files

                    var files = document.querySelectorAll(".freelancerForm input[type=file]");
                    let ios = iOS();
                    if(ios){
                        files.forEach(function (file) {
                            let fileInput =  $('#'+file.id);
                            if(fileInput.get(0).files.length === 0){
                                fileInput.attr('disabled',true);
                            }
                        });
                    }

                    $.ajax({
                        type: 'post',
                        url: 'freelancer/store',
                        data: new FormData(form),
                        contentType: false,
                        cache: false,
                        processData:false,
                        beforeSend:function(){
                        },
                        xhr: function() {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function(evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = evt.loaded / evt.total;
                                    //Do something with upload progress here
                                    if($('#audioFile').val()){
                                        $('#loadingText').removeClass('d-none');
                                        $('#progressAudio').html(parseInt(percentComplete*100)+' %')
                                        if(percentComplete == 1){
                                            // success
                                            $('#loadingText').html('Success.');
                                            setTimeout(function () {
                                                $('#loadingText').addClass('d-none');
                                                location.reload();
                                            },2500);
                                        }
                                    }
                                    if($('#video_file').val()){
                                        $('#loadingTextVideo').removeClass('d-none');
                                        $('#progress').html(parseInt(percentComplete*100)+' %')
                                        if(percentComplete == 1){
                                            // success
                                            $('#loadingTextVideo').html('Success.');
                                            setTimeout(function () {
                                                $('#loadingTextVideo').addClass('d-none');
                                            },2500);
                                        }
                                    }
                                }
                            }, false);

                            xhr.addEventListener("progress", function(evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = evt.loaded / evt.total;
                                    //Do something with download progress
                                }
                            }, false);

                            return xhr;
                        },
                        success:function (){
                            if($('#video_file').val()) {
                                // load the video
                                $('#videoFileFrame')[0].load();
                            }

                            // changes are saved on - off
                            $('#changesSaved').fadeIn('slow');
                            setTimeout(function () {
                                $('#changesSaved').fadeOut();
                            },2000);

                            highlightCompletedSecs();
                        }
                    });

                    if(ios){
                        // after the request enable them again !
                        var disabledFiles = document.querySelectorAll(".freelancerForm input[type=file]");
                        disabledFiles.forEach(function (file) {
                            let fileInput =  $('#'+file.id);
                            fileInput.attr('disabled',false);
                        });
                    }

                });
            });


            // importing data from behance :
            $('#behanceDataForm').on('submit',function (e) {
                e.preventDefault();
                let behanceLink = $('#behanceLink').val();
                let behanceUsername = getBehanceUsername(behanceLink);
                if(behanceUsername !== false){
                    getBehanceData(behanceUsername);
                }
            });

            // hours selection :

            $('.hoursOptions').on('change',function () {
                let freelancerID     = this.id.replace('availableHours','');
                let weeklySalaryID   = 'weeklySalary'+freelancerID;
                let weeklySalaryText = 'For ' + this.value + ' hours per week, you will be paid ' + this.value * $('#salary' + freelancerID).val() + ' USD';
                $('#'+weeklySalaryID).fadeOut(1000);
                $('#'+weeklySalaryID).html(weeklySalaryText);
                setTimeout(function () {
                    $('#'+weeklySalaryID).fadeIn(1000);
                },1000);
            });



    // 1- overview ( section one )
        // profile photo scripts

            $("#photoInput").change(function() {
                readURL(this,'#photoPreview');
            });

            var srcPreview = '' ;
            $('#photoPreview').hover(function () {
                $(this).css('cursor','pointer');
                srcPreview = $('#photoPreview').attr('src');
                if(srcPreview !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png'){
                    $('#photoPreview').fadeTo(500, .1);
                    $('#profileImgBox').css('background', 'url("/resumeApp/resources/views/customTheme/images/deleteimg.png")');
                    $('#profileImgBox').css('background-repeat','no-repeat');
                    $('#profileImgBox').css('background-position','center');
                }
            },function () {
                $('#photoPreview').fadeTo(500, 1);
                $('#profileImgBox').css('background', '');
            });

            $('#photoPreview').on('click',function () {
                if(srcPreview !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png'){
                    // delete photo profile photo
                    if(!confirm('Are you sure you want to delete profile photo ?')){
                        return;
                    }
                    $('#photoPreview').attr('src','resumeApp/resources/views/customTheme/images/add_profile_photo.png');
                    $('#photoInput').attr('type','text');
                    $('#photoInput').attr('value',10);
                    $('#jobTitle').change();
                    $('#photoInput').attr('type','file');
                }else{
                    $('#photoInput').click();
                }
            });

            uploadByDrop('#photoPreview','photo');


        // profile photo end

    // 2- payment (section two)
        // calculator :
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
        // end calculator

    // 3- Multimedia :
        // audio files :
            // delete Audio :
            $('#deleteAudio').on('click', function(e){
                if(!confirm('are you sure you want to delete this Audio file ?')){
                    return;
                }
                $('#audioFile').attr('type','text');
                $('#audioFile').attr('value',0);
                $('#jobTitle').change();
                $('#audioFile').attr('type','file');
                $('#audioText').val('Upload audio');
                // change the src of the Audio
                $('#audioIntroForm').attr('src','');
                $('#audioIntro')[0].load();
            });
            // when a link to google drive is added :
            $('#audio_intro').on('change',function () {
                $('#audioIntroForm').attr('src',$(this).val());
                $('#loadingText').removeClass('d-none');
                setTimeout(function(){
                    location.reload();
                },3000);
            });

            // show audio file name :
            $('#audioFile').change(function(e){
                var fileName = e.target.files[0].name;
                $('#audioText').val(fileName);
                // change the src of the Audio
                $('#audioIntroForm').attr('src','resumeApp/uploads/'+fileName);
            });

            // click on browse btn:
            $('#browseBtn').on('click',function () {
                $('#audioFile').click();
            });

        // video files :
            // link to video :
            $('#video').on('change',function () {
                var videoID = getSecondPart( $(this).val());
                var videoSrc = 'https://www.youtube.com/embed/'+videoID;
                $('#videoFrame').attr('src',videoSrc);
            });


            // show video name when upload :
            $('#video_file').change(function(e){
                var fileName = e.target.files[0].name;
                $('#videoText').val(fileName);
                // change the src of the video
                $('#videoFileFrame').attr('src','resumeApp/uploads/videos/'+fileName);


            });

            // browse for video :
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
                $('#jobTitle').change();
                $('#video_file').attr('type','file');
                $('#videoText').val('Upload video');
                // change the src of the video
                $('#videoFileFrame').attr('src','');
            });





    ////////////////////////////////////////// portfolio scripts  //////////////////////////////

    // load photo directly :
    
    ////////////////////////////    Freelancer Resume page scripts ////////////////////////////////
        // education and training description section
            // show the full desc
                $('.desc').on('click',function () {
                    $(this).css('width','auto');
                    $(this).css('text-overflow','unset');
                    $(this).css('overflow','normal');
                    $(this).css('white-space','normal');
                });

});


/////////// functions ///////////////
function readURL(input,imgID) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $(imgID).attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function iOS() {

    var iDevices = [
        'iPad Simulator',
        'iPhone Simulator',
        'iPod Simulator',
        'iPad',
        'iPhone',
        'iPod'
    ];

    if (!!navigator.platform) {
        while (iDevices.length) {
            if (navigator.platform === iDevices.pop()){ return true; }
        }
    }

    return false;
}

function checkHash() {
    var heading =  $('#tabMainHeading');
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

function calculateTotalHours() {
    calculateDayHours();
    let days = [
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday'
    ];

    let totalHours = 0;

    days.forEach(function (day) {
        totalHours+= calculateDayHours(day);
    });

    return  totalHours ;

}

function calculateDayHours(day) {
    let totalHoursDay = (parseInt($('#'+day+'To').val())||0) -  (parseInt($('#'+day+'From').val())||0) ;
    if(totalHoursDay < 0){
        totalHoursDay = 24 + totalHoursDay;
        // works from 9 AM to 1 AM so he works 1-9 = -8 hours which means 24 - 8 = 16 hours.
    }
    return totalHoursDay;
}

function getSecondPart(str) {
    if(str.includes('=')){
        var videoId = str.split('=')[1].substring(0,11);
        return videoId;
    }
}

function uploadByDrop(elementID,elementName) {
    $(elementID).on({
        'dragover dragenter': function(e) {
            e.preventDefault();
            e.stopPropagation();
        },
        'drop': function(e) {
            //our code will go here
            e.preventDefault();
            e.stopPropagation();
            readURL(e.originalEvent.dataTransfer,elementID);
            // save to the data base :
            var form = document.getElementsByClassName('freelancerForm')[0];
            var formData = new FormData(form);
            // Attach file
            formData.append(elementName, e.originalEvent.dataTransfer.files[0]);

            $.ajax({
                type: 'POST',
                url: 'freelancer/store',
                data: formData,
                contentType: false,
                cache: false,
                processData:false,
                success: function () {
                    // changes are saved on - off
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);

                    highlightCompletedSecs();
                }
            });
        }
    });
}

function highlightCompletedSecs(){
    // array for sections :
    let sections = {
        overview:[ 'name', 'city','jobTitle','email','languages','intro','photo','skype_id','telephone','social_apps'],
        pay:['salary','availableHours','freeDate','availableHours','currency','timeZone','salary_month'],
        multimedia:['audio','audioFile','video','video_file'],
        career:['careerObjective','eduTitle1','eduTitle2','eduTitle3','eduYear1','eduYear2','eduYear3',
            'eduDesc1','eduDesc2','eduDesc3','trnTitle1','trnTitle2','trnTitle3',
            'trnYear1','trnYear2','trnYear3','trnDesc1','trnDesc2','trnDesc3'],
        portfolio:['works0','works1','works2','works3','works4','works5','works6','works7',
            'workDesc0','workDesc1','workDesc2','workDesc3','workDesc4','workDesc5','workDesc6','workDesc7',
            'githubLink','stackoverflowLink','behanceLink','instagramLink','dribbleLink',
            'personalSite'],
        skills:['primarySkills','design_skills_checkbox','primarySkills','design_styles'],
        attributes:[ 'personal_interests','professional_attributes','charSkills']
    };

    let emptyInputs = $('.freelancerForm :input').filter(function() {
            return ($(this).val() == "");
    });

    let completedSections = {
        overview: true,
        pay: true,
        multimedia: true,
        portfolio: true,
        skills: true,
        career: true,
        attributes: true
    };

    let emptyInputsName = [];

    for(let i =0; i < emptyInputs.length ; i++){
        emptyInputsName.push(emptyInputs[i].name);
    }


   // remove uploaded files from the empty fileds file :
    let uploadedFilesNames = getUploadedFilesNames()[0];
    uploadedFilesNames.forEach(function (fileName) {
        var index = emptyInputsName.indexOf(fileName);
        if (index > -1) {
            emptyInputsName.splice(index, 1);
        }
    });

    let emptyFilesNames =  getUploadedFilesNames()[1];
    emptyFilesNames.forEach(function (fileName) {
        emptyInputsName.push(fileName);
    });

    // check if overview is completed :
    emptyInputsName.forEach(function (emptyInput) {
      let sectionsNames = Object.keys(sections);
      sectionsNames.forEach(function (sectionName) {
          if(sections[sectionName].includes(emptyInput)){
              completedSections[sectionName] = false;
          }
      })


    });

    let completedSectionsArr = Object.entries(completedSections); // example : ['pay','true']

    // add styles to completed sections :
    for(let i=0; i<completedSectionsArr.length; i++){
        if(completedSectionsArr[i][1]){
           $("a[href='#"+completedSectionsArr[i][0]+"']").css('border-bottom-color','lawngreen');
            // if they have class active : remove circle effects
           $("a[href='#"+completedSectionsArr[i][0]+"'] .tabCircle").css('color','lawngreen');
           $("a[href='#"+completedSectionsArr[i][0]+"'] .tabCircle").css('background','none');
        }else{
            $("a[href='#"+completedSectionsArr[i][0]+"']").css('border-bottom-color','lightgray');
            $("a[href='#"+completedSectionsArr[i][0]+"'] .tabCircle").css('color','gray');
            if(!$("a[href='#"+completedSectionsArr[i][0]+"']").hasClass('active')){
                $("a[href='#"+completedSectionsArr[i][0]+"'] .tabCircle").css('background','none');
            }
        }
    }
}

function getUploadedFilesNames() {
    let filesNames = [];

    let emptyFiles = [];

    // works files :

    for(let i=0; i<=7;i++){
        if($('#portfolioImg'+i).attr('src') !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png'){
            filesNames.push('works'+i);
        }else{
            emptyFiles.push('works'+i);
        }
    }

    // profile photo files :
    if($('#photoPreview').attr('src') !== 'resumeApp/resources/views/customTheme/images/add_profile_photo.png') { //empty
        filesNames.push('photo');
    }else{
        emptyFiles.push('photo');
    }

    // audiofile :
    if($('#audioIntroForm').attr('src') !=='') { //empty
        filesNames.push('audioFile');
    }else{
        emptyFiles.push('audioFile');
    }

    // video file :
    if($('#videoFileFrame').attr('src') !=='') { //empty
        filesNames.push('video_file');
    }else{
        emptyFiles.push('video_file');
    }


    let files =[filesNames,emptyFiles];

    return files;

}


function getBehanceData(behanceUsername){
    // set behance link :
    $('#behanceLinkInput').val("https://www.behance.net/"+behanceUsername);

    $('#behanceLinkWait').removeClass('d-none');
    $('#behanceLinkError').addClass('d-none');
    // hdie import button
    $('#importBtn').addClass('d-none');

    axios.get('/freelancer/behance/'+behanceUsername).then( (response)=> {
        let behanceData =  response.data;
        if(behanceData !== false){
            $('#fullName').val(behanceData.display_name);
            $('#city').val(behanceData.city);
            $('#intro').val(behanceData.sections['About Me']);
            saveBehanceData(behanceData.images,behanceData.fields);
            $('#spec_design_skills').val(behanceData.fields.join(', '));
            // change the modal html :
            $('#modalBody').html(' <div class="label" style="padding: 20px;"><p class="label-success panelFormLabel">Thank you, your data has been successfully imported</p></div>');
            // close modal :
            setTimeout(function () {
                $('#closeBehanceModal').click();
                location.reload();
            },2000);

            loadProjects(behanceData.projects);

            if(behanceData.has_social_links){
                loadSocialLinks(behanceData.social_links);
            }

            // save to database :
            $('#jobTitle').change();

        }else{
            // error
            $('#behanceLinkError').removeClass('d-none');
            $('#behanceLinkWait').addClass('d-none');
            $('#importBtn').removeClass('d-none');
        }
    }).catch((error)=> {
        $('#behanceLinkError').removeClass('d-none');
        $('#behanceLinkWait').addClass('d-none');
        $('#importBtn').removeClass('d-none');
        });



}

function saveBehanceData(images,fields){
    let behanceImg = images[Object.keys(images)[Object.keys(images).length - 1]] ;
    $('#photoPreview').attr('src',behanceImg);
    axios.post('/freelancer/behance/save_img',{
        img : behanceImg,
        design_skills:fields
    });
}

function getBehanceUsername(behanceLink) {
    if(!behanceLink.includes('behance.net/')){
        $('#behanceLinkError').removeClass('d-none');
        return false;
    }
    let linkArr = behanceLink.split('/');
    return linkArr[linkArr.length-1] ;
}

function loadProjects(projects){
    let i=0;
    projects.forEach(function(project){
       $('#portfolioImg'+i).attr('src',project.covers.original);
       $('#workDesc'+i).val(project.name);
       i++;
    });
}

function loadSocialLinks(socialLinks){
    socialLinks.forEach(function (link) {
        if(link.isInstagram){
            $('#instagramLink').val(link.url);
        }
        else if(link.isDribbble){
            $('#dribbleLink').val(link.url);
        }
    });
}

function termsBar(){
    // check if current user agrees with terms or not :
    axios.get('/client/has_agreed').then((response)=>{
        if(response.data.terms !== 'AGREED'){
            $('#termsBar').animate({opacity:1},4000);
        }
    } );

}