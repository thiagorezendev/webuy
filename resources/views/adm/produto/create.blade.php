@section('titulo', 'Novo Produto')

  @extends('layout.adm-frame')
  @section('produtos', 'active')
  @section('content')
    <h1 class="h1 my-4 text-center">Novo Produto</h1>
    <div class="row g-2">
        <div class="col-md-7 col-sm-12">
            <input type="text" class="form-control mb-2" id="nome" placeholder="Nome">
            <input type="file" class="form-control" id="telefone">
        </div>
        <div class="col-md col-sm-12">
            <select name="categoria" id="categoria" class="form-select mb-2">
                <option value="">Escolha uma opção</option>
                <option value="">Escolha uma opção</option>
            </select>
            <div class="input-group mb-2">
                <span class="input-group-text">R$</span>
                <input type="number" class="form-control" id="data-nasc" placeholder="Preço">
            </div>
           
        </div>
    </div>
    <div class="input-group mb-2">
        <span class="input-group-text">Descrição</span>
        <textarea class="form-control form-control-lg" aria-label="With textarea"></textarea>
    </div>
    
    <div class="d-grid d-md-flex gap-2 my-4 justify-content-md-end">
        <a type="button" class="btn btn-outline-danger" href="{{ route('adm.produto') }}">Cancelar</a>
        <button class="btn btn-indigo" type="submit">Cadastrar</button>
    </div>
  @endsection