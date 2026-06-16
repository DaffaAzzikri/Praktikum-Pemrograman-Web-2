<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBukuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul_buku'   => ['required', 'string', 'max:500'],
            'penulis'      => ['required', 'string', 'max:500'],
            'penerbit'     => ['required', 'string', 'max:250'],
            'tahun_terbit' => ['required', 'integer', 'gt:1800', 'lt:2024'],
        ];
    }

    public function messages(): array
    {
        return [
            'judul_buku.required'   => 'Judul buku wajib diisi.',
            'judul_buku.string'     => 'Judul buku harus berupa teks.',
            'judul_buku.max'        => 'Judul buku maksimal 500 karakter.',

            'penulis.required'      => 'Penulis wajib diisi.',
            'penulis.string'        => 'Penulis harus berupa teks.',
            'penulis.max'           => 'Penulis maksimal 500 karakter.',

            'penerbit.required'     => 'Penerbit wajib diisi.',
            'penerbit.string'       => 'Penerbit harus berupa teks.',
            'penerbit.max'          => 'Penerbit maksimal 250 karakter.',

            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.integer'  => 'Tahun terbit harus berupa angka.',
            'tahun_terbit.gt'       => 'Tahun terbit harus lebih besar dari 1800.',
            'tahun_terbit.lt'       => 'Tahun terbit harus lebih kecil dari 2024.',
        ];
    }
}
