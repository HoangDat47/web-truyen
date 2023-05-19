<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnhChapterRequest extends FormRequest
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
            'hinhanh' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=200,max_width=1000,max_height=1000',
        ];
    }

    public function messages()
    {
        return [
            'hinhanh.image' => 'File không phải là hình ảnh',
            'hinhanh.mimes' => 'File không đúng định dạng',
            'hinhanh.max' => 'File quá lớn',
            'hinhanh.dimensions' => 'Kích thước ảnh không đúng',
        ];
    }
}
