<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('groups', function (Blueprint $table) {
            Schema::dropIfExists('groups');
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
                if(Schema::hasTable('users')) {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_group_id_foreign');
                });}
        Schema::dropIfExists('groups');
    }

}
