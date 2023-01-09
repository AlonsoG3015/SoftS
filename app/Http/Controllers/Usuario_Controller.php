<?php

namespace App\Http\Controllers;

use App\Models\Director;
use App\Models\Estudiante;
use App\Models\Docente;
use App\Models\Usuario;
use App\Models\Persona;

use Illuminate\Http\Request;

class Usuario_Controller extends Controller
{

    public function user_Login(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|numeric|min:0|max:9',
            'password' => 'required|max:100',
        ]);

        $id_input = $validated['id'];
        $usuario_bd = Usuario::with('persona')->whereHas('persona', function ($query) use ($id_input) {
            $query->where('login', $id_input);
        })->first();

        if ($usuario_bd->login == $validated['id'] && $usuario_bd->password == $validated['password']) {
            session()->put('id', strval($usuario_bd->id_User));
            session()->put('codigo', strval($usuario_bd->login));
            session()->put('nombre', strval($usuario_bd->persona->nombres));
            session()->put('rol', strval($usuario_bd->Role_id));
            session()->save();
            return redirect('/');
        } else {
            return redirect('/login', 301);
        }
    }

    public function user_Role(Request $request)
    {
        $role_loged = $request->session()->get('role');
        return $role_loged;
    }

    public function retornarUser(Request $request)
    {
        $id = $request->session()->get('id');
        $role_id = $request->session()->get('role');
        if ($role_id == 1) {
            $director = Director::with('usuario.persona')->with('carrera_ciclo')->where('Usuario_id', $id)->first();
            return view('perfil')->with('Usuario', $director);
        } else {

            $usuario = Docente::with('usuario.persona')->with('cursos.linea.carrera_ciclo.semestre')->where('Usuario_id', $id)->first();
            return view('perfil')->with('Usuario', $usuario);
        }
    }

    public function retornarEstudiantesxRubricas()
    {
        $estudiantes = Estudiante::with('rubricas')->get();
        return view('estudiantes')
            ->with('Estudiantes', $estudiantes);
    }

    public function guardarPerfil(Request $request)
    {
        $codigo_input = $request->input('id');
        $nombres_input = $request->input('nombres');
        $apellidos_input = $request->input('apellidos');
        $email_input = $request->input('email');

        $usuario = Usuario::with('persona')->where('login', $codigo_input)->first();
        $persona = Persona::where('id_Person', $usuario->Persona_id)->first();

        $persona->nombres = $nombres_input;
        $persona->apellidos = $apellidos_input;
        $persona->email = $email_input;
        $persona->save();

        return redirect('/perfil', 301)->with('message', '¡Perfil Actualizado Correctamente!');
    }
}
