<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FornecedorController;

// rotas da Main

Route::get('/', function () {
    return view('main.home');
})->name('main.home');

Route::get('/sobre', function () {
    return view('main.sobre');
})->name('main.sobre');

Route::get('/login', function () {
    return view('main.cliente.login');
})->name('cliente.login');

Route::get('/cadastro', function () {
    return view('main.cliente.create');
})->name('cliente.cadastro');

Route::get('/pagamento', function () {
    return view('main.cliente.venda.create');
})->name('cliente.pagamento');

// rotas da ADM

Route::get('/adm', function () {
    return redirect()->route('adm.produto');
})->name('adm.home');

Route::get('/adm/produto', function () {
    return view('adm.produto.index');
})->name('adm.produto');

Route::get('/adm/login', function () {
    return view('adm.funcionario.login');
})->name('adm.login');

Route::get('/adm/categoria', function () {
    return view('adm.categoria.index');
})->name('adm.categoria');

Route::get('/adm/compra', function () {
    return view('adm.compra.index');
})->name('adm.compra');

Route::get('/adm/fornecedor', function () {
    return view('adm.fornecedor.index');
})->name('adm.fornecedor');

Route::get('/adm/funcionario', function () {
    return view('adm.funcionario.index');
})->name('adm.funcionario');

