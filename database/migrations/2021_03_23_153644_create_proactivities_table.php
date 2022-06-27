<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProactivitiesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('proactivities', function (Blueprint $table) {
            $table->increments('proactid');
            $table->integer('proinfoid');
            $table->integer('prolistid');
            $table->string('proname', 100);
            $table->string('prosize', 22);
            $table->string('procate', 55);
            $table->string('prostatus', 22);
            $table->integer('prodataone');
            $table->integer('prodatatwo')->nullable();
            $table->integer('prodatathree')->nullable();
            $table->string('proremarks');
            $table->string('proacttime', 22);
            $table->string('proactdate', 22);
            $table->integer('proactby');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('proactivities');
    }

}
