@section('titulo', 'Fornecedores')

  @extends('layout.adm-frame')
  @section('fornecedores', 'active')
  @section('content')
    <h1 class="h1 mb-4">Fornecedores</h1>
    <a class="btn btn-indigo mb-4" href="{{ route('adm.fornecedor.create')}}">Novo</a>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Mart Minas</td>
                <td>martminas@gmail.com</td>
                <td>
                    <a href="#" class="btn btn-success mb-1 mb-md-0">Editar</a>
                    <form action="" method="post"
                        style="display: inline;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger mb-1 mb-md-0"
                            onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                    </form>
                </td>
                </tr>
            </tbody>
        </table>
    </div>
  @endsection