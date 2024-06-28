@section('titulo', 'Vendas')
@section('vendas', 'active')
@section('search-action', route('adm.venda.pesquisa'))
@extends('layout.adm-frame')

@section('content')
    <h1 class="h1 mb-4">Vendas</h1>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Data</th>
                    <th scope="col">Quantidade de Itens</th>
                    <th scope="col">Pagamento</th>
                    <th scope="col">Entrega</th>
                    <th scope="col">Preço total</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vendas as $venda)
                    @php
                        $total_preco = 0;
                        $total_quantidade = 0;
                    @endphp
                    <div class="modal fade" id="venda-show-{{ $venda->id_venda }}" tabindex="-1"
                        aria-labelledby="venda-modal-label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content d-flex rounded-3 py-2 px-1 px-md-3 shadow">
                                <div class="modal-header border-bottom-0">
                                    <h1 class="modal-title h2">Produtos da compra</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body py-0">
                                    <ul class="list-group mb-4">
                                        @forelse($venda->carrinho->produtos as $item)
                                            @php
                                                $total_preco += $item->preco_produto * $item->pivot->quantidade_item;
                                                $total_quantidade++;
                                            @endphp
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between">
                                                    <span>{{ $item->nome_produto }}
                                                        ({{ $item->pivot->quantidade_item }}x)</span>
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
                        </div>
                    </div>
                    <tr>
                        <th scope="row">{{ $venda->id_venda }}</th>
                        <td>{{ $venda->carrinho->cliente->nome_cli }}</td>
                        <td>{{ date_format(date_create($venda->data_venda), 'd/m/Y H:i') }}</td>
                        <td>{{ $total_quantidade }}</td>
                        <td>
                            @if ($venda->pagamento_venda == 1)
                                Cartão de Crédito
                            @elseif ($venda->pagamento_venda == 2)
                                Cartão de Débito
                            @elseif ($venda->pagamento_venda == 3)
                                Pix
                            @endif
                        </td>
                        <td>
                            @if ($venda->entrega_venda == 1)
                                Entrega em Domicílio
                            @elseif ($venda->entrega_venda == 2)
                                Retirada no Local
                            @endif
                        </td>
                        <td>R$ {{ $total_preco }}</td>
                        <td> <a href="#" class="btn btn-indigo mb-1 mb-md-0" data-bs-toggle="modal"
                                data-bs-target="#venda-show-{{ $venda->id_venda }}">Ver mais</a></td>
                    </tr>
                @empty
                    <p>Nenhuma venda foi encontrada!</p>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
