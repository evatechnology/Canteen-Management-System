<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductstoresTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('productstores', function (Blueprint $table) {
            $table->id();
            $table->integer('prostoreid');
            $table->integer('suppid');
            $table->string('catname', 55);
            $table->string('barcode', 55);
            $table->integer('productid');
            $table->string('prosize', 22);
            $table->integer('olprodqty');
            $table->integer('qunatity');
            $table->integer('price');
            $table->integer('sale');
            $table->integer('subtotal');
            $table->integer('saleproqty')->nullable();
            $table->string('proendate', 22);
            $table->string('proentime', 22);
            $table->string('proenmonth', 22);
            $table->string('proaddby', 22);
            $table->tinyInteger('prostatus')->default(1);
            $table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('productstores');
    }

}
