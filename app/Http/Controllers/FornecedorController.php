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
    public function edit(Fornecedor $fornecedor) {
        return view('adm.fornecedor.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fornecedor $fornecedor)
    {
        //
    }
}
