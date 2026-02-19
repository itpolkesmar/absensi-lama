<?php namespace App\Modules\absensi\logabsensi\Models;
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

class LogabsensiModel extends Model {
	protected $guarded = array();
	
	protected $table = "att_log";

	public static function getLog($pin='',$tanggal='') {
		$data = \LogabsensiModel::
					select('scan_date','verifymode')
					->where('pin','=',$pin)
					->whereDate('scan_date','=',$tanggal)
					->where(function($query)
			            {
			                $query->orwhere('verifymode', '=', 1)
			                      ->orwhere('verifymode', '=', 20);
			            })
					->orderBy('scan_date','asc')
					->get();

		$output['datang'] = '-';
		$output['tengah'] = '-';
		$output['pulang'] = '-';
		$output['verif_datang'] = '-';
		$output['verif_tengah'] = '-';
		$output['verif_pulang'] = '-';

		$flag = 0;
		foreach ($data as $row) {
			$flag++;
			if($output['datang']=='-') {
				$output['datang'] = $row->scan_date;
				$output['verif_datang'] = $row->verifymode;
			} elseif(substr($row->scan_date, 2, 11)==11 || 
						substr($row->scan_date, 2, 11)==12 || 
						substr($row->scan_date, 2, 11)==13) {
				$output['tengah'] = $row->scan_date;
				$output['verif_tengah'] = $row->verifymode;
			}
			if($flag==count($data)) {
				if($row->scan_date!=$output['datang']) {
					$output['pulang'] = $row->scan_date;	
					$output['verif_pulang'] = $row->verifymode;
				}
			}
		}
		return $output;
	}

}
