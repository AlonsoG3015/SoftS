<?php

namespace App\Http\Controllers;

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

    public function retornarRubricaxHabilidades($id_Rubric, $id_hb_curso)
    {
        $rubrica = Rubrica::with('hb_cursos.habilidad_blanda')->where('id_RC', $id_Rubric)->first();

        foreach ($rubrica->hb_cursos as $hbxcurso) {
            if ($hbxcurso->id_hb_curso == $id_hb_curso) {
                return view('editarhabilidad')
                    ->with('Rubrica', $rubrica->id_RC)
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

        $rubrica = Rubrica::where('id_RC', $rubrica_id )->with('hb_cursos.habilidad_blanda')->first();

        foreach($rubrica as $rubrica){
            foreach($rubrica->hb_cursos as $habilidad){
                $habilidad->descripcion1 = $elemental;
                $habilidad->descripcion2 = $aceptable;
                $habilidad->descripcion3 = $destacado;
            }
        }

        return redirect()->back();
    }
}
