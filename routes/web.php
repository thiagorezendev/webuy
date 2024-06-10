<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FornecedorController;

Route::get('/', function () {
    return view('main.home');
})->name('home');

Route::get('/login', function () {
    return view('main.login');
})->name('login');

Route::get('/cadastro', function () {
    return view('main.cadastro');
})->name('cadastro');

Route::get('/sobre', function () {
    return view('main.sobre');
})->name('sobre');

Route::get('/pagamento', function () {
    return view('main.pagamento');
});

Route::get('/pagamento', function () {
    return view('main.pagamento');
})->name('adm.home');

Route::resource('fornecedor', FornecedorController::class);