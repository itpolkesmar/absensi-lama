<?php namespace App\Modules\absensi\logabsensi\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\absensi\logabsensi\Models\LogabsensiModel;
use Input,View, Request, Form, File;

class LogabsensiController extends Controller {

	public function getIndex() {
		cekAjax();
		return View::make('logabsensi::index');
	}

    public function getDaftar() {
        $tanggal = Input::get('tanggal');
        $id_unit = Input::get('id_unit');
        $tanggal = date('Y-m-d',strtotime($tanggal));
        $data = \LogabsensiModel::
                    leftJoin('mst_pegawai','mst_pegawai.pin','=','att_log.pin')
                    ->leftJoin('mst_lokasi','mst_lokasi.sn','=','att_log.sn')
                    ->leftJoin('mst_unit','mst_unit.id','=','mst_pegawai.id_unit')
                    ->select('mst_unit.nama as unit',
                        'mst_lokasi.nama as lokasi',
                        'mst_pegawai.nama as pegawai','mst_pegawai.nip','mst_pegawai.pin',
                        'att_log.*');
        if(isset($id_unit) && $id_unit>0) {
            $data = $data->where('id_unit','like',$id_unit);        
        }
        if(Input::has('search') && strlen(Input::get('search'))>0) {
            $data = $data->where(function($query)
                        {
                            $query->orwhere('mst_pegawai.nama','like','%'.Input::get('search').'%')
                                  ->orwhere('mst_pegawai.nip','like','%'.Input::get('search').'%');
                        });       
        }
        $data = $data->whereDate('scan_date','=',$tanggal)
                    ->groupBy('mst_pegawai.id')
                    ->orderBy('mst_pegawai.pin','asc')
                    ->paginate($_ENV['configurations']['list-limit']);

        return View::make('logabsensi::table',compact('data','tanggal','id_unit'));
    }

	// public function getDaftar() {
	// 	$bulan = Input::get('bulan');
 //        $tahun = Input::get('tahun');
 //        $id_unit = Input::get('id_unit');

 //        $data = \LogabsensiModel::
 //                    leftJoin('mst_pegawai','mst_pegawai.pin','=','att_log.pin')
 //                    ->leftJoin('mst_lokasi','mst_lokasi.sn','=','att_log.sn')
 //                    ->leftJoin('mst_unit','mst_unit.id','=','mst_pegawai.id_unit')
 //                    ->select('mst_unit.nama as unit',
 //                        'mst_lokasi.nama as lokasi',
 //                        'mst_pegawai.nama as pegawai','mst_pegawai.nip','mst_pegawai.pin',
 //                        'att_log.*');
 //        if(isset($id_unit) && $id_unit>0) {
 //            $data = $data->where('id_unit','like',$id_unit);        
 //        }
 //        if(Input::has('search') && strlen(Input::get('search'))>0) {
 //            $data = $data->where(function($query)
 //                        {
 //                            $query->orwhere('mst_pegawai.nama','like','%'.Input::get('search').'%')
 //                                  ->orwhere('mst_pegawai.nip','like','%'.Input::get('search').'%');
 //                        });       
 //        }
 //        $data = $data->where(\DB::Raw('YEAR(scan_date)'),'=',$tahun)
 //                    ->where(\DB::Raw('MONTH(scan_date)'),'=',$bulan)
 //                    ->groupBy('mst_pegawai.id')
 //                    ->paginate($_ENV['configurations']['list-limit']);

 //        return View::make('logabsensi::table',compact('data','bulan','tahun','id_unit'));
	// }
}
