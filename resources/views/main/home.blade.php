@extends('layout.head')
@section('titulo', 'Home')

@section('main')


<header class="p-3 mb-3 border-bottom">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
        <img src="{{ asset('images/logo-header-webuy.png')}}" alt="logo webuy" width="100" height="35">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorias
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Lucas Colen</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sobre</a>
          </li>
        </ul>
        <div class="d-flex justify-content-center">
          <form class="d-flex flex-fill me-2" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          <div class="dropdown text-end">
            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="{{ asset('images/people.svg')}}" alt="perfil" width="40" height="40" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small">
              <li><a class="dropdown-item" href="{{route('login')}}">Entrar</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>



<div class="container">
  <div class="row" data-masonry='{"percentPosition": true }'>
    <div class="col-sm-6 col-lg-4 mb-4">
      <div class="card">
        <img src="{{ asset('images/renan.jpeg')}}" alt="" class="rounded">
        <div class="card-body">
          <h5 class="card-title">Renan Ciríaco</h5>
          <p class="card-text">R$ 100,00</p>
          <div class="d-grid gap-2 mx-auto">
            <button class="btn btn-indigo">Ver</button>
            <button class="btn btn-outline-dark">Adicionar ao Carrinho</button>
            
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection