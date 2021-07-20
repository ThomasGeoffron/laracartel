<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntrepotRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'localisation' => 'required|regex:/^[\pL\s\d\-]+$/u|min:1|max:255',
            'capacite' => 'required|integer|min:1|max:1000000',
            'gerant' => 'required|exists:users,id'
        ];
    }
}
