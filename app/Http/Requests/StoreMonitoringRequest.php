<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreMonitoringRequest extends FormRequest
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
            'suhu'       => ['required', 'numeric', 'between:-10,60'],
            'kelembapan' => ['required', 'numeric', 'between:0,100'],
        ];
    }
    public function messages(): array
    {
        return [
            'suhu.required'       => 'Data suhu wajib diisi.',
            'suhu.numeric'        => 'Suhu harus berupa angka.',
            'suhu.between'        => 'Suhu harus antara -10 dan 60 derajat Celsius.',
            'kelembapan.required' => 'Data kelembapan wajib diisi.',
            'kelembapan.numeric'  => 'Kelembapan harus berupa angka.',
            'kelembapan.between'  => 'Kelembapan harus antara 0% dan 100%.',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            response()->json([
                'status'  => false,
                'message' => 'Validasi gagal.',
                'errors'  => $validator->errors(),
            ], 422)
        );
    }
}
