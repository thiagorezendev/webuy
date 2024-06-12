@extends('layout.main-frame')
@section('titulo', 'Pagamento')

@section('content')

  <main class="mb-5">
    <div class="py-5 text-center">
      <h2>Pagamento</h2>
      <p class="lead">Preencha os campos para concluir sua compra.</p>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Seu carrinho</span>
          <span class="badge bg-primary rounded-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Capivara de plástico</h6>
              <small class="text-muted">Animal de estimação</small>
            </div>
            <span class="text-muted">R$12</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Lápis inapagavel</h6>
              <small class="text-muted">Escrita que fica para sempre</small>
            </div>
            <span class="text-muted">R$8</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Cueca freada</h6>
              <small class="text-muted">Pra quem curte uma cueca diferente</small>
            </div>
            <span class="text-muted">R$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Código promocional</h6>
              <small>RENAN20</small>
            </div>
            <span class="text-success">−R$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (BRL)</span>
            <strong>R$20</strong>
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

          <h4 class="mb-3">Entrega</h4>

          <div class="form-check">
            <input type="radio" class="form-check-input" name="entrega" id="entrega-delivery">
            <label class="form-check-label" for="entrega-delivery">Entregar no meu endereço.</label>
          </div>

          <div class="form-check">
            <input type="radio" class="form-check-input" name="entrega" id="entrega-retirar">
            <label class="form-check-label" for="entrega-retirar">Retirar no supermercado.</label>
          </div>

          <hr class="my-4">

          <h4 class="mb-3">Forma de pagamento</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credito">Cartão de crédito</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debito">Cartão de débito</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="pix">Pix</label>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-indigo btn-lg" type="submit">Continue com o pagamento</button>
        </form>
      </div>
    </div>
  </main>

@endsection