<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*

        laravel'in default users tablosu ise admin paneline bağlanmak için kullanıyoruz.

        #name => kullanıcının ismi içindir
        #email => kullanıcının yönetim paneline giriş yaparken kullanacağı e-posta adresi içindir.
        #managed_pages => bu kısım yönetim panelinde kullanıcının yönetebileceği sayfaları belirlemek içindir.
        bu kolonda pages tablosundaki sayfaların id'si ile eşleşir.
        #permissions => bu kolon kullanıcının ekleme,silme,okuma gibi izinleri tanımlamak için kullanılır.
        #auth => bu kolon yetkilendirilen kullanıcının konumunu belirle.
        ÖRN ; 1 ise admin 2 ise alt kullanıcı


        */

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('managed_pages')->nullable();
            $table->string('permissions')->nullable();
            $table->string('auth')->comment("1 ise admin 2 ise alt kullanıcı");
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
