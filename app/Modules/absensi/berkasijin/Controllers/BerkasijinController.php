<?php namespace App\Modules\absensi\berkasijin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\absensi\berkasijin\Models\BerkasijinModel;
use Input,View, Request, Form, File;

/**
* Berkasijin Controller
* @var Berkasijin
* Generate from Custom Laravel 5.1 by Aa Gun. 
*
* Developed by Divisi Software Development - Dinustek. 
* Please write log when you do some modification, don't change anything unless you know what you do
* Semarang, 2016
*/

class BerkasijinController extends Controller {
    protected $berkasijin;

    public function __construct(BerkasijinModel $berkasijin){
        $this->berkasijin = $berkasijin;
    }

    public function getIndex(){
        cekAjax();
        return View::make('berkasijin::index');
    }

    public function getDaftar(){
        cekAjax();
        $input = Input::all();
        \Session::put('id_unit',$input['id_unit']);
        \Session::put('bulan',$input['bulan']);
        \Session::put('tahun',$input['tahun']);
        return View::make('berkasijin::table',$input);
    }

    public function getCreate(){
        cekAjax();
        return View::make('berkasijin::create');
    }

    public function postCreate(){
        cekAjax();
        $input = Input::all();
        $input['tanggal_mulai'] = date('Y-m-d',strtotime($input['tanggal_mulai']));
        $input['tanggal_selesai'] = date('Y-m-d',strtotime($input['tanggal_selesai']));
        if (Input::hasFile('file')){
            $mode = 0777;
            $recursive = false;
            $f = Input::file('file');
            if($f != ''){
                $tipefile = $f->getClientOriginalExtension();
                if(strtolower($tipefile) != 'pdf' && strtolower($tipefile) != 'doc' && strtolower($tipefile) != 'docx'){
                    die('Format file yang diijinkan hanya *.pdf, *.doc, atau *.docx');                    
                }
                $destinationPath = base_path().'/packages/upload/berkas/ijin/';
                $destinationPath = str_replace("\\", '/', $destinationPath);
                if(!is_dir($destinationPath)){
                    mkdir($destinationPath, $mode, $recursive);
                }
                $filename = \Session::get('user_id').'-'.date('d:m:Y h:i:s').' - '.str_replace(' ', '-', $f->getClientOriginalName());
                @unlink($destinationPath.'/'.$filename);
                $f->move($destinationPath, $filename);
                $input['file'] = $filename;                    
            } else {
                die('Harap Input File');
            }
        } else {
            die('Harap Input File');
        }

        $validation = \Validator::make($input, BerkasijinModel::$rules);
        if ($validation->passes()){
            $input['user_id'] = \Session::get('user_id');
            $input['role_id'] = \Session::get('role_id');
            echo ($this->berkasijin->create($input))?1:"Gagal Disimpan";
        }
        else{
            echo 'Input tidak valid';
        }
    }



    //{controller-show}

        public function getEdit($id = false){
        cekAjax();
        $id = ($id == false)?Input::get('id'):'';
        $berkasijin = $this->berkasijin->find($id);
        //if (is_null($berkasijin)){return \Redirect::to('absensi/berkasijin/index');}
        return View::make('berkasijin::edit', compact('berkasijin'));
    }
    
    public function postEdit(){
        cekAjax();
        $id = Input::get('id');
        $ijin = \BerkasijinModel::where('id','=',$id)->first();
        $input = Input::all();

        if (Input::hasFile('file')){
            $mode = 0777;
            $recursive = false;
            $f = Input::file('file');
            if($f != ''){
                $tipefile = $f->getClientOriginalExtension();
                if(strtolower($tipefile) != 'pdf' && strtolower($tipefile) != 'doc' && strtolower($tipefile) != 'docx'){
                    die('Format file yang diijinkan hanya *.pdf, *.doc, atau *.docx');                    
                }
                $destinationPath = base_path().'/packages/upload/berkas/ijin/';
                $destinationPath = str_replace("\\", '/', $destinationPath);
                if(!is_dir($destinationPath)){
                    mkdir($destinationPath, $mode, $recursive);
                }
                $filename = \Session::get('user_id').'-'.date('d:m:Y h:i:s').' - '.str_replace(' ', '-', $f->getClientOriginalName());
                @unlink($destinationPath.'/'.$filename);
                $f->move($destinationPath, $filename);
                $input['file'] = $filename;                    
            }
        } else {
            $input['file'] = $ijin->file;
        }

        $input['tanggal_mulai'] = date('Y-m-d',strtotime($input['tanggal_mulai']));
        $input['tanggal_selesai'] = date('Y-m-d',strtotime($input['tanggal_selesai']));
        $validation = \Validator::make($input, BerkasijinModel::$rules);
        
        if ($validation->passes()){
            $berkasijin = $this->berkasijin->find($id);
            echo ($berkasijin->update($input))?4:"Gagal Disimpan";
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
                $this->berkasijin->find($id)->delete();
            }
            echo 'Data berhasil dihapus';
        }
        else{
            echo ($this->berkasijin->find($ids)->delete())?9:0;
        }
    }

}
