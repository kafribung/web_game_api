<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
        return [
            'img'         => ['required', 'mimes:png,jpg,jpeg'],
            'name'        => ['required', 'string', 'unique:games,name,'. optional($this->game)->id],
            'duration'    => ['required', 'numeric'],
            'description' => ['required'],
        ];
    }
}
