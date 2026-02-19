<?php namespace App\Modules\masterdata\shift\Models;
use Illuminate\Database\Eloquent\Model;


/**
* Shift Model
* @var Shift
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class ShiftModel extends Model {
	protected $guarded = array();
	
	protected $table = "mst_shift";

	public static $rules = array(
    		'tahun' => 'required',
		'nama' => 'required',
		'jam_datang' => 'required',
		'jam_pulang' => 'required',

    );

	public static function all($columns = array('*')){
		$instance = new static;
		if (\PermissionsLibrary::hasPermission('mod-shift-listall')){
			return $instance->newQuery()->paginate($_ENV['configurations']['list-limit']);
		}else{
			return $instance->newQuery()
			->where('role_id', \Session::get('role_id'))
			->paginate($_ENV['configurations']['list-limit']);	
		}
	}

	public static function getSelectMultiple($id='',$selected=array()) {
		$html = '<select id="'.$id.'" name="'.$id.'" class="form-control" multiple>';
		$data = \ShiftModel::get();
		foreach ($data as $row) {
			$s = in_array($row->id, $selected)?'selected="selected"':'';
			$html .= '<option '.$s.' value="'.$row->id.'">'.$row->nama.'</option>';
		}
		$html .= '</select>';
		return $html;
	}

}
