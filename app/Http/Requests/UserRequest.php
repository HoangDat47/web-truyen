<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
            'name' => 'string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'gioithieutoi' => 'string|max:255',
            'gioitinh' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'Tên không được quá 255 ký tự',
            'email.required' => 'Email không được để trống',
            'email.max' => 'Email không được quá 255 ký tự',
            'email.unique' => 'Email đã tồn tại',
            'gioithieutoi.max' => 'Giới thiệu không được quá 255 ký tự',
            'gioitinh.required' => 'Giới tính không được để trống',
        ];
    }
}
