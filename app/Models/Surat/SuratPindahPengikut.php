<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPindahPengikut extends Model
{
    use HasFactory;
    protected $fillable = [
        'surat_pindah_id',
        'penduduk_id',
        'nik',
        'nama',
        'nik_jenis',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pendidikan',
        'pekerjaan',
        'status_kawin',
        'no_kk',
        'warga_negara',
        'negara_nama',
        'no_passport',
        'kitas_kitap',
        'foto_ktp',
    ];
    protected $primaryKey = 'id';
    protected $table = 'surat_pindah_pengikuts';
    const tableName = 'surat_pindah_pengikuts';
}
