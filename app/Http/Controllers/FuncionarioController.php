<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FuncionarioController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $funcionarios = Funcionario::all();
        return view('adm.funcionario.index', compact('funcionarios'));
    }

    public function login() {
        return view('adm.funcionario.login');
    }

    public function autentica(Request $request) {
        date_default_timezone_set('America/Sao_Paulo');
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('admin')->attempt($credentials)) {
            $data = [
                'id_func' => Auth::guard('admin')->user()->id,
                'data_login' => date('y-m-d  h:i:s')
            ];

            DB::table('logins')->insertGetId($data);
            $request->session()->regenerate();
            return redirect()->route('adm.home');
        }
 
        return back()->with('message', 'Email ou senha incorretos!');
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
     
        return redirect()->route('main.home');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('adm.funcionario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        Funcionario::create([
            'nome_func' => $request -> nome_func,
            'email' => $request -> email,
            'password' => Hash::make($request -> password),
        ]);
        return redirect()->back()->with('message','Cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $funcionario = Funcionario::findOrFail($id);
        return view('adm.funcionario.edit' , compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $id = Funcionario::findOrFail($id);
        $id->update([
            'nome_func' => $request -> nome_func,
            'email' => $request -> email,
            'password' => Hash::make($request -> password),
        ]);
        return redirect()->route('adm.funcionario.index')->with('message','Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->delete();
        return redirect()->route('adm.funcionario.index')->with('message','Deletado com sucesso!');
    }
}
