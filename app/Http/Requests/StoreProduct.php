<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
        return [
            "reference"=>"required|min:5|max:10",
            "designation"=>"required|min:5|max:20",
            "prix"=>"required",
            "quantite"=>"required",
            "photo"=>"image|mimes:png,jpg,gif,svg"
        ];
    }
}
