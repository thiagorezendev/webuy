<?php

namespace App\Http\Controllers;

use App\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('adm.venda.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('adm.venda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venda $venda) {
        return view('adm.venda.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venda $venda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venda $venda)
    {
        //
    }
}
