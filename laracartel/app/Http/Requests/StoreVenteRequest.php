<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVenteRequest extends FormRequest
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
            'stock' => 'required|exists:stock,id',
            'transport' => 'required|exists:transport,id',
            'client' => 'required|exists:client,id',
            'date' => 'required|date',
            'qte' => 'required|min:1'
        ];
    }
}
