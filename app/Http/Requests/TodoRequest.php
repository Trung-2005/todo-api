<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // ai cũng có thể gửi request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:10',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        // return parent::messages();
        return [
            'title.required' => 'Tiêu đề bắt buộc phải nhập',
            'title.min' => 'Tiêu đề phải có tối thiểu 10 ký tự',
            'content.required' => 'Nội dung bắt buộc phải nhập'
        ];
    }
}
