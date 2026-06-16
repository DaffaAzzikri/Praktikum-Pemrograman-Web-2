<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeminjamanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'member_id'   => ['required', 'exists:members,id'],
            'buku_id'     => ['required', 'exists:bukus,id'],
            'tgl_pinjam'  => ['required', 'date'],
            'tgl_kembali' => ['nullable', 'date', 'after_or_equal:tgl_pinjam'],
            'status'      => ['required', 'in:dipinjam,dikembalikan'],
        ];
    }

    public function messages(): array
    {
        return [
            'member_id.required'         => 'Member wajib dipilih.',
            'member_id.exists'           => 'Member yang dipilih tidak valid.',
            
            'buku_id.required'           => 'Buku wajib dipilih.',
            'buku_id.exists'             => 'Buku yang dipilih tidak valid.',
            
            'tgl_pinjam.required'        => 'Tanggal pinjam wajib diisi.',
            'tgl_pinjam.date'            => 'Tanggal pinjam harus berupa tanggal yang valid.',
            
            'tgl_kembali.date'           => 'Tanggal kembali harus berupa tanggal yang valid.',
            'tgl_kembali.after_or_equal' => 'Tanggal kembali harus sama dengan atau setelah tanggal pinjam.',
            
            'status.required'            => 'Status wajib dipilih.',
            'status.in'                  => 'Status yang dipilih tidak valid.',
        ];
    }
}
