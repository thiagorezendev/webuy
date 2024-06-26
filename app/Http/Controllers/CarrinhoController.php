<?php

namespace App\Http\Controllers;

use App\Carrinho;
use App\Models\Categoria;
use App\Models\Cliente;
use Illuminate\Http\Request;

class CarrinhoController extends Controller {

    public function show($id) {
        $categorias = Categoria::all();
        $cliente = Cliente::findOrFail($id);
        return view('main.cliente.carrinho.show', compact('categorias', 'cliente'));
    }

    public function adicionar($id, $qnt) {
    }
}
