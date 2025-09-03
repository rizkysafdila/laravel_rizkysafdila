<?php

namespace App\Http\Requests\Pasien;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'nama_pasien'     => 'required|string|max:100',
            'alamat'          => 'required|string|max:200',
            'no_telpon'       => 'required|string|max:20',
            'rumah_sakit_id'  => 'required|exists:rumah_sakits,id',
        ];
    }
}
