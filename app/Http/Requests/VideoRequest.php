<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:100',
            'video' => 'required|mimes:mp4,qt,x-ms-wmv,mpeg,x-msvideo,mov',
            'overview'=>'required|max:255',
        ];
    }
    public function messages(): array
    {
        return  [
            'title.required' => 'タイトルは必須です',
            'video.required' => 'ファイルは必須です',
            'video.mimes' => 'ファイルは.mp4 .mov .mpeg .mpeg .wmv .aviにしてください',
            'overview.required' => '概要欄は必須です',
            'title.max' => 'タイトルは100文字以内にしてください',
            'overview.max' => '概要欄は255文字以内にしてください'
        ];
    }
}
