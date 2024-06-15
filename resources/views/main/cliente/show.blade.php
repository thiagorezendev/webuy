@section('titulo', 'perfil')


@extends('layout.main-frame')
@section('content')
    <h1 class="h1 mb-4">Sobre</h1>

    <ul class="list-group mb-3">
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


@endsection
