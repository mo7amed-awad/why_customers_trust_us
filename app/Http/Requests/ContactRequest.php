<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'       => 'required|string|max:25',
            'phone_code' => 'nullable|string|max:5',
            'phone'      => 'required|string|max:10',
            'email'      => 'required|email|max:25',
            'message'    => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'       => __('front.name_required'),
            'name.max'            => __('front.name_max'),

            'phone_code.required' => __('front.phone_code_required'),
            'phone_code.max'      => __('front.phone_code_max'),

            'phone.required'      => __('front.phone_required'),
            'phone.max'           => __('front.phone_max'),

            'email.required'      => __('front.email_required'),
            'email.email'         => __('front.email_invalid'),
            'email.max'           => __('front.email_max'),

            'subject.max'         => __('front.subject_max'),
            'message.max'         => __('front.message_max'),
        ];
    }
}
