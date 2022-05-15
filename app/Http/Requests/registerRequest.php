<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
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
                'name' => 'required|min:3|max:50',
                'email' => 'required|string|email|max:255|unique:users,email,',
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6'
        ];
    }
    public function messages(){
        return[
            'name.required' => 'Vui lòng nhập tên của bạn.',
            'name.min' => 'Tên phải có ít nhất 3 ký tự.',
            'email.unique' => 'Email không được trùng.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password_confirmation.min' => 'Mật khẩu xác nhận phải có ít nhất 6 ký tự.'
        ];

    }
}
