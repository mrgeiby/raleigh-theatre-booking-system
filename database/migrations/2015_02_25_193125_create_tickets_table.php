<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('tickets', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('custID');
            $table->integer('prodID');
            $table->integer('perfID');
            $table->integer('seatID');
            //$table->date('bookingDate');
            $table->boolean('printed');
            $table->boolean('paid');
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
		Schema::drop('tickets');
	}

}
