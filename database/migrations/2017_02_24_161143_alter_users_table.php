<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //$table->unsignedInteger('id_user_appointment');
            //$table->foreign('id_user_appointment')->references('id')->on('appointments')->update('cascade')->delete('cascade');
			//$table->unsignedInteger('id_user_specialization');
			//$table->foreign('id_user_specialization')->references('id')->on('specialization')->update('cascade')->delete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
