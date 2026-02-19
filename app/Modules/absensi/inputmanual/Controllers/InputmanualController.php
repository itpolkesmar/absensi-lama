<?php namespace App\Modules\absensi\inputmanual\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\absensi\inputmanual\Models\InputmanualModel;
use Input,View, Request, Form, File;

/**
* Inputmanual Controller
* @var Inputmanual
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Divisi Software Development - Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class InputmanualController extends Controller {
    protected $inputmanual;

    public function __construct(InputmanualModel $inputmanual){
        $this->inputmanual = $inputmanual;
    }

    public function getIndex(){
        cekAjax();
        return View::make('inputmanual::index');
    }

    public function getDaftar(){
        cekAjax();
        $input = Input::all();
        $input['tanggal'] = date('Y-m-d',strtotime($input['tanggal']));
        return View::make('inputmanual::table',$input);
    }

    public function getCreate(){
        cekAjax();
        return View::make('inputmanual::create');
    }

    public function postCreate(){
        cekAjax();
        $input = Input::all();
        $validation = \Validator::make($input, InputmanualModel::$rules);
        if ($validation->passes()){
            $input['user_id'] = \Session::get('user_id');
            $input['role_id'] = \Session::get('role_id');
            echo ($this->inputmanual->create($input))?1:"Gagal Disimpan";
        }
        else{
            echo 'Input tidak valid';
        }
    }



    //{controller-show}

        public function getEdit($id = false){
        cekAjax();
        $id = ($id == false)?Input::get('id'):'';
        $inputmanual = $this->inputmanual->find($id);
        //if (is_null($inputmanual)){return \Redirect::to('absensi/inputmanual/index');}
        return View::make('inputmanual::edit', compact('inputmanual'));
    }
    
    public function postEdit(){
        cekAjax();
        $id = Input::get('id');
        $input = Input::all();
        $validation = \Validator::make($input, InputmanualModel::$rules);
        
        if ($validation->passes()){
            $inputmanual = $this->inputmanual->find($id);
            echo ($inputmanual->update($input))?4:"Gagal Disimpan";
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
                $this->inputmanual->find($id)->delete();
            }
            echo 'Data berhasil dihapus';
        }
        else{
            echo ($this->inputmanual->find($ids)->delete())?9:0;
        }
    }

}
