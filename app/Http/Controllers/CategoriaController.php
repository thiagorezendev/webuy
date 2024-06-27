<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaoRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use ILLuminate\Database\QueryException;
use App\Models\Produto;
use App\Http\Requests\CategoriaRequest;
use PhpParser\Node\Expr\FuncCall;

class CategoriaController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $categorias = Categoria::all();
        return view('adm.categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('adm.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRequest $request) {
        Categoria::create($request->all());
        flash('Categoria cadastrada com sucesso!', 'success', [], 'Sucesso');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_categoria) {
        $categoria = Categoria::findOrFail($id_categoria);
        return view('adm.categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request, $id_categoria) {
        $categoria = Categoria::findOrFail($id_categoria);
        $categoria->update($request->all());
        flash('Categoria atualizada com sucesso!', 'success', [], 'Sucesso');
        return redirect()->route('adm.categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_categoria) {
        Produto::where('id_categoria', $id_categoria)->update(['id_categoria' => null]);

        $categoria = Categoria::findOrFail($id_categoria);
        if ($categoria) {
            $categoria->delete();
            flash('Categoria deletada com sucesso!', 'success', [], 'Sucesso');
            return redirect()->route('adm.categoria.index');
        } else {
            flash('Erro ao tentar deletar a categoria.', 'error', [], 'Erro');
            return redirect()->route('adm.categoria.index');
        }
    }

    public function pesquisa(Request $request) {
        $query = $request->input('query');
        $categorias = Categoria::where('nome_categoria', 'like', '%' . $query . '%')->get();
        return view('adm.categoria.index', compact('categorias'));
    }

    public function filtro($id_categoria) {
        $categoria = Categoria::findOrFail($id_categoria);
        $produtos = $categoria->produtos()->whereRelation('estoque', 'qntd_estoque', '>', 0)->paginate(9);
        $categorias = Categoria::all();
        return view('main.home', compact('produtos', 'categorias'));
    }
}
