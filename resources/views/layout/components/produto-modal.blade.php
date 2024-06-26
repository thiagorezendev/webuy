<div class="modal fade" id="produto-modal-{{ $produto -> id_produto }}" tabindex="-1" aria-labelledby="produto-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content d-flex rounded-3 py-2 px-1 px-md-3 shadow">
        <div class="modal-header border-bottom-0">
          <h1 class="modal-title h2">{{ $produto -> nome_produto }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-0">
            <div class="row my-2">
                <div class="col-12 col-lg-6 col-sm-12 text-center mb-3 mb-md-3 mb-lg-0">
                  <img src="{{ $produto -> foto_produto }}" alt="foto produto" class="img-fluid rounded" min-height="525">
                </div>
                <div class="col-12 col-lg-6 col-sm-12">
                    <h2 class="h2">R$ {{ number_format($produto -> preco_produto, 2, ',', '.') }}</h2>
                    <div class="form-group row my-2">
                      <label for="productQuantity" class="mb-2"><b>Quantidade</b></label>
                      <div class="col-3 col-sm-2">
                        <input type="number" class="form-control" id="qnt-{{$produto->id_produto}}" min="1" max="{{ $produto->estoque->qntd_estoque}}" step="1" value="1">
                      </div>
                    </div>
                  <p>{{ $produto -> desc_produto }}</p>
                  <p>{{ $produto->categoria->nome_categoria}}</p>
                </div>
            </div>
           
        </div>
        <div class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0">
          <a class="btn btn-lg btn-indigo add-car" href="{{route('cliente.carrinho.add', ['produto' => $produto->id_produto, 'qnt' => 1])}}">Adicionar ao carrinho</a>
          <button type="button" class="btn btn-lg btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
</div>

<script>
  $('#qnt-{{$produto->id_produto}}').on('input', function() {
    let qnt{{$produto->id_produto}} = $('#qnt-{{$produto->id_produto}}').val();
    var produto{{$produto->id_produto}} = "{{ $produto->id_produto }}";
    var link = '/carrinho/' + produto{{$produto->id_produto}} + '/' + qnt{{$produto->id_produto}};
    $('.add-car').attr("href", link)
  });
</script>

