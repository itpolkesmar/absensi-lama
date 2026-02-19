<?php namespace App\Modules\masterdata\lokasimesin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\masterdata\lokasimesin\Models\LokasimesinModel;
use Input,View, Request, Form, File;

/**
* Lokasimesin Controller
* @var Lokasimesin
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Divisi Software Development - Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class LokasimesinController extends Controller {
    protected $lokasimesin;

    public function __construct(LokasimesinModel $lokasimesin){
        $this->lokasimesin = $lokasimesin;
    }

        public function getIndex(){
        cekAjax();
        if (Input::has('search')) {
            if(strlen(Input::has('search')) > 0){
                $lokasimesins = $this->lokasimesin
                        			->orWhere('nama', 'LIKE', '%'.Input::get('search').'%')
        			                ->orWhere('sn', 'LIKE', '%'.Input::get('search').'%')
                                    ->paginate($_ENV['configurations']['list-limit']);
            }else{
                $lokasimesins = $this->lokasimesin->all();
            }
        }else{
            $lokasimesins = $this->lokasimesin->all();
        }
        return View::make('lokasimesin::index', compact('lokasimesins'));
    }


        public function getCreate(){
        cekAjax();
        return View::make('lokasimesin::create');
    }

    public function postCreate(){
        cekAjax();
        $input = Input::all();
        $validation = \Validator::make($input, LokasimesinModel::$rules);
        if ($validation->passes()){
            $input['user_id'] = \Session::get('user_id');
            $input['role_id'] = \Session::get('role_id');
            echo ($this->lokasimesin->create($input))?1:"Gagal Disimpan";
        }
        else{
            echo 'Input tidak valid';
        }
    }



    //{controller-show}

        public function getEdit($id = false){
        cekAjax();
        $id = ($id == false)?Input::get('id'):'';
        $lokasimesin = $this->lokasimesin->find($id);
        //if (is_null($lokasimesin)){return \Redirect::to('masterdata/lokasimesin/index');}
        return View::make('lokasimesin::edit', compact('lokasimesin'));
    }
    
    public function postEdit(){
        cekAjax();
        $id = Input::get('id');
        $input = Input::all();
        $validation = \Validator::make($input, LokasimesinModel::$rules);
        
        if ($validation->passes()){
            $lokasimesin = $this->lokasimesin->find($id);
            echo ($lokasimesin->update($input))?4:"Gagal Disimpan";
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
                $this->lokasimesin->find($id)->delete();
            }
            echo 'Data berhasil dihapus';
        }
        else{
            echo ($this->lokasimesin->find($ids)->delete())?9:0;
        }
    }

}
