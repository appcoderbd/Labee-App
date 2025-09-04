<?php

namespace App\Http\Requests;

use App\Models\Hospital;
use Illuminate\Foundation\Http\FormRequest;

class HospitalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Hospital::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'hospital_name' => 'required|string|max:255',
            'hospital_address' => 'required|string|max:255',
            'hospital_phone' => 'required|string|max:20',
            'hospital_email' => 'nullable|email|max:255',
            'hospital_website' => 'nullable|url|max:255',
            'hospital_logo' => 'nullable|image|max:2048',
            'license_no' => 'nullable|string|max:100',
            'status' => 'required|in:active,inactive',
            'type' => 'required|in:diagnostic,hospital,clinic',
            'opening_hours' => 'nullable|date_format:H:i',
            'closing_hours' => 'nullable|date_format:H:i',
        ];
    }

    public function messages()
    {
        return [
            'hospital_name.required' => 'The hospital name is required.',
            'hospital_address.required' => 'The hospital address is required.',
            'hospital_phone.required' => 'The hospital phone number is required.',
            'hospital_email.email' => 'The hospital email must be a valid email address.',
            'hospital_website.url' => 'The hospital website must be a valid URL.',
            'hospital_logo.image' => 'The hospital logo must be an image file.',
            'status.in' => 'The status must be either active or inactive.',
            'type.in' => 'The type must be either diagnostic, hospital, or clinic.',
            'opening_hours.date_format' => 'The opening hours must be in the format HH:MM.',
            'closing_hours.date_format' => 'The closing hours must be in the format HH:MM.',
        ];
    }
}
