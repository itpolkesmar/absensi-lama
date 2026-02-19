<?php namespace App\Modules\pengaturan\aturmatilampu\Models;
use Illuminate\Database\Eloquent\Model;


/**
* Aturmatilampu Model
* @var Aturmatilampu
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class AturmatilampuModel extends Model {
	protected $guarded = array();
	
	protected $table = "atur_mati_lampu";

	public static $rules = array(
    		'id_unit' => 'required',
		'tanggal' => 'required',

    );

	public static function all($columns = array('*')){
		$instance = new static;
		if (\PermissionsLibrary::hasPermission('mod-aturmatilampu-listall')){
			return $instance->newQuery()->paginate($_ENV['configurations']['list-limit']);
		}else{
			return $instance->newQuery()
			->where('role_id', \Session::get('role_id'))
			->paginate($_ENV['configurations']['list-limit']);	
			
		}
	}

}
