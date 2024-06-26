@extends('layout.main-frame')
@section('titulo', 'Pagamento')

@section('content')

    <main class="mb-5">
        <div class="py-4 text-center">
            <h2 class="h1">Seu Carrinho</h2>
        </div>
        @php
            $total_preco = 0;
            $total_quantidade = 0;
        @endphp

        <div class="order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Itens</span>
                <span class="badge bg-primary rounded-pill qnt">{{ $total_quantidade }}</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Valor Unitário</th>
                                    <th scope="col">Valor Total</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($carrinho->produtos as $item)
                                    @php
                                        $total_preco += $item->preco_produto * $item->pivot->quantidade_item;
                                        $total_quantidade ++;
                                    @endphp
                                    <tr>
                                        <th scope="row">{{$total_quantidade}}</th>
                                        <td>{{ $item->nome_produto }}</td>
                                        <td>{{ $item->pivot->quantidade_item }}</td>
                                        <td>R$ {{ number_format($item->preco_produto, 2, ',', '.') }}</td>
                                        <td>R$ {{ number_format($item->preco_produto * $item->pivot->quantidade_item, 2, ',', '.') }}</td>
                                        <td>
                                            <a href="#" class="btn btn-success mb-1 mb-md-0">Editar</a>
                                            <form action="" method="post" style="display: inline;">
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
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total</span>
                    <strong>R$ {{ number_format($total_preco, 2, ',', '.') }}</strong>
                </li>
            </ul>

            <div class="d-flex justify-content-center">
                <a class="btn btn-indigo btn-lg mt-3" href="{{ route('cliente.pagamento') }}">Continuar para o pagamento</a>
            </div>
        </div>
    </main>

    <script>
        $('.qnt').html({{ $total_quantidade }});
    </script>

@endsection
