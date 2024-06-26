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
        if(Auth::guard('web')->check()){
            $cliente = Auth::guard('web')->user();
            $carrinho = $cliente->carrinho->where('fechado', 0)->first();
            return view('main.cliente.carrinho.show', compact('categorias', 'carrinho'));
        } else {
            flash('Entre para ver o carrinho', 'error', [], 'Erro');
            return back();
        }
    }

    public function adicionar($produto_id, $qnt) {
        if(Auth::guard('web')->check()){
            $cliente = Auth::guard('web')->user();
            $carrinho = $cliente->carrinho->where('fechado', 0)->first();
            if(empty($carrinho->produtos->where('id_produto', $produto_id))) {
                $carrinho->produtos()->attach($produto_id, ['quantidade_item' => $qnt]);
            } else {
                dd('Achou');
            }
            
            flash('Adicionado ao carrinho!', 'success', [], 'Sucesso');
            return back();
        } else {
            flash('Entre para adicionar produtos ao carrinho!', 'error', [], 'Erro');
            return back();
        }
    }
}
