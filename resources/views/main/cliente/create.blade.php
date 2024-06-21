@extends('layout.head')
@section('titulo', 'Cadastro')

@section('main')

<main class="container-sm container-md container-lg p-5 text-center mt-3 mb-3">
    <form class="form-register" method="POST" action="{{ route('cliente.store') }}" id="form-cliente">
        @csrf
        <a href="{{ route('main.home') }}" class="link-body-emphasis text-decoration-none">
            <img class="mb-4" src="../images/logo-webuy.png" alt="" width="200" height="160">
        </a>
        <h1 class="h3 mb-4">Fazer cadastro</h1>
        <h2 class="h5 text-start">Dados Pessoais</h2>
        <div class="row g-2">
            <div class="col-md-7 col-sm-12">
                <input type="text" class="form-control mb-2" name="nome_cli" placeholder="Nome" value={{ old('nome_cli') }}>
                <input type="text" class="form-control" name="tel_cli" id="tel" placeholder="Telefone" value={{ old('tel_cli')}}>
            </div>
            <div class="col-md col-sm-12">
                <input type="text" class="form-control mb-2" name="cpf_cli" placeholder="CPF" id="cpf" value={{ old('cpf_cli')}}>
                <div class="input-group mb-2">
                    <span class="input-group-text">Nascimento</span>
                    <input type="date" class="form-control" name="data_nasc_cli" value={{ old('data_nasc_cli')}}>
                </div>
            </div>
        </div>
        <h2 class="h5 text-start mt-2">Endereço</h2>
        <div class="row g-2">
            <div class="col-md col-sm-12">
                <input type="text" class="form-control" name="cep" placeholder="CEP" id="cep" value={{ old('cep')}}>
            </div>
            <div class="col-md-9 col-sm-12">
                <input type="text" class="form-control" name="rua" placeholder="Rua" id="rua" disabled value={{ old('rua')}}>
            </div>
            <div class="col-md col-sm-12">
                <input type="text" class="form-control mb-2" name="numero" placeholder="Número" value={{ old('numero')}}>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-md col-sm-12">
                <input type="text" class="form-control" name="bairro" placeholder="Bairro" id="bairro" disabled value={{ old('bairro')}}>
            </div>
            <div class="col-md col-sm-12">
                <input type="text" class="form-control" name="cidade" placeholder="Cidade" id="cidade" disabled value={{ old('cidade')}}>
            </div>
            <div class="col-md-2 col-sm-12">
                <input type="text" class="form-control mb-2" name="uf" placeholder="UF" id="uf" disabled value={{ old('uf')}}>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="text" class="form-control mb-2" name="complemento" placeholder="Complemento" value={{ old('complemento')}}>
                <div class="form-text">Coloque aqui a rua e o bairro se o CEP não tiver!</div>
            </div>
            
        </div>
        <h2 class="h5 text-start mt-2">Dados de Login</h2>
        <input type="email" class="form-control mb-2" name="email" placeholder="Email" value={{ old('email')}}>
        <input type="password" class="form-control mb-4" name="password" placeholder="Senha" value={{ old('password')}}>
        @error('nome_cli')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('tel_cli')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('cpf_cli')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('data_nasc_cli')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('cep')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('numero')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('complemento')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="d-grid d-md-flex gap-2 justify-content-md-end">
            <a class="btn btn-outline-secondary" href="{{ route('main.home') }}">Voltar </a>
            <button class="btn btn-indigo" type="submit">Cadastrar</button>
        </div>
        <p class="mt-5 mb-3 text-muted">&copy; 2024 - Lauro e Thiago</p>
    </form>
</main>

<script>
    $('#cpf').mask('000.000.000-00');
    $('#tel').mask('(00) 00000-0000');
    $('#cep').mask('00000-000');
    $('#form-cliente').submit(function() {
        $('#cpf').unmask();
        $('#tel').unmask();
        $('#cep').unmask();
    });

    $('#cep').blur(function() {
        let cep = $('#cep').unmask().val();
        $('#cep').mask('00000-000');
        $.get('https://viacep.com.br/ws/'+ cep +'/json/', function(dados) {
            $('#rua').val(dados.logradouro);
            $('#bairro').val(dados.bairro);
            $('#cidade').val(dados.localidade);
            $('#uf').val(dados.uf);
        });
    });
</script>

@endsection