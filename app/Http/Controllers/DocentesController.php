<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente;
use App\Imports\DocentesImport;
use Maatwebsite\Excel\Facades\Excel;

class DocentesController extends Controller
{
    public function index() {
        $docentes = Docente::all();
        return view('docentes.index',['docentes'=>$docentes]);
    }

    public function importExcel(Request $request){

      
        $request->validate([
            'file' => ['required','mimes:xls,xlsx'],
        ]);
        try {
            $file=$request->file('file');
            Excel::import(new DocentesImport, $file);
            return back()->with('mensaje','El listado ha sido registrado correctamente!!');
        } catch(\Exception $e){
            $men="Error: Registro Estudiante no es válido " . $e;
            return back()->with('mensaje', $men);
        }
    }
}
