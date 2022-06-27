<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('collections', function (Blueprint $table) {
            $table->increments('collid');
            $table->integer('invoiceno');
            $table->string('member', 22);
            $table->integer('totalamount');
            $table->integer('lastpaiddue');
            $table->integer('collection');
            $table->integer('restdue');
            $table->string('colltime', 22);
            $table->string('colldate', 22);
            $table->string('collmonth', 22);
            $table->string('collby', 22);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('collections');
    }

}
