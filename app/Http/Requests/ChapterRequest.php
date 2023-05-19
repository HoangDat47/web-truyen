<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChapterRequest extends FormRequest
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
            'tenchapter' => 'required|max:255|string',
            'slug_chapter' => 'required|max:255',
            'kichhoat' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tenchapter.required' => 'Tên chapter không được để trống',
            'tenchapter.string' => 'Tên chapter không được chứa ký tự đặc biệt',
            'slug_chapter.required' => 'Slug chapter không được để trống',
        ];
    }
}
