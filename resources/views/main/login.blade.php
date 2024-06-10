@extends('layout.head')
@section('titulo', 'Login')

@section('main')

<main class="form-signin text-center">
  <form class="">
    <a href="{{ route('home') }}" class="link-body-emphasis text-decoration-none">
      <img class="mb-3" src="../images/logo-header-webuy.png" alt="" width="200" height="70">
    </a>
    <h1 class="h3 mb-3">Fazer login</h1>

    <div class="form-floating mb-2">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating mb-2">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Senha</label>
    </div>

    <div class="checkbox mb-3 mt-3">
      <label>
        <input type="checkbox" value="remember-me"> Lembrar de mim
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-indigo" type="submit">Entrar</button>
    <p class="mt-3">Não tem cadastro? <a class="text-indigo" href="{{ route('cadastro') }}">Cadastre-se</a></p>
    <p class="mt-3 mb-3 text-muted">&copy; 2024 - Lauro e Thiago</p>
  </form>
</main>

