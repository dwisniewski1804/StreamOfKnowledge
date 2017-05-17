<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRanksTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('ranks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('min');
            $table->integer('max');
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('rank_id')->references('id')->on('ranks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        if (Schema::hasTable('users')) {

            Schema::table('users', function (Blueprint $table) {
                $table->dropForeign('users_rank_id_foreign');
            });
        }
        Schema::dropIfExists('ranks');
    }

}
