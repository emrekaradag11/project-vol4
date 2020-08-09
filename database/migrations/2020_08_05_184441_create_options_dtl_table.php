<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsDtlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*

        bu tablo options tablosunu dil'e göre listelemek içindir.

        #metadata       => options tablosu ile bağlantı yapmak için
        #title        => sitenin title'i için
        #keywords     => sitenin default keywords'ü için
        #description  => sitenin default Description'ı için
        #lang         => içerikleri dil'e göre ayırmak için
        */

        Schema::create('options_dtl', function (Blueprint $table) {
            $table->id();
            $table->integer('metadata')->nullable();
            $table->string('title')->nullable();
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('lang')->nullable();
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
        Schema::dropIfExists('options_dtl');
    }
}
