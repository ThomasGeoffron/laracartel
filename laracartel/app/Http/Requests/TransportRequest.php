<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransportRequest extends FormRequest
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
            'user' => 'required|exists:users,id',
            'vehicule' => 'required|regex:/^[\pL\s\d\-]+$/u|min:1|max:255',
            'depart' => 'required|date',
            'destination' => 'required|regex:/^[\pL\s\d\-]+$/u|min:1|max:255'
        ];
    }
}
