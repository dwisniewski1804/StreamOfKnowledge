<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Levels extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->integer('level_id')->unsigned()->nullable();
            $table->foreign('level_id')->references('id')->on('levels');
        });

        Schema::create('school_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('level_school_subject', function (Blueprint $table) {
            $table->integer('level_id')->unsigned()->nullable();
            $table->foreign('level_id')->references('id')->on('levels');
            $table->integer('school_subject_id')->unsigned()->nullable();
            $table->foreign('school_subject_id')->references('id')->on('school_subjects');
            $table->timestamps();
        });
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->integer('school_subject_id')->unsigned()->nullable();
            $table->foreign('school_subject_id')->references('id')->on('school_subjects');
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->integer('section_id')->unsigned()->nullable();
            $table->foreign('section_id')->references('id')->on('sections');
//            $table->integer('level_id')->unsigned()->nullable();
//            $table->foreign('level_id')->references('id')->on('levels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        if (Schema::hasTable('levels_school_subjects')) {
            Schema::table('levels_school_subjects', function (Blueprint $table) {
                $table->dropForeign('levels_school_subjects_level_id_foreign');
            });
        }
        if (Schema::hasTable('levels_school_subjects')) {

            Schema::table('levels_school_subjects', function (Blueprint $table) {
                $table->dropForeign('levels_school_subjects_school_subject_id_foreign');
            });
        }
        if (Schema::hasTable('sections')) {

            Schema::table('sections', function (Blueprint $table) {
                $table->dropForeign('sections_school_subject_id_foreign');
            });
        }
        Schema::dropIfExists('levels_school_subjects');
        Schema::dropIfExists('levels');
        Schema::dropIfExists('school_subjects');
        Schema::dropIfExists('sections');
    }

}
