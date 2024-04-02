<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StudentFormRequest extends FormRequest
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
            'code_etudiant' => ['required', 'min:4'],
            'prenom' => ['required'],
            'nom' => ['required'],
            'email_personnelle' => ['required'],
            'date_naissance' => ['required'],
            'telephone' => ['required', 'integer'],
            'adresse' => ['required'],
            'image' => ['image'],
            'password' => ['required'],
        ];
    }
}
