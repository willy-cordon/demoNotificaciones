<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class ProcessEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return true;
    }

    /**
     * Define nice names for attributes
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'title'   => 'title',
            'email'   => 'email',
            'name'    => 'name',
            'subject' => 'subject'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'title'   => 'required',
            'email'   => 'required',
            'name'    => 'required',
            'subject' => 'required'
        ];
    }
}
