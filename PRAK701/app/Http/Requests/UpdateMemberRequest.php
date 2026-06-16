<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_member'        => ['required', 'string', 'max:250'],
            'nomor_member'       => ['required', 'string', 'max:15', 'unique:members,nomor_member,' . $this->member->id],
            'alamat'             => ['required'],
            'tgl_mendaftar'      => ['required', 'date'],
            'tgl_terakhir_bayar' => ['required', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama_member.required'        => 'Nama member wajib diisi.',
            'nama_member.string'          => 'Nama member harus berupa teks.',
            'nama_member.max'             => 'Nama member maksimal 250 karakter.',

            'nomor_member.required'       => 'Nomor member wajib diisi.',
            'nomor_member.string'         => 'Nomor member harus berupa teks.',
            'nomor_member.max'            => 'Nomor member maksimal 15 karakter.',
            'nomor_member.unique'         => 'Nomor member sudah terdaftar.',

            'alamat.required'             => 'Alamat wajib diisi.',

            'tgl_mendaftar.required'      => 'Tanggal mendaftar wajib diisi.',
            'tgl_mendaftar.date'          => 'Tanggal mendaftar harus berupa tanggal yang valid.',

            'tgl_terakhir_bayar.required' => 'Tanggal terakhir bayar wajib diisi.',
            'tgl_terakhir_bayar.date'     => 'Tanggal terakhir bayar harus berupa tanggal yang valid.',
        ];
    }
}
