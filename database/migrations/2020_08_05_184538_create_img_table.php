<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*
        #parent       => bağlı olduğu sayfanın veya tree'nin id'si için
        #img          => resmin adı için
        #page_id      => bulunduğu sayfanın id'si için
        #ord          => resimler arası sıralama yapmak için
        #hidden       => resimleri gizlemek için
        #type         => resmin tipini belirlemek için (1 ise ana görsel, 2 ise çoklu resim, 3 ise banner)
        */

        Schema::create('img', function (Blueprint $table) {
            $table->id();
            $table->integer('parent')->nullable();
            $table->string('img')->nullable();
            $table->integer('page_id')->nullable();
            $table->integer('ord')->nullable();
            $table->integer('hidden')->nullable();
            $table->integer('type')->nullable()->comment("1 ise ana görsel, 2 ise çoklu resim, 3 ise banner");
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
        Schema::dropIfExists('img');
    }
}
