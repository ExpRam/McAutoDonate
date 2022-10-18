<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PromocodeFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'promocode' => ['required', 'string', Rule::unique('promocodes', 'promocode')->
            ignore($this->route()->parameter('promocode'), 'id')],
            'count' => ['required', 'numeric', 'min:1'],
            'percent' => ['required', 'numeric', 'min:1'],
        ];
    }
}
