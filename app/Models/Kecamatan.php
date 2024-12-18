<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatan';
    protected $primaryKey = 'IDKecamatan';
    protected $guarded = [];

    public $timestamps = false;

    public function desa()
    {
        return $this->hasMany(Desa::class, 'IDKecamatan', 'IDKecamatan');
    }
}
