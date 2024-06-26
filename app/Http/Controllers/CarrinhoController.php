<?php

namespace App\Http\Controllers;

use App\Carrinho;
use App\Models\Categoria;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\AtMost;

class CarrinhoController extends Controller {

    public function show() {
        $categorias = Categoria::all();
        if(Auth::check()){
            $cliente = Cliente::findOrFail(Auth::guard('web')->user()->id);
            return view('main.cliente.carrinho.show', compact('categorias', 'cliente'));
        } else {
            flash('Entre para ver o carrinho', 'error', [], 'Erro');
            return back();
        }
    }

    public function adicionar($produto_id, $qnt) {
        if(Auth::check()){
            $cliente = Cliente::findOrFail(Auth::guard('web')->user()->id);
            $cliente->carrinho->produtos()->attach($produto_id, ['quantidade_item' => $qnt]);
            flash('Adicionado ao carrinho!', 'success', [], 'Sucesso');
            return back();
        } else {
            flash('Entre para adicionar produtos ao carrinho!', 'error', [], 'Erro');
            return back();
        }
    }
}
