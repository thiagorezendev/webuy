@extends('layout.main-frame')
@section('titulo', 'Pagamento')

@section('content')

  <main class="mb-5">
    <div class="py-5 text-center">
      <h2>Pagamento</h2>
      <p class="lead">Preencha os campos para concluir sua compra.</p>
    </div>
    @php
      $total_preco = 0;
      $total_quantidade = 0;
    @endphp


    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Seu carrinho</span>
          <span class="badge bg-primary rounded-pill qnt">{{ $total_quantidade }}</span>
        </h4>
        <ul class="list-group mb-3">
          
          @foreach ($carrinho->produtos as $item)
            @php
                $total_preco += $item->preco_produto * $item->pivot->quantidade_item;
                $total_quantidade ++;
            @endphp
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">{{ $item->nome_produto}}</h6>
                <small class="text-muted">Quantidade: {{ $item->pivot->quantidade_item }}</small>
              </div>
              <span class="text-muted">R$ {{ number_format($item->preco_produto * $item->pivot->quantidade_item, 2, ',', '.') }}</span>
            </li>
          @endforeach

          <li class="list-group-item d-flex justify-content-between">
            <span>Total</span>
            <strong>R$ {{ number_format($total_preco, 2, ',', '.') }}</strong>
          </li>
        </ul>

        <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Código promocional">
            <button type="submit" class="btn btn-secondary">Resgatar</button>
          </div>
        </form>
      </div>
      <div class="col-md-7 col-lg-8">
        <form action="{{ route('cliente.pagamento.store') }}" method='POST'>
          @csrf
          <h4 class="mb-3">Entrega</h4>

          <div class="form-check">
            <input type="radio" class="form-check-input" name="entrega_venda" id="entrega-delivery" value="1" checked required> 
            <label class="form-check-label" for="entrega-delivery">Entregar no meu endereço.</label>
          </div>

          <div class="form-check">
            <input type="radio" class="form-check-input" name="entrega_venda" value="2" id="entrega-retirar" required>
            <label class="form-check-label" for="entrega-retirar">Retirar no supermercado.</label>
          </div>

          <hr class="my-4">

          <h4 class="mb-3">Forma de pagamento</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="pagamento_venda" type="radio" class="form-check-input" value="1" checked required>
              <label class="form-check-label" for="credito">Cartão de crédito</label>
            </div>
            <div class="form-check">
              <input id="debit" name="pagamento_venda" type="radio" class="form-check-input" value="2" required>
              <label class="form-check-label" for="debito">Cartão de débito</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="pagamento_venda" type="radio" class="form-check-input" value="3" required>
              <label class="form-check-label" for="pix">Pix</label>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-indigo btn-lg" type="submit">Continue com o pagamento</button>
        </form>
      </div>
    </div>
  </main>

  <script>
    $('.qnt').html({{ $total_quantidade }});
  </script>
@endsection