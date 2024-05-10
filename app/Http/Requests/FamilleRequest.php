<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamilleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
            return [
                'intitule_fam'=>'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            
            ];
    }

    public function messages():array
    {
        return [
                'libelle'=>'la famille doit étre 5 caractére',
                

            ];
    }
}
