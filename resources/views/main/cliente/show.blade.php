@section('titulo', 'perfil')

@extends('layout.main-frame')
@section('content')
    <h1 class="h1 mb-4">Minha Conta</h1>

    <div class="p-2 border rounded mb-5">
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-center ">
                <strong>Dados Pessoais</strong>
            </li>
            <li  class="list-group-item d-flex justify-content-between">
                <span>Nome</span>
                <strong>{{ $cliente -> nome_cli }}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between ">
                <span>CPF</span>
                <strong id="cpf">{{ $cliente -> cpf_cli }}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between ">
                <span>Telefone</span>
                <strong id="tel">{{ $cliente -> tel_cli }}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between ">
                <span>Email</span>
                <strong>{{ $cliente -> email }}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between ">
                <span>Data de Nascimento</span>
                <strong>{{ date_format(date_create($cliente -> data_nasc_cli), 'd/m/Y') }}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-center ">
                <strong>Endereço</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between ">
                <span>CEP</span>
                <strong id="cep">{{ $cliente->endereco->cep }}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between ">
                <span>Rua</span>
                <strong id="rua"></strong>
            </li>
            <li class="list-group-item d-flex justify-content-between ">
                <span>Número</span>
                <strong>{{ $cliente->endereco->numero }}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between ">
                <span>Bairro</span>
                <strong id="bairro"></strong>
            </li>
            <li class="list-group-item d-flex justify-content-between ">
                <span>Cidade</span>
                <strong id="cidade"></strong>
            </li>
            <li class="list-group-item d-flex justify-content-between ">
                <span>Complemento</span>
                <strong>{{ $cliente->endereco->complemento }}</strong>
            </li>
        </ul>
        <div class="d-flex justify-content-center">
            <a href="{{ route('cliente.edit', $cliente->id) }}" class="my-3 btn btn-indigo w-50">Editar</a>
            <form action="{{ route('cliente.delete', $cliente->id) }}" method="post" style="display: inline;">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger mb-1 mb-md-0" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
            </form>
        </div>
    </div>
    <script>
        $.get('https://viacep.com.br/ws/'+ {{ $cliente->endereco->cep }} +'/json/', function(dados) {
            $('#rua').html(dados.logradouro);
            $('#bairro').html(dados.bairro);
            $('#cidade').html(dados.localidade+' - '+ dados.uf);
            $('#uf').html(dados.uf);
        });
        $('#cpf').mask('000.000.000-00');
        $('#tel').mask('(00) 00000-0000');
        $('#cep').mask('00000-000')
    </script>


@endsection
