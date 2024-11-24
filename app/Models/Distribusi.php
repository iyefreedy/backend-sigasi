<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'distribusi';
    protected $primaryKey = 'IDDistribusi';
    protected $guarded = [];

    public $timestamps = false;
}
