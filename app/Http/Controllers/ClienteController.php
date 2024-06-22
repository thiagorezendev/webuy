<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Http\Requests\ClienteRequestUpdate;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('main.cliente.create');
    }

    public function login()
    {
        return view('main.cliente.login');
    }

    public function autentica(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ],
            [
                'email.required' => 'O campo email é obrigatório',
                'email.email' => 'O campo email deve ser um email válido',
                'password.required' => 'O campo senha é obrigatório',
            ]
        );


        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('main.home');
        }

        flash('Email ou senha incorretos!', 'error', [], 'Erro');
        return back();
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('main.home');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteRequest $request)
    {
        $cliente = Cliente::create([
            'cpf_cli' => $request->cpf_cli,
            'nome_cli' => $request->nome_cli,
            'email' => $request->email,
            'tel_cli' => $request->tel_cli,
            'password' => Hash::make($request->password),
            'data_nasc_cli' => $request->data_nasc_cli
        ]);

        Endereco::create([
            'id_cli' => $cliente->id,
            'cep' => $request->cep,
            'numero' => $request->numero,
            'complemento' => $request->complemento
        ]);
        flash('Cadastrado com sucesso!', 'success', [], 'Sucesso');
        return redirect()->route('cliente.login');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categorias = Categoria::all();
        $cliente = Cliente::findOrFail($id);
        return view('main.cliente.show', compact('categorias', 'cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorias = Categoria::all();
        $cliente = Cliente::findOrFail($id);
        return view('main.cliente.edit', compact('categorias', 'cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteRequestUpdate $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->update($request->all());
        flash('Atualizado com sucesso!', 'success', [], 'Sucesso');
        return redirect()->route('main.home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Endereco::where('id_cli', $id)->delete();
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        flash('Deletado com sucesso!', 'success', [], 'Sucesso');
        return redirect()->route('main.home');
    }
}
