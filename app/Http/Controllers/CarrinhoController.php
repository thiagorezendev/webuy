<?php

namespace App\Http\Controllers;

use App\Carrinho;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Produto;
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
            $estoque = Produto::find($produto_id)->estoque->qntd_estoque;
            if($qnt <= $estoque) {
                if($carrinho->produtos->where('id_produto', $produto_id)->isEmpty()) {
                    $carrinho->produtos()->attach($produto_id, ['quantidade_item' => $qnt]);
                } else {
                    $qnt_atual = $carrinho->produtos()->where('itens_venda.id_produto', $produto_id)->first()->pivot->quantidade_item;
                    if($qnt_atual + $qnt <= $estoque) {
                        $carrinho->produtos()->updateExistingPivot($produto_id, ['quantidade_item' => $qnt_atual + $qnt]);
                    } else {
                        flash('Estoque insuficiente!', 'error', [], 'Erro');
                        return back();
                    }
                }
                flash('Adicionado ao carrinho!', 'success', [], 'Sucesso');
            } else {
                flash('Estoque insuficiente!', 'error', [], 'Erro');
            }
            return back();
        } else {
            flash('Entre para adicionar produtos ao carrinho!', 'error', [], 'Erro');
            return back();
        }
    }

    public function deletarProduto($produto_id) {
        Auth::guard('web')->user()->carrinho->where('fechado', 0)->first()->produtos()->detach($produto_id);
        flash('Deletado com sucesso!', 'success', [], 'Sucesso');
        return back();
    }
}
