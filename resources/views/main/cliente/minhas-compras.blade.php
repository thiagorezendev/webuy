@extends('layout.main-frame')
@section('titulo', 'Minhas Compras')

@section('content')
<main class="mb-5">
    <div class="py-4 text-center">
        <h2 class="h1">Minhas Compras</h2>
    </div>

    @forelse($carrinhos as $carrinho)
        <div class="card mb-3">
            <div class="card-header">
                Compra realizada em {{ \Carbon\Carbon::parse($carrinho->venda->data_venda)->format('d/m/Y H:i') }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Detalhes da Compra</h5>
                <p class="card-text">
                    Total: R$ 
                    @if($carrinho->itensVenda)
                        {{ number_format($carrinho->itensVenda->sum(function($item) { 
                            return $item->produto->preco_produto * $item->quantidade_item; 
                        }), 2, ',', '.') }}
                    @else
                        0,00
                    @endif
                </p>
                <p class="card-text">Método de Pagamento: {{ (string) $carrinho->venda->pagamento_venda }}</p>
                <p class="card-text">Método de Entrega: {{ (string) $carrinho->venda->entrega_venda }}</p>
                <ul class="list-group">
                    @if($carrinho->itensVenda)
                        @foreach($carrinho->itensVenda as $item)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>{{ (string) $item->produto->nome_produto }} ({{ (int) $item->quantidade_item }}x)</span>
                                    <span>R$ {{ number_format((float) $item->produto->preco_produto * (int) $item->quantidade_item, 2, ',', '.') }}</span>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li class="list-group-item">Nenhum item encontrado.</li>
                    @endif
                </ul>
            </div>
        </div>
    @empty
        <p class="text-center">Você ainda não realizou nenhuma compra.</p>
    @endforelse
</main>
@endsection
