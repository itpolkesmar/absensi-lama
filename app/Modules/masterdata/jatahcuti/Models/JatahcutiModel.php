<?php namespace App\Modules\masterdata\jatahcuti\Models;
use Illuminate\Database\Eloquent\Model;


/**
* Jatahcuti Model
* @var Jatahcuti
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class JatahcutiModel extends Model {
	protected $guarded = array();
	
	protected $table = "mst_jatah_cuti";

	public static $rules = array(
		'jumlah' => 'required'
    );

	public static function all($columns = array('*')){
		$instance = new static;
		if (\PermissionsLibrary::hasPermission('mod-jatahcuti-listall')){
			return $instance->newQuery()->paginate($_ENV['configurations']['list-limit']);
		}else{
			return $instance->newQuery()
			->where('role_id', \Session::get('role_id'))
			->paginate($_ENV['configurations']['list-limit']);	
			
		}
	}

}
