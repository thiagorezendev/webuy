@section('titulo', 'Produtos')

@extends('layout.adm-frame')
@section('produtos', 'active')
@section('content')
    @include('layout.components.produto-show')
    <h1 class="h1 mb-4">Produtos</h1>
    <a class="btn btn-indigo mb-4" href="{{ route('adm.produto.create') }}">Novo</a>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Estoque</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <th scope="row">{{ $produto->id_produto }}</th>
                        <td>{{ $produto->nome_produto }}</td>
                        <td>R$ {{ number_format($produto->preco_produto, 2, ',', '.') }}</td>
                        <td>{{-- {{ $produto->categoria_produto }} --}} Categoria do produto</td>
                        <td>{{-- {{ $produto->estoque_produto }} --}} Estoque do produto</td>
                        <td>
                            <a href="#" class="btn btn-indigo mb-1 mb-md-0" data-bs-toggle="modal"
                                data-bs-target="#produto-show">Ver mais</a>
                            <a href="{{ route('adm.produto.edit', $produto->id_produto) }}"
                                class="btn btn-success mb-1 mb-md-0">Editar</a> <!-- Adicionei o href="#" para não dar erro, lembrar de alterar -->
                            <form action="{{ route('adm.produto.delete', $produto->id_produto) }}" method="post"
                                style="display: inline;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger mb-1 mb-md-0"
                                    onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
