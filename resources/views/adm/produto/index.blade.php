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
                <tr>
                <th scope="row">1</th>
                <td>Feijão</td>
                <td>R$ 5,00</td>
                <td>Produto não peressível</td>
                <td>5</td>
                <td>
                    <a href="#" class="btn btn-indigo mb-1 mb-md-0" data-bs-toggle="modal" data-bs-target="#produto-show">Ver mais</a>
                    <a href="#" class="btn btn-success mb-1 mb-md-0">Editar</a>
                    <form action="" method="post"
                        style="display: inline;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger mb-1 mb-md-0"
                            onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                    </form>
                </td>
                </tr>
            </tbody>
        </table>
    </div>
  @endsection