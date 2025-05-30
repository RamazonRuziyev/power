<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePetitionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
//            'fio' => 'required|string',
//            'mfy' => 'required|string',
//            'village' => 'required|string',
//            'phone' => 'required|max:13',
//            'description' => 'required',
//            'employee' => 'required',
        ];
    }
}
