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
        
        return view('usuarios.lista')->with([
            'usuarios' => $usuarios,
            'msgVars' => NULL
        ]);
    }

    public function adicionarForm(){
        return view('usuarios.cadastrar');
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
            Usuario::create([
                'nome' => $request->input('nome'),
                'email' => $request->input('email')
            ]);
        }

        $msgVars = [
            'class'=> 'alert alert-success',
            'msg'=> 'Usuário criado com sucesso'
        ];

        return Redirect::to('lista')->with('msgVars', $msgVars);
    }

    public function edit($id){
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.editar', ['usuario' => $usuario]);
    }

    public function update($id, Request $request){

        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/lista')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $usuario = Usuario::findOrFail($id);
            $usuario->update([
                'nome' => $request->input('nome'),
                'email' => $request->input('email')
            ]);

            $msgVars = [
                'class'=> 'alert alert-success',
                'msg'=> 'Usuário deletado'
            ];

            return redirect('lista')->with('msgVars', $msgVars);
        };        
    }

    public function delete($id){
        
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        
        $msgVars = [
            'class'=> 'alert alert-success',
            'msg'=> 'Usuário deletado'
        ];

        return redirect('lista')->with('msgVars', $msgVars);
    }
}
