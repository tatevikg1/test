<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'question'=>'required|max:255',
            'correct'=>'required',
            'point' => 'required|numeric|min:1|max:100',
            'options.0' => 'required',
            'options.1' => 'required',
        ];
    }

    public function messages()
{
        return [
            'question.required' => 'How can they answar to a non-existing question?',
            'question.max' => 'Your question is too long. Make it simple.',
            'point.min' => 'Question with 0 point? Who will even read this question?',
            'point.max' => 'Is this question that dificult?',
            'point.numeric' => 'Point should be  numeric value.',
            'option.0.required' => 'You have to give options to answer the question',
            'option.1.required' => 'One option is not an option ;)',
        ];
    }
}
