<?php

namespace App\Models\Donatur;

use App\Models\Bantuan\Bantuan;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'donatur';
    protected $primaryKey = 'IDDonatur';
    protected $guarded = [];
    public $timestamps = false;

    public function bantuan()
    {
        return $this->hasMany(Bantuan::class, 'IDDonatur', 'IDDonatur');
    }
}
