<?php

namespace App\Models\Barang;

use App\Models\Penyimpanan;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'barang';
    protected $primaryKey = 'IDBarang';
    protected $guarded = [];
    protected $with = ['stok'];

    public $timestamps = false;

    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class, 'IDJenisBarang', 'IDJenisBarang');
    }

    public function stok()
    {
        return $this->hasOne(Penyimpanan::class, 'IDBarang', 'IDBarang');
    }
}
