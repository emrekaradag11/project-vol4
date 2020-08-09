<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldDataDtlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        /*

        bu tablo eklemiş olduğumuz ek alan kayıtlarını dil'e göre listelemek içindir.

        #metadata => field_data tablosu ile bağlamak içindir.
        #data => eklediğimiz data'yı temsil eder.
        #lang => data'nın bulunduğu dil'i temsil eder.


        */


        Schema::create('field_data_dtl', function (Blueprint $table) {
            $table->id();
            $table->integer('metadata')->nullable();
            $table->string('data')->nullable();
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
        Schema::dropIfExists('field_data_dtl');
    }
}
