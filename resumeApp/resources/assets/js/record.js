var status = $('#record_status'),
    canvas = document.getElementById( 'canvas' ),
    lang = {
        'mic_error': 'Error accessing the microphone', //Ошибка доступа к микрофону
        'press_to_start': 'Press to start recording', //Нажмите для начала записи
        'recording': 'Recording', //Запись
        'play': 'Play', //Воспроизвести
        'stop': 'Stop', //Остановить
        'download': 'Download', //Скачать
        'use_https': 'This application in not working over insecure connection. Try to use HTTPS'
    },
    time;


if ( navigator.mediaDevices === undefined ) {
    navigator.mediaDevices = {};
}


if ( navigator.mediaDevices.getUserMedia === undefined ) {
    navigator.mediaDevices.getUserMedia = function ( constrains ) {
        var getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia
        if ( !getUserMedia )  {
            return Promise.reject( new Error( 'getUserMedia is not implemented in this browser' ) );
        }

        return new Promise( function( resolve, reject ) {
            getUserMedia.call( navigator, constrains, resolve, reject );
        } );
    }
}


if ( navigator.mediaDevices.getUserMedia ) {
    var btn_status = 'inactive',
        mediaRecorder,
        chunks = [],
        audio = new Audio(),
        mediaStream,
        audioSrc,
        type = {
            'type': 'audio/ogg,codecs=opus'
        },
        ctx,
        analys,
        blob;


    function parseTime( sec ) {
        var h = parseInt( sec / 3600 );
        var m = parseInt( sec / 60 );
        var sec = sec - ( h * 3600 + m * 60 );

        h = h == 0 ? '' : h + ':';
        sec = sec < 10 ? '0' + sec : sec;

        return h + m + ':' + sec;
    }


    function start() {
        $('#record_status').fadeIn().removeClass('d-none');
        navigator.mediaDevices.getUserMedia( { 'audio': true } ).then( function ( stream ) {
            mediaRecorder = new MediaRecorder( stream );
            mediaRecorder.start();
            status.html('<span class="panelFormLabel">Recording</span>');
            $('#counter').removeClass('d-none');
            $('#counter').html('00');
            btn_status = 'recording';
            $('#recordImg').addClass('recording');
            $('#stopAudio').fadeIn(500).removeClass('d-none');
            $('#startRecord').fadeOut(500).addClass('d-none');

            if ( navigator.vibrate ) navigator.vibrate( 150 );

            time = Math.ceil( new Date().getTime() / 1000 );


            mediaRecorder.ondataavailable = function ( event ) {
                chunks.push( event.data );
            };

            mediaRecorder.onstop = function () {
                stream.getTracks().forEach( function( track ) { track.stop() } );

                blob = new Blob( chunks, type );
                audioSrc = window.URL.createObjectURL( blob );

                audio.src = audioSrc;

                chunks = [];

                $('#recordImg').removeClass('recording');

            }



        } ).catch( function ( error ) {
            if ( location.protocol != 'https:' ) {
                status.html(lang.mic_error + '<br>'  + lang.use_https);
            } else {
                status.html(lang.mic_error);
            }
        });
    }

    function stop() {
        mediaRecorder.stop();
        btn_status = 'inactive';

        if ( navigator.vibrate ) navigator.vibrate( [ 200, 100, 200 ] );

        var now = Math.ceil( new Date().getTime() / 1000 );

        var t = parseTime( now - time );

        status.html('Recorded: ' + t);
        $('#stopAudio').fadeOut(500).addClass('d-none');
        $('#downloadAudio').fadeIn(500).removeClass('d-none');
        $('#playAudio').fadeIn(500).removeClass('d-none');
        $('#saveAudio').fadeIn(500).removeClass('d-none');
        $('#sendAudio').fadeIn(500).removeClass('d-none');
        $('#discardAudio').fadeIn(500).removeClass('d-none');


    }

    $('#startRecord').on('click',function () {
        start();
    });

    $('#playAudio').on('click',function () {
        play();
    });

    $('#stopAudio').on('click',function () {
        stop();
    });

    $('#downloadAudio').on('click',function () {
        save();
    });

    $('#saveAudio').on('click',function () {
        saveToDB();
    });

    $('#sendAudio').on('click',function () {
        saveAudioForChat();
    });


    function saveToDB() {

        var data = new FormData();
        data.append('file', blob);
        data.append('type', blob.type);

        $.ajax({
            url :  "audio/save",
            type: 'POST',
            data: data,
            contentType: false,
            processData: false,
            success: function(data) {
                // changes are saved on - off
                $('#changesSaved').fadeIn('slow');
                setTimeout(function () {
                    $('#changesSaved').fadeOut();
                    location.reload();
                },1000);

            },
            error: function() {
                console.log("Error while saving audio");
            }
        });
    }

    function saveAudioForChat(){
        var data = new FormData();
        data.append('file', blob);
        data.append('type', blob.type);

        status.html('');
        $.ajax({
            url :  "audio/save_for_chat",
            type: 'POST',
            data: data,
            contentType: false,
            processData: false,

            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(data) {
                $('#currAudioChatSrc').html(data);
            },
            error: function() {
                console.log("Error while saving audio");
                $('#currAudioChatSrc').html('');
            }
        });
    }

    function play() {
        audio.play();
    }

    function pause() {
        audio.pause();
        audio.currentTime = 0;
    }

    function roundedRect(ctx, x, y, width, height, radius, fill) {
        ctx.beginPath();
        ctx.moveTo(x, y + radius);
        ctx.lineTo(x, y + height - radius);
        ctx.quadraticCurveTo(x, y + height, x + radius, y + height);
        ctx.lineTo(x + width - radius, y + height);
        ctx.quadraticCurveTo(x + width, y + height, x + width, y + height - radius);
        ctx.lineTo(x + width, y + radius);
        ctx.quadraticCurveTo(x + width, y, x + width - radius, y);
        ctx.lineTo(x + radius, y);
        ctx.quadraticCurveTo(x, y, x, y + radius);

        ctx.fillStyle = fill;
        ctx.fill();
    }

    function save() {
        var a = document.createElement( 'a' );
        a.download = 'record.ogg';
        a.href = audioSrc;
        document.body.appendChild( a );
        a.click();
        document.body.removeChild( a );

    }

} else {
    if ( location.protocol != 'https:' ) {
     status.html(lang.mic_error + '<br>'  + lang.use_https);
    } else {
        status.html(lang.mic_error);
    }

}