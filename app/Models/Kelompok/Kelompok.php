<?php

namespace App\Models\Kelompok;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'kelompok';
    protected $primaryKey = 'IDKelompok';
    protected $guarded = [];
    public $timestamps = false;
}
