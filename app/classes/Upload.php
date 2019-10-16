<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 9/19/2018
 * Time: 8:05 PM
 */

namespace App\classes;
use App\UserData;
use Symfony\Component\HttpFoundation\File\MimeType\MimeTypeExtensionGuesser;

class Upload
{

    public static function audio($src,$name,$newName){
        $target_dir = "resumeApp/uploads/";
        $uploadOk = 1;
        if ($_FILES[$name]["size"] > 175000000) { // 175 megabyte
            $uploadOk = 0;
        }
        // allowed formats :
        $formats = ['audio/mpeg', 'audio/x-mpeg','audio/mpeg3', 'audio/x-mpeg-3', 'audio/aiff',
            'audio/mid', 'audio/x-aiff', 'audio/x-mpequrl','audio/midi', 'audio/x-mid',
            'audio/x-midi','audio/wav','audio/x-wav','audio/xm','audio/x-aac','audio/basic',
            'audio/flac','audio/mp4','audio/mp3','audio/x-matroska','audio/ogg','audio/s3m','audio/x-ms-wax',
            'audio/xm','audio/x-m4a',
         'audio/adpcm',
        'audio/basic',
        'audio/midi' ,
        'audio/mp4' ,
        'audio/mpeg',
        'audio/ogg',
        'audio/s3m',
        'audio/silk',
        'audio/vnd.dece.audio',
        'audio/vnd.digital-winds',
        'audio/vnd.dra',
        'audio/vnd.dts',
        'audio/vnd.dts.hd',
        'audio/vnd.lucent.voice',
        'audio/vnd.ms-playready.media.pya',
        'audio/vnd.nuera.ecelp4800' ,
        'audio/vnd.nuera.ecelp7470' ,
        'audio/vnd.nuera.ecelp9600' ,
        'audio/vnd.rip',
        'audio/webm' ,
        'audio/x-aac',
        'audio/x-aiff',
        'audio/x-caf',
        'audio/x-flac',
        'audio/x-matroska',
        'audio/x-mpegurl',
        'audio/x-ms-wax',
        'audio/x-ms-wma',
        'audio/x-pn-realaudio',
        'audio/x-pn-realaudio-plugin',
        'audio/x-wav',
        'audio/xm',
        ];

        // check file type :
        if(!in_array($_FILES[$name]['type'],$formats)){
            $uploadOk = 0 ;
        }

        if ($uploadOk == 0) {
            return false;
        } else {
            $array = explode('.', $_FILES[$name]['name']);
            $extension = end($array);
            $target_file = $target_dir . $newName .'_'.date(time()).'.'.$extension;
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
                return $target_file;
            } else {
                return false;
            }
        }
    }

    public static function checkAudio($src,$name,$newName){
        $target_dir = "resumeApp/uploads/";
        $uploadOk = 1;
        if ($_FILES[$name]["size"] > 175000000) { // 175 megabyte
            $uploadOk = 0;
        }
        // allowed formats :
        $formats = ['audio/mpeg', 'audio/x-mpeg','audio/mpeg3', 'audio/x-mpeg-3', 'audio/aiff',
            'audio/mid', 'audio/x-aiff', 'audio/x-mpequrl','audio/midi', 'audio/x-mid',
            'audio/x-midi','audio/wav','audio/x-wav','audio/xm','audio/x-aac','audio/basic',
            'audio/flac','audio/mp4','audio/mp3','audio/x-matroska','audio/ogg','audio/s3m','audio/x-ms-wax',
            'audio/xm','audio/x-m4a',
         'audio/adpcm',
        'audio/basic',
        'audio/midi' ,
        'audio/mp4' ,
        'audio/mpeg',
        'audio/ogg',
        'audio/s3m',
        'audio/silk',
        'audio/vnd.dece.audio',
        'audio/vnd.digital-winds',
        'audio/vnd.dra',
        'audio/vnd.dts',
        'audio/vnd.dts.hd',
        'audio/vnd.lucent.voice',
        'audio/vnd.ms-playready.media.pya',
        'audio/vnd.nuera.ecelp4800' ,
        'audio/vnd.nuera.ecelp7470' ,
        'audio/vnd.nuera.ecelp9600' ,
        'audio/vnd.rip',
        'audio/webm' ,
        'audio/x-aac',
        'audio/x-aiff',
        'audio/x-caf',
        'audio/x-flac',
        'audio/x-matroska',
        'audio/x-mpegurl',
        'audio/x-ms-wax',
        'audio/x-ms-wma',
        'audio/x-pn-realaudio',
        'audio/x-pn-realaudio-plugin',
        'audio/x-wav',
        'audio/xm',
        ];

        // check file type :
        if(!in_array($_FILES[$name]['type'],$formats)){
            $uploadOk = 0 ;
        }

        if ($uploadOk == 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function video($src,$name,$newName){
        $target_dir = "resumeApp/uploads/videos/";
        $uploadOk = 1;
        if ($_FILES[$name]["size"] > 100000000) { // 100 megabyte
            $uploadOk = 0;
        }
        // allowed formats :
        $formats = ['video/mp4','video/webm','video/ogg','video/mov','video/avi','video/flv','video/wmv','video/quicktime'];

        // check file type :
        if(!in_array($_FILES[$name]['type'],$formats)){
            $uploadOk = 0 ;
        }

        if ($uploadOk == 0) {
            return false;
        } else {
            $target_file = $target_dir . $newName . basename($_FILES[$name]["name"]);
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
                return $target_file;
            } else {
                return false;
            }
        }
    }

    public static function photo($src,$name,$newName){
        $target_dir = "resumeApp/uploads/";
        $target_file = $target_dir . $newName. basename($_FILES[$name]["name"]);
        $uploadOk = 1;
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES[$name]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
// Check file size
        if ($_FILES[$name]["size"] > 25000000) {
            $uploadOk = 0;
        }
// check if image exists in the folder :
        $userData = UserData::where('user_id',auth()->user()->id)->first();
        // get the works photos
        $works = explode(',',$userData->works);
        foreach ($works as $work){
            if (strpos($work, basename($_FILES[$name]["name"])) !== false) {
                $uploadOk = 0;
            }
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return false;
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
                return $target_file;
            } else {
                return false;
            }
        }
    }

    public static function chatFile($src,$name,$newName){
        $target_dir = "resumeApp/storage/chat_shared_files/";
        $target_file = $target_dir . basename($_FILES[$name]["name"]). '_'.$newName;
        $uploadOk = 1;

        // check file extensions
        $guesser = new MimeTypeExtensionGuesser ;
        $format  = $guesser->guess($_FILES[$name]['type']);


        // check file type :
        if(!$format){
            $uploadOk = 0 ;
        }

        // Check file size
        if ($_FILES[$name]["size"] > 45000000) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return false;
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
                return [
                    'path' => $target_file,
                    'format' => $_FILES[$name]['type']
                ];
            } else {
                return false;
            }
        }
    }

    public static function projectPhoto($src,$name,$newName){
        $target_dir = "resumeApp/uploads/";
        $target_file = $target_dir . $newName. basename($_FILES[$name]["name"]);
        $uploadOk = 1;
// Check if image file is a actual image or fake image
        $check = getimagesize($_FILES[$name]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES[$name]["size"] > 250000000) {
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return false;
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
                return $target_file;
            } else {
                return false;
            }
        }
    }

    public static function CV($src,$name,$newName){
        $target_dir = "resumeApp/uploads/CVs/";
        $target_file = $target_dir . $newName .'_' .basename($_FILES[$name]["name"]);
        $uploadOk = 1;

        // check file extensions
        $guesser = new MimeTypeExtensionGuesser ;
        $format  = $guesser->guess($_FILES[$name]['type']);


        // check file type :
        if($format !== 'pdf'){
            $uploadOk = 0 ;
        }

        // Check file size
        if ($_FILES[$name]["size"] > 45000000) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return false;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
                return [
                    'path' => $target_file,
                    'format' => $_FILES[$name]['type']
                ];
            } else {
                return false;
            }
        }
    }

    public static function campaignFile($name,$newName){
        $target_dir = "uploads/files/";
        $target_file = $target_dir . $newName .'_' .basename($_FILES[$name]["name"]);
        $uploadOk = 1;

        // check file extensions
        $guesser = new MimeTypeExtensionGuesser ;
        $format  = $guesser->guess($_FILES[$name]['type']);


        // check file type :
        if($format !== 'pdf'){
            $uploadOk = 0 ;
        }

        // Check file size
        if ($_FILES[$name]["size"] > 45000000) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return false;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
                return [
                    'path' => $target_file,
                    'format' => $_FILES[$name]['type']
                ];
            } else {
                return false;
            }
        }
    }

    public static function mainRecording($name,$newName){
        $target_dir = storage_path().'/agents_main_recordings/' ;
        $uploadOk = 1;
        if ($_FILES[$name]["size"] > 45000000) { // 45 megabyte
            $uploadOk = 0;
        }
        // allowed formats :
        $formats = ['audio/mpeg', 'audio/x-mpeg','audio/mpeg3', 'audio/x-mpeg-3', 'audio/aiff',
            'audio/mid', 'audio/x-aiff', 'audio/x-mpequrl','audio/midi', 'audio/x-mid',
            'audio/x-midi','audio/wav','audio/x-wav','audio/xm','audio/x-aac','audio/basic',
            'audio/flac','audio/mp4','audio/mp3','audio/x-matroska','audio/ogg','audio/s3m','audio/x-ms-wax',
            'audio/xm','audio/x-m4a',
            'audio/adpcm',
            'audio/basic',
            'audio/midi' ,
            'audio/mp4' ,
            'audio/mpeg',
            'audio/ogg',
            'audio/s3m',
            'audio/silk',
            'audio/vnd.dece.audio',
            'audio/vnd.digital-winds',
            'audio/vnd.dra',
            'audio/vnd.dts',
            'audio/vnd.dts.hd',
            'audio/vnd.lucent.voice',
            'audio/vnd.ms-playready.media.pya',
            'audio/vnd.nuera.ecelp4800' ,
            'audio/vnd.nuera.ecelp7470' ,
            'audio/vnd.nuera.ecelp9600' ,
            'audio/vnd.rip',
            'audio/webm' ,
            'audio/x-aac',
            'audio/x-aiff',
            'audio/x-caf',
            'audio/x-flac',
            'audio/x-matroska',
            'audio/x-mpegurl',
            'audio/x-ms-wax',
            'audio/x-ms-wma',
            'audio/x-pn-realaudio',
            'audio/x-pn-realaudio-plugin',
            'audio/x-wav',
            'audio/xm',
        ];

        // check file type :
        if(!in_array($_FILES[$name]['type'],$formats)){
            $uploadOk = 0 ;
        }

        if ($uploadOk == 0) {
            return false;
        } else {
            $array = explode('.', $_FILES[$name]['name']);
            $extension = end($array);
            $target_file = $target_dir . $newName .'_'.date(time()).'.'.$extension;
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
                return $target_file;
            } else {
                return false;
            }
        }
    }

    public static function resume($name,$newName){
        $target_dir = storage_path().'/agents_resume/' ;
        $target_file = $target_dir . $newName .'_' .basename($_FILES[$name]["name"]);
        $uploadOk = 1;

        // check file extensions
        $guesser = new MimeTypeExtensionGuesser ;
        $format  = $guesser->guess($_FILES[$name]['type']);


        // check file type :
        if($format !== 'pdf'){
            $uploadOk = 0 ;
        }

        // Check file size
        if ($_FILES[$name]["size"] > 45000000) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return false;
        } else {
            $array = explode('.', $_FILES[$name]['name']);
            $extension = end($array);
            $target_file = $target_dir . $newName .'_'.date(time()).'.'.$extension;
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
                return $target_file;
            } else {
                return false;
            }
        }
    }

    public static function profilePicture($name,$newName){
        $target_dir = storage_path().'/agents_pictures/' ;
        $target_file = $target_dir . $newName .'_' .basename($_FILES[$name]["name"]);
        $uploadOk = 1;

        // allowed formats :
        $formats = [
            'image/bmp',
            'image/x-ms-bmp',
            'image/cgm',
            'image/g3fax',
            'image/gif',
            'image/ief',
            'image/jpeg',
            'image/pjpeg',
            'image/ktx',
            'image/png',
            'image/prs.btif',
            'image/sgi',
            'image/svg+xml',
            'image/tiff',
            'image/vnd.adobe.photoshop' ,
            'image/vnd.dece.graphic' ,
            'image/vnd.dvb.subtitle' ,
            'image/vnd.djvu' ,
            'image/vnd.dwg' ,
            'image/vnd.dxf' ,
            'image/vnd.fastbidsheet' ,
            'image/vnd.fpx' ,
            'image/vnd.fst' ,
            'image/vnd.fujixerox.edmics-mmr' ,
            'image/vnd.fujixerox.edmics-rlc' ,
            'image/vnd.ms-modi' ,
            'image/vnd.ms-photo' ,
            'image/vnd.net-fpx' ,
            'image/vnd.wap.wbmp' ,
            'image/vnd.xiff' ,
            'image/webp' ,
            'image/x-3ds' ,
            'image/x-cmu-raster' ,
            'image/x-cmx' ,
            'image/x-freehand' ,
            'image/x-icon' ,
            'image/x-mrsid-image' ,
            'image/x-pcx' ,
            'image/x-pict' ,
            'image/x-portable-anymap' ,
            'image/x-portable-bitmap' ,
            'image/x-portable-graymap' ,
            'image/x-portable-pixmap' ,
            'image/x-rgb' ,
            'image/x-tga' ,
            'image/x-xbitmap' ,
            'image/x-xpixmap' ,
            'image/x-xwindowdump',
        ];

        // check file type :
        if(!in_array($_FILES[$name]['type'],$formats)){
            $uploadOk = 0 ;
        }

        // Check file size
        if ($_FILES[$name]["size"] > 45000000) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return false;
        } else {
            $array = explode('.', $_FILES[$name]['name']);
            $extension = end($array);
            $target_file = $target_dir . $newName .'_'.date(time()).'.'.$extension;
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
                return $target_file;
            } else {
                return false;
            }
        }
    }


}
