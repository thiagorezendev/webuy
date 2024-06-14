<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('adm.categoria.index');
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
    public function store(Request $request) {
        Categoria::create($request->all());
        return redirect()->back()->with('message','Cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
