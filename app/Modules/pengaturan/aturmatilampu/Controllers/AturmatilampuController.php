<?php namespace App\Modules\pengaturan\aturmatilampu\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\pengaturan\aturmatilampu\Models\AturmatilampuModel;
use Input,View, Request, Form, File;

/**
* Aturmatilampu Controller
* @var Aturmatilampu
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Divisi Software Development - Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class AturmatilampuController extends Controller {
    protected $aturmatilampu;

    public function __construct(AturmatilampuModel $aturmatilampu){
        $this->aturmatilampu = $aturmatilampu;
    }

        public function getIndex(){
        cekAjax();
        if (Input::has('search')) {
            if(strlen(Input::has('search')) > 0){
                $aturmatilampus = $this->aturmatilampu
                			->orWhere('id_unit', 'LIKE', '%'.Input::get('search').'%')
			->orWhere('tanggal', 'LIKE', '%'.Input::get('search').'%')

                ->paginate($_ENV['configurations']['list-limit']);
            }else{
                $aturmatilampus = $this->aturmatilampu->all();
            }
        }else{
            $aturmatilampus = $this->aturmatilampu->all();
        }
        return View::make('aturmatilampu::index', compact('aturmatilampus'));
    }


        public function getCreate(){
        cekAjax();
        return View::make('aturmatilampu::create');
    }

    public function postCreate(){
        cekAjax();
        $input = Input::all();
        $validation = \Validator::make($input, AturmatilampuModel::$rules);
        if ($validation->passes()){
            $input['user_id'] = \Session::get('user_id');
            $input['role_id'] = \Session::get('role_id');
            echo ($this->aturmatilampu->create($input))?1:"Gagal Disimpan";
        }
        else{
            echo 'Input tidak valid';
        }
    }



    //{controller-show}

        public function getEdit($id = false){
        cekAjax();
        $id = ($id == false)?Input::get('id'):'';
        $aturmatilampu = $this->aturmatilampu->find($id);
        //if (is_null($aturmatilampu)){return \Redirect::to('pengaturan/aturmatilampu/index');}
        return View::make('aturmatilampu::edit', compact('aturmatilampu'));
    }
    
    public function postEdit(){
        cekAjax();
        $id = Input::get('id');
        $input = Input::all();
        $validation = \Validator::make($input, AturmatilampuModel::$rules);
        
        if ($validation->passes()){
            $aturmatilampu = $this->aturmatilampu->find($id);
            echo ($aturmatilampu->update($input))?4:"Gagal Disimpan";
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
                $this->aturmatilampu->find($id)->delete();
            }
            echo 'Data berhasil dihapus';
        }
        else{
            echo ($this->aturmatilampu->find($ids)->delete())?9:0;
        }
    }

}
