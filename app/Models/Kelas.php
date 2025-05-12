<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = [
        'nama_kelas',
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function waliKelas()
    {
        return $this->hasOne(User::class, 'kelas_id')->whereHas('roles', fn($q) => $q->where('name', 'wali_kelas'));
    }
}
