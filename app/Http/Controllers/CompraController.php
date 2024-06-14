<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Http\Request;

class CompraController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('adm.compra.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {

        $produtos = Produto::all();
        $fornecedores = Fornecedor::all();
        return view('adm.compra.create', compact('produtos', 'fornecedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {

        Compra::create([
            'id_produto' => $request->id_produto,
            'id_fornecedor' => $request->id_fornecedor,
            'qntd_compra' => $request->qntd_compra,
            'data_compra' => date('y-m-d'),
            'preco_uni_compra' => $request->preco_uni_compra,
            'data_venc' => $request->data_venc,
        ]);
        return redirect()->back()->with('message','Cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compra $compra) {
        return view('adm.compra.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
