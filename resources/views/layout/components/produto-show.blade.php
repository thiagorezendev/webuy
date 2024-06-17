<div class="modal fade" id="produto-show-{{ $produto -> id_produto}}" tabindex="-1" aria-labelledby="produto-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content d-flex rounded-3 py-2 px-1 px-md-3 shadow">
        <div class="modal-header border-bottom-0">
          <h1 class="modal-title h2">{{ $produto->nome_produto }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-0">
            <div class="row my-2">
                <div class="col-12 col-lg-6 col-sm-12 text-center mb-3 mb-md-3 mb-lg-0">
                  <img src="{{ asset($produto->foto_produto)}}" alt="" class="img-fluid rounded">
                </div>
                <div class="col-12 col-lg-6 col-sm-12">
                  <h2 class="h2">R$ {{$produto->preco_produto}}</h2>
                  <p>{{ $produto->desc_produto}}</p>
                  <p>{{ $produto->categoria->nome_categoria}}</p>
                </div>
            </div>
           
        </div>
        <div class="modal-footer flex-column align-items-stretch w-100 pb-3 border-top-0">
          <a href="{{ route('adm.produto.edit', $produto->id_produto) }}"
            class="btn btn-lg btn-indigo">Editar</a> <!-- Adicionei o href="#" para não dar erro, lembrar de alterar -->
        <form action="{{ route('adm.produto.delete', $produto->id_produto) }}" method="post"
            style="display: inline;">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-lg btn-outline-danger"
                onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
        </form>
        </div>
      </div>
    </div>
</div>