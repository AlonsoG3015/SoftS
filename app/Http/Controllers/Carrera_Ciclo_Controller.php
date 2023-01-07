<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Carrera;
use App\Models\Semestre;
use App\Models\Rubrica;
use App\Models\Carrera_Ciclo;
use App\Models\Estudiante;
use App\Models\HB_Curso;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class Carrera_Ciclo_Controller extends \App\Http\Controllers\Controller
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

        return view('academico')
            ->with('lstSemestre', $lstSemestre)
            ->with('lstCarreras', $lstCarreras);
    }
}
