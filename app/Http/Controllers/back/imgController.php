<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\img;

class imgController extends Controller
{

    public function setImg(Request $request)
    {
        $imageUpload = new img();
        $imageUpload->set_img($request);
        $noti = array(
            'message' => "Görsel Başarıyla Eklendi",
            'head'=>'İşlem Başarılı',
            'type' => 'success',
            'status' => '200'
        );

        return $noti;
    }


    public function deleteImg(Request $request)
    {
        $images = new img();
        $images->deleteImg($request);
        return true;
        $noti = array(
            'message' => "Görsel Başarıyla Silindi",
            'head'=>'İşlem Başarılı',
            'type' => 'success',
            'status' => '200'
        );

        return $noti;
    }


}
