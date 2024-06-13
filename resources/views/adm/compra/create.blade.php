@section('titulo', 'Nova Compra')

  @extends('layout.adm-frame')
  @section('compras', 'active')
  @section('content')
    <h1 class="h1 my-4 text-center">Nova Compra</h1>
    <div class="row g-2">
        <div class="col-md col-sm-12">
            <select name="categoria" id="categoria" class="form-select">
                <option value="">Qual produto será comprado?</option>
                <option value="">Escolha uma opção</option>
            </select>
        </div>
        <div class="col-md col-sm-12">
            <select name="categoria" id="categoria" class="form-select mb-2">
                <option value="">Em qual fornecedor?</option>
                <option value="">Escolha uma opção</option>
            </select>
        </div>
    </div>
    <div class="row g-2">
        <div class="col-md col-sm-12">
            <input type="number" class="form-control" id="telefone" placeholder="Quantidade">
        </div>
        <div class="col-md col-sm-12">
            <div class="input-group">
                <span class="input-group-text">Vencimento</span>
                <input type="date" class="form-control" id="telefone">
            </div>
        </div>
        <div class="input-group col-md col-sm-12">
            <span class="input-group-text">R$</span>
            <input type="number" class="form-control" id="data-nasc" placeholder="Preço Unitário">
        </div>
    </div>
    
    <div class="d-grid d-md-flex gap-2 my-4 justify-content-md-end">
        <a type="button" class="btn btn-outline-danger" href="{{ route('adm.produto') }}">Cancelar</a>
        <button class="btn btn-indigo" type="submit">Cadastrar</button>
    </div>
  @endsection