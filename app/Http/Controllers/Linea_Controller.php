<?php

namespace App\Http\Controllers;

use App\Models\Linea;
use App\Models\Semestre;
use App\Models\Carrera_Ciclo;
use App\Models\Carrera;


use Illuminate\Http\Request;

class Linea_Controller extends Controller
{

    public function guardarLinea(Request $request)
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

    public function retornarLinea()
    {
        $lstLineas = Linea::with('carrera_ciclo.semestre')->get();
        $lst_Carreras_Ing = Carrera_Ciclo::with('semestre')->where('Carrera_id','=', 14)->get();
        $carrera_Ing = Carrera::where('id_Carr', 14)->first();


        return view('lineasInves')
            ->with('lstLineas', $lstLineas)
            ->with('carrera_Ing', $carrera_Ing)
            ->with('lst_Carreras_Ing', $lst_Carreras_Ing);
    }
}
