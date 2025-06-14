<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMembershipPlanRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'period_month' => 'nullable|integer|min:1',
            'highlight' => 'nullable|string',
            'badge' => 'nullable|string',
            'features' => 'required|array|min:1',
            'features.*' => 'string|max:255',
            'promos' => 'nullable|array',
            'promos.*' => 'exists:promos,id',
        ];
    }

    public function prepareForValidation()
    {
        $features = array_filter($this->input('features', []));
        $this->merge([
            'features' => array_values($features), // Reindex array
        ]);
    }
}
