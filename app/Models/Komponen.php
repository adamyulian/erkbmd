<?php

namespace App\Models;

use App\Models\Pengadaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komponen extends Model
{
    use HasFactory;

    protected $fillable = [
        'komponen_id',
        'peruntukan',
        'volume'
    ];

    public function Pengadaan()
    {
        return $this->hasMany(related:Pengadaan::class);
    }
}
