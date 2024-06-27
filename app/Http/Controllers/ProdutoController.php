<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Http\Requests\ProdutoRequestUpdate;
use App\Models\Categoria;
use App\Models\Produto;
use App\Models\Estoque;
use App\Models\Compra;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $produtos = Produto::all();
        return view('adm.produto.index', compact('produtos'));
    }

    public function home() {
        $produtos = Produto::whereRelation('estoque', 'qntd_estoque', '>', 0)->paginate(9);
        $categorias = Categoria::all();
        $cliente = Auth::id();
        return view('main.home', compact('produtos', 'categorias', 'cliente'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categorias = Categoria::all();
        return view('adm.produto.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoRequest $request) {

        $path = $request->file('foto_produto')->store('produtos', 'public');
        $path = 'storage/' . $path;

        if($path) {
            Produto::create([
                'nome_produto' => $request->nome_produto,
                'id_categoria' => $request->id_categoria,
                'desc_produto' => $request->desc_produto,
                'foto_produto' => $path,
                'preco_produto' => $request->preco_produto 
            ]);
        }
        
        flash('Produto cadastrado com sucesso!', 'success', [], 'Sucesso');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_produto) {
        $produto = Produto::findOrFail($id_produto);
        $categorias = Categoria::all();
        return view('adm.produto.edit', compact('produto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutoRequestUpdate $request, $id_produto) {
        $produto = Produto::findOrFail($id_produto);
        if($request->file('foto_produto')) {
            $path = $request->file('foto_produto')->store('produtos', 'public');
            $path = 'storage/' . $path;
        } else {
            $path = $produto->foto_produto;
        }
        $produto->update([
            'nome_produto' => $request->nome_produto,
            'id_categoria' => $request->id_categoria,
            'desc_produto' => $request->desc_produto,
            'foto_produto' => $path,
            'preco_produto' => $request->preco_produto 
        ]);    
        flash('Produto atualizado com sucesso!', 'success', [], 'Sucesso');
        return redirect()->route('adm.produto.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_produto) {
        Compra::where('id_produto', $id_produto)->delete();

        $produto = Produto::findOrFail($id_produto);
        if ($produto) {

            if ($produto->foto_produto) {
                Storage::disk('public')->delete(str_replace('storage/', '', $produto->foto_produto));
            }

            $produto->delete();
            flash('Produto deletado com sucesso!', 'success', [], 'Sucesso');
            return redirect()->route('adm.produto.index');
        } else {
            flash('Produto não encontrado!', 'error');
            return redirect()->route('adm.produto.index');
        }
    }

    public function pesquisa(Request $request, $home) {
        $query = $request->input('query');
        if($home == 0) {
            $produtos = Produto::where('nome_produto', 'like', '%' . $query . '%')->get();
            return view('adm.produto.index', compact('produtos'));
        } else {
            $produtos = Produto::where('nome_produto', 'like', '%' . $query . '%')->whereRelation('estoque', 'qntd_estoque', '>', 0)->paginate(9);
            $categorias = Categoria::all();
            return view('main.home', compact('produtos', 'categorias'));
        }
    }
}
