<?php

namespace App\Models\Kenotariatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;
    protected $table = 'tbl_pemeriksaan_protokol';
    protected $fillable = [
        'id_notaris',
        'nama_notaris', 
        'protokol_tahun',
        'protokol_nilai',
        'protokol_status',
        'protokol_hasil',
        'protokol_catatan',
        'protokol_tanggal_pemeriksaan',
        'protokol_tanggal_pengiriman',
    ];
}
