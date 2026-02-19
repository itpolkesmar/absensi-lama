<?php namespace App\Modules\absensi\jadwalshift\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\absensi\jadwalshift\Models\JadwalshiftModel;
use Input,View, Request, Form, File;

/**
* Jadwalshift Controller
* @var Jadwalshift
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Divisi Software Development - Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class JadwalshiftController extends Controller {
    protected $jadwalshift;

    public function __construct(JadwalshiftModel $jadwalshift){
        $this->jadwalshift = $jadwalshift;
    }

    public function getIndex(){
        cekAjax();
        return View::make('jadwalshift::index');
    }

    public function getDaftar(){
        cekAjax();
        $input = Input::all();
        return View::make('jadwalshift::table',$input);
    }


    public function getEdit($id = false){
        cekAjax();
        $input = Input::all();
        return View::make('jadwalshift::edit', $input);
    }
    
    public function postEdit(){
        cekAjax();
        $input = Input::all();
        $jml_hari = date('t',strtotime($input['tahun'].'-'.$input['bulan'].'-01'));
        \JadwalshiftModel::
            where('nip','=',$input['nip'])
            ->where(\DB::Raw('MONTH(tanggal)'),'=',$input['bulan'])
            ->where(\DB::Raw('YEAR(tanggal)'),'=',$input['tahun'])
            ->delete();

        //perulangan dengan key sbg tanggal
        foreach ($input['id_shift'] as $key => $value) {
            //perulangan jika dalam satu tanggal ada lebih dari 1 jadwal shift
            foreach ($input['id_shift'][$key] as $key1 => $value1) {
                $tanggal = $input['tahun'].'-'.sprintf("%02d", $input['bulan']).'-'.sprintf("%02d", $key);
                \JadwalshiftModel::insert(array(
                    'nip'       => $input['nip'],
                    'tanggal'   => $tanggal,
                    'id_shift'  => $value1,
                    'user_id'   => \Session::get('user_id'),
                    'role_id'   => \Session::get('role_id'),
                    'created_at'=> sekarang()
                ));
            }
        }
        echo 1;
    }


	public function postDelete(){
        cekAjax();
        $ids = Input::get('id');
        if (is_array($ids)){
            foreach($ids as $id){
                $this->jadwalshift->find($id)->delete();
            }
            echo 'Data berhasil dihapus';
        }
        else{
            echo ($this->jadwalshift->find($ids)->delete())?9:0;
        }
    }

}
