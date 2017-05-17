<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('answers', function (Blueprint $table) {

            $table->increments('id');
            $table->string('tittle');
            $table->unsignedBigInteger('points');
            $table->longText('content');
            $table->boolean('is_accepted');
            $table->boolean('is_helpfull');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions');
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('answer_id')->references('id')->on('answers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        if (Schema::hasTable('comments')) {
            Schema::table('comments', function (Blueprint $table) {
                $table->dropForeign('comments_answer_id_foreign');
            });
        }
        Schema::dropIfExists('answers');
    }

}
