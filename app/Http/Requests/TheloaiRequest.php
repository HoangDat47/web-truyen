<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TheloaiRequest extends FormRequest
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
            'tentheloai' => 'required|max:255|string|unique:theloai,id' . $this->id,
            'slug_theloai' => 'required|max:255|unique:theloai,id' . $this->id,
            'motatheloai' => 'required|max:255|string',
            'kichhoat' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tentheloai.required' => 'Tên thể loại không được để trống',
            'tentheloai.max' => 'Tên thể loại không được quá 255 ký tự',
            'tentheloai.string' => 'Tên thể loại phải là chuỗi ký tự',
            'tentheloai.unique' => 'Tên thể loại đã tồn tại',
            'tentheloai.string' => 'Tên thể loại không được chứa ký tự đặc biệt',
            'slug_theloai.required' => 'Slug thể loại không được để trống',
            'slug_theloai.max' => 'Slug thể loại không được quá 255 ký tự',
            'slug_theloai.unique' => 'Slug thể loại đã tồn tại',
            'motatheloai.required' => 'Mô tả thể loại không được để trống',
            'motatheloai.string' => 'Mô tả thể loại không được chứa ký tự đặc biệt',
        ];
    }
}
