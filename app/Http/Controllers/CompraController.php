<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompraRequest;
use App\Models\Compra;
use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CompraController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $compras = Compra::all();
        return view('adm.compra.index', compact('compras'));
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
    public function store(CompraRequest $request) {
        Compra::create([
            'id_produto' => $request->id_produto,
            'id_fornecedor' => $request->id_fornecedor,
            'qntd_compra' => $request->qntd_compra,
            'data_compra' => date('Y-m-d'),
            'preco_uni_compra' => $request->preco_uni_compra,
            'data_venc' => $request->data_venc,
        ]);
        flash('Compra cadastrada com sucesso!', 'success', [], 'Sucesso');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_compra) {
        $compra = Compra::findOrFail($id_compra);
        $produtos = Produto::all();
        $fornecedores = Fornecedor::all();
        return view('adm.compra.edit', compact('compra', 'produtos', 'fornecedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompraRequest $request, $id_compra)
    {
        $compra = Compra::findOrFail($id_compra);
        $compra->update($request->all()); 
        flash('Compra atualizada com sucesso!', 'success', [], 'Sucesso');
        return redirect()->route('adm.compra.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_compra)
    {
        $compra = Compra::findOrFail($id_compra);
        $compra->delete();
        flash('Compra deletada com sucesso!', 'success', [], 'Sucesso');
        return redirect()->route('adm.compra.index');
    }
    
    public function pesquisa(Request $request) {
        $query = $request->input('query');
        $compras = Compra::join('produtos', 'compras.id_produto', '=', 'produtos.id_produto')
                          ->where('produtos.nome_produto', 'LIKE', '%' . $query . '%')
                          ->select('compras.*')
                          ->get();
        return view('adm.compra.index', compact('compras'));
    }
}
