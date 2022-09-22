<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PutRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     * @throws ValidationException
     */
    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        if ($this->expectsJson()){
            $response = new Response($validator->errors(), 422);
            throw new ValidationException($validator, $response);
        }

    }
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:500',
             'slug' => 'required|min:5|max:500|unique:categories,slug,'.$this->route("category")->id,

        ];
    }


}
