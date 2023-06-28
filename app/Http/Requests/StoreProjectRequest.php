<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            
            'type_id' => 'nullable|exists:types,id',
            'title' => 'required|unique:projects',
            'description' => 'nullable',
            'cover_img' => 'nullable|image',
            'link_project' => 'nullable|unique:projects|url',
           
        ];
    }

    public function messages()
    {
        return [
            'title.required'=> 'Il campo "titolo" è richiesto',
            'title.unique'=> 'Questo titolo è già utilizzato',
            'cover_img.image' => 'Il file deve essere di tipo immagine',
            'link_project.unique' => 'Questo link è già utilizzato',
            'link_project.url' => 'Questo campo deve contenere un link URL valido '
        ];
    }
}
