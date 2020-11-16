<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    public function index(){
        $usuarios = Usuario::all();

        return view('usuarios.lista')->with('usuarios', $usuarios);
    }

    public function adicionarForm(){
        return view('usuario.cadastrar');
    }

    public function store(Request $request){
        
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/lista')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            Usuario::create([$request->all()]);
        }

        return Redirect::to('home');
    }

    public function edit(){
        return;
    }
}
