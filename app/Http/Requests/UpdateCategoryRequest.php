<?php

namespace App\Http\Requests;

use App\Rules\OkApiGatewayResponse;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
            'category_id' => 'nullable|exists:categories,id',
            'store_id' => ['required', new OkApiGatewayResponse('/api/store')],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre',
            'description' => 'descripción',
            'category_id' => 'categoría',
            'store_id' => 'tienda',
        ];
    }
}
