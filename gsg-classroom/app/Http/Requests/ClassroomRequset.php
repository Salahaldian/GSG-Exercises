<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class ClassroomRequset extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string', 'max:255' , function($attribute , $value , $fail){
                if($value == 'admin'){
                    return $fail('This :attribute value is forbidden!');
                }
            }],
            'section'=> 'required|string|max:255',
            'subject'=>'nullable|string|max:255',
            'room' =>'nullable|string|max:255',
            'cover_image' => [
                'nullable',
                'image',
                'max:1024',
                Rule::dimensions([
                    'min_width' => 100,
                    'min_height' => 100,
                    // 'max_width' => 600,
                    // 'max_height' => 500,
                ]),
                // 'dimensions:min_width=100,min_height=200,max_width=200,max_height=200'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute Important!',
            'name.required' => 'The name is required!',
            'cover_image.max' => 'Image size is great than 1M'
        ];
    }
}
