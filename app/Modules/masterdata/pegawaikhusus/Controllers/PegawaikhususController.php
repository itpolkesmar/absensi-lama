<?php namespace App\Modules\masterdata\pegawaikhusus\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\masterdata\pegawaikhusus\Models\PegawaikhususModel;
use Input,View, Request, Form, File;

/**
* Pegawaikhusus Controller
* @var Pegawaikhusus
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Divisi Software Development - Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class PegawaikhususController extends Controller {
    protected $pegawaikhusus;

    public function __construct(PegawaikhususModel $pegawaikhusus){
        $this->pegawaikhusus = $pegawaikhusus;
    }

        public function getIndex(){
        cekAjax();
        if (Input::has('search')) {
            if(strlen(Input::has('search')) > 0){
                $pegawaikhususs = $this->pegawaikhusus
                            ->leftJoin('mst_pegawai','mst_pegawai.id','=','mst_pegawai_khusus.id_pegawai')
                			->select('mst_pegawai.nama','mst_pegawai.nip','mst_pegawai_khusus.*')
                            ->orWhere('tahun', 'LIKE', '%'.Input::get('search').'%')
			                ->orWhere('id_pegawai', 'LIKE', '%'.Input::get('search').'%')
                            ->paginate($_ENV['configurations']['list-limit']);
            }else{
                $pegawaikhususs = $this->pegawaikhusus->all();
            }
        }else{
            $pegawaikhususs = $this->pegawaikhusus->all();
        }
        return View::make('pegawaikhusus::index', compact('pegawaikhususs'));
    }


        public function getCreate(){
        cekAjax();
        return View::make('pegawaikhusus::create');
    }

    public function postCreate(){
        cekAjax();
        $input = Input::all();
        $validation = \Validator::make($input, PegawaikhususModel::$rules);
        if ($validation->passes()){
            $input['user_id'] = \Session::get('user_id');
            $input['role_id'] = \Session::get('role_id');
            echo ($this->pegawaikhusus->create($input))?1:"Gagal Disimpan";
        }
        else{
            echo 'Input tidak valid';
        }
    }



    //{controller-show}

        public function getEdit($id = false){
        cekAjax();
        $id = ($id == false)?Input::get('id'):'';
        $pegawaikhusus = $this->pegawaikhusus->find($id);
        //if (is_null($pegawaikhusus)){return \Redirect::to('masterdata/pegawaikhusus/index');}
        return View::make('pegawaikhusus::edit', compact('pegawaikhusus'));
    }
    
    public function postEdit(){
        cekAjax();
        $id = Input::get('id');
        $input = Input::all();
        $validation = \Validator::make($input, PegawaikhususModel::$rules);
        
        if ($validation->passes()){
            $pegawaikhusus = $this->pegawaikhusus->find($id);
            echo ($pegawaikhusus->update($input))?4:"Gagal Disimpan";
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
                $this->pegawaikhusus->find($id)->delete();
            }
            echo 'Data berhasil dihapus';
        }
        else{
            echo ($this->pegawaikhusus->find($ids)->delete())?9:0;
        }
    }

}
