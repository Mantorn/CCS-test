<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'status' => 'string|max:255|nullable',
            'name' => 'required|string|max:255',
            'customer_description' => 'string|max:255|nullable',
            'inside_description' => 'string|max:255|nullable',
            'date_of_return' => 'string|max:255|nullable',
            'company_id' => 'nullable|exists:companies,id',
        ];
    }
}
