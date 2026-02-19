<?php namespace App\Modules\masterdata\harilibur\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\masterdata\harilibur\Models\HariliburModel;
use Input,View, Request, Form, File;

/**
* Harilibur Controller
* @var Harilibur
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Divisi Software Development - Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class HariliburController extends Controller {
    protected $harilibur;

    public function __construct(HariliburModel $harilibur){
        $this->harilibur = $harilibur;
    }

        public function getIndex(){
        cekAjax();
        if (Input::has('search')) {
            if(strlen(Input::has('search')) > 0){
                $hariliburs = $this->harilibur
                			->orWhere('tanggal', 'LIKE', '%'.Input::get('search').'%')
			->orWhere('keterangan', 'LIKE', '%'.Input::get('search').'%')

                    ->orderBy(\DB::Raw('YEAR(tanggal)'),'desc')
                    ->orderBy('tanggal','asc')
                ->paginate($_ENV['configurations']['list-limit']);
            }else{
                $hariliburs = $this->harilibur->all();
            }
        }else{
            $hariliburs = $this->harilibur->all();
        }
        return View::make('harilibur::index', compact('hariliburs'));
    }


        public function getCreate(){
        cekAjax();
        return View::make('harilibur::create');
    }

    public function postCreate(){
        cekAjax();
        $input = Input::all();
        $validation = \Validator::make($input, HariliburModel::$rules);
        if ($validation->passes()){
            $input['tanggal'] = date('Y-m-d',strtotime($input['tanggal']));
            $input['user_id'] = \Session::get('user_id');
            $input['role_id'] = \Session::get('role_id');
            echo ($this->harilibur->create($input))?1:"Gagal Disimpan";
        }
        else{
            echo 'Input tidak valid';
        }
    }



    //{controller-show}

        public function getEdit($id = false){
        cekAjax();
        $id = ($id == false)?Input::get('id'):'';
        $harilibur = $this->harilibur->find($id);
        //if (is_null($harilibur)){return \Redirect::to('masterdata/harilibur/index');}
        return View::make('harilibur::edit', compact('harilibur'));
    }
    
    public function postEdit(){
        cekAjax();
        $id = Input::get('id');
        $input = Input::all();
        $validation = \Validator::make($input, HariliburModel::$rules);
        
        if ($validation->passes()){
            $input['tanggal'] = date('Y-m-d',strtotime($input['tanggal']));
            $harilibur = $this->harilibur->find($id);
            echo ($harilibur->update($input))?4:"Gagal Disimpan";
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
                $this->harilibur->find($id)->delete();
            }
            echo 'Data berhasil dihapus';
        }
        else{
            echo ($this->harilibur->find($ids)->delete())?9:0;
        }
    }

}
