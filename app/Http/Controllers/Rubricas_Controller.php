<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\HB_Curso;
use App\Models\Rubrica;
use Illuminate\Http\Request;

class Rubricas_Controller extends Controller
{

    public function retornarCrearRubrica($id_RC)
    {
        $rubrica = Rubrica::with('hb_cursos.habilidad_blanda')->where('id_RC', $id_RC)->first();
        return view('rubrica')
            ->with('Rubrica', $rubrica)
            ->with('message', '¡Rúbrica ' . $rubrica->nombre_rub . ' creada correctamente!');
    }

    public function retornarRubricaxHabilidades($id_Rubric, $id_hb_curso)
    {
        $rubrica = Rubrica::with('hb_cursos.habilidad_blanda')->where('id_RC', $id_Rubric)->first();

        foreach ($rubrica->hb_cursos as $hbxcurso) {
            if ($hbxcurso->id_hb_curso) {
                return view('editarhabilidad')
                    ->with('Rubrica', $rubrica)
                    ->with('Habilidad', $hbxcurso->habilidad_blanda);
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

        // foreach ($rubrica->hb_cursos as $habilidadxcurso) {
        //     $habilidadxcurso->habilidad_blanda->descripcion1 = $elemental;
        //     $habilidadxcurso->habilidad_blanda->descripcion2 = $aceptable;
        //     $habilidadxcurso->habilidad_blanda->descripcion3 = $destacado;
        //     $habilidadxcurso->save();
        // }
        // $rubrica->save();

        // return view('curso')->with("rubrica", $rubrica_id);

        return $rubrica;
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

        $id_Rubrica = $rubrica->id_RC;

        $rubrica = "/crear/rubrica/";

        $direccion = $rubrica . $id_Rubrica;

        return redirect($direccion)
            ->with('Rubrica', $rubrica)
            ->with('Curso', $id_Curso);
    }
}
