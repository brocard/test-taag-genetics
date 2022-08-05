<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title' => 'required|unique:books',
            'author_id' => 'required|exists:authors,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El campo título es obligatorio.',
            'title.unique' => 'El título ya existe.',
            'author_id.required' => 'El campo autor es obligatorio.',
            'author_id.exists' => 'El autor no existe.',
        ];
    }
}
