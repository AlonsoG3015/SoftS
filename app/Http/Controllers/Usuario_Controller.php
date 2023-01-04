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
        $bd_user_persona = Usuario::with('persona')->whereHas('persona', function ($query) use ($id_input) {
            $query->where('login', $id_input);
        })->first();

        if ($bd_user_persona->login == $validated['id'] && $bd_user_persona->password == $validated['password']) {
            session()->put('id', strval($bd_user_persona->id_User));
            session()->put('codigo', strval($bd_user_persona->login));
            session()->put('nombre', strval($bd_user_persona->persona->nombres));
            session()->put('rol', strval($bd_user_persona->Role_id));
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


    public function register_User(Request $request)
    {
        $validated = $request->validate([
            'role' => 'required|numeric',
            'nombres' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'id' => 'required|numeric|max:9',
            'email' => 'required|max:100',
        ]);

        $role = $validated['role'];
        $nombres = $validated['nombres'];
        $apellidos = $validated['apellidos'];
        $id = $validated['id'];
        $email = $validated['email'];

        if ($role === 0 ) {
            $persona = new Persona;
            $persona->nombres = $nombres;
            $persona->apellidos = $apellidos;
            $persona->email = $email;
            $persona->save();
            
            $estudiante = new Estudiante;
            $estudiante->codigo = $id;
            $estudiante->Persona_id = $persona->id_Person;
            $estudiante->save();
        }

        return view('registroUsuario')->with(json_encode($persona))->with(json_encode($estudiante));
    }
}
