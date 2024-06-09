@extends('layout.head')
@section('titulo', 'Pagamento')

@section('main')

<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../images/logo-header-webuy.png" alt="" width="72" height="57">
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
        <h4 class="mb-3">Endereço de cobrança</h4>
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nome" placeholder="" value="" required>
              <div class="invalid-feedback">
                É necessário um nome válido.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Sobrenome</label>
              <input type="text" class="form-control" id="sobrenome" placeholder="" value="" required>
              <div class="invalid-feedback">
                É necessário um sobrenome válido.
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="username" placeholder="Username" required>
              <div class="invalid-feedback">
                  Seu nome de usuário é obrigatório.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="voce@exemplo.com">
              <div class="invalid-feedback">
                Seu email é obrigatório.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Endereço</label>
              <input type="text" class="form-control" id="endereco" placeholder="Numero, Rua" required>
              <div class="invalid-feedback">
                Favor inserir seu endereço de entrega.
              </div>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Complemento <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="complemento" placeholder="Casa ou Apartamento">
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">País</label>
              <select class="form-select" id="pais" required>
                <option value="">Escolha...</option>
                <option>Brazil</option>
              </select>
              <div class="invalid-feedback">
                Selecione um país válido.
              </div>
            </div>

            <div class="col-md-4">
    <label for="state" class="form-label">Estado</label>
    <select class="form-select" id="estado" required>
        <option value="">Escolha...</option>
        <option>Acre</option>
        <option>Alagoas</option>
        <option>Amapá</option>
        <option>Amazonas</option>
        <option>Bahia</option>
        <option>Ceará</option>
        <option>Distrito Federal</option>
        <option>Espírito Santo</option>
        <option>Goiás</option>
        <option>Maranhão</option>
        <option>Mato Grosso</option>
        <option>Mato Grosso do Sul</option>
        <option>Minas Gerais</option>
        <option>Pará</option>
        <option>Paraíba</option>
        <option>Paraná</option>
        <option>Pernambuco</option>
        <option>Piauí</option>
        <option>Rio de Janeiro</option>
        <option>Rio Grande do Norte</option>
        <option>Rio Grande do Sul</option>
        <option>Rondônia</option>
        <option>Roraima</option>
        <option>Santa Catarina</option>
        <option>São Paulo</option>
        <option>Sergipe</option>
        <option>Tocantins</option>
    </select>
    <div class="invalid-feedback">
        Selecione um estado válido.
    </div>
</div>

            <div class="col-md-3">
              <label for="zip" class="form-label">CEP</label>
              <input type="text" class="form-control" id="cep" placeholder="" required>
              <div class="invalid-feedback">
                Código postal obrigatório.
              </div>
            </div>
          </div>

          <hr class="my-4">

          <h4 class="mb-3">Entrega</h4>

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="entrega-delivery">
            <label class="form-check-label" for="entrega-delivery">Entregar no meu endereço.</label>
          </div>

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="entrega-retirar">
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

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Nome no cartão</label>
              <input type="text" class="form-control" id="cc-nome" placeholder="" required>
              <small class="text-muted">Nome completo conforme exibido no cartão</small>
              <div class="invalid-feedback">
                O nome no cartão é obrigatório
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Número do cartão</label>
              <input type="text" class="form-control" id="cc-numero" placeholder="" required>
              <div class="invalid-feedback">
                O número do cartão de crédito é obrigatório
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expira em</label>
              <input type="text" class="form-control" id="cc-expira" placeholder="" required>
              <div class="invalid-feedback">
                Data de validade necessária
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Código de segurança necessário
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-indigo btn-lg" type="submit">Continue com o pagamento</button>
        </form>
      </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mt-5 mb-3 text-muted">&copy; 2024 - Lauro e Thiago</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacidade</a></li>
      <li class="list-inline-item"><a href="#">Termos</a></li>
      <li class="list-inline-item"><a href="#">Suporte</a></li>
    </ul>
  </footer>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script>