@section('titulo', 'perfil')


@extends('layout.main-frame')
@section('content')
    <h1 class="h1 mb-4">Sobre</h1>

    <div class="p-2 border rounded">
        <ul class="list-group">
            <li  class="list-group-item d-flex justify-content-between">
                <span>Nome</span>
                <strong>{{ $cliente -> nome_cli }}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between ">
                <span>CPF</span>
                <strong>{{ $cliente -> cpf_cli }}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between ">
                <span>Telefone</span>
                <strong>{{ $cliente -> tel_cli }}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between ">
                <span>Email</span>
                <strong>{{ $cliente -> email }}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between ">
                <span>Data de Nascimento</span>
                <strong>{{ $cliente -> data_nasc_cli }}</strong>
            </li>
        </ul>
        <div class="d-flex justify-content-center">
            <a href="#" class="my-3 btn btn-indigo w-50">Editar</a>
        </div>
    </div>


@endsection
