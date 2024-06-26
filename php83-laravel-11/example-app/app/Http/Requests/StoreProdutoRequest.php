<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdutoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'string|max:255|required',
            'categoria_id' => 'exists:produtos_categorias,id|required'
        ];
    }
}