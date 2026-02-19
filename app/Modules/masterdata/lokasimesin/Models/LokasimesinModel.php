<?php namespace App\Modules\masterdata\lokasimesin\Models;
use Illuminate\Database\Eloquent\Model;


/**
* Lokasimesin Model
* @var Lokasimesin
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class LokasimesinModel extends Model {
	protected $guarded = array();
	
	protected $table = "mst_lokasi";

	public static $rules = array(
    		'nama' => 'required',
		'sn' => 'required'
    );

	public static function all($columns = array('*')){
		$instance = new static;
		if (\PermissionsLibrary::hasPermission('mod-lokasimesin-listall')){
			return $instance->newQuery()->paginate($_ENV['configurations']['list-limit']);
		}else{
			return $instance->newQuery()
			->where('role_id', \Session::get('role_id'))
			->paginate($_ENV['configurations']['list-limit']);	
			
		}
	}

}
