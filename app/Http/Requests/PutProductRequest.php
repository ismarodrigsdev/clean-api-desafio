<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PutProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string',
            'description' => 'string',
            'price' => 'numeric',
        ];
    }
}
