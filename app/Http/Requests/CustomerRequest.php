<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName'  => ['required', 'string', 'max:255'],
            'phone'     => ['required', 'string', 'max:35'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'education' => 'required',
        ];
    }
}
