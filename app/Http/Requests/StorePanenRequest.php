<?php

namespace App\Http\Requests;

use App\Models\Siklus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePanenRequest extends FormRequest
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
            'siklus_id'     => ['required', 'integer', 'exists:sikluses,id'],
            'tanggal_panen' => ['required', 'date', 'date_format:Y-m-d'],
            'jumlah_panen'  => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'siklus_id.required'        => 'Siklus wajib dipilih.',
            'siklus_id.integer'         => 'ID siklus harus berupa angka.',
            'siklus_id.exists'          => 'Siklus yang dipilih tidak ditemukan.',
            'tanggal_panen.required'    => 'Tanggal panen wajib diisi.',
            'tanggal_panen.date'        => 'Tanggal panen harus berupa format tanggal.',
            'tanggal_panen.date_format' => 'Format tanggal panen harus YYYY-MM-DD.',
            'jumlah_panen.required'     => 'Jumlah panen wajib diisi.',
            'jumlah_panen.integer'      => 'Jumlah panen harus berupa bilangan bulat.',
            'jumlah_panen.min'          => 'Jumlah panen minimal 1.',
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

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $siklus = Siklus::find($this->siklus_id);

            if ($siklus && $this->tanggal_panen < $siklus->tanggal_tanam) {
                $validator->errors()->add('tanggal_panen', 'Tanggal panen tidak boleh sebelum tanggal tanam.');
            }
        });
    }
}
