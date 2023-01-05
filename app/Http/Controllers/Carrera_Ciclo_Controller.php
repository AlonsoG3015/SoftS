<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Semestre;
use App\Models\Curso;
use App\Models\Docente;

use App\Models\Carrera_Ciclo;
use Illuminate\Http\Request;

class Carrera_Ciclo_Controller extends Controller
{

    public function guardarCiclo(Request $request)
    {

        $id_Semestre = $request->input('id_Semestre');
        $id_Escuela = $request->input('id_Escuela');

        $carrera_ciclo = new Carrera_Ciclo();

        $semestre = new Semestre();
        $semestre->semestre = $id_Semestre;
        $carrera_ciclo->Semestre_id = $id_Semestre;
        $carrera_ciclo->Carrera_id = $id_Escuela;
        $semestre->save();
        $carrera_ciclo->save();

        return redirect('/', 301);
    }

    public function retornarCC()
    {
        $lstSemestre = Semestre::all();
        $lstCarreras = Carrera::where('id_Carr', 14)->first();

        // $lstCursosxDocente = Docente::with('cursos')->where('CC_id',7)->where('Usuario_id', session()->get('id'))->get();

        // return session()->get('rol');
        return view('academico')
            ->with('lstSemestre', $lstSemestre)
            ->with('lstCarreras', $lstCarreras);
    }
}
