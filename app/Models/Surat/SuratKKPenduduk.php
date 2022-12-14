<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKKPenduduk extends Model
{
    use HasFactory;
    protected $fillable = [
        'surat_kk_id',
        'ibu_id',
        'ayah_id',
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
        'hub_dgn_kk',
        'warga_negara',
        'negara_nama',
        'no_passport',
        'kitas_kitap',
        'foto_ktp',
        'updated_by',
        'created_by'
    ];
    protected $primaryKey = 'id';
    protected $table = 'surat_k_k_penduduks';
    const tableName = 'surat_k_k_penduduks';

    public function kk()
    {
        return $this->belongsTo(SuratKK::class, 'surat_kk_id', 'id');
    }

    public function ayah()
    {
        return $this->belongsTo(SuratKKPenduduk::class, 'ayah_id', 'id');
    }

    public function ibu()
    {
        return $this->belongsTo(SuratKKPenduduk::class, 'ibu_id', 'id');
    }
}
