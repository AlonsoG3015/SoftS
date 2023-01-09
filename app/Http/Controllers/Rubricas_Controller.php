<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Habilidad_Blanda;
use App\Models\HB_Curso;
use App\Models\Rubrica;
use Illuminate\Http\Request;

class Rubricas_Controller extends Controller
{

    public function retornarCrearRubrica($id_RC)
    {
        $rubrica = Rubrica::with('hb_cursos.habilidad_blanda')->where('id_RC', $id_RC)->first();
        return view('rubrica')
            ->with('Rubrica', $rubrica);
    }

    public function retornarRubricaxHabilidades($id_Rubric, $id_hb)
    {
        $rubrica = Rubrica::with('hb_cursos.habilidad_blanda')->where('id_RC', $id_Rubric)->first();
        $habilidad_blanda = Habilidad_Blanda::where('id_HB', $id_hb)->first();

        foreach ($rubrica->hb_cursos as $hbxcurso) {
            if ($hbxcurso->HB_id == $habilidad_blanda->id_HB) {
                return view('editarhabilidad')
                    ->with('Rubrica', $rubrica)
                    ->with('Habilidad', $habilidad_blanda);
            }
        }
    }

    public function guardarHabilidad(Request $request)
    {

        $rubrica_id = $request->input('rc_id');
        $id = $request->input('id');
        $elemental = $request->input('elemental');
        $aceptable = $request->input('aceptable');
        $destacado = $request->input('destacado');

        $rubrica = Rubrica::where('id_RC', $rubrica_id)->with('hb_cursos.habilidad_blanda')->first();

        foreach ($rubrica->hb_cursos as $habilidadxcurso) {
            if ($habilidadxcurso->habilidad_blanda->id_HB == $id) {
                $habilidad_seleccionada = $habilidadxcurso->habilidad_blanda;
            }
        }

        $habilidad_seleccionada->descripcion1 = $elemental;
        $habilidad_seleccionada->descripcion2 = $aceptable;
        $habilidad_seleccionada->descripcion3 = $destacado;
        $habilidad_seleccionada->save();

        $rubrica->save();

        $direccion = '/editar/rubrica/' . $rubrica_id;

        return redirect($direccion);
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

        $cursoxestudiantes = Curso::with('estudiantes')->where('id_Curso', 12)->get();
        foreach ($cursoxestudiantes as $curso) {
            $lstEstudiantes[] = $curso->estudiantes;
        }

        $id_estudiantes = array();
        foreach ($lstEstudiantes[0] as $estudiante) {
            $id_estudiantes[] = $estudiante->id_Estudiante;
        }

        $rubrica->estudiantes()->attach($id_estudiantes);


        $rubrica = "/curso/";

        $direccion = $rubrica . $id_Curso;

        return redirect($direccion)->with('message', 'Rúbrica creada correctamente');
    }

    public function retornarEstudiantesxRubrica($id_Curso, $id_RC)
    {
        $cursoxestudiantes = Curso::with('estudiantes')->where('id_Curso', $id_Curso)->first();
        $rubrica = Rubrica::where('id_RC', $id_RC)->first();

        return view('estudiantes_rubrica')
            ->with('Curso', $cursoxestudiantes)
            ->with('Rubrica', $rubrica);
    }

    public function evaluarRubricaEstudiante($id_RC, $id_Estudiante)
    {
        $estudiante = Estudiante::where('id_Estudiante', $id_Estudiante)->with('rubricas.hb_cursos.habilidad_blanda')->with('persona')->first();

        $rubrica = array();

        foreach ($estudiante->rubricas as $rubrica_estudiante) {
            if ($rubrica_estudiante->id_RC == $id_RC) {
                $rubrica[] = $rubrica_estudiante;
            }
        }

        return view('evaluar_rubrica')
            ->with('Estudiante', $estudiante)
            ->with('Rubrica', $rubrica);
    }

    public function retornarRubricasxEstudiante($id_Estudiante)
    {
        $Estudiantexrubricas = Estudiante::where('id_Estudiante', $id_Estudiante)->with('rubricas')->with('persona')->first();

        return view('rubrica_estudiante')->with('Estudiante', $Estudiantexrubricas);
    }
}
