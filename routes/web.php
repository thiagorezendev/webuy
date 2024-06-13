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

Route::get('/perfil', function () {
    return view('main.cliente.create');
})->name('cliente.cadastro');

Route::get('/carrinho', function () {
    return view('main.cliente.carrinho.show');
})->name('cliente.carrinho');

Route::get('/pagamento', function () {
    return view('main.cliente.venda.create');
})->name('cliente.pagamento');

// rotas da ADM

Route::get('/adm/login', function () {
    return view('adm.funcionario.login');
})->name('adm.login');

Route::get('/adm', function () {
    return redirect()->route('adm.produto');
})->name('adm.home');

Route::get('/adm/produto', function () {
    return view('adm.produto.index');
})->name('adm.produto');

Route::get('/adm/produto/novo', function () {
    return view('adm.produto.create');
})->name('adm.produto.create');

Route::get('/adm/categoria', function () {
    return view('adm.categoria.index');
})->name('adm.categoria');

Route::get('/adm/categoria/novo', function () {
    return view('adm.categoria.create');
})->name('adm.categoria.create');

Route::get('/adm/compra', function () {
    return view('adm.compra.index');
})->name('adm.compra');

Route::get('/adm/compra/novo', function () {
    return view('adm.compra.create');
})->name('adm.compra.create');

Route::get('/adm/fornecedor', function () {
    return view('adm.fornecedor.index');
})->name('adm.fornecedor');

Route::get('/adm/fornecedor/novo', function () {
    return view('adm.fornecedor.create');
})->name('adm.fornecedor.create');

Route::get('/adm/funcionario', function () {
    return view('adm.funcionario.index');
})->name('adm.funcionario');

Route::get('/adm/funcionario/novo', function () {
    return view('adm.funcionario.create');
})->name('adm.funcionario.create');

