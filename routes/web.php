<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\FuncionarioController;
use Illuminate\Support\Facades\Auth;

use App\Models\Categoria;

// rotas da Main

Route::get('/', [ProdutoController::class, 'home'])->name('main.home');

Route::get('/sobre', function () {
    $categorias = Categoria::all();
    $cliente = Auth::id();
    return view('main.sobre', compact('categorias', 'cliente'));
})->name('main.sobre');

Route::get('/sobre/{categoria}', function () {
    return view('main.sobre');
})->name('produto.filtro');

Route::get('/login', [ClienteController::class, 'login'])->name('cliente.login');

Route::post('/login', [ClienteController::class, 'autentica'])->name('cliente.login.autentica');

Route::get('/logout', [ClienteController::class, 'logout'])->name('cliente.logout');

Route::get('/cadastro', [ClienteController::class, 'create'])->name('cliente.cadastro');

Route::post('/cadastro', [ClienteController::class, 'store'])->name('cliente.store');

Route::get('/perfil/{id}', [ClienteController::class, 'show'])->name('cliente.perfil');

Route::get('/carrinho/{id}', [CarrinhoController::class, 'show'])->name('cliente.carrinho');

Route::get('/pagamento/{id}', [VendaController::class, 'create'])->name('cliente.pagamento');

// rotas da ADM

Route::group(['prefix' => '/adm', 'as' => 'adm.'], function () {
    Route::get('/', function () {
        return redirect()->route('adm.produto.index');
    })->name('home');

    Route::get('/login', [FuncionarioController::class, 'login'])->name('login');

    Route::post('/login', [FuncionarioController::class, 'autentica'])->name('login.autentica');

    Route::get('/logout', [FuncionarioController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'produto', 'as' => 'produto.'], function () {
        Route::get('/', [ProdutoController::class, 'index'])->name('index');
        Route::get('/novo', [ProdutoController::class, 'create'])->name('create');
        Route::post('/novo', [ProdutoController::class, 'store'])->name('store');
        Route::get('/{id}', [ProdutoController::class, 'show'])->name('show');
        Route::get('/editar/{id}', [ProdutoController::class, 'edit'])->name('edit');
        Route::post('/editar/{id}', [ProdutoController::class, 'update'])->name('update');
        Route::delete('/{id}', [ProdutoController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => 'categoria', 'as' => 'categoria.'], function () {
        Route::get('/', [CategoriaController::class, 'index'])->name('index');
        Route::get('/novo', [CategoriaController::class, 'create'])->name('create');
        Route::post('/novo', [CategoriaController::class, 'store'])->name('store');
        Route::get('/editar/{id}', [CategoriaController::class, 'edit'])->name('edit');
        Route::post('/editar/{id}', [CategoriaController::class, 'update'])->name('update');
        Route::delete('/{id}', [CategoriaController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'compra', 'as' => 'compra.'], function () {
        Route::get('/', [CompraController::class, 'index'])->name('index');
        Route::get('/novo', [CompraController::class, 'create'])->name('create');
        Route::post('/novo', [CompraController::class, 'store'])->name('store');
        Route::get('/editar/{id}', [CompraController::class, 'edit'])->name('edit');
        Route::post('/editar/{id}', [CompraController::class, 'update'])->name('update');
        Route::delete('/{id}', [CompraController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'fornecedor', 'as' => 'fornecedor.'], function () {
        Route::get('/', [FornecedorController::class, 'index'])->name('index');
        Route::get('/novo', [FornecedorController::class, 'create'])->name('create');
        Route::post('/novo', [FornecedorController::class, 'store'])->name('store');
        Route::get('/editar/{id}', [FornecedorController::class, 'edit'])->name('edit');
        Route::post('/editar/{id}', [FornecedorController::class, 'update'])->name('update');
        Route::delete('/{id}', [FornecedorController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'funcironario', 'as' => 'funcionario.'], function () {
        Route::get('/', [FuncionarioController::class, 'index'])->name('index');
        Route::get('/novo', [FuncionarioController::class, 'create'])->name('create');
        Route::post('/novo', [FuncionarioController::class, 'store'])->name('store');
        Route::get('/editar/{id}', [FuncionarioController::class, 'edit'])->name('edit');
        Route::post('/editar/{id}', [FuncionarioController::class, 'update'])->name('update');
        Route::delete('/{id}', [FuncionarioController::class, 'delete'])->name('delete');
    });
});
