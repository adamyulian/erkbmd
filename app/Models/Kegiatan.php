<?php

namespace App\Models;

use App\Models\Pengadaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
            'unit_id',
            'unit_name_baru',
            'nama_bidang',
            'kode_program',
            'nama_program',
            'kode_kegiatan',
            'nama_kegiatan',
            'sub_id',
            'kode_sub_kegiatan_sipd',
            'subtitle',
            'split_part',
            'indikator_sub_kegiatan',
            'target_capaian',
            'nomor_unit',
            'keterangan',
            'user_id'
    ];

    public function Pengadaan()
    {
        return $this->hasMany(related:Pengadaan::class);
    }
}
