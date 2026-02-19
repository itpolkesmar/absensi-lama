<?php namespace App\Modules\absensi\absensikhusus\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\absensi\absensikhusus\Models\AbsensikhususModel;
use Input,View, Request, Form, File;

/**
* Absensikhusus Controller
* @var Absensikhusus
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Divisi Software Development - Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class AbsensikhususController extends Controller {
    protected $absensikhusus;

    public function __construct(AbsensikhususModel $absensikhusus){
        $this->absensikhusus = $absensikhusus;
    }

    public function getIndex(){
        cekAjax();
        return View::make('absensikhusus::index');
    }

    public function getDaftar(){
        cekAjax();
        $input = Input::all();
        return View::make('absensikhusus::table',$input);
    }

    public function getCreate(){
        cekAjax();
        return View::make('absensikhusus::create');
    }

    public function postCreate(){
        cekAjax();
        $input = Input::all();
        $validation = \Validator::make($input, AbsensikhususModel::$rules);
        if ($validation->passes()){
            $input['user_id'] = \Session::get('user_id');
            $input['role_id'] = \Session::get('role_id');
            echo ($this->absensikhusus->create($input))?1:"Gagal Disimpan";
        }
        else{
            echo 'Input tidak valid';
        }
    }



    //{controller-show}

        public function getEdit($id = false){
        cekAjax();
        $id = ($id == false)?Input::get('id'):'';
        $absensikhusus = $this->absensikhusus->find($id);
        //if (is_null($absensikhusus)){return \Redirect::to('absensi/absensikhusus/index');}
        return View::make('absensikhusus::edit', compact('absensikhusus'));
    }
    
    public function postEdit(){
        cekAjax();
        $id = Input::get('id');
        $input = Input::all();
        $validation = \Validator::make($input, AbsensikhususModel::$rules);
        
        if ($validation->passes()){
            $absensikhusus = $this->absensikhusus->find($id);
            echo ($absensikhusus->update($input))?4:"Gagal Disimpan";
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
                $this->absensikhusus->find($id)->delete();
            }
            echo 'Data berhasil dihapus';
        }
        else{
            echo ($this->absensikhusus->find($ids)->delete())?9:0;
        }
    }

}
