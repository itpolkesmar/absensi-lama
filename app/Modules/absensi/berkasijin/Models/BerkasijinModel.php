<?php namespace App\Modules\absensi\berkasijin\Models;
use Illuminate\Database\Eloquent\Model;


/**
* Berkasijin Model
* @var Berkasijin
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class BerkasijinModel extends Model {
	protected $guarded = array();
	
	protected $table = "tr_ijin";

	public static $rules = array(
		'nip' => 'required',
		'jns_ijin' => 'required',
		'tanggal_mulai' => 'required',
		'tanggal_selesai' => 'required'
    );

	public static function all($columns = array('*')){
		$instance = new static;
		if (\PermissionsLibrary::hasPermission('mod-berkasijin-listall')){
			return $instance->newQuery()->paginate($_ENV['configurations']['list-limit']);
		}else{
			return $instance->newQuery()
			->where('role_id', \Session::get('role_id'))
			->paginate($_ENV['configurations']['list-limit']);	
		}
	}

	public static function getSelectIjin($id='',$selected='') {
		$html = '<select id="'.$id.'" name="'.$id.'" style="width:100%">';
		$data = \DB::table('mst_ijin')->get();
		foreach ($data as $row) {
			$s = $row->id==$selected?'selected="selected"':'';
			$html .= '<option '.$s.' value="'.$row->id.'">'.$row->nama.'</option>';
		}
		$html .= '</select>';
		return $html;
	}

}
