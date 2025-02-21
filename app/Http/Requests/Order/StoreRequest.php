<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'full_user_name' => ['required', 'string', 'regex:/^([А-Я]{1}[а-я]+\s?){3}$/u'],
            'qty' => ['required', 'integer', 'gte:1'],
            'comment' => ['nullable', 'string', 'max:255'],
        ];
    }
}
