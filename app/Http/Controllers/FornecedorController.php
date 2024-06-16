<?php

namespace App\Http\Controllers;

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
    public function store(Request $request) {
        Fornecedor::create($request->all());
        return redirect()->back()->with('message','Cadastrado com sucesso!');
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
    public function update(Request $request, $id_fornecedor)
    {
        $id_fornecedor = Fornecedor::findOrFail($id_fornecedor);
        $id_fornecedor->update($request->all());
        return redirect()->route('adm.fornecedor.index')->with('message','Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_fornecedor)
    {
        $fornecedor = Fornecedor::findOrFail($id_fornecedor);
        $fornecedor->delete();
        return redirect()->route('adm.fornecedor.index')->with('message','Deletado com sucesso!');
    }
}
