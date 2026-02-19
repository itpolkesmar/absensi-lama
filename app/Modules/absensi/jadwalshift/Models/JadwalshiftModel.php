<?php namespace App\Modules\absensi\jadwalshift\Models;
use Illuminate\Database\Eloquent\Model;


/**
* Jadwalshift Model
* @var Jadwalshift
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class JadwalshiftModel extends Model {
	protected $guarded = array();
	
	protected $table = "tr_jadwal_shift";

	public static $rules = array(
    		'nip' => 'required',
		'tanggal' => 'required',
		'id_shift' => 'required',

    );

	public static function all($columns = array('*')){
		$instance = new static;
		if (\PermissionsLibrary::hasPermission('mod-jadwalshift-listall')){
			return $instance->newQuery()->paginate($_ENV['configurations']['list-limit']);
		}else{
			return $instance->newQuery()
			->where('role_id', \Session::get('role_id'))
			->paginate($_ENV['configurations']['list-limit']);	
			
		}
	}

}
