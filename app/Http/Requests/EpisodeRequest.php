<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EpisodeRequest extends FormRequest
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
            'course_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'videoUrl' => 'required',
            'time' => 'required',
            'tags' => 'required',
            'number' => 'required',
            'type' => 'required'
        ];
    }
}
