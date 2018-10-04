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
        if ($_FILES[$name]["size"] > 75000000) { // 75 megabyte
            $uploadOk = 0;
        }
        // allowed formats :
        $formats = ['audio/mpeg', 'audio/x-mpeg','audio/mpeg3', 'audio/x-mpeg-3', 'audio/aiff',
            'audio/mid', 'audio/x-aiff', 'audio/x-mpequrl','audio/midi', 'audio/x-mid',
            'audio/x-midi','audio/wav','audio/x-wav','audio/xm','audio/x-aac','audio/basic',
            'audio/flac','audio/mp4','audio/mp3','audio/x-matroska','audio/ogg','audio/s3m','audio/x-ms-wax',
            'audio/xm','audio/x-m4a'];

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

}