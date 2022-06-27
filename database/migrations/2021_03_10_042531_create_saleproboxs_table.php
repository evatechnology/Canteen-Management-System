<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleproboxsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('saleproboxs', function (Blueprint $table) {
            $table->increments('saleboxid');
            $table->integer('saleinvid');
            $table->integer('saleproid');
            $table->string('saleprocode', 22);
            $table->string('saleproname', 55);
            $table->string('saleprosize', 22);
            $table->integer('saleprice');
            $table->integer('salequantity');
            $table->integer('salesubtotal');
            $table->string('saletime',22);
            $table->string('saledate', 22);
            $table->string('salemonth', 22);
            $table->integer('member');
            $table->tinyInteger('saleby');
            $table->tinyInteger('salestatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('saleproboxs');
    }

}
