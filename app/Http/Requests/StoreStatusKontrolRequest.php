<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreStatusKontrolRequest extends FormRequest
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
            'tanggal_mulai'  => ['required', 'date', 'date_format:Y-m-d'],
            'jumlah_backlog' => ['required', 'integer', 'min:1'],
        ];
    }
    public function messages(): array
    {
        return [
            'tanggal_mulai.required'    => 'Tanggal mulai siklus wajib diisi.',
            'tanggal_mulai.date'        => 'Tanggal mulai harus berupa format tanggal.',
            'tanggal_mulai.date_format' => 'Format tanggal mulai harus YYYY-MM-DD.',
            'jumlah_backlog.required'   => 'Jumlah backlog wajib diisi.',
            'jumlah_backlog.integer'    => 'Jumlah backlog harus berupa bilangan bulat.',
            'jumlah_backlog.min'        => 'Jumlah backlog minimal 1.',
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
