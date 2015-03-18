<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetSeatPriceToFloatOnSeatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
//        Schema::table('seats', function(Blueprint $table)
//        {
//            $table->float('seatPrice')->change();
//        });

        DB::statement('ALTER TABLE seats MODIFY COLUMN seatPrice FLOAT');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

	}

}
