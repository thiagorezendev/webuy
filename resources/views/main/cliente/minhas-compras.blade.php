@extends('layout.main-frame')
@section('titulo', 'Minhas Compras')

@section('content')
    <main class="mb-5">
        <div class="py-4 text-center">
            <h2 class="h1">Minhas Compras</h2>
        </div>

        @forelse($carrinhos as $carrinho)
            @php
                $total = 0;
            @endphp
            <div class="card mb-3">
                <div class="card-header">
                    Compra realizada em {{ date_format(date_create($carrinho->venda->data_venda), 'd/m/Y H:i') }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Detalhes da Compra</h5>
                    <p class="card-text">
                        Total: R$ <span class="total-{{ $carrinho->id_carrinho }}">{{ $total }}</span>
                    </p>
                    <p class="card-text">Método de Pagamento:
                        @if ($carrinho->venda->pagamento_venda == 1)
                            Cartão de Crédito
                        @elseif ($carrinho->venda->pagamento_venda == 2)
                            Cartão de Débito
                        @elseif ($carrinho->venda->pagamento_venda == 3)
                            Pix
                        @endif
                    </p>
                    <p class="card-text">Método de Entrega:
                        @if ($carrinho->venda->entrega_venda == 1)
                            Entrega em Domicílio
                        @elseif ($carrinho->venda->entrega_venda == 2)
                            Retirada no Local
                        @endif
                    </p>
                    <ul class="list-group">
                        @forelse($carrinho->produtos as $item)
                            @php
                                $total += $item->preco_produto * $item->pivot->quantidade_item;
                            @endphp
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>{{ $item->nome_produto }} ({{ $item->pivot->quantidade_item }}x)</span>
                                    <span>R$
                                        {{ number_format($item->preco_produto * $item->pivot->quantidade_item, 2, ',', '.') }}</span>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item">Nenhum item encontrado.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <script>
                $('.total-{{ $carrinho->id_carrinho }}').html({{ $total }});
            </script>
        @empty
            <p class="text-center">Você ainda não realizou nenhuma compra.</p>
        @endforelse
    </main>
@endsection
