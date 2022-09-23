<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    // public $redirectRoute = 'book.create';

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
            'title' => 'required|max:100|regex:/^[^#<>^;_]*$/',
            'author' => 'required|max:100|regex:/^[^#<>^;_]*$/',
            'type' => 'required|max:50|regex:/^[^#<>^;_]*$/',
            'content' => 'nullable|max:2000|regex:/^[^#<>^;_]*$/',
            'image' => 'image'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'タイトルは必ず入力してください。',
            'title.max' => 'タイトルは100文字以下で入力してください。',
            'title.regex' => '使用禁止記号#<>^;_を消してください。',
            'author.required' => '著者は必ず入力してください。',
            'author.string' => '著者は文字列で入力してください。',
            'author.max' => '著者は100文字以下で入力してください。',
            'author.regex' => '使用禁止記号#<>^;_を消してください。',
            'type.required' => 'カテゴリーは必ず入力してください。',
            'type.max' => 'カテゴリーは50文字以下で入力してください。',
            'type.regex' => '使用禁止記号#<>^;_を消してください。',
            'content.max' =>'コメントは2000文字以下で入力してください。',
            'content.regex' => '使用禁止記号#<>^;_を消してください。',
            'image' => 'jpg,png,bmp,gif,svg,webpの形式で登録してください。'
        ];
    }


}
