<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggota extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded = ['id'];

    public function transaksiPeminjaman(): HasMany
    {
        return $this->hasMany(TransaksiPeminjaman::class, 'anggota_id', 'id');
    }
}
