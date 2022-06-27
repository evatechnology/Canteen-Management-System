<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleactivitiesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('saleactivities', function (Blueprint $table) {
            $table->increments('saleactid');
            $table->string('proname', 100);
            $table->string('prosize', 22);
            $table->integer('totalqty');
            $table->integer('returnqty');
            $table->integer('restqty');
            $table->string('remarks', 100);
            $table->string('rettime', 22);
            $table->string('retdate', 22);
            $table->string('retfrom', 22);
            $table->integer('returnby');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('saleactivities');
    }

}
