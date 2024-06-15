<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\Estoque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $produtos = Produto::all();
        return view('adm.produto.index', compact('produtos'));
    }

    public function home() {
        $produtos = Produto::paginate(9);
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
    public function store(Request $request) {

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

        return redirect()->back()->with('message','Cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto) {
        return view('adm.produto.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto) {
        return view('adm.produto.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto = Produto::findOrFail($produto->id_produto);
        $produto->delete();
        return redirect()->route('adm.produto.index')->with('message','Deletado com sucesso!');
    }
}
