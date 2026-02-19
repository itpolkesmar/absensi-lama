<?php namespace App\Modules\masterdata\unit\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\masterdata\unit\Models\UnitModel;
use Input,View, Request, Form, File;

/**
* Unit Controller
* @var Unit
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Divisi Software Development - Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class UnitController extends Controller {
    protected $unit;

    public function __construct(UnitModel $unit){
        $this->unit = $unit;
    }

        public function getIndex(){
        cekAjax();
        if (Input::has('search')) {
            if(strlen(Input::has('search')) > 0){
                $units = $this->unit
                			->orWhere('nama', 'LIKE', '%'.Input::get('search').'%')
                            ->paginate($_ENV['configurations']['list-limit']);
            }else{
                $units = $this->unit->all();
            }
        }else{
            $units = $this->unit->all();
        }
        return View::make('unit::index', compact('units'));
    }


        public function getCreate(){
        cekAjax();
        return View::make('unit::create');
    }

    public function postCreate(){
        cekAjax();
        $input = Input::all();
        $validation = \Validator::make($input, UnitModel::$rules);
        if ($validation->passes()){
            $input['user_id'] = \Session::get('user_id');
            $input['role_id'] = \Session::get('role_id');
            echo ($this->unit->create($input))?1:"Gagal Disimpan";
        }
        else{
            echo 'Input tidak valid';
        }
    }



    //{controller-show}

        public function getEdit($id = false){
        cekAjax();
        $id = ($id == false)?Input::get('id'):'';
        $unit = $this->unit->find($id);
        //if (is_null($unit)){return \Redirect::to('masterdata/unit/index');}
        return View::make('unit::edit', compact('unit'));
    }
    
    public function postEdit(){
        cekAjax();
        $id = Input::get('id');
        $input = Input::all();
        $validation = \Validator::make($input, UnitModel::$rules);
        
        if ($validation->passes()){
            $unit = $this->unit->find($id);
            echo ($unit->update($input))?4:"Gagal Disimpan";
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
                $this->unit->find($id)->delete();
            }
            echo 'Data berhasil dihapus';
        }
        else{
            echo ($this->unit->find($ids)->delete())?9:0;
        }
    }

}
