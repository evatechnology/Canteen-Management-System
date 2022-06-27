<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('expdate', 22);
            $table->string('expby', 22);
            $table->string('exptype', 100);
            $table->integer('expamount');
            $table->string('expremarks', 100)->nullable();
            $table->string('exptime', 22);
            $table->string('expmakedte', 22);
            $table->string('expmonth', 22);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('expenses');
    }

}
