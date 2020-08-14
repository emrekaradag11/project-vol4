<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class field_data extends Model
{

    /*

    bu tablo tanımladığımız ek alanlara ait dataları, sayfalara ve diğer içeriklere uyarladığımız tablo
    örneğin; Beyaz Eşya isminde ve input text tipinde bir ek alanınız var.
    bu ek alan'a 1. dilde çamaşır makinesi, 2. dilde washing machine değerini girdiniz.
    bu değere ait tekrarlanmaması gereken ana kolonlarının depolandığı tablo burası.
    bu değerlerin dil'e göre depolandığı tablo ise field_data_dtl tablosudur.


    #parent => bu kolon , data eğer tree yapısında bir kayıt'a bağlıysa, bu kayıtla ilişkilendirmek için kullanılan alandır.
    #field_id => bu kolon eklemiş olduğumuz kayıt'ın hangi alan'a bağlı olduğunu gösterir.
    #page_id => bu kolon eklenen kayıt'ın bulunduğu sayfanın id'sini gösterir

     */


    protected $table = "field_data";
    protected $guarded  = ["id"];


    public function setFieldData($request)
    {

        $dtl = new field_data_dtl();


        $page_id = $request->post("page_id");
        $parent = $request->post("parent");

        $request = $request->except(['page_id', 'parent', '_token']);

        foreach ($request as $k => $r) {

            $data = new field_data();
            $data->parent = $parent;
            $data->field_id = $k;
            $data->page_id = $page_id;
            $data->save();
            $metadata = $data->id;

            $dtl->setDtl($r , $metadata);

        }

        $noti = array(
            'message' => "Alanlar Başarıyla Kaydedildi",
            'head'=>'İşlem Başarılı',
            'type' => 'success',
            'status' => '200'
        );

        return $noti;

    }

    public function getFieldData($page_id,$parent)
    {
        $resData = collect();
        $data = $this->
            where([
                "parent" => $parent,
                "page_id" => $page_id,
            ])->
            get();
        foreach ($data as $d) {
            $resData->put($d->field_id,$d->fieldDataDetail);
        }

        return $resData;

    }


    /* bu kısım ek alan detayını dil'e göre listelemek için */
    public function fieldDataDetail()
    {
        return $this->hasMany('App\Models\field_data_dtl','metadata','id');
    }


}
