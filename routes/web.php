<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main.home');
})->name('home');

Route::get('/login', function () {
    return view('main.login');
})->name('login');

Route::get('/cadastro', function () {
    return view('main.cadastro');
})->name('cadastro');

Route::get('/pagamento', function () {
    return view('main.pagamento');
});