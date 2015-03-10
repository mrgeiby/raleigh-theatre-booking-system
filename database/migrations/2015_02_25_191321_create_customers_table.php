<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('customers', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('address');
            $table->string('town');
            $table->string('postCode');
            $table->string('phoneNumber');
            $table->integer('userID');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers');
	}

}
