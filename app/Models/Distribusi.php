<?php

namespace App\Models;

use App\Models\Barang\Barang;
use App\Models\Posko\Posko;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'distribusi';
    protected $primaryKey = 'IDDistribusi';
    protected $guarded = [];
    protected $with = ['posko', 'barang'];

    public $timestamps = false;

    public function posko()
    {
        return $this->belongsTo(Posko::class, 'IDPosko', 'IDPosko');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'IDBarang', 'IDBarang');
    }
}
