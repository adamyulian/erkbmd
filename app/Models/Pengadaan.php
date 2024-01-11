<?php

namespace App\Models;

use App\Models\Kegiatan;
use App\Models\Komponen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengadaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'komponen_id',
        'peruntukan',
        'volume',
        'user_id',
        'alasan',
        'kegiatan_id'
    ];

    public function Komponen()
    {
        return $this->belongsTo(related:Komponen::class);
    }
    public function Kegiatan()
    {
        return $this->belongsTo(related:Kegiatan::class);
    }
}
