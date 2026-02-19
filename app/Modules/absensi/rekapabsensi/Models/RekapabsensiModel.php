<?php namespace App\Modules\absensi\rekapabsensi\Models;
use Illuminate\Database\Eloquent\Model;


/**
* Berkasijin Model
* @var Berkasijin
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class RekapabsensiModel extends Model {
	protected $guarded = array();
	
	protected $table = "tr_rekap_absensi";

	 public static function getKurangJam($nip='', $tanggal='', $jam_datang='', $jam_kurang='') {
		
	 }

}
