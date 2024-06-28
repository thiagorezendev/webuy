@section('titulo', 'Produtos')
@section('produtos', 'active')
@section('search-action', route('adm.produto.pesquisa', 0))
@extends('layout.adm-frame')
@section('content')
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
                @forelse ($produtos as $produto)
                @include('layout.components.produto-show')
                    <tr>
                        <th scope="row">{{ $produto->id_produto }}</th>
                        <td>{{ $produto->nome_produto }}</td>
                        <td>R$ {{ number_format($produto->preco_produto, 2, ',', '.') }}</td>
                        <td>{{ $produto->categoria->nome_categoria ?? ''}}</td>
                        <td>{{ $produto->estoque->qntd_estoque }}</td>
                        <td>
                            <a href="#" class="btn btn-indigo mb-1 mb-md-0" data-bs-toggle="modal"
                                data-bs-target="#produto-show-{{ $produto->id_produto}}">Ver mais</a>
                            <a href="{{ route('adm.produto.edit', $produto->id_produto) }}"
                                class="btn btn-success mb-1 mb-md-0">Editar</a>
                            <form action="{{ route('adm.produto.delete', $produto->id_produto) }}" method="post"
                                style="display: inline;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger mb-1 mb-md-0"
                                    onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <p>Nenhum produto foi encontrado!</p>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
