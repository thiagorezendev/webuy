<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller {
    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('main.cliente.create');
    }

    public function login() {
        return view('main.cliente.login');
    }

    public function autentica(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('main.home');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        Cliente::create([
            'cpf_cli' => $request -> cpf_cli,
            'nome_cli' => $request -> nome_cli,
            'email' => $request -> email,
            'tel_cli' => $request -> tel_cli,
            'password' => Hash::make($request -> password),
            'data_nasc_cli' => $request -> data_nasc_cli
        ]);

        Endereco::create($request->all());
        return redirect()->route('main.home')->with('message','Cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
