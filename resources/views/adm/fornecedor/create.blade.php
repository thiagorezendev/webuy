@section('titulo', 'Novo Fornecedor')

  @extends('layout.adm-frame')
  @section('fornecedores', 'active')
  @section('content')
    <h1 class="h1 my-4 text-center">Novo Fornecedor</h1>
    <div class="row g-2">
        <div class="col-md col-sm-12">
            <input type="text" class="form-control" id="telefone" placeholder="Nome">
        </div>
        <div class="col-md col-sm-12">
            <div class="input-group mb-2">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="telefone" placeholder="Email">
            </div>
        </div>
    </div>
    <div class="row g-2">
    </div>
    
    <div class="d-grid d-md-flex gap-2 my-4 justify-content-md-end">
        <a type="button" class="btn btn-outline-danger" href="{{ route('adm.produto') }}">Cancelar</a>
        <button class="btn btn-indigo" type="submit">Cadastrar</button>
    </div>
  @endsection