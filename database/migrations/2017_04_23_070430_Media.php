<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Media extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('path');
            $table->string('type');
            $table->integer('answer_id')->unsigned()->nullable();
            $table->foreign('answer_id')->references('id')->on('answers');
//            $table->integer('message_id')->unsigned()->nullable();
//            $table->foreign('message_id')->references('id')->on('messages');
            $table->integer('question_id')->unsigned()->nullable();
            $table->foreign('question_id')->references('id')->on('questions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('media');
    }

}
