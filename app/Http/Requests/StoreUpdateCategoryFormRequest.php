<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUpdateCategoryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title'       => 'required|string|max:155|unique:categories,title',
            'url'         => 'required|string|max:255|unique:categories,url',
            'description' => 'required|string|max:255'
        ];

        if(in_array($this->method(), ['PUT', 'PATCH'])) {
            $id = $this->route()->parameter('id');
            $rules['title'] = 'required|string|max:155|unique:categories,title,'.$id;
            $rules['url']   = 'required|string|max:255|unique:categories,url,'.$id;
        }
       return $rules;
    }

    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        $response = response()->json([
            "error" => "Erro no envio de dados.",
            "details" => $errors->messages()
        ], 422);
        throw new HttpResponseException($response);
    }
}
