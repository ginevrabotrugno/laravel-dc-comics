<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
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
            'title' => 'required|min:3|max:100',
            'price' => 'required|min:2',
            'series' => 'required|min:3|max:100',
            'sale_date' => 'required|min:10',
            'type' => 'required|min:3|max:30'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Il Titolo è obbligatorio',
            'title.min' => 'Il Titolo deve avere almeno :min caratteri',
            'title.max' => 'Il Titolo deve avere massimo :max caratteri',
            'price.required' => 'Il Prezzo è obbligatorio',
            'price.min' => 'Il Prezzo deve avere almeno :min caratteri',
            'series.required' => 'La Serie è obbligatoria',
            'series.min' => 'La Serie deve avere almeno :min caratteri',
            'series.min' => 'La Serie deve avere massimo :max caratteri',
            'sale_date.required' => 'La Data di Vendita è obbligatoria',
            'sale_date.min' => 'La Data di Vendita deve avere almeno :min caratteri',
            'type.required' => 'Il Tipo è obbligatorio',
            'type.min' => 'Il Tipo deve avere almeno :min caratteri',
            'type.max' => 'Il Tipo deve avere massimo :max caratteri'
        ];
    }
}
