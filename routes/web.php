<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FornecedorController;

Route::get('/', function () {
    return view('main.home');
})->name('home');

Route::get('/sobre', function () {
    return view('main.sobre');
})->name('sobre');

Route::get('/login', function () {
    return view('main.cliente.login');
})->name('cliente.login');

Route::get('/cadastro', function () {
    return view('main.cliente.create');
})->name('cliente.cadastro');

Route::get('/pagamento', function () {
    return view('main.cliente.venda.create');
})->name('cliente.pagamento');

Route::get('/adm', function () {
    return view('adm.home');
})->name('adm.home');

Route::resource('fornecedor', FornecedorController::class);