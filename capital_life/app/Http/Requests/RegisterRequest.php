<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            //
            'nama' => ['required'],
            'jenis_kelamin' => ['required'],
            'no_ktp' => ['required'],
            'no_hp' => ['required'],
            'email' => ['required'],
            'kota' => ['required'],
            'referral' => [],
            'username' => ['required'],
            'password' => ['required', 'same:cpassword'],
            'cpassword' => ['required']
        ];
    }
}
