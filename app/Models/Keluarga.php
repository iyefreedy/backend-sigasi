<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'keluarga';
    protected $primaryKey = 'IDKeluarga';
    protected $guarded = [];

    public $timestamps = false;
    protected $with = ['kecamatan', 'desa'];

    public function anggota()
    {
        return $this->hasMany(AnggotaKeluarga::class, 'IDKeluarga', 'IDKeluarga');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'IDKecamatan', 'IDKecamatan');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'IDDesa', 'IDDesa');
    }
}
