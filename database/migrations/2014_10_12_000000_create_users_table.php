<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            Schema::dropIfExists('users');
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('points', false)->default(0);
            $table->string('avatar_path')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->integer('group_id')->unsigned()->nullable();
            $table->integer('rank_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}
