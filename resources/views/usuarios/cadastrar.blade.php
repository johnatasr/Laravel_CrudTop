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

                    <h1>Cadastrar Usuário</h1>

                    <form action="{{ url('salvarUsuario')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nome">
                            <small id="emailHelp" class="form-text text-muted">Entre com seu nome</small>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">Agora seu e-mail</small>
                        </div>
        
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
               

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
