<?php

namespace App\Models;

use App\Models\Komponen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengadaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'komponen_id',
        'peruntukan',
        'volume'

    ];

    public function Komponen()
    {
        return $this->belongsTo(related:Komponen::class);
    }
}
