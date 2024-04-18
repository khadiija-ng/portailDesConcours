<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConcourRequest extends FormRequest
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
            'nom' => 'required',
            'description' => 'required',
            'date_debut' => 'date',
            'date_fin'  => 'date',
            'etat' => 'required',
            'Frais' => 'required',
            'etablissement_id' => 'required',
            // 'image' => 'required'
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ];
    }
}
