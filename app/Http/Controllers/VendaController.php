<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Categoria;
use App\Models\Venda;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendaController extends Controller {

    public function index() {
        $vendas = Venda::all();
        return view('adm.venda.index', compact('vendas'));
    }

    public function create() {
        if(Auth::guard('web')->check()){
            $categorias = Categoria::all();
            $cliente = Auth::guard('web')->user();
            $carrinho = $cliente->carrinho->where('fechado', 0)->first();
            return view('main.cliente.venda.create', compact('categorias', 'carrinho'));
        } else {
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        date_default_timezone_set('America/Sao_Paulo');
        $cliente = Auth::guard('web')->user();
        $carrinho = $cliente->carrinho->where('fechado', 0)->first();
        Venda::create([
            'id_carrinho' => $carrinho->id_carrinho,
            'pagamento_venda' => $request->pagamento_venda,
            'entrega_venda' => $request->entrega_venda,
            'data_venda' => date('y-m-d  H:i:s')
        ]);
        $carrinho->update([
            'fechado' => 1
        ]);
        Carrinho::create([
            'id_cli' => $cliente->id,
            'fechado' => 0
        ]);
        flash('Obrigado! Compra realizada com sucesso!', 'success', [], 'Sucesso');
        return redirect(route('main.home'));
    }

    public function pesquisa(Request $request) {
        $query_feita = $request->input('query');
        $vendas = Venda::whereHas('carrinho.cliente', function ($query) use ($query_feita) {
            $query->where('nome_cli', 'like', '%'.$query_feita.'%');
        })->get();
        return view('adm.venda.index', compact('vendas'));
    }
}
