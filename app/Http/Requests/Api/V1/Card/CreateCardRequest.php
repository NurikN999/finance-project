<?php

namespace App\Http\Requests\Api\V1\Card;

use Illuminate\Foundation\Http\FormRequest;

class CreateCardRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'bin' => ['required', 'string'],
            'bank_id' => ['required', 'integer', 'exists:banks,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'amount' => ['nullable', 'integer', 'min:1'],
        ];
    }
}
