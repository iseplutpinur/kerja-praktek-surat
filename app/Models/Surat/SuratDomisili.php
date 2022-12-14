<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratDomisili extends Model
{
    use HasFactory;
    protected $fillable = [
        'surat_id',
        'alamat',
        'alamat_asal',
        'tinggal_sejak',
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
        'updated_by',
        'created_by'
    ];

    protected $primaryKey = 'id';
    protected $table = 'surat_domisilis';
    const tableName = 'surat_domisilis';
    const jenis = 'SURAT DOMISILI';

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surat_id', 'id');
    }
}
