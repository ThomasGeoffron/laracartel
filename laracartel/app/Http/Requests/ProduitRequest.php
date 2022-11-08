<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
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
        return [
            'designation' => 'required|regex:/^[\pL\s\d\-]+$/u|min:1|max:255',
            'description' => 'required|regex:/^[\pL\s\d\-]+$/u|min:1|max:255',
            'pu' => 'required|numeric|min:0|max:99999999.99'
        ];
    }
}
