<?php

namespace App\Http\Controllers;

use App\Http\Requests\FornecedorRequest;
use App\Models\Compra;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $fornecedores = Fornecedor::all();
        return view('adm.fornecedor.index', compact('fornecedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('adm.fornecedor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FornecedorRequest $request) {
        Fornecedor::create($request->all());
        flash('Fornecedor cadastrado com sucesso!', 'success', [], 'Sucesso');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_fornecedor) {
        $fornecedor = Fornecedor::findOrFail($id_fornecedor);
        return view('adm.fornecedor.edit', compact('fornecedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FornecedorRequest $request, $id_fornecedor) {
        $id_fornecedor = Fornecedor::findOrFail($id_fornecedor);
        $id_fornecedor->update($request->all());
        flash('Fornecedor atualizado com sucesso!', 'success', [], 'Sucesso');
        return redirect()->route('adm.fornecedor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_fornecedor) {
        Compra::where('id_fornecedor', $id_fornecedor)->update(['id_fornecedor' => null]);
        $fornecedor = Fornecedor::findOrFail($id_fornecedor);
        $fornecedor->delete();
        flash('Fornecedor deletado com sucesso!', 'success', [], 'Sucesso');
        return redirect()->route('adm.fornecedor.index');
    }

    public function pesquisa(Request $request) {
        $query = $request->input('query');
        $fornecedores = Fornecedor::where('nome_fornecedor', 'like', '%' . $query . '%')->get();
        return view('adm.fornecedor.index', compact('fornecedores'));
    }
}
