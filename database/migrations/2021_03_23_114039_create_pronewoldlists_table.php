<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePronewoldlistsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pronewoldlists', function (Blueprint $table) {
            $table->increments('proinfoid');
            $table->integer('prolist');
            $table->integer('proaclist');
            $table->integer('oldsupid');
            $table->string('oldproname', 100);
            $table->string('oldprocatename', 55);
            $table->integer('oldprice');
            $table->integer('oldtotalqty');
            $table->integer('oldnettotal');
            $table->integer('oldpaidamount');
            $table->integer('olddueamount');
            $table->integer('newsupid')->nullable();
            $table->integer('newquantity');
            $table->integer('newbuyprice');
            $table->integer('newnettotal');
            $table->integer('newpaidamount');
            $table->string('newpaymethod', 22);
            $table->string('newacnumber')->nullable();
            $table->string('newuptime', 22);
            $table->string('newupdate', 22);
            $table->string('newupmonth', 22);
            $table->integer('newupby');
            $table->string('upstatus', 22);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('pronewoldlists');
    }

}
