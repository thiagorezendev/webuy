<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Endereco;
use Illuminate\Http\Request;

class ClienteController extends Controller {
    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('main.cliente.create');
    }

    public function login() {
        return view('main.cliente.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        Cliente::create($request->all());
        Endereco::create($request->all());
        return redirect()->route('main.home')->with('message','Cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
