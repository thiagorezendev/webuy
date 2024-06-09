@extends('layout.head')
@section('titulo', 'Cadastro')

@section('main')

<main class="form-register text-center">
    <form class="">
        <img class="mb-4" src="../images/logo-header-webuy.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Fazer cadastro</h1>

        <div class="form-floating mb-1">
            <input type="text" class="form-control" id="nome" placeholder="Nome">
            <label for="nome">Nome</label>
        </div>
        <div class="form-floating mb-1">
            <input type="text" class="form-control" id="telefone" placeholder="Telefone">
            <label for="telefone">Telefone</label>
        </div>
        <div class="form-floating mb-1">
            <input type="date" class="form-control" id="data-nasc" placeholder="Data de Nascimento">
            <label for="data-nasc">Data de Nascimento</label>
        </div>
        <div class="form-floating mb-1">
            <input type="email" class="form-control" id="email" placeholder="Email">
            <label for="email">Email</label>
        </div>
        <div class="form-floating mb-1">
            <input type="password" class="form-control" id="senha" placeholder="Senha">
            <label for="senha">Senha</label>
        </div>
        <div class="form-floating mb-1">
            <input type="password" class="form-control" id="confirmarSenha" placeholder="Confirmar Senha">
            <label for="confirmarSenha">Confirmar Senha</label>
        </div>
        <button class="w-100 btn btn-lg btn-indigo mt-4" type="submit">Cadastrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2024 - Lauro e Thiago</p>
    </form>
</main>