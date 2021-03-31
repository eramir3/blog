<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntryRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules =  [
            'title'=>['required', 'max:255', 'unique:entries'],
            'content'=>['required'],
        ];

        if (request("_method") == "PUT")
        {
            $rules['title'] = ['required', 'max:255', 'unique:entries,title,'.$this->id];
        }

        return $rules;
    }
}
