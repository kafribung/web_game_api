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
            'time1' => 'numeric|max:300',
            'stage2' => 'numeric',
            'time2' => 'numeric|max:300',
            'stage3' => 'numeric',
            'time3' => 'numeric|max:300',
            'stage4' => 'numeric',
            'time4' => 'numeric|max:300',
            'stage5' => 'numeric',
            'time5' => 'numeric|max:300',
            'stage6' => 'numeric',
            'time6' => 'numeric|max:300',
        ];
    }
}
