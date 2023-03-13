<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|image',
            'main_image' => 'required|image',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле обов\'язково до заповнення',
            'title.string' => 'Поле має бути рядком',
            'content.required' => 'Поле обов\'язково до заповнення',
            'content.string' => 'Поле має бути рядком',
            'preview_image.required' => 'Поле обов\'язково до заповнення',
            'preview_image.image' => 'Доступні розширення для файлу jpg, jpeg, png, bmp, gif, svg, або webp',
            'main_image.required' => 'Поле обов\'язково до заповнення',
            'main_image.image' => 'Доступні розширення для файлу jpg, jpeg, png, bmp, gif, svg, або webp',
            'category_id.required' => 'Поле обов\'язково до заповнення',
        ];
    }
}
