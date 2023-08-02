<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:contacts,email' . ($this->route('contact') ?','. $this->contact->id: '')],
            'job' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'birthday' => ['nullable', 'date'] ,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'mobiles' => ['sometimes', 'required', 'array'],
            'mobile.*' => ['required', 'regex:/^\+?[0-9]{8,15}$/']
        ];
    }
}
