<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Carrera;
use App\Models\Semestre;
use App\Models\Director;
use App\Models\Carrera_Ciclo;
use App\Models\Linea;
use App\Models\Docente;
use App\Models\Curso;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class Carrera_Ciclo_Controller extends \App\Http\Controllers\Controller
{

    public function guardarCiclo(Request $request)
    {

        $semestre = $request->input('semestre');
        $id_Carrera = $request->input('id_Escuela');

        $carrera_ciclo = new Carrera_Ciclo;
        $nuevo_semestre = new Semestre;

        $nuevo_semestre->semestre = $semestre;
        $nuevo_semestre->save();

        $carrera_ciclo->Semestre_id = $nuevo_semestre->id_Semestre;
        $carrera_ciclo->Carrera_id = $id_Carrera;
        $carrera_ciclo->save();

        return redirect('/', 301)->with('message', '¡Ciclo Creado Correctamente!');
    }

    public function retornarCursos($semestre)
    {

        $semestre_select = Semestre::where('semestre', $semestre)->first();

        if (session()->get('rol') == 1) {
            $carrera_semestre_select = Carrera_Ciclo::where('Semestre_id', '=', $semestre_select->id_Semestre)->where('Carrera_id', '=', 14)->first();
            $director_logged = Director::where('CC_id', $carrera_semestre_select->id_CC)->first();
            $carrera_ciclo = Carrera_Ciclo::where('Semestre_id', $semestre_select->id_Semestre)->where('id_CC', $director_logged->CC_id)->first();
            $lstLineas = Linea::where('CC_id', $carrera_ciclo->id_CC)->get();
            $lstDocentes = Docente::with('usuario.persona')->get();
            $lstCursos = Curso::with('linea')->whereHas('linea', function ($query) use ($carrera_ciclo) {
                $query->where('CC_id', $carrera_ciclo->id_CC);
            })->get();
            $lstSemestre = Semestre::all();
            return view('ciclo')
                ->with('lstSemestre', $lstSemestre)
                ->with('semestre_select', $semestre_select)
                ->with('lstDocentes', $lstDocentes)
                ->with('lstCursos', $lstCursos)
                ->with('lstLineas', $lstLineas)
                ->with('semestre', $semestre);
        }
        if (session()->get('rol') == 2) {
            $lstCursosxdocente = array();
            $prueba = Docente::with('cursos.linea.carrera_ciclo')->where('Usuario_id', session()->get('id'))->first();

            foreach ($prueba->cursos as $curso) {
                if ($curso->linea->carrera_ciclo->Semestre_id == $semestre_select->id_Semestre) {
                    $lstCursosxdocente[] = $curso;
                }
            }

            $carrera_ciclo = Carrera_Ciclo::where('Semestre_id', $semestre_select->id_Semestre)->first();
            $lstSemestre = Semestre::all();

            return view('ciclo')
                ->with('lstSemestre', $lstSemestre)
                ->with('semestre_select', $semestre_select)
                ->with('lstCursos', $lstCursosxdocente)
                ->with('semestre', $semestre);
        }
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
