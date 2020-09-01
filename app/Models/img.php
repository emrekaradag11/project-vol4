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

        if(!empty($request->file('file')) && $request->post('imgDeleted') != "1"){

            $image = $request->file('file');
            $imageName = Str::slug($request->post("imgSlugName")) . "_" . uniqid();
            $img_type = explode(".",$image->getClientOriginalName());
            $upload_name = $imageName.".".end($img_type);
            $image->move(public_path('img'),$upload_name);

            if(!empty($request->post("imgID"))){
                $data = img::find($request->post("imgID"));
            }else{
                $data = new img();
            }

            if(!empty($data->img)){
                $path=public_path().'/img/'.$data->img;
                if (file_exists($path)) {
                    unlink($path);
                }
                $data->img = $upload_name;
            }else{
                $data->img = $upload_name;
            }

            $data->parent = $request->post("imgParent");
            $data->page_id = $request->post("page_id");
            $data->type = $request->post("imgType");
            $data->save();

        }else{
            if($request->post('imgDeleted') == "1"){
                $this->deleteImg($request);
            }
        }

    }


    public function getImg($page_id,$parent,$type){
        return $this
            ->where([
                'page_id' => $page_id,
                'parent' => $parent,
                'type' => $type,
            ])->get();
    }

    public function deleteImg($request)
    {

        $this->where("id",$request->post("imgID"))->each(function($q){
            $path=public_path().'/img/'.$q->img;
            if (file_exists($path)) {
                unlink($path);
            }
            $q->delete();
        });
        return true;

    }

    public function deleteImgWithPageId($page_id)
    {

        $this->where("page_id",$page_id)->each(function($q){

            $path=public_path().'/img/'.$q->img;
            if (file_exists($path)) {
                unlink($path);
            }
            $q->delete();
        });

    }

}
