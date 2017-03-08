<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('records', function (Blueprint $table) {
            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->update('cascade')->delete('cascade');
        });
        Schema::table('records', function (Blueprint $table) {
            $table->unsignedInteger('id_doctor');
            $table->foreign('id_doctor')->references('id')->on('users')->update('cascade')->delete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('records');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
