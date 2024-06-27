@extends('layout.main-frame')

@section('titulo', 'Mudar Senha')

@section('content')
<div class="container">
    <h2>Mudar Senha</h2>
    <form action="{{ route('cliente.update-senha') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="current_password">Senha Atual</label>
            <input type="password" name="current_password" id="current_password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="new_password">Nova Senha</label>
            <input type="password" name="new_password" id="new_password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="new_password_confirmation">Confirme a Nova Senha</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Atualizar Senha</button>
    </form>
</div>
@endsection
