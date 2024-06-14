
@section('titulo', 'Home')

  @extends('layout.main-frame')
  @section('home', 'active')
  @section('content')
    <h1 class="h1 mb-4">Produtos</h1>
    <div class="row" data-masonry='{"percentPosition": true }'>
        @foreach ($produtos as $produto)
            @include('layout.components.produto-modal')
        
            <div class="col-sm-6 col-lg-4 mb-4">
                <div class="card">
                    <img src="{{ asset($produto -> foto_produto) }}" alt="foto produto" class="rounded-top" max-height="250">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produto -> nome_produto }}</h5>
                        <p class="card-text">R$ {{ $produto -> preco_produto }}</p>
                        <div class="d-grid gap-2 mx-auto">
                            <button class="btn btn-indigo" data-bs-toggle="modal" data-bs-target="#produto-modal">Ver</button>
                            <button class="btn btn-outline-secondary">Adicionar ao Carrinho</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-2">
        {{ $produtos->links() }}
    </div>
  @endsection

