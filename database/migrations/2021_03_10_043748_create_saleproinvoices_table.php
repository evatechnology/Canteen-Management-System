<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleproinvoicesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('saleproinvoices', function (Blueprint $table) {
            $table->id();
            $table->integer('saleinvoice');
            $table->integer('tosaleqty');
            $table->integer('gtotal');
            $table->integer('discount')->nullable();
            $table->integer('nettotal');
            $table->integer('payment');
            $table->integer('dueamount');
            $table->string('inwords');
            $table->string('memberidno', 22);
            $table->integer('entryby');
            $table->string('entrytime', 22);
            $table->string('invodate', 22);
            $table->string('invomonth', 22);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('saleproinvoices');
    }

}
