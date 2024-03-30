<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FiltrarProdutoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'sometimes|string|max:255|nullable',
            'categoria_id' => 'sometimes|exists:produtos_categorias,id|nullable',
            'page' => 'sometimes|integer|min:1',
            'perPage' => 'sometimes|integer|min:1|max:100'
        ];
    }
}