<?php

namespace App\Http\Controllers;

use App\Models\Carrera_Ciclo;
use App\Models\Curso;
use App\Models\Director;
use App\Models\Docente;
use App\Models\Linea;
use App\Models\Semestre;
use App\Models\Nivel_Rubrica;
use Illuminate\Http\Request;

class Curso_Controller extends Controller
{
    public function guardarCurso(Request $request)
    {
        $id_LineaInvestigacion = $request->input('id_Linea');
        $nombre = $request->input('nombre');
        $docente = $request->input('docente');

        $curso = new Curso;
        $curso->curso = $nombre;
        $curso->Linea_id = $id_LineaInvestigacion;
        $curso->docentes->id_Docente = $docente;
        $curso->save();

        return redirect()->back();
    }

    public function retornarCursos($semestre)
    {

        $semestre_select = Semestre::where('semestre', $semestre)->first();

        if (session()->has('rol') == 1) {
            $carrera_semestre_select = Carrera_Ciclo::with('semestre')->where('Semestre_id', '=', $semestre_select->id_Semestre)->where('Carrera_id', '=', 14)->first();
            $director_logged = Director::where('CC_id', $carrera_semestre_select->id_CC)->first();
            $carrera_ciclo = Carrera_Ciclo::where('Semestre_id', $semestre_select->id_Semestre)->where('id_CC', $director_logged->CC_id)->first();
        } else {
            $carrera_semestre_select = Carrera_Ciclo::with('semestre')->where('Semestre_id', '=', $semestre_select->id_Semestre)->where('Carrera_id', '=', 14)->first();
            $docente_logged = Docente::where('CC_id', $carrera_semestre_select->id_CC)->first();
            $carrera_ciclo = Carrera_Ciclo::where('Semestre_id', $semestre_select->id_Semestre)->where('id_CC', $docente_logged->CC_id)->first();
        }

        $lstLineas = Linea::where('CC_id', $carrera_ciclo->id_CC)->get();

        $lstDocentes = Docente::with('usuario.persona')->where('CC_id', $carrera_ciclo->id_CC)->get();

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

    public function retornarCurso($id_Curso)
    {
        $curso = Curso::with('linea')->where('id_Curso','=', $id_Curso)->first();
        $lstNiveles = Nivel_Rubrica::all();

        $lstDocentes = Docente::with('usuario.persona')->where('CC_id', $id_Curso )->get();

        return view('curso')
            ->with('lstDocentes', $lstDocentes)
            ->with('lstNiveles_Ru', $lstNiveles)
            ->with('Curso', $curso);
    }
}
