<?php namespace App\Modules\masterdata\harilibur\Models;
use Illuminate\Database\Eloquent\Model;


/**
* Harilibur Model
* @var Harilibur
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class HariliburModel extends Model {
	protected $guarded = array();
	
	protected $table = "mst_hari_libur";

	public static $rules = array(
    		'tanggal' => 'required',
		'keterangan' => 'required'

    );

	public static function all($columns = array('*')){
		$instance = new static;
		if (\PermissionsLibrary::hasPermission('mod-harilibur-listall')){
			return $instance->newQuery()
					->orderBy(\DB::Raw('YEAR(tanggal)'),'desc')
					->orderBy('tanggal','asc')
					->paginate($_ENV['configurations']['list-limit']);
		}else{
			return $instance->newQuery()
			->where('role_id', \Session::get('role_id'))
			->paginate($_ENV['configurations']['list-limit']);	
			
		}
	}

}
