<?php

use App\Http\Controllers\Carrera_Ciclo_Controller;
use App\Http\Controllers\Curso_Controller;
use App\Http\Controllers\Linea_Controller;
use App\Http\Controllers\Usuario_Controller;
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


    Route::get('/curso/{id_Curso}', [Curso_Controller::class, 'retornarCurso']);

    Route::get('/curso', function () {
        return view('curso');
    });


    Route::post('/curso/guardar', [Carrera_Ciclo_Controller::class, 'guardarCiclo']);

    Route::get('/lineas', [Linea_Controller::class, 'retornarLinea']);

    Route::get('/mantenimiento_usuarios', function () {
        return view('mantenimiento_usuarios');
    });

    Route::get('/registro_usuario', function () {
        return view('registroUsuario');
    });

    Route::post('/registro_usuario/guardar', [Usuario_Controller::class, 'register_User']);

    Route::get('/ciclo/{id_Semestre}', [Curso_Controller::class, 'retornarCursos']);

    Route::post('/curso/guardar', [Curso_Controller::class, 'guardarCurso']);

    Route::get('/usuarios', function () {
        return view('usuarios');
    });
});
