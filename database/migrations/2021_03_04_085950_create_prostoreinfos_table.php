<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProstoreinfosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('prostoreinfos', function (Blueprint $table) {
            $table->increments('proinfoid');
            $table->string('proindate', 22);
            $table->integer('supplier');
            $table->integer('proinfoid');
            $table->string('category', 55);
            $table->integer('totalqty');
            $table->integer('totalamount');
            $table->integer('extracost');
            $table->integer('prodiscount');
            $table->integer('nettotal');
            $table->integer('paidamount');
            $table->integer('dueamount');
            $table->string('paymethod', 22);
            $table->string('acnumber', 22)->nullable();
            $table->string('prointime', 22);
            $table->string('proinmonth', 22);
            $table->string('proinby', 22);
            $table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('prostoreinfos');
    }

}
