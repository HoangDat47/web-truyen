<?php

namespace App\Http\Requests;

use App\Rules\MatchOldPassword;
use Illuminate\Foundation\Http\FormRequest;

class PassWordChangeRequest extends FormRequest
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
            'OldPassword' => ['required', new MatchOldPassword],
            'NewPassword' => 'required|min:6',
            'NewPasswordConfirm' => 'required|same:NewPassword',
        ];
    }

    public function messages()
    {
        return [
            'OldPassword.required' => 'Mật khẩu cũ không được để trống',
            'NewPassword.required' => 'Mật khẩu mới không được để trống',
            'NewPassword.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự',
            'NewPasswordConfirm.required' => 'Xác nhận mật khẩu mới không được để trống',
            'NewPasswordConfirm.same' => 'Xác nhận mật khẩu mới không đúng',
        ];
    }
}
