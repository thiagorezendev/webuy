
@section('titulo', 'Home')

  @extends('layout.main-frame')
  @section('home', 'active')
  @section('content')
    <h1 class="h1 mb-4">Produtos</h1>
    <div class="row" data-masonry='{"percentPosition": true }'>
        @forelse ($produtos as $produto)
            @include('layout.components.produto-modal')
        
            <div class="col-sm-6 col-lg-4 mb-4">
                <div class="card">
                    <img src="{{ asset($produto -> foto_produto) }}" alt="foto produto" class="rounded-top" height="200">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produto -> nome_produto }}</h5>
                        <p class="card-text">R$ {{ number_format($produto->preco_produto, 2, ',', '.')}}</p>
                        <div class="d-grid gap-2 mx-auto">
                            <button class="btn btn-indigo" data-bs-toggle="modal" data-bs-target="#produto-modal-{{ $produto->id_produto }}">Ver</button>
                            <a class="btn btn-outline-secondary" href="{{ route('cliente.carrinho.add',  ['id_produto' => $produto->id_produto, 'qnt' => 1])}}">Adicionar ao Carrinho</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>Nenhum produto com estoque encontrado!</p>
        @endforelse
    </div>
    <div class="d-flex justify-content-center mt-2">
        {{ $produtos->links() }}
    </div>
  @endsection

