<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* Absensikhusus Migration
* @var Absensikhusus
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class Absensikhusus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tr_absensi_khusus', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('id_pegawai');
			$table->date('tanggal');
			$table->time('jam_datang');
			$table->time('jam_pulang');
			$table->bigInteger('user_id');
			$table->bigInteger('role_id');

			$table->dateTime('created_at');
			$table->dateTime('updated_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
		public function down()
	{
		Schema::drop('tr_absensi_khusus');
	}

}
