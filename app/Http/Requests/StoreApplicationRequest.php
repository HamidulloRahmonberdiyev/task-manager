<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{
    public function messages(): array
    {
        return [
            'subject.required' => 'Mavzu kiritilmadi',
            'message.required' => 'Xabar kiritilmadi',
            'file_url.required' => 'Fayl kiritilmadi',
            'file_url.max:2048' => 'Yuklanayotgan fayl hajmi 2mb dan katta',
        ];
    }
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'subject' => 'required|max:255|min:3',
            'message' => 'required',
            'file_url' => 'required|mimes:png,jpg,jpeg,svg,gif',
        ];
    }
}
