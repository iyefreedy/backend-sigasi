<?php

namespace App\Models\Pengungsi;

use App\Models\Penduduk\Penduduk;
use App\Models\Posko\Posko;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengungsi extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'pengungsi';
    protected $primaryKey = 'IDPengungsi';
    protected $guarded = [];
    public $timestamps = false;

    public function penduduk()
    {
        return $this->hasOne(Penduduk::class, 'IDPenduduk', 'IDPenduduk');
    }

    public function posko()
    {
        return $this->hasOne(Posko::class, 'IDPosko', 'IDPosko');
    }
}
