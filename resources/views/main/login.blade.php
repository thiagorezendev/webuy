@extends('layout.head')
@section('titulo', 'Login')

@section('main')

<main class="form-signin text-center">
  <form class="">
    <img class="mb-4" src="../images/logo-header-webuy.png" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Fazer logon</h1>

    <div class="form-floating mb-1">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating mb-1">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Senha</label>
    </div>

    <div class="checkbox mb-3 mt-3">
      <label>
        <input type="checkbox" value="remember-me"> Lembrar de mim
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-indigo" type="submit">Entrar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2024 - Lauro e Thiago</p>
  </form>
</main>

