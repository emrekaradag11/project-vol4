<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{

    /*

    #phone => telefon bilgisi için
    #fax => faks bilgisi için
    $map => harita iframe bilgisi için
    $mail => mail adresi içindir

    */


    protected $table = "contact";
    protected $guarded  = ["id"];
}
