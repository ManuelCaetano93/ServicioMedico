<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->integer('identification')->unique();
            $table->string('birthday');
            $table->string('sex');
            $table->string('phone');
            $table->string('cellphone');
            $table->string('residence');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
	
	// TODO: Change Data Types to correct values

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('users');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
