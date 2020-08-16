<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class img extends Model
{

    /*

    #parent       => bağlı olduğu sayfanın veya tree'nin id'si için
    #img          => resmin adı için
    #page_id      => bulunduğu sayfanın id'si için
    #ord          => resimler arası sıralama yapmak için
    #hidden       => resimleri gizlemek için
    #type         => resmin tipini belirlemek için (1 ise ana görsel, 2 ise çoklu resim, 3 ise banner)

    */


    protected $table = "img";
    protected $guarded  = ["id"];

    public function set_img($request)
    {

        $image = $request->file('file');
        $imageName = Str::slug($request->post("slug_name")) . "_" . uniqid();
        $img_type = explode(".",$image->getClientOriginalName());
        $upload_name = $imageName.".".end($img_type);
        $image->move(public_path('img'),$upload_name);

        $data = new img();

        $data->parent = $request->post("parent");
        $data->img = $upload_name;
        $data->page_id = $request->post("page_id");
        $data->type = $request->post("type");
        $data->save();

    }


    public function getImg($id,$parent){
        return $this
            ->where([
                'page_id' => $id,
                'parent' => $parent,
            ])->get();
    }

    public function deleteImg($request)
    {
        $filename =  $request->post('filename');
        $this->where([
            'img'=>$filename,
            "page_id" => $request->post("page_id")
        ])->delete();
        $path=public_path().'/img/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return true;
    }

}
