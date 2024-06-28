@section('titulo', 'Editar Categoria')

@extends('layout.adm-frame')
@section('categorias', 'active')
@section('content')
    <form action="{{ route('adm.categoria.update', $categoria->id_categoria) }}" method="POST">
        @csrf
        <h1 class="h1 my-4 text-center">Editar Categoria</h1>
        <input type="text" class="form-control mb-2" name="nome_categoria" value="{{ $categoria->nome_categoria }}"
            placeholder="Nome">
        @error('nome_categoria')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="d-grid d-md-flex gap-2 my-4 justify-content-md-end">
            <a type="button" class="btn btn-outline-danger" href="{{ route('adm.categoria.index') }}">Cancelar</a>
            <button class="btn btn-indigo" type="submit">Salvar Alterações</button>
        </div>
    </form>
@endsection
