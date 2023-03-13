<?php

namespace App\Http\Requests\Admin\Post;
use Illuminate\Foundation\Http\FormRequest;
class UpdateRequest extends FormRequest
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
            'preview_image' => 'nullable|image',
            'main_image' => 'nullable|image',
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
