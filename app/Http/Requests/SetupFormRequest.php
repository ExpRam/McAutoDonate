<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetupFormRequest extends FormRequest
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
            'username' => ['required', 'string', 'min:2'],
            'password' => ['required'],
            'private_token' => ['required'],
            'themecode' => ['required'],
            'rcon_host' => ['required'],
            'rcon_port' => ['required', 'numeric'],
            'rcon_password' => ['required'],
        ];
    }
}
