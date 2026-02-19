<?php namespace App\Modules\absensi\absensikhusus\Models;
use Illuminate\Database\Eloquent\Model;


/**
* Absensikhusus Model
* @var Absensikhusus
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class AbsensikhususModel extends Model {
	protected $guarded = array();
	
	protected $table = "tr_absensi_khusus";

	public static $rules = array(
    		'id_pegawai' => 'required',
		'tanggal' => 'required',
		'jam_datang' => 'required',
		'jam_pulang' => 'required',

    );

	public static function all($columns = array('*')){
		$instance = new static;
		if (\PermissionsLibrary::hasPermission('mod-absensikhusus-listall')){
			return $instance->newQuery()->paginate($_ENV['configurations']['list-limit']);
		}else{
			return $instance->newQuery()
			->where('role_id', \Session::get('role_id'))
			->paginate($_ENV['configurations']['list-limit']);	
			
		}
	}

}
