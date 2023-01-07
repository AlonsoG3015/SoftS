<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Carrera;
use App\Models\Semestre;
use App\Models\Rubrica;
use App\Models\Carrera_Ciclo;
use App\Models\Curso;
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

        $rubricas = Rubrica::with('hb_cursos')->get();

        $cursoxestudiantes = Curso::with('estudiantes')->where('id_Curso',12)->get();


        foreach($cursoxestudiantes as $curso){
            $lstEstudiantes[] = $curso->estudiantes;
        }

        $id_estudiantes = array();

        foreach($lstEstudiantes[0] as $estudiante){
            $id_estudiantes[] = $estudiante->id_Estudiante;
        }

        return $rubricas;

        // return $lstEstudiantes[0];
        // return view('academico')
        //     ->with('lstSemestre', $lstSemestre)
        //     ->with('lstCarreras', $lstCarreras);
    }
}
