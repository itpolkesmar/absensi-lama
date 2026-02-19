<?php namespace App\Modules\absensi\rekapabsensi\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\absensi\rekapabsensi\Models\RekapabsensiModel;
use Input,View, Request, Form, File;

class RekapabsensiController extends Controller 
{

	public function getIndex() 
	{
		cekAjax();
		return View::make('rekapabsensi::index');
	}

	public function getPegawai() 
	{
		\Session::put('id_unit',Input::get('id_unit'));
		return \PegawaiModel::getSelectAll('nip');	
	}

	public function getTampil() 
	{
		$input = Input::all();
		return View::make('rekapabsensi::table',$input);	
	}

	public function getTampilperpegawai() 
	{
		$input = Input::all();
		return View::make('rekapabsensi::table_perpegawai',$input);	
	}


    public function getProgress() 
	{
        return \Response::json(array(\Session::get('progress')));
    }

	public function getPosting() 
	{
		$input = Input::all();

		//cek tgl terakhir di tabel rekap
		if($input['id_unit']>0) 
		{
			$tgl_terakhir = \RekapabsensiModel::
							leftJoin('mst_pegawai','mst_pegawai.nip','=','tr_rekap_absensi.nip')
							->select('tanggal','mst_pegawai.id_unit')
							->where('jam_datang','!=','00:00:00')
							->where('jam_pulang','!=','00:00:00')
					        ->where(\DB::RAW('YEAR(tanggal)'),'=',$input['tahun'])
							->where(\DB::RAW('MONTH(tanggal)'),'=',$input['bulan'])
							->where('mst_pegawai.id_unit','=',$input['id_unit'])
							->orderBy('tanggal','desc')
							->first();
		} 
		else 
		{
			$tgl_terakhir = \RekapabsensiModel::
							where('jam_datang','!=','00:00:00')
							->where('jam_pulang','!=','00:00:00')
							->where(\DB::RAW('YEAR(tanggal)'),'=',$input['tahun'])
							->where(\DB::RAW('MONTH(tanggal)'),'=',$input['bulan'])
							->orderBy('tanggal','desc')
							->first();

		}

		if(!$tgl_terakhir) 
		{
			$tgl_terakhir = date('Y-m-d',strtotime($input['tahun'].'-'.$input['bulan'].'-01'));
		} else 
		{
			$tgl_terakhir = $tgl_terakhir->tanggal;
		}

		if(Input::has('sinkron') && Input::get('sinkron')=='ya') 
		{
			$tgl_terakhir = date('Y-m-d',strtotime($input['tahun'].'-'.$input['bulan'].'-01'));
			$sinkron = 'ya';
		} else 
		{
			$sinkron = 'tidak';
			$tgl_terakhir = date('Y-m-d',(strtotime ( '-1 days' , strtotime ( $tgl_terakhir) ) ));	
		}
		// die($tgl_terakhir);

		// \Session::put('tahun',$input['tahun']);
		// \Session::put('bulan',$input['bulan']);

  //       \Session::put('progress', 0);
  //       \Session::save();  

        $count = 0;

		// for($i=0;$i<=10;$i++) {
			if($input['id_unit']>0) 
			{
				$pegawai = \PegawaiModel::where('id_unit','=',$input['id_unit'])->get();
			} else {
				$pegawai = \PegawaiModel::get();	
			}
			if($input['nip']>0) 
			{
				$pegawai = \PegawaiModel::where('nip','=',$input['nip'])->get();	
			}
			foreach ($pegawai as $peg) {
				for($i=1; $i<=date('t',strtotime($input['tahun'].'-'.$input['bulan'].'-01')); $i++) 
				{
					$tanggal = $input['tahun'].'-'.sprintf("%02d", $input['bulan']).'-'.sprintf("%02d", $i);

	                $kurang_datang = 0;
	                $kurang_pulang = 0;

	    			$ijin = \DB::table('tr_ijin')
		            			->where('nip','=',$peg->nip)
	                			->whereDate('tanggal_mulai','<=',$tanggal)
	                			->whereDate('tanggal_selesai','>=',$tanggal)
	                			->first();

    				$id_ijin = $ijin?$ijin->id:0;

	                $cek = \RekapabsensiModel::
	                			where('nip','=',$peg->nip)
	                			->where('tanggal','=',$tanggal)
	                			->first();

    				// continue;

	    			//jika di table rekap sudah ada langsung lewat saja
	                //jika tanggal yg ditunjuk lebih dari hari ini
	                if($sinkron=='tidak' && $peg->is_shift==0 
	                	&& (
	                	(strtotime($tanggal) <= strtotime($tgl_terakhir) || 
	                	strtotime($tanggal) >= (strtotime('+1 days',strtotime(date('Y-m-d')))) )
	                	||
	                	// $peg->is_shift!=1 && 
	                	// && $id_ijin==0 
	                	// $peg->is_shift==9999
	                	($cek && ( ($cek->kurang_datang==0 && $cek->kurang_pulang==0) || $cek->is_libur==0))) 
	                	)
						{
	                		continue;
	                } 
					else 
					{

		                // $cek = \RekapabsensiModel::
		                // 			where('nip','=',$peg->nip)
		                // 			->where('tanggal','=',$tanggal)
		                // 			->first();

		    			if($peg->is_shift==1 && $id_ijin==0) 
						{
							// if(!(Input::has('sinkron') && Input::get('sinkron')=='ya')) {
			    // 				if($cek && $cek->kurang_datang==0 && $cek->kurang_pulang==0) {
			    // 					continue;
			    // 				}	
		    	// 			}

		    				$absen_shift = \LogabsensiModel::
												select('scan_date','verifymode')
												->where('pin','=',$peg->pin)
												->whereDate('scan_date','=',$tanggal)
												->where(function($query)
										            {
										                $query->orwhere('verifymode', '=', 1)
										                      ->orwhere('verifymode', '=', 20);
										            })
												->orderBy('scan_date','asc')
												->get();

							// if($peg->nip==81054) {
							// 	die(print_r($absen_shift));
							// }
							foreach ($absen_shift as $as) 
							{
								$cek_shift  = \DB::table('tr_shift_absen')->where(array(
											'nip'		=> $peg->nip,
											'tanggal'	=> substr($as->scan_date,0,10),
											'jam'		=> substr($as->scan_date,11,8),
											'verifymode'=> $as->verifymode))
										->first();
								if(!$cek_shift) 
								{
									\DB::table('tr_shift_absen')->insert(array(
										'nip'		=> $peg->nip,
										'tanggal'	=> substr($as->scan_date,0,10),
										'jam'		=> substr($as->scan_date,11,8),
										'verifymode'=> $as->verifymode));
								}
							}

							//shift pegawai pada tanggal tsb
							$shift = \JadwalshiftModel::
										leftJoin('mst_shift','mst_shift.id','=','tr_jadwal_shift.id_shift')
										->select('mst_shift.*')
										->where('nip','=',$peg->nip)
										->where('tanggal','=',$tanggal)
										->get();

							$arr_kurang_datang = array();
							$arr_kurang_pulang = array();

	                        $temp_jam_pulang = '';
	                		
	                		$shift_ke = 0;

							foreach ($shift as $s) 
							{
								$jns_shift = $s->jns_shift;
			                    $batas_datang = intval(substr($s->jam_datang,0,2))-2;
			                    $batas_pulang = intval(substr($s->jam_pulang,0,2))+2;


			                    //jika ada 2/lebih yang nyambung jam nya maka disela2 jam tidak perlu absen
			                    if($temp_jam_pulang==$s->jam_datang) 
								{
			                        $arr_kurang_datang[$shift_ke] = 0;
			                        $arr_kurang_pulang[$shift_ke-1] = 0;                                      
			                    } 
								else 
								{
			                        //ambil absen datang untuk shift tsb itu
			                        $datang = \DB::table('tr_shift_absen')
			                                    ->where('nip','=',$peg->nip)
			                                    ->where('tanggal','=',$tanggal)
			                                    ->where(\DB::Raw('CAST(substring(jam,1,2) AS UNSIGNED)'),'>=',$batas_datang)
			                                    ->orderBy('jam','asc')
			                                    ->first();
			                    }

			                    //jika shift malam makanya pulangnya ambil di tanggal berikutnya
			                    $tanggal_berikutnya = date('Y-m-d',strtotime($tanggal. "+1 days"));
			                    if($jns_shift=='M') 
								{                                        
			                        //ambil absen pulang untuk shift tsb itu
			                        $pulang = \DB::table('tr_shift_absen')
			                                    ->where('nip','=',$peg->nip)
			                                    ->where('tanggal','=',$tanggal_berikutnya)
			                                    ->where(\DB::Raw('CAST(substring(jam,1,2) AS UNSIGNED)'),'<=',$batas_pulang)
			                                    ->orderBy('jam','desc')
			                                    ->first();
			                    } 
								else 
								{          
			                        //ambil absen pulang untuk shift tsb itu
			                        $pulang = \DB::table('tr_shift_absen')
			                                    ->where('nip','=',$peg->nip)
			                                    ->where('tanggal','=',$tanggal)
			                                    ->where(\DB::Raw('CAST(substring(jam,1,2) AS UNSIGNED)'),'<=',$batas_pulang)
			                                    ->orderBy('jam','desc')
			                                    ->first();
			                    }

			                    $jam_kerja_datang = strtotime($s->jam_datang);
			                    $jam_kerja_pulang = strtotime($s->jam_pulang);

			                    if($datang && $pulang) 
								{
			                        //mengecek jika ada terlambat atau pulang cepat
			                        $str_jam_datang = strtotime($datang->jam);
			                        $str_jam_pulang = strtotime($pulang->jam);
			                        if($temp_jam_pulang!=$s->jam_datang) {
			                            $arr_kurang_datang[$shift_ke] = ($str_jam_datang - $jam_kerja_datang)/60<0?0:($str_jam_datang-$jam_kerja_datang)/60;
			                        }
			                        $arr_kurang_pulang[$shift_ke] = ($str_jam_pulang - $jam_kerja_pulang)/60>0?0:($jam_kerja_pulang-$str_jam_pulang)/60;
			                    } 
								elseif($jns_shift=='M') 
								{ 
			                        if($temp_jam_pulang!=$s->jam_datang) 
									{
			                            $arr_kurang_datang[$shift_ke] = 
			                                round(abs(strtotime(date('H:i:s',strtotime('23:59:00'))) - $jam_kerja_datang)/60,2)
			                                    + round(abs($jam_kerja_pulang - strtotime(date('H:i:s',strtotime('00:00:00'))))/60,2)
			                                    + 1;
			                        }
			                    } 
								else 
								{
			                        if($temp_jam_pulang!=$s->jam_datang) 
									{
			                            $arr_kurang_datang[$shift_ke] = round(abs($jam_kerja_pulang - $jam_kerja_datang)/60,2);
			                        }
			                    }
			                    $shift_ke++;
			                    $temp_jam_pulang = $s->jam_pulang;
			                	// return array_sum($arr_kurang_datang).' = '.array_sum($arr_kurang_pulang);
			                	// $jamkurang = array_sum($terlambat_datang) + array_sum($arr_kurang_pulang);

			                	$kurang_datang = array_sum($arr_kurang_datang);
			                	$kurang_pulang = array_sum($arr_kurang_pulang);				
			                	// if($tanggal=='2017-07-28' && $peg->nip=='196405042012121002') {
			                	// 	die(print_r($kurang_datang));
			                	// }			
							}
		    			}

		    			if($peg->is_shift==0) 
						{
		    				// echo 'sasasasa';
		    				// die();
		    				$waktu = \LogabsensiModel::getLog($peg->pin,$tanggal);
			                $waktu['datang'] = date('H:i:s',strtotime($waktu['datang']));
			                $waktu['tengah'] = date('H:i:s',strtotime($waktu['tengah']));
			                $waktu['pulang'] = date('H:i:s',strtotime($waktu['pulang']));

			                $waktu['pulang'] = date('H:i',strtotime($waktu['datang']))==date('H:i',strtotime($waktu['pulang']))?'':$waktu['pulang'];
		                	$libur = 0;
			                $jam_kerja = \DB::table('mst_jam_kerja')
		                                ->leftJoin('mst_pegawai_ketentuan','mst_pegawai_ketentuan.id_ketentuan','=','mst_jam_kerja.id_ketentuan')
		                                ->select('mst_jam_kerja.*')
		                                ->where('nip','=',$peg->nip)
		                                ->where('hari','=',date('D',strtotime($tanggal)))
		                                ->first();

		                    $harilibur = \HariliburModel::whereDate('tanggal','=',$tanggal)->first();

			                if($jam_kerja && !$harilibur) 
							{              
			                	$cek_puasa = \DB::table('mst_puasa')
		                							->where('tahun','=',substr($tanggal, 0,4))
		                							->whereDate('tanggal_mulai','<=',$tanggal)
		                							->whereDate('tanggal_selesai','>=',$tanggal)
		                							->first();													
    							if($cek_puasa) 
								{
    								$jam_kerja_datang = $jam_kerja->jam_datang_puasa;
    								$jam_kerja_pulang = $jam_kerja->jam_pulang_puasa; 
    							} 
								else 
								{
    								$jam_kerja_datang = $jam_kerja->jam_datang;
    								$jam_kerja_pulang = $jam_kerja->jam_pulang;
    							}

			                    //menghitung keterlambatan
			                    $from_time = strtotime($jam_kerja_datang);
			                    $to_time = strtotime($waktu['datang']);
			                    $kurang_datang = ceil( ($to_time - $from_time) / 60);
			                    $kurang_datang = $kurang_datang<0?0:$kurang_datang;

			                    //menghitung pulang_awal
			                    $to_time = strtotime($jam_kerja_datang);
			                    $from_time = strtotime($waktu['pulang']);
			                    $kurang_pulang = ceil( ($to_time - $from_time) / 60);
			                    $kurang_pulang = $kurang_pulang<0?0:$kurang_pulang;

			                    //jika salah satu / keduanya tidak absen 
			                    if($waktu['datang']=='00:00:00' || $waktu['pulang']=='00:00:00') 
								{

			                    	$kurang_datang = ceil( (strtotime($jam_kerja_pulang) - strtotime($jam_kerja_datang)) / 60);
			                    } 
			                } 
							else 
							{
			                	$libur = 1;
			                }

			                unset($jam_kerja);
			                unset($harilibur);
		    			}

		    			// if($cek && ($cek->jam_datang=='00:00:00' || $cek->jam_pulang=='00:00:00'  || $cek->id_ijin==0)) {
		    			if($cek) 
						{
		    				\RekapabsensiModel::where('id','=',$cek->id)->update(array(
		    					'id_unit'		=> $peg->id_unit,
		    					'is_shift'		=> $peg->is_shift,
		    					'jam_datang'	=> @$waktu['datang'],
		    					'jam_tengah'	=> @$waktu['tengah'],
		    					'jam_pulang'	=> @$waktu['pulang'],
		    					'verif_datang'	=> @$waktu['verif_datang'],
		    					'verif_tengah'	=> @$waktu['verif_tengah'],
		    					'verif_pulang'	=> @$waktu['verif_pulang'],
		    					'kurang_datang'	=> $kurang_datang,
		    					'kurang_pulang'	=> $kurang_pulang,
		    					'is_libur'		=> @$libur,
		    					'id_ijin'		=> $id_ijin,
		    					'user_id'		=> \Session::get('user_id'),
		    					'role_id'		=> \Session::get('role_id'),
		    					'created_at'	=> sekarang()
							));
		    			} 
						elseif(!$cek) 
						{
		    				\RekapabsensiModel::insert(array(
		    					'nip'			=> $peg->nip,
		    					'id_unit'		=> $peg->id_unit,
		    					'is_shift'		=> $peg->is_shift,
		    					'tanggal'		=> $tanggal,
		    					'jam_datang'	=> @$waktu['datang'],
		    					'jam_tengah'	=> @$waktu['tengah'],
		    					'jam_pulang'	=> @$waktu['pulang'],
		    					'verif_datang'	=> @$waktu['verif_datang'],
		    					'verif_tengah'	=> @$waktu['verif_tengah'],
		    					'verif_pulang'	=> @$waktu['verif_pulang'],
		    					'kurang_datang'	=> $kurang_datang,
		    					'kurang_pulang'	=> $kurang_pulang,
		    					'is_libur'		=> @$libur,
		    					'id_ijin'		=> $id_ijin,
		    					'user_id'		=> \Session::get('user_id'),
		    					'role_id'		=> \Session::get('role_id'),
		    					'created_at'	=> sekarang()
							));
		    			}
		    		}
	            }
                //\ $count++;
                // \Session::put('progress', (number_format(($count+1)/count($pegawai)*100,2)));
                // \Session::save();
			}
		// }
		die('1');
	}

	public function getXls($var='',$id_unit='',$bulan='',$tahun='') 
	{
		$input['var'] = $var;
		$input['id_unit'] = $id_unit;
		$input['bulan'] = $bulan;
		$input['tahun'] = $tahun;
		return View::make('rekapabsensi::xls.'.$input['var'],$input);	
	}
}
