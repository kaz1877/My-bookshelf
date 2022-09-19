<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public $redirectRoute = 'book.create';

    public function authorize()
    {
        return true;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100',
            'author' => 'required|string|max:100',
            'type' => 'required|max:50',
            'content' => 'max:2000',
        ];
    }

    public function message(){
        return [
            'title.required' => 'タイトルは必ず入力してください。',
            'title.max' => 'タイトルは100文字以下で入力してください。',
            'author.required' => '著者は必ず入力してください。',
            'author.string' => '著者は文字列で入力してください。',
            'author.max' => '著者は100文字以下で入力してください。',
            'type.required' => 'カテゴリーは必ず入力してください。',
            'type.max' => 'カテゴリーは50文字以下で入力してください。',
            'content.max' =>'コメントは2000文字以下で入力してください。'
        ];
    }


}
