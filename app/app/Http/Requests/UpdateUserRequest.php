<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email', function ($name, $item, $fail) {
                // もし既に使用されているemailなら弾く
                if (count(User::where([
                        ['email', $item],
                        ['id', '<>', Auth::id()]
                    ])->get())) {
                    $fail('The email address is already in use.');
                }
            }],
            'name' => ['required', 'between:4,64'],
        ];
    }
    public function messages()
    {
        return [
            'email' => [
                'required' => 'Emailは必須です',
                'email' => 'Emailの形式が正しくありません。',
            ],
            // ...
        ];
    }
}

