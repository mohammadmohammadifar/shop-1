<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function upload($primary,$images)
    {
        $fileNamePrimaryImage=Carbon::now()->microsecond . '_' . $primary->getClientOriginalName();
        $primary->move(public_path(env('UPLOAD_IMAGE')).$fileNamePrimaryImage);

        $fileNameImages=[];
        foreach($images as $image){
            $fileNameImage=Carbon::now()->microsecond . '_' . $image->getClientOriginalName();
            $image->move(public_path(env('UPLOAD_IMAGE')).$fileNameImage);

            array_push($fileNameImages,$fileNameImage);
        }

        return['fileNamePrimaryImage'=>$fileNamePrimaryImage, 'fileNameImages'=>$fileNameImages ];
    }
}
