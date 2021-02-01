<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class FinishRequest extends FormRequest
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
            'stage1' => 'numeric',
            'stage2' => 'numeric',
            'stage3' => 'numeric',
            'stage4' => 'numeric',
            'stage5' => 'numeric',
            'stage6' => 'numeric',
        ];
    }
}
