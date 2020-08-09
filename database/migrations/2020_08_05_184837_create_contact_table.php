<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*

        bu tablo web sitenin iletişim bölümü içindir. bu tablonun ayarlar tablosuna bağlanmayıp ayrı
        bir şekilde oluşturulmasının nedeni bir firmaya ait birden fazla adresi olmasıdır.
        ÖRN ; Merkez adres, firma adresi,manisa şubesi vb.

        #phone => telefon bilgisi için
        #fax => faks bilgisi için
        $map => harita iframe bilgisi için
        $mail => mail adresi içindir

        */

        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('map')->nullable();
            $table->string('mail')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact');
    }
}
