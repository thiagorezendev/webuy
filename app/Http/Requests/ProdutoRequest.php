<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest{
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
            'nome_produto' => 'required|string',
            'desc_produto' => 'required|string',
            'id_categoria' => 'required|numeric',
            'foto_produto' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'preco_produto' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'nome_produto.required' => 'O campo nome do produto é obrigatório',
            'desc_produto.required' => 'O campo descrição do produto é obrigatório',
            'id_categoria.required' => 'O campo categoria do produto é obrigatório',
            'foto_produto.required' => 'O campo foto do produto é obrigatório',
            'preco_produto.required' => 'O campo preço do produto é obrigatório',
            'preco_produto.numero' => 'O campo preço do produto deve ser um número',
        ];
    }
}
