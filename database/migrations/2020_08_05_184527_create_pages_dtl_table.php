<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesDtlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*

        bu tablo pages tablosunun verilerini dil'e göre listelemek içindir.

        #metadata     => pages tablosu ile bağlantı yapmak için
        #title        => sayfanın title'i için
        #slug         => sayfanın slug değeri için
        #description  => sayfanın default Description'ı için
        #keywords     => sayfanın default keywords'ü için
        #text         => sayfanın yazısı için
        #lang         => içerikleri dil'e göre ayırmak için
        */

        Schema::create('pages_dtl', function (Blueprint $table) {
            $table->id();
            $table->integer('metadata')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('text')->nullable();
            $table->integer('lang')->nullable();
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
        Schema::dropIfExists('pages_dtl');
    }
}
