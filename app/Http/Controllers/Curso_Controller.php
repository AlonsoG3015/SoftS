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
        $id_Docente = $request->get('docente');

        $curso = new Curso;
        $curso->curso = $nombre;
        $curso->Linea_id = $id_LineaInvestigacion;
        $curso->save();
        $curso->docentes()->attach($id_Docente);

        return redirect()->back()->with('message', '¡Curso creado correctamente!');
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
}
