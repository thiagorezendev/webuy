@extends('layout.head')
@section('titulo', 'Login')

@section('main')

<main class="form-signin text-center">
  <form action="{{ route('cliente.login.autentica') }}" method="POST">
    @csrf
    <a href="{{ route('main.home') }}" class="link-body-emphasis text-decoration-none">
      <img class="mb-3" src="../images/logo-webuy.png" alt="" width="200" height="160">
    </a>
    <h1 class="h3 mb-3">Fazer login</h1>

    <div class="form-floating mb-2">
      <input type="email_cliente" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" value={{ old('email') }}>
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating mb-2">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Senha" value={{ old('password') }}>
      <label for="floatingPassword">Senha</label>
    </div>

    <div class="checkbox mb-3 mt-3">
      <label>
        <input type="checkbox" value="remember-me"> Lembrar de mim
      </label>
    </div>
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button class="w-100 btn btn-lg btn-indigo" type="submit">Entrar</button>
    <p class="mt-3">Não tem cadastro? <a class="text-indigo" href="{{ route('cliente.cadastro') }}">Cadastre-se</a></p>
    <p class="mt-3 mb-3 text-muted">&copy; 2024 - Lauro e Thiago</p>
  </form>
</main>

