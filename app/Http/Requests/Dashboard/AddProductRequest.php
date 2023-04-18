<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class addProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules=['category_id'=>'required|integer'];

        if($this->subcategory_id)   $rules['subcategory_id'] ='integer';
        if($this->name)             $rules['name'] ='string';
        if($this->description)      $rules['description'] ='string|max:255';
        if($this->quantiy)          $rules['quantity']='integer';
        if($this->price)            $rules['price']='integer';
        if($this->image)            $rules['image']='image|max:2048';

        return $rules;
    }
}
