<?php namespace App\Modules\masterdata\pegawai\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\masterdata\pegawai\Models\PegawaiModel;
use Input,View, Request, Form, File;

/**
* Pegawai Controller
* @var Pegawai
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Divisi Software Development - Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class PegawaiController extends Controller {
    protected $pegawai;

    public function __construct(PegawaiModel $pegawai){
        $this->pegawai = $pegawai;
    }

        public function getIndex(){
        cekAjax();
        if (Input::has('search')) {
            if(strlen(Input::has('search')) > 0){
                $pegawais = $this->pegawai
                            ->leftJoin('mst_unit','mst_unit.id','=','mst_pegawai.id_unit')
                            ->select('mst_pegawai.*','mst_unit.nama as unit')
                            ->where(function($query)
                                {
                                    $query->orWhere('mst_pegawai.nama', 'LIKE', '%'.Input::get('search').'%')
                                            ->orWhere('mst_unit.nama', 'LIKE', '%'.Input::get('search').'%')
                                            ->orWhere('pin', 'LIKE', '%'.Input::get('search').'%')
                                            ->orWhere('nip', 'LIKE', '%'.Input::get('search').'%');
                                });

                if(get_role()==4) {
                    $pegawais = $pegawais->where('id_unit','=',\Session::get('id_unit'));
                }

                $pegawais = $pegawais
                    ->orderBy('pin','asc')
                    ->paginate($_ENV['configurations']['list-limit']);
            }else{
                $pegawais = $this->pegawai->all();
            }
        }else{
            $pegawais = $this->pegawai->all();
        }
        return View::make('pegawai::index', compact('pegawais'));
    }


        public function getCreate(){
        cekAjax();
        return View::make('pegawai::create');
    }

    public function postCreate(){
        cekAjax();
        $input = Input::all();

        $cek_nip = \PegawaiModel::where('nip','=',$input['nip'])->first();

        if($cek_nip) {
            echo 'NIP sudah digunakan oleh Pegawai lain';
        } else {
            
            \DB::table('mst_pegawai_ketentuan')->insertGetId(array(
                'nip'           => $input['nip'],
                'id_ketentuan'  => 1));
            $validation = \Validator::make($input, PegawaiModel::$rules);
            if ($validation->passes()){
                $input['user_id'] = \Session::get('user_id');
                $input['role_id'] = \Session::get('role_id');
                echo ($this->pegawai->create($input))?1:"Gagal Disimpan";
            }
            else{
                echo 'Input tidak valid';
            }   
        }
    }


    public function postShift(){
        cekAjax();
        $id = Input::get('id');
        $status_lama = \PegawaiModel::where('id','=',Input::get('id'))->first()->is_shift;
        $status_baru = $status_lama==0?1:0;
        echo \PegawaiModel::where('id','=',Input::get('id'))->update(array('is_shift'=>$status_baru))?1:0;
    }

    public function postGolongan(){
        cekAjax();
        echo \PegawaiModel::where('id','=',Input::get('id'))->update(array('id_golongan'=>Input::get('id_golongan')))?1:0;
    }

    //{controller-show}

    public function getEdit($id = false){
        cekAjax();
        $id = ($id == false)?Input::get('id'):'';
        $pegawai = $this->pegawai->find($id);
        //if (is_null($pegawai)){return \Redirect::to('masterdata/pegawai/index');}
        return View::make('pegawai::edit', compact('pegawai'));
    }
    
    public function postEdit(){
        cekAjax();
        $id = Input::get('id');
        $input = Input::all();
        $validation = \Validator::make($input, PegawaiModel::$rules);
        
        if ($validation->passes()){
            $pegawai = $this->pegawai->find($id);
            echo ($pegawai->update($input))?4:"Gagal Disimpan";
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
                $this->pegawai->find($id)->delete();
            }
            echo 'Data berhasil dihapus';
        }
        else{
            echo ($this->pegawai->find($ids)->delete())?9:0;
        }
    }

}
