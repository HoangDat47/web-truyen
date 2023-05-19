<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TruyenRequest extends FormRequest
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
            'tentruyen' => 'required|unique:truyentranh,id|max:255|string' . ($this->id),
            'slug_truyen' => 'required|unique:truyentranh,id|max:255' . ($this->id),
            'mota' => 'max:255',
            'hinhanh' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=200
                ,max_width=1000,max_height=1000',
            'kichhoat' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tentruyen.required' => 'Tên truyện không được để trống',
            'tentruyen.unique' => 'Tên truyện đã tồn tại',
            'tentruyen.string' => 'Tên truyện không được chứa ký tự đặc biệt',
            'slug_truyen.required' => 'Slug truyện không được để trống',
            'slug_truyen.unique' => 'Slug truyện đã có xin điền slug khác',
            'hinhanh.image' => 'Hình ảnh phải là ảnh',
            'hinhanh.mimes' => 'Hình ảnh phải có định dạng jpeg,png,jpg,gif,svg',
            'hinhanh.max' => 'Hình ảnh phải có dung lượng nhỏ hơn 2MB',
            'hinhanh.dimensions' => 'Hình ảnh phải có kích thước từ 100x200 đến 1000x1000',
        ];
    }
}
