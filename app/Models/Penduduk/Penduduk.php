<?php

namespace App\Models\Penduduk;

use App\Models\Kelompok\Kelompok;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory, HasUuids, HasFactory;
    protected $table = 'penduduk';
    protected $primaryKey = 'IDPenduduk';
    protected $guarded = [];
    protected $with = ['kelompok'];

    public $timestamps = false;

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'IDKelompok', 'IDKelompok');
    }
}
