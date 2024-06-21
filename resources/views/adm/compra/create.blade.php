@section('titulo', 'Nova Compra')

@extends('layout.adm-frame')
@section('compras', 'active')
@section('content')
    <form action="{{ route('adm.compra.store') }}" method="POST">
        @csrf
        <h1 class="h1 my-4 text-center">Nova Compra</h1>
        <div class="row g-2">
            <div class="col-md col-sm-12">
                <select name="id_produto" class="form-select">
                    <option value="">Qual produto será comprado?</option>
                    @foreach ($produtos as $produto)
                        <option value="{{ $produto->id_produto }}">{{ $produto->nome_produto }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md col-sm-12">
                <select name="id_fornecedor" class="form-select mb-2">
                    <option value="">Em qual fornecedor?</option>
                    @foreach ($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id_fornecedor }}">{{ $fornecedor->nome_fornecedor }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-md col-sm-12">
                <input type="number" class="form-control" name="qntd_compra" placeholder="Quantidade" value="{{ old('qntd_compra') }}">
            </div>
            <div class="col-md col-sm-12">
                <div class="input-group">
                    <span class="input-group-text">Vencimento</span>
                    <input type="date" class="form-control" name="data_venc" value="{{ old('data_venc') }}">
                </div>
            </div>
            <div class="input-group col-md col-sm-12">
                <span class="input-group-text">R$</span>
                <input type="number" class="form-control" name="preco_uni_compra" placeholder="Preço Unitário" value="{{ old('preco_uni_compra') }}">
            </div>
        </div>
        @error('id_produto')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('id_fornecedor')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('qntd_compra')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('data_venc')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('preco_uni_compra')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="d-grid d-md-flex gap-2 my-4 justify-content-md-end">
            <a type="button" class="btn btn-outline-danger" href="{{ route('adm.compra.index') }}">Cancelar</a>
            <button class="btn btn-indigo" type="submit">Cadastrar</button>
        </div>
    </form>
@endsection
