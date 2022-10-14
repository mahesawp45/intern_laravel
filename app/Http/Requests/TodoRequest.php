<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // sementara karena belum ada authentication jadi di true aja dulu
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

            'title' => 'max:255',
            'content' => 'max:1000',
        ];
    }

    public function messages()
    {
        return [
            'title.max' => 'Title max 255 characters',
            'content.max' => 'Content max 1000 characters'
        ];
    }
}
