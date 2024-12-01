<?php

namespace App\Models;

use App\Models\Penduduk\Penduduk;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'anggota_keluarga';
    protected $primaryKey = 'IDAnggotaKeluarga';
    protected $guarded = [];
    protected $with = ['penduduk'];

    public $timestamps = false;

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class, 'IDKeluarga', 'IDKeluarga');
    }

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'IDPenduduk', 'IDPenduduk');
    }
}
