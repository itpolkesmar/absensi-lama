<?php namespace App\Modules\masterdata\jatahcuti\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\masterdata\jatahcuti\Models\JatahcutiModel;
use Input,View, Request, Form, File;

/**
* Jatahcuti Controller
* @var Jatahcuti
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Divisi Software Development - Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class JatahcutiController extends Controller {
    protected $jatahcuti;

    public function __construct(JatahcutiModel $jatahcuti){
        $this->jatahcuti = $jatahcuti;
    }

    public function getIndex(){
        cekAjax();
        return View::make('jatahcuti::index');
    }


    public function getDaftar(){
        cekAjax();
        $tahun = Input::get('tahun');
        $id_unit = Input::get('id_unit');

        $data = \PegawaiModel::
                    leftJoin('mst_jatah_cuti','mst_jatah_cuti.nip','=','mst_pegawai.nip')
                    ->leftJoin('mst_unit','mst_unit.id','=','mst_pegawai.id_unit')
                    ->select('mst_pegawai.nama','mst_pegawai.nip','mst_unit.nama as unit','mst_jatah_cuti.*')
                    ->where('tahun','=',$tahun);
        if(isset($id_unit) && $id_unit>0) {
            $data = $data->where('mst_pegawai.id_unit','=',$id_unit);        
        }
        if(Input::has('search') && strlen(Input::get('search'))>0) {
            $data = $data->where(function($query)
                        {
                            $query->orwhere('mst_pegawai.nama','like','%'.Input::get('search').'%')
                                  ->orwhere('mst_pegawai.nip','like','%'.Input::get('search').'%');
                        });       
        }
        $data = $data->paginate($_ENV['configurations']['list-limit']);

        return View::make('jatahcuti::table',compact('data','tahun','id_unit'));
    }

    public function getCreate(){
        cekAjax();
        return View::make('jatahcuti::create');
    }

    public function postCreate(){
        cekAjax();
        $input = Input::all();
        $validation = \Validator::make($input, JatahcutiModel::$rules);
        if ($validation->passes()){
            $input['user_id'] = \Session::get('user_id');
            $input['role_id'] = \Session::get('role_id');
            echo ($this->jatahcuti->create($input))?1:"Gagal Disimpan";
        }
        else{
            echo 'Input tidak valid';
        }
    }



    //{controller-show}

        public function getEdit($id = false){
        cekAjax();
        $id = ($id == false)?Input::get('id'):'';
        $jatahcuti = $this->jatahcuti->find($id);
        //if (is_null($jatahcuti)){return \Redirect::to('masterdata/jatahcuti/index');}
        return View::make('jatahcuti::edit', compact('jatahcuti'));
    }
    
    public function postEdit(){
        cekAjax();
        $id = Input::get('id');
        $input = Input::all();
        $validation = \Validator::make($input, JatahcutiModel::$rules);
        
        if ($validation->passes()){
            $jatahcuti = $this->jatahcuti->find($id);
            echo ($jatahcuti->update($input))?4:"Gagal Disimpan";
        }
        else{
            echo 'Input tidak valid';
        }
    }


	
        public function postDelete(){
        cekAjax();
        $ids = Input::get('id');
        if (is_array($ids)){
            foreach($ids as $id){
                $this->jatahcuti->find($id)->delete();
            }
            echo 'Data berhasil dihapus';
        }
        else{
            echo ($this->jatahcuti->find($ids)->delete())?9:0;
        }
    }

}
