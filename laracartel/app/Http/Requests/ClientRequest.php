<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'nom' => 'required|regex:/^[\pL\s\d\-]+$/u|min:1|max:255',
            'raisonsoc' => 'required|regex:/^[\pL\s\d\-]+$/u|min:1|max:255',
            'siege' => 'required|regex:/^[\pL\s\d\-]+$/u|min:1|max:255'
        ];
    }
}
