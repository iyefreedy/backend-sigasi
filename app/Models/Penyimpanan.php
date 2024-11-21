<?php

namespace App\Models;

use App\Models\Barang\Barang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyimpanan extends Model
{
    use HasFactory;

    protected $table = 'penyimpanan';
    protected $primaryKey = 'IDPenyimpanan';
    protected $guarded = [];

    public function barang()
    {
        return $this->hasOne(Barang::class, 'IDBarang', 'IDBarang');
    }
}
