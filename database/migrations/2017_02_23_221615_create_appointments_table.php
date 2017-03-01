<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->enum('status', array('Active', 'Canceled', 'Successful'));
			$table->softDeletes();
            $table->timestamps();
        });
    }

	// TODO: Create means for the create api to introduce values that can be parsed by mysql date. Use string till then.
	
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
