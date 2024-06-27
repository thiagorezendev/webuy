@section('titulo', 'Fornecedores')
@section('fornecedores', 'active')
@section('search-action', route('adm.fornecedor.pesquisa'))
@extends('layout.adm-frame')

@section('content')
    <h1 class="h1 mb-4">Fornecedores</h1>
    <a class="btn btn-indigo mb-4" href="{{ route('adm.fornecedor.create') }}">Novo</a>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($fornecedores as $fornecedor)
                    <tr>
                        <th scope="row">{{ $fornecedor->id_fornecedor }}</th>
                        <td>{{ $fornecedor->nome_fornecedor }}</td>
                        <td>{{ $fornecedor->email_fornecedor }}</td>
                        <td>
                            <a href="{{ route('adm.fornecedor.edit', $fornecedor->id_fornecedor) }}"
                                class="btn btn-success mb-1 mb-md-0">Editar</a>
                            <form action="{{ route('adm.fornecedor.delete', $fornecedor->id_fornecedor) }}" method="post"
                                style="display: inline;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger mb-1 mb-md-0"
                                    onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                    </tr>
                @empty
                    <p>Nenhum fornecedor foi encontrado!</p>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
