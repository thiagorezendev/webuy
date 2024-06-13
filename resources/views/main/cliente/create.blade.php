@extends('layout.head')
@section('titulo', 'Cadastro')

@section('main')

<main class="container-sm container-md container-lg p-5 text-center mt-3 mb-3">
    <form class="form-register" method="POST" action="{{ route('cliente.store') }}">
        @csrf
        <a href="{{ route('main.home') }}" class="link-body-emphasis text-decoration-none">
            <img class="mb-4" src="../images/logo-webuy.png" alt="" width="200" height="160">
        </a>
        <h1 class="h3 mb-4">Fazer cadastro</h1>
        <h2 class="h5 text-start">Dados Pessoais</h2>
        <div class="row g-2">
            <div class="col-md-7 col-sm-12">
                <input type="text" class="form-control mb-2" name="nome_cli" placeholder="Nome">
                <input type="text" class="form-control" name="tel_cli" placeholder="Telefone">
            </div>
            <div class="col-md col-sm-12">
                <input type="text" class="form-control mb-2" name="cpf_cli" placeholder="CPF">
                <div class="input-group mb-2">
                    <span class="input-group-text">Nascimento</span>
                    <input type="date" class="form-control" name="data_nasc_cli">
                </div>
            </div>
        </div>
        <h2 class="h5 text-start mt-2">Endereço</h2>
        <div class="row g-2">
            <div class="col-md col-sm-12">
                <input type="text" class="form-control" name="cep" placeholder="CEP">
            </div>
            <div class="col-md-9 col-sm-12">
                <input type="text" class="form-control" name="rua" placeholder="Rua">
            </div>
            <div class="col-md col-sm-12">
                <input type="text" class="form-control mb-2" name="numero" placeholder="Número">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="text" class="form-control mb-2" name="bairro" placeholder="Bairro">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="text" class="form-control mb-2" name="complemento" placeholder="Complemento">
            </div>
            
        </div>
        <h2 class="h5 text-start mt-2">Dados de Login</h2>
        <input type="email" class="form-control mb-2" name="email_cli" placeholder="Email">
        <input type="password" class="form-control mb-4" name="senha_cli" placeholder="Senha">
        <div class="d-grid d-md-flex gap-2 justify-content-md-end">
            <a class="btn btn-outline-secondary" href="{{ route('main.home') }}">Voltar </a>
            <button class="btn btn-indigo" type="submit">Cadastrar</button>
        </div>
        <p class="mt-5 mb-3 text-muted">&copy; 2024 - Lauro e Thiago</p>
    </form>
</main>


@endsection