<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use App\Rules\CF;

class SignupStoreRequest extends FormRequest
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
            'nome' => 'required|string|max:255',
            'cognome' => 'required|string|max:255',
            'sesso' => 'required|integer',
            'cf' => [
                "required",
                new CF
            ],
            'indirizzo' => 'required|string|max:255',
            'nation_id' => 'required|integer|exists:nations,id',
            'municipality_id' => 'required|integer|exists:nations,id',
            'email' => 'required|string|max:255|email',
            'telefono' => 'required|string|max:255',
            'user' => 'required|string|max:255|unique:App\Models\User,user',
            'password' => [
                'required',
                'string',
                'max:255',
                Password::min(8)->mixedCase()->numbers()->symbols()
            ]
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'cf' => strtoupper($this->cf),
            'telefono' => str_replace(array( ' ', '.',
            '/' , '\\', ':', '-', '*', '#', '(', ')' ), "", $this->telefono)
        ]);
    }

    public function validated($key = null, $default = null)
    {
        $request = $this->validator->validated();

        if ($this->filled('password')) {
            $request['password'] = sha1($this->password);
        } else {
            unset($request['password']);
        }
        $request["role_id"] = 2;
        $request["stato"] = 0;

        return $request;
    }

}
