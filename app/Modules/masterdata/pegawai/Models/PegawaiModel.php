<?php namespace App\Modules\masterdata\pegawai\Models;
use Illuminate\Database\Eloquent\Model;


/**
* Pegawai Model
* @var Pegawai
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class PegawaiModel extends Model {
	protected $guarded = array();
	
	protected $table = "mst_pegawai";

	public static $rules = array(
    		'nama' => 'required',
		'pin' => 'required',
		'nip' => 'required',
		'id_unit' => 'required',

    );

	public static function all($columns = array('*')){
		$instance = new static;
		if(get_role()==4) {
			return $instance->newQuery()
					->leftJoin('mst_unit','mst_unit.id','=','mst_pegawai.id_unit')
					->select('mst_pegawai.*','mst_unit.nama as unit')
					->where('id_unit','=',\Session::get('id_unit'))
					->orderBy('pin','asc')
					->paginate($_ENV['configurations']['list-limit']);
		} else {
			return $instance->newQuery()
					->leftJoin('mst_unit','mst_unit.id','=','mst_pegawai.id_unit')
					->select('mst_pegawai.*','mst_unit.nama as unit')
					->orderBy('id_unit','asc')
					->orderBy('pin','asc')
					->paginate($_ENV['configurations']['list-limit']);
		}
	}

	public static function getSelect($id='',$selected='') {
	    $html = '<select id="'.$id.'" name="'.$id.'" style="width:100%" required="required">';

		if(get_role()<4) {
	    	$data = \PegawaiModel::get();
	    	$html .= '<option value="">Pilih Unit</option>';	
	    } else {
    		$data = \PegawaiModel::where('id_unit','=',\Session::get('id_unit'))->get();
    	}
	    $html .= '<option value="">Pilih Pegawai</option>';
	    foreach($data as $row) {
	        $select = ($row->nip==$selected)?'selected="selected"':'';
	        $html .= '<option '.$select.' value="'.$row->nip.'">'.$row->nama.' - '.$row->nip.'</option>';       
	    }
	    $html .= '</select>';
	    return $html;
	}

	public static function getSelectAll($id='',$selected='') {
		if(get_role()<4) {
	    	$data = \PegawaiModel::get();
	    } else {
    		$data = \PegawaiModel::where('id_unit','=',\Session::get('id_unit'))->get();
    	}
	    $html = '<select id="'.$id.'" name="'.$id.'" style="width:100%">';
	    $html .= '<option value="">Seluruh Pegawai</option>';
	    foreach($data as $row) {
	        $select = ($row->nip==$selected)?'selected="selected"':'';
	        $html .= '<option '.$select.' value="'.$row->nip.'">'.$row->nama.' - '.$row->nip.'</option>';       
	    }
	    $html .= '</select>';
	    return $html;
	}

}
