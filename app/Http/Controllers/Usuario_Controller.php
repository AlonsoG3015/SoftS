<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Persona;
use App\Models\Usuario;
use App\Models\Rol;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

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
            return redirect('/login');
        }
    }

    public function user_Role(Request $request)
    {
        $role_loged = $request->session()->get('role');
        return $role_loged;
    }

    public function retornarEstudiantesxRubricas()
    {
        $estudiantes = Estudiante::with('rubricas')->get();
        return view('estudiantes')
            ->with('Estudiantes', $estudiantes);
    }
}
