<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\http\controllers\file;
use Illuminate\Support\Facades\Storage;
use Response;

// class used to download the user uploaded images from the database with
class FileController extends Controller
{
    function getFile($filename,$username){
    
        if(Storage::exists('public\\images\\user_images\\'.$filename))
        {
            $ext = pathinfo(storage_path().'public\\images\\user_images\\'.$filename, PATHINFO_EXTENSION);
            $clean_file_name = preg_replace( '/[^a-z0-9]+/', '-', strtolower( $username) ); //clean the user_name so that it doesnt contain any forbidden characters
            return Storage::disk('local')->download('public\\images\\user_images\\'.$filename,$clean_file_name.".".$ext );
        }else{
            echo "De afbeelding is niet gevonden, neem even contact op";
        }
       

    }
}
