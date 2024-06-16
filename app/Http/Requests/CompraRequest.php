<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraRequest extends FormRequest
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
            'id_produto' => 'required|integer',
            'id_fornecedor' => 'required|integer',
            'qntd_compra' => 'required|integer',
            'preco_uni_compra' => 'required|numeric',
            'data_venc' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'id_produto.required' => 'O campo produto é obrigatório',
            'id_produto.integer' => 'O campo produto deve ser um número inteiro',
            'id_fornecedor.required' => 'O campo fornecedor é obrigatório',
            'id_fornecedor.integer' => 'O campo fornecedor deve ser um número inteiro',
            'qntd_compra.required' => 'O campo quantidade é obrigatório',
            'qntd_compra.integer' => 'O campo quantidade deve ser um número inteiro',
            'preco_uni_compra.required' => 'O campo preço é obrigatório',
            'preco_uni_compra.numeric' => 'O campo preço deve ser um número',
            'data_venc.required' => 'O campo data de vencimento é obrigatório',
            'data_venc.date' => 'O campo data de vencimento deve ser uma data',
        ];
    }
}
