@extends('layouts.main')

@section('title', 'SIGEA')

@section('content')

@include('errors.alerts')
@include('errors.errors')

    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Informações de Perfil de Usuário</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('usuario.update', $user->id) }}" id="form" method="POST" class="form_prevent_multiple_submits">
                    @csrf
                    @method('POST')
                    <div class="form-group col-md-6">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" name="nome">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" value="{{ $user->email }}" name="email">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Perfil</label>
                        <input type="text" class="form-control" value="{{ $user->perfil->descricao }}" disabled="">
                    </div>
                    <div class="col-12">
                        <input type="submit" class="btn btn-primary" name="Salvar" value="Salvar">
                    </div>
                </form>
            </div>
        </div>
    </div>

@yield('scripts')
@endsection





