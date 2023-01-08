<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Carrera;
use App\Models\Semestre;
use App\Models\Rubrica;
use App\Models\Carrera_Ciclo;
use App\Models\Nivel_Rubrica;
use App\Models\HB_Curso;
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

        // return $carrera_ciclo;

        return redirect('/', 301)->with('message', '¡Ciclo Creado Correctamente!');
    }

    public function retornarCC()
    {
        $lstSemestre = Semestre::all();
        $lstCarreras = Carrera::where('id_Carr', 14)->first();

        $rubrica = Rubrica::where('id_RC', 21)->with('hb_cursos.habilidad_blanda')->first();

        // $docente = Docente::with('usuario.persona')->where('id_Docente', $id_Docente)->first();
        // $lstEstudiantes = Curso::with('estudiantes.persona')->where('id_Curso', $curso->id_Curso)->first();
        // $lstHabilidades = Curso::with('habilidad_curso')->where('id_Curso', $curso->id_Curso)->first();
        // $curso = Curso::where('id_Curso', $id_Curso)->first();
        // $rubricas = Rubrica::with('hb_cursos')->get();

        // return view('curso')
        //     ->with('Docente', $docente)
        //     ->with('Rubrica', $rubricas)
        //     ->with('lstHabilidades', $lstHabilidades)
        //     ->with('lstEstudiantes', $lstEstudiantes)
        //     ->with('lstNiveles_Ru', $lstNiveles)
        //     ->with('Curso', $curso);

        // return $rubrica;
        return view('academico')
            ->with('lstSemestre', $lstSemestre)
            ->with('lstCarreras', $lstCarreras);
    }
}
