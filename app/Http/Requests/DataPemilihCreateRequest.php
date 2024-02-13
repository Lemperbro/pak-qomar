<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataPemilihCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'desa' => 'required',
            'tps' => 'required',
            'total_suara' => 'required|numeric',
            'kecamatan' => 'required',
            'saksi' => 'required'
        ];
    }


    public function messages()
    {
// resources/lang/id/validation.php

return [
    'required' => 'Kolom :attribute wajib diisi.',
    'numeric' => 'Kolom :attribute harus berupa angka.',
    'total_suara.required' => 'Kolom total suara wajib diisi.',
    'total_suara.numeric' => 'Kolom total suara harus berupa angka.',
    'kecamatan.required' => 'Kolom kecamatan wajib diisi.',
    'saksi.required' => 'Kolom saksi wajib diisi.',
];


    }
}
