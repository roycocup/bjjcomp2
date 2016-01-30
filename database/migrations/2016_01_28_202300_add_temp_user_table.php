<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTempUserTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('temp_user', function (Blueprint $table) {
			$table->increments('id');
			$table->string('email');
			$table->string('nickname');
			$table->string('f_name');
			$table->string('l_name');
			$table->date('dob');
			$table->string('belt');
			$table->string('weight');
			$table->string('gender');
			$table->string('t_shirt_size');
			$table->string('usertoken');
			$table->string('payment_date');
			$table->string('status');
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
		Schema::drop('temp_user');
	}
}
