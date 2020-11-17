@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Lista de usuários</h1>

                    <a href="{{ url('cadastrar') }}">Adicionar novo usuário</a>
                  
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Deletar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $u)
                                <tr>
                                    <th scope="row">{{$u->nome}}</th>
                                    <td>{{$u->email}}</td>
                                    <td>
                                        <a href="atualizar/{{$u->id}}">
                                            <button type="button" class="btn btn-success">
                                            
                                                <i class="fas fa-edit"></i>
                                            
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="deletar/{{ $u->id }}" method="post"> 
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-danger">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach   
                        </tbody>
                    </table>
                    
                    @if($msgVars)
                        <div class="{{ $msgVars->class }}" role="alert">
                            {{ $msgVars->msg }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
