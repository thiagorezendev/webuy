@section('titulo', 'perfil')

@extends('layout.main-frame')
@section('content')
    <h1 class="h1 mb-4">Editar Registro</h1>
    <form method="POST" action="{{ route('cliente.update', $cliente->id) }}" id="form-cliente">
        @csrf
        <h2 class="h5 text-start">Dados Pessoais</h2>
        <div class="row g-2">
            <div class="col-md-7 col-sm-12">
                <input type="text" class="form-control mb-2" name="nome_cli" placeholder="Nome" value="{{ old('nome_cli') ?? $cliente->nome_cli }}">
                <input type="text" class="form-control" name="tel_cli" id="tel" placeholder="Telefone" value={{ old('tel_cli') ?? $cliente->tel_cli}}>
            </div>
            <div class="col-md col-sm-12">
                <input type="text" class="form-control mb-2" name="cpf_cli" placeholder="CPF" id="cpf" value={{ old('cpf_cli') ?? $cliente->cpf_cli}}>
                <div class="input-group mb-2">
                    <span class="input-group-text">Nascimento</span>
                    <input type="date" class="form-control" name="data_nasc_cli" value={{ old('data_nasc_cli') ?? $cliente->data_nasc_cli}}>
                </div>
            </div>
        </div>
        <h2 class="h5 text-start mt-2">Endereço</h2>
        <div class="row g-2">
            <div class="col-md col-sm-12">
                <input type="text" class="form-control" name="cep" placeholder="CEP" id="cep" value={{ old('cep') ?? $cliente->endereco->cep }}>
            </div>
            <div class="col-md-9 col-sm-12">
                <input type="text" class="form-control" name="rua" placeholder="Rua" id="rua" disabled value={{ old('rua') }}>
            </div>
            <div class="col-md col-sm-12">
                <input type="text" class="form-control mb-2" name="numero" placeholder="Número" value={{ old('numero') ?? $cliente->endereco->numero}}>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-md col-sm-12">
                <input type="text" class="form-control" name="bairro" placeholder="Bairro" id="bairro" disabled value={{ old('bairro') }}>
            </div>
            <div class="col-md col-sm-12">
                <input type="text" class="form-control" name="cidade" placeholder="Cidade" id="cidade" disabled value={{ old('cidade') }}>
            </div>
            <div class="col-md-2 col-sm-12">
                <input type="text" class="form-control mb-2" name="uf" placeholder="UF" id="uf" disabled value={{ old('uf') }}>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="text" class="form-control mb-2" name="complemento" placeholder="Complemento" value='{{ old('complemento') ?? $cliente->endereco->complemento }}''>
                <div class="form-text">Coloque aqui a rua e o bairro se o CEP não tiver!</div>
            </div>
            
        </div>
        <h2 class="h5 text-start mt-2">Dados de Login</h2>
        <input type="email" class="form-control mb-4" name="email" placeholder="Email" value={{ old('email') ?? $cliente->email }}>
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
        <div class="d-grid d-md-flex gap-2 justify-content-md-end">
            <a class="btn btn-outline-secondary" href="{{ route('cliente.perfil') }}">Voltar </a>
            <button class="btn btn-indigo" type="submit">Salvar</button>
        </div>
    </form>

<script>
    $('#cpf').mask('000.000.000-00');
    $('#tel').mask('(00) 00000-0000');
    $('#cep').mask('00000-000');
    $('#form-cliente').submit(function() {
        $('#cpf').unmask();
        $('#tel').unmask();
        $('#cep').unmask();
    });

    $.get('https://viacep.com.br/ws/'+ {{ $cliente->endereco->cep }} +'/json/', function(dados) {
            $('#rua').val(dados.logradouro);
            $('#bairro').val(dados.bairro);
            $('#cidade').val(dados.localidade);
            $('#uf').val(dados.uf);
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