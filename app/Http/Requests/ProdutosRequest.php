<?php

namespace estoque\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //aqui poderiamos colocar opcoes de validacao de permissao de usuario, se for false nao insere
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|max:100',
            'descricao' => 'required|max:255',
            'valor' => 'required|numeric'
        ];
    }
    /*public function messages()
    {
        return [
            'required' => 'The :attribute field can not be empty.',
        ];
    }*/
}
