<?php

namespace App\Models\Barang;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'jenis_barang';
    protected $primaryKey = 'IDJenisBarang';
    protected $guarded = [];
    public $timestamps = false;
}
