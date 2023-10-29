<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DonateFormRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:1', "max:28", Rule::unique('donates', 'title')->ignore($this->donate, 'id')],
            'description' => ['required', 'min:4'],
            'price' => ['required', 'numeric', 'min:1'],
            'command' => ['required', 'min:3'],
            'image' => ['required_without:title', 'image'],
            'is_rank' => [],
        ];
    }
}
