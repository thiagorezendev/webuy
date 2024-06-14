<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\Estoque;
use Illuminate\Http\Request;

class ProdutoController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $produtos = Produto::all();
        return view('adm.produto.index', compact('produtos'));
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
        Produto::create($request->all());
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
        //
    }
}
