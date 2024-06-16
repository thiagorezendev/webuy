<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FornecedorRequest extends FormRequest
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
            'nome_fornecedor' => 'required|string',
            'email_fornecedor' => 'required|email',
        ];
    }

    public function messages(): array
    {
        return [
            'nome_fornecedor.required' => 'O campo nome é obrigatório',
            'nome_fornecedor.string' => 'O campo nome deve ser uma string',
            'email_fornecedor.required' => 'O campo email é obrigatório',
            'email_fornecedor.email' => 'O campo email deve ser um email válido',
        ];
    }
}
