<?php namespace App\Modules\absensi\inputmanual\Models;
use Illuminate\Database\Eloquent\Model;


/**
* Inputmanual Model
* @var Inputmanual
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class InputmanualModel extends Model {
	protected $guarded = array();
	
	protected $table = "att_log";

	public static $rules = array(
    );

	public static function all($columns = array('*')){
		$instance = new static;
		if (\PermissionsLibrary::hasPermission('mod-inputmanual-listall')){
			return $instance->newQuery()->paginate($_ENV['configurations']['list-limit']);
		}else{
			return $instance->newQuery()
			->where('role_id', \Session::get('role_id'))
			->paginate($_ENV['configurations']['list-limit']);	
			
		}
	}

}
