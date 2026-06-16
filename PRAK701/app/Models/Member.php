<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members';

    protected $fillable = [
        'nama_member',
        'nomor_member',
        'alamat',
        'tgl_mendaftar',
        'tgl_terakhir_bayar',
    ];

    public function peminjamans(): HasMany
    {
        return $this->hasMany(Peminjaman::class, 'member_id');
    }
}
