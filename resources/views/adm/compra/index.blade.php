@section('titulo', 'Compras')

  @extends('layout.adm-frame')
  @section('compras', 'active')
  @section('content')
    <h1 class="h1 mb-4">Compras</h1>
    <a class="btn btn-indigo mb-4" href="{{ route('adm.compra.create') }}">Nova</a>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Produto</th>
                <th scope="col">Fornecedor</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Preço uni.</th>
                <th scope="col">Data de Vencimento</th>
                <th scope="col">Data</th>
                <th scope="col">Preço total</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Feijão</td>
                <td>Mart Minas</td>
                <td>5</td>
                <td>R$ 03,00</td>
                <td>Indeterminada</td>
                <td>12/06/2024</td>
                <td>R$ 15,00</td>
                <td>
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