<?php namespace App\Modules\masterdata\unit\Models;
use Illuminate\Database\Eloquent\Model;


/**
* Unit Model
* @var Unit
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class UnitModel extends Model {
	protected $guarded = array();
	
	protected $table = "mst_unit";

	public static $rules = array(
    		'nama' => 'required',
    );

	public static function all($columns = array('*')){
		$instance = new static;
		if (\PermissionsLibrary::hasPermission('mod-unit-listall')){
			return $instance->newQuery()->paginate($_ENV['configurations']['list-limit']);
		}else{
			return $instance->newQuery()
			->where('role_id', \Session::get('role_id'))
			->paginate($_ENV['configurations']['list-limit']);	
			
		}
	}

	public static function getSelect($id='',$selected='') {
	    
	    $html = '<select id="'.$id.'" name="'.$id.'" style="width:100%" required="required">';
	    if(get_role()<4) {
	    	$data = \UnitModel::orderBy('id','asc')->get();
	    	$html .= '<option value="">Pilih Unit</option>';	
	    } else {
    		$data = \UnitModel::orderBy('id','asc')->where('id','=',\Session::get('id_unit'))->get();
    	}
	    foreach($data as $row) {
	        $select = ($row->id==$selected)?'selected="selected"':'';
	        $html .= '<option '.$select.' value="'.$row->id.'">'.$row->nama.'</option>';       
	    }
	    $html .= '</select>';
	    return $html;
	}

	public static function getSelectAll($id='',$selected='') {
	    
	    $html = '<select id="'.$id.'" name="'.$id.'" style="width:100%">';
	    if(get_role()<4) {
	    	$data = \UnitModel::orderBy('id','asc')->get();
	    	$html .= '<option value="">Semua Unit</option>';
    	} else {
    		$data = \UnitModel::orderBy('id','asc')->where('id','=',\Session::get('id_unit'))->get();
    	}
	    foreach($data as $row) {
	        $select = ($row->id==$selected)?'selected="selected"':'';
	        $html .= '<option '.$select.' value="'.$row->id.'">'.$row->nama.'</option>';       
	    }
	    $html .= '</select>';
	    return $html;
	}

}
