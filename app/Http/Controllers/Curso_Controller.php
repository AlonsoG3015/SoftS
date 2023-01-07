<?php

namespace App\Http\Controllers;

use App\Models\Carrera_Ciclo;
use App\Models\Curso;
use App\Models\Director;
use App\Models\Docente;
use App\Models\HB_Curso;
use App\Models\Linea;
use App\Models\Semestre;
use App\Models\Nivel_Rubrica;
use App\Models\Rubrica;
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

    public function retornarCurso($id_Curso)
    {
        $curso = Curso::with('linea')->where('id_Curso', '=', $id_Curso)->first();
        $lstNiveles = Nivel_Rubrica::all();

        $lstCursos = Curso::with('docentes')->where('id_Curso', $id_Curso)->first();

        foreach ($lstCursos->docentes as $docente) {
            $id_Docente = $docente->id_Docente;
        }

        $docente = Docente::with('usuario.persona')->where('id_Docente', $id_Docente)->first();
        $lstEstudiantes = Curso::with('estudiantes.persona')->where('id_Curso', $curso->id_Curso)->first();
        $lstHabilidades = Curso::with('habilidad_curso')->where('id_Curso', $curso->id_Curso)->first();
        $curso = Curso::where('id_Curso', $id_Curso)->first();
        $rubricas = Rubrica::with('hb_cursos')->get();

        return view('curso')
            ->with('Docente', $docente)
            ->with('Rubrica', $rubricas)
            ->with('lstHabilidades', $lstHabilidades)
            ->with('lstEstudiantes', $lstEstudiantes)
            ->with('lstNiveles_Ru', $lstNiveles)
            ->with('Curso', $curso);
    }

    public function guardarRubrica(Request $request)
    {

        $nombre_rubrica = $request->input('nombre_rubrica');
        $id_Curso = $request->input('id_Curso');
        $nv_rubrica = $request->input('nv_rubrica');

        $rubrica = new Rubrica;
        $rubrica->nombre_rub = $nombre_rubrica;
        $rubrica->NR_id = $nv_rubrica;

        $rubrica->save();

        $lstHabilidades = HB_Curso::where('Curso_id', $id_Curso)->get();

        $lstidHB = array();

        foreach ($lstHabilidades as $habilidad) {
            $lstidHB[] = $habilidad->id_hb_curso;
        }

        $rubrica->hb_cursos()->attach($lstidHB);

        return redirect()->back();
    }
}
