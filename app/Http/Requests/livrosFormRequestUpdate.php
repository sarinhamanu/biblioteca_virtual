<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class livrosFormRequestUpdate extends FormRequest
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
         'titulo'=>'required|max:50|min:1',
         'autor'=>'required|max:50|min:1',
         'data_de_lancamento'=>'required|date',
         'editora'=>'required|max:50|min:1',
         'sinopse'=>'required|max:1000|min:1',
         'genero'=>'required|max:50|min:1',
         'avaliacao'=>'max:1000|min:1',

        ];
    }
    public function failedValidation (Validator $validator){
        throw new HttpResponseException(response()->json([
            'sucess' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages()
    {
        return[
         'titulo.required'=>' o campo titulo e obrigatorio',
         'titulo.max'=>'o campo titulo deve conter no maximo 50 caracteres',
         'titulo.min'=>'o campo titulo deve conter no minimo 1 caracteres',
         'autor.required'=>'o campo autor e obrigatorio',
         'autor.max'=>'o campo autor deve conter no maximo 50 caracteres',
         'autor.min'=>'o campo autor deve conter no minimo 1 caracteres',
         'data_de_lancamento.required'=>'o campo data de nascimento  e obrigatorio',
         'data_de_lancamento.date'=>'formato invalido',
         'editora.required'=>'o campo editora e obrigatorio',
         'editora.max'=>'o campo editora deve conter no maximo 50 caracteres',
         'editora.min'=>'o campo editora deve conter no minimo 1 caracteres',
         'sinopse.required'=>'o campo sinopse e obrigatorio',
         'sinopse.max'=>'o campo sinopse deve conter no maximo 1000 caracteres',
         'sinopse.min'=>'o campo sinopse deve conter no minimo 1 caracteres',
         'genero.required'=>'o campo genero e obrigatorio',
         'genero.max'=>'o campo genero deve conter no maximo 50 caracteres',
         'genero.min'=>'o campo genero deve conter no minimo 1 caracteres',
         'avaliacao.max'=>'o campo avaliacao deve conter no maximo 1000 caracteres',
         'avaliacao.min'=>'o campo avaliacao deve conter no minimo 1 caracteres',


        ];
    }
}


