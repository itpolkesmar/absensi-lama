<?php namespace App\Modules\masterdata\pegawaikhusus\Models;
use Illuminate\Database\Eloquent\Model;


/**
* Pegawaikhusus Model
* @var Pegawaikhusus
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class PegawaikhususModel extends Model {
	protected $guarded = array();
	
	protected $table = "mst_pegawai_khusus";

	public static $rules = array(
    		'tahun' => 'required',
		'id_pegawai' => 'required'

    );

	public static function all($columns = array('*')){
		$instance = new static;
		if (\PermissionsLibrary::hasPermission('mod-pegawaikhusus-listall')){
			return $instance->newQuery()
                            ->leftJoin('mst_pegawai','mst_pegawai.id','=','mst_pegawai_khusus.id_pegawai')
                			->select('mst_pegawai.nama','mst_pegawai.nip','mst_pegawai_khusus.*')
                			->paginate($_ENV['configurations']['list-limit']);
		}else{
			return $instance->newQuery()
			->where('role_id', \Session::get('role_id'))
			->paginate($_ENV['configurations']['list-limit']);	
			
		}
	}

}
