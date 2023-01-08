<?php

use App\Http\Controllers\Carrera_Ciclo_Controller;
use App\Http\Controllers\Curso_Controller;
use App\Http\Controllers\Linea_Controller;
use App\Http\Controllers\Usuario_Controller;
use App\Http\Controllers\Rubricas_Controller;
use App\Models\Rubrica;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['validatedUser'])->group(function () {
    Route::get('/login', function () {
        return view('login');
    });
});

Route::post('/login', [Usuario_Controller::class, 'user_Login']);

Route::middleware(['validatedLogin'])->group(function () {
    
    Route::get('/', [Carrera_Ciclo_Controller::class, 'retornarCC']);

    Route::get('/perfil', [Usuario_Controller::class, 'retornarUser']);

    Route::post('/perfil/guardar', [Usuario_Controller::class, 'guardarPerfil']);

    Route::get('/ciclo/{id_Semestre}', [Curso_Controller::class, 'retornarCursos']);

    Route::get('/curso/{id_Curso}', [Curso_Controller::class, 'retornarCurso']);

    Route::post('/curso/guardar', [Curso_Controller::class, 'guardarCurso']);

    Route::get('/lineas', [Linea_Controller::class, 'retornarLinea']);
    
    Route::get('/crear/rubrica/{id_RC}', [Rubricas_Controller::class, 'retornarCrearRubrica']);
    
    Route::get('/crear/rubrica/habilidad/{id_RC}/{id_HB}', [Rubricas_Controller::class, 'retornarRubricaxHabilidades']);
    
    Route::post('/crear/rubrica/habilidad/guardar', [Rubricas_Controller::class, 'guardarHabilidad']);
    
    Route::post('/rubrica/guardar', [Curso_Controller::class, 'guardarRubrica']);
    
    Route::get('/estudiantes', [Usuario_Controller::class, 'retornarEstudiantesxRubricas']);
    
    Route::post('/registro_usuario/guardar', [Usuario_Controller::class, 'register_User']);

    Route::get('/mantenimiento_usuarios', function () {
        return view('mantenimiento_usuarios');
    });

    Route::get('/registro_usuario', function () {
        return view('registroUsuario');
    });

});
