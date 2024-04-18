<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'prenom' => 'required',
            'etablissement_id' => 'required',
            'role_id'  => 'required',
            // 'email' => 'required',
            // 'password' => 'required',
            // 'natinalite' => 'required',
            // 'address' => 'required',
            // 'phone' => 'required',
            // 'lieu_de_naissance' => 'required',
            // 'date_de_naissance' => 'required',
           
        ];
    }
}
