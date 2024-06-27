@section('titulo', 'Categorias')

  
  @section('categorias', 'active')
  @section('search-action', route('adm.categoria.pesquisa'))
  @extends('layout.adm-frame')
  @section('content')
    <h1 class="h1 mb-4">Categorias</h1>
    <a class="btn btn-indigo mb-4" href="{{ route('adm.categoria.create') }}">Nova</a>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Quant. Produtos</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categorias as $categoria)
                    <tr>
                        <th scope="row">{{ $categoria->id_categoria }}</th>
                        <td>{{ $categoria->nome_categoria }}</td>
                        {{-- <td>{{ $categoria->produtos->count() }}</td> --}}
                        <td>{{ $categoria->produtos->count()}}</td>
                        <td>
                            {{-- <a href="{{ route('adm.categoria.show', $categoria->id_categoria) }}" class="btn btn-indigo mb-1 mb-md-0">Ver mais</a> --}}
                            <a href="{{ route('adm.categoria.edit', $categoria->id_categoria) }}" class="btn btn-success mb-1 mb-md-0">Editar</a>
                            <form action="{{ route('adm.categoria.delete', $categoria->id_categoria) }}" method="post" style="display: inline;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger mb-1 mb-md-0" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>                        
                    </tr>
                @empty
                    Nenhuma categoria foi encontrada!
                @endforelse
            </tbody>
        </table>
    </div>
  @endsection