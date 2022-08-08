<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUpdateCompanyFormRequest extends FormRequest
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
            'category_id'  => 'required|exists:categories,id',
            'name'         => 'required|unique:companies',
            'whatsapp'     => 'required|unique:companies',
            'email'        => 'required|unique:companies',
            'phone'        => 'nullable|unique:companies',
        ];

        if(in_array($this->method(), ['PUT', 'PATCH'])) {
            $id = $this->route()->parameter('id');
            $rules['name']     = 'required|unique:companies,name,'.$id;
            $rules['whatsapp'] = 'required|unique:companies,whatsapp,'.$id;
            $rules['email']    = 'required|unique:companies,email,'.$id;
            $rules['phone']    = 'nullable|unique:companies,phone,'.$id;
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
