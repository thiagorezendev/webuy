@section('titulo', 'Editar Fornecedor')

@extends('layout.adm-frame')
@section('fornecedores', 'active')
@section('content')
    <form action="{{ route('adm.fornecedor.update', $fornecedor->id_fornecedor) }}" method="POST">
        @csrf
        <h1 class="h1 my-4 text-center">Editar Fornecedor</h1>
        <div class="row g-2 mb-2">
            <div class="col-md col-sm-12">
                <input type="text" class="form-control" name="nome_fornecedor" value="{{ $fornecedor->nome_fornecedor }}"
                    placeholder="Nome">
            </div>
            <div class="col-md col-sm-12">
                <div class="input-group mb-2">
                    <span class="input-group-text">@</span>
                    <input type="text" class="form-control" name="email_fornecedor"
                        value="{{ $fornecedor->email_fornecedor }}" placeholder="Email">
                </div>
            </div>
        </div>
        <div class="row g-2">
        </div>
        @error('nome_fornecedor')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('email_fornecedor')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="d-grid d-md-flex gap-2 my-4 justify-content-md-end">
            <a type="button" class="btn btn-outline-danger" href="{{ route('adm.fornecedor.index') }}">Cancelar</a>
            <button class="btn btn-indigo" type="submit">Salvar Alterações</button>
        </div>
    </form>
@endsection
