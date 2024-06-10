@extends('layout.head')
@section('titulo', 'Home')

@section('main')
  @extends('layout.frame')
  @section('home', 'active')
  @section('content')
  @include('layout.produto-modal')
    <h1 class="h1 mb-4">Produtos</h1>
    <div class="row" data-masonry='{"percentPosition": true }'>
        <div class="col-sm-6 col-lg-4 mb-4">
            <div class="card">
                <img src="{{ asset('images/renan.jpeg') }}" alt="" class="rounded">
                <div class="card-body">
                    <h5 class="card-title">Renan Ciríaco</h5>
                    <p class="card-text">R$ 100,00</p>
                    <div class="d-grid gap-2 mx-auto">
                        <button class="btn btn-indigo" data-bs-toggle="modal" data-bs-target="#produto-modal">Ver</button>
                        <button class="btn btn-outline-secondary">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
  @endsection
@endsection
