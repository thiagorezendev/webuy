<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome_cli' => 'required|string|max:50',
            'tel_cli' => 'required|max:11',
            'cpf_cli' => 'required|max:11',
            'data_nasc_cli' => 'required|date',     
            'email' => 'required|email|unique:clientes,email|max:100',
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nome_cli.required' => 'O campo nome é obrigatório',
            'tel_cli.required' => 'O campo telefone é obrigatório',
            'cpf_cli.required' => 'O campo cpf é obrigatório',
            'data_nasc_cli.required' => 'O campo data de nascimento é obrigatório',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email deve ser um email válido',
            'email.unique' => 'Já há um cadastro com esse email',
            'password.required' => 'O campo senha é obrigatório',
        ];
    }
}
