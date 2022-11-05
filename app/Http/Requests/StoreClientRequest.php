<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'contact_name' => 'required',
            'contact_phone_number' => 'required',
            'contact_email' => 'required|email|unique:clients,contact_email',
            'company_adress' => 'required',
            'company_name' => 'required',
            'company_phone_number' => 'required',
        ];
    }
}
