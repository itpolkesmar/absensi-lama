<?php namespace App\Modules\masterdata\jamkerja\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\masterdata\jamkerja\Models\JamkerjaModel;
use Input,View, Request, Form, File;

/**
* Jamkerja Controller
* @var Jamkerja
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Divisi Software Development - Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class JamkerjaController extends Controller {
    protected $jamkerja;

    public function __construct(JamkerjaModel $jamkerja){
        $this->jamkerja = $jamkerja;
    }

        public function getIndex(){
        cekAjax();
        if (Input::has('search')) {
            if(strlen(Input::has('search')) > 0){
                $jamkerjas = $this->jamkerja
                			->orWhere('tahun', 'LIKE', '%'.Input::get('search').'%')
			->orWhere('hari', 'LIKE', '%'.Input::get('search').'%')
			->orWhere('jam_datang', 'LIKE', '%'.Input::get('search').'%')
			->orWhere('jam_pulang', 'LIKE', '%'.Input::get('search').'%')

                ->paginate($_ENV['configurations']['list-limit']);
            }else{
                $jamkerjas = $this->jamkerja->all();
            }
        }else{
            $jamkerjas = $this->jamkerja->all();
        }
        return View::make('jamkerja::index', compact('jamkerjas'));
    }


        public function getCreate(){
        cekAjax();
        return View::make('jamkerja::create');
    }

    public function postCreate(){
        cekAjax();
        $input = Input::all();
        $validation = \Validator::make($input, JamkerjaModel::$rules);
        if ($validation->passes()){
            $input['user_id'] = \Session::get('user_id');
            $input['role_id'] = \Session::get('role_id');
            echo ($this->jamkerja->create($input))?1:"Gagal Disimpan";
        }
        else{
            echo 'Input tidak valid';
        }
    }



    //{controller-show}

        public function getEdit($id = false){
        cekAjax();
        $id = ($id == false)?Input::get('id'):'';
        $jamkerja = $this->jamkerja->find($id);
        //if (is_null($jamkerja)){return \Redirect::to('masterdata/jamkerja/index');}
        return View::make('jamkerja::edit', compact('jamkerja'));
    }
    
    public function postEdit(){
        cekAjax();
        $id = Input::get('id');
        $input = Input::all();
        $validation = \Validator::make($input, JamkerjaModel::$rules);
        
        if ($validation->passes()){
            $jamkerja = $this->jamkerja->find($id);
            echo ($jamkerja->update($input))?4:"Gagal Disimpan";
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
                $this->jamkerja->find($id)->delete();
            }
            echo 'Data berhasil dihapus';
        }
        else{
            echo ($this->jamkerja->find($ids)->delete())?9:0;
        }
    }

}
