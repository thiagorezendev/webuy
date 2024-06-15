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
                @foreach ($compras as $compra)
                    <tr>
                        <th scope="row">{{ $compra->id_compra }}</th>
                        <td>{{-- {{ $compra->produto->nome_produto }} --}} Nome do produto</td>
                        <td>{{-- {{ $compra->fornecedor->nome_fornecedor }} --}} Nome do fornecedor</td>
                        <td>{{ $compra->qntd_compra }}</td>
                        <td>{{ $compra->preco_uni_compra }}</td>
                        <td>{{ $compra->data_venc }}</td>
                        <td>{{ $compra->data_compra }}</td>
                        <td>{{-- {{ $compra->preco_total }} --}} Preço total</td>
                        <td>
                            <a href="{{ route('adm.compra.edit', $compra->id_compra) }}" class="btn btn-success mb-1 mb-md-0">Editar</a>
                            <form action="{{ route('adm.compra.delete', $compra->id_compra) }}" method="post" style="display: inline;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger mb-1 mb-md-0" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  @endsection