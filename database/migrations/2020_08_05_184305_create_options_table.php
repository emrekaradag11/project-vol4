<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*

        bu tablo sitenin genel ayarlarının bulunduğu kayıtlar içindir.

        #socials     => sosyal medyalar için
        #newsletter  => e bülten e-postaları için
        #url         => sitenin url'i için
        */

        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->string('socials')->nullable();
            $table->string('url')->nullable();
            $table->string('newsletter')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP()'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
