<?php namespace App\Modules\masterdata\shift\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\masterdata\shift\Models\ShiftModel;
use Input,View, Request, Form, File;

/**
* Shift Controller
* @var Shift
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Divisi Software Development - Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class ShiftController extends Controller {
    protected $shift;

    public function __construct(ShiftModel $shift){
        $this->shift = $shift;
    }

        public function getIndex(){
        cekAjax();
        if (Input::has('search')) {
            if(strlen(Input::has('search')) > 0){
                $shifts = $this->shift
                			->orWhere('tahun', 'LIKE', '%'.Input::get('search').'%')
			->orWhere('nama', 'LIKE', '%'.Input::get('search').'%')
			->orWhere('jam_datang', 'LIKE', '%'.Input::get('search').'%')
			->orWhere('jam_pulang', 'LIKE', '%'.Input::get('search').'%')

                ->paginate($_ENV['configurations']['list-limit']);
            }else{
                $shifts = $this->shift->all();
            }
        }else{
            $shifts = $this->shift->all();
        }
        return View::make('shift::index', compact('shifts'));
    }


        public function getCreate(){
        cekAjax();
        return View::make('shift::create');
    }

    public function postCreate(){
        cekAjax();
        $input = Input::all();
        $validation = \Validator::make($input, ShiftModel::$rules);
        if ($validation->passes()){
            $input['user_id'] = \Session::get('user_id');
            $input['role_id'] = \Session::get('role_id');
            echo ($this->shift->create($input))?1:"Gagal Disimpan";
        }
        else{
            echo 'Input tidak valid';
        }
    }



    //{controller-show}

        public function getEdit($id = false){
        cekAjax();
        $id = ($id == false)?Input::get('id'):'';
        $shift = $this->shift->find($id);
        //if (is_null($shift)){return \Redirect::to('masterdata/shift/index');}
        return View::make('shift::edit', compact('shift'));
    }
    
    public function postEdit(){
        cekAjax();
        $id = Input::get('id');
        $input = Input::all();
        $validation = \Validator::make($input, ShiftModel::$rules);
        
        if ($validation->passes()){
            $shift = $this->shift->find($id);
            echo ($shift->update($input))?4:"Gagal Disimpan";
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
                $this->shift->find($id)->delete();
            }
            echo 'Data berhasil dihapus';
        }
        else{
            echo ($this->shift->find($ids)->delete())?9:0;
        }
    }

}
