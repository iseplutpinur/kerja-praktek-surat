<?php

namespace Database\Seeders;

use App\Models\Desa\Pegawai;
use App\Models\Desa\PegawaiJabatan;
use Illuminate\Database\Seeder;
use App\Models\Penduduk\KetuaRt;
use App\Models\Penduduk\KetuaRw;
use App\Models\Penduduk\Masuk;
use App\Models\Penduduk\Penduduk;
use App\Models\Penduduk\Rt;
use App\Models\Penduduk\Rw;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table(KetuaRt::tableName)->delete();
        DB::table(KetuaRw::tableName)->delete();
        DB::table(Penduduk::tableName)->delete();
        DB::table(Rt::tableName)->delete();
        DB::table(Rw::tableName)->delete();

        $jml_rw = 15;
        $jml_rt = 5;
        $jml_kk_rt = 10;
        $kepala_desa = 1;
        $pegawai_desa = 10;

        $nik_counter = 1;
        $kk_counter = 1;
        $password = bcrypt(config('app.password_default'));

        // buat data jabatan ==========================================================================================
        $jabatan = new PegawaiJabatan();
        $jabatan->nama = 'KEPALA DESA';
        $jabatan->urutan = 1;
        $jabatan->save();

        for ($i = 1; $i <= $pegawai_desa; $i++) {
            $jabatan = new PegawaiJabatan();
            $jabatan->nama = "JABATAN $i";
            $jabatan->urutan = $i + 1;
            $jabatan->save();
        }

        // buat data penduduk =========================================================================================
        $pendidikans = function ($hub = false) use ($faker) {
            if ($hub == 'anak') {
                return $faker->randomElement([
                    'SLTA / SEDERAJAT',
                    'SLTP/SEDERAJAT',
                    'BELUM TAMAT SD/SEDERAJAT',
                    'DIPLOMA IV/ STRATA I',
                    'Akademi/Sarjana Muda',
                    'AKADEMI/ DIPLOMA III/S. MUDA',
                    'DIPLOMA I / II',
                ]);
            } else if ($hub == 'istri') {
                return $faker->randomElement([
                    'TIDAK / BELUM SEKOLAH',
                    'TAMAT SD / SEDERAJAT',
                    'SLTA / SEDERAJAT',
                    'SLTP/SEDERAJAT',
                    'BELUM TAMAT SD/SEDERAJAT',
                    'DIPLOMA IV/ STRATA I',
                    'Akademi/Sarjana Muda',
                    'AKADEMI/ DIPLOMA III/S. MUDA',
                    'DIPLOMA I / II',
                    'STRATA II',
                    'STRATA III',
                ]);
            } else {
                return $faker->randomElement([
                    'TIDAK / BELUM SEKOLAH',
                    'TAMAT SD / SEDERAJAT',
                    'SLTA / SEDERAJAT',
                    'SLTP/SEDERAJAT',
                    'BELUM TAMAT SD/SEDERAJAT',
                    'DIPLOMA IV/ STRATA I',
                    'Akademi/Sarjana Muda',
                    'AKADEMI/ DIPLOMA III/S. MUDA',
                    'DIPLOMA I / II',
                    'STRATA II',
                    'STRATA III',
                ]);
            }
        };

        $pekerjaans = function ($hub = false) use ($faker) {
            if ($hub == 'anak') {
                return $faker->randomElement([
                    'TIDAK BEKERJA',
                    'PEGAWAI SWASTA',
                    'PELAJAR/MAHASISWA',
                ]);
            } else if ($hub == 'istri') {
                return $faker->randomElement([
                    'IBU RUMAH TANGGA',
                    'PEGAWAI NEGERI SIPIL',
                    'PEGAWAI SWASTA',
                    'PEDAGANG',
                ]);
            } else {
                return $faker->randomElement([
                    'PEGAWAI NEGERI SIPIL',
                    'ABRI/POLRI',
                    'PEGAWAI SWASTA',
                    'PETANI',
                    'PEDAGANG',
                    'PENSIUNAN',
                    'PRA SEKOLAH',
                    'LAINNYA',
                ]);
            }
        };

        $agamas = function () use ($faker) {
            return $faker->randomElement([
                'ISLAM',
                'ISLAM',
                'ISLAM',
                'ISLAM',
                'KRISTEN',
                'KATOLIK',
                'HINDU',
                'BUDHA',
                // 'KEPERCAYAAN TERHADAP TUHAN YME',
            ]);
        };

        $hub_dgn_kks = [
            ['urutan' => 1, 'nama' => 'KEPALA KELUARGA'],
            ['urutan' => 2, 'nama' => 'SUAMI'],
            ['urutan' => 3, 'nama' => 'ISTRI'],
            ['urutan' => 4, 'nama' => 'ANAK'],
            ['urutan' => 5, 'nama' => 'MENANTU'],
            ['urutan' => 6, 'nama' => 'CUCU'],
            ['urutan' => 7, 'nama' => 'ORANG TUA'],
            ['urutan' => 8, 'nama' => 'MERTUA'],
            ['urutan' => 9, 'nama' => 'FAMILI LAIN'],
            ['urutan' => 10, 'nama' => 'PEMBANTU'],
            ['urutan' => 11, 'nama' => 'LAINNYA'],
        ];



        for ($rw_no = 1; $rw_no <= $jml_rw; $rw_no++) {
            $rw = new Rw();
            $rw->nomor = $rw_no;
            $rw->save();
            for ($rt_no = 1; $rt_no <= $jml_rt; $rt_no++) {
                $rt = new Rt();
                $rt->nomor = $rt_no;
                $rt->nama_daerah = "Kampung RT $rt_no / RW $rw_no";
                $rt->rw_id = $rw->id;
                $rt->created_by = 1;
                $rt->save();

                // tambah data penduduk
                for ($kk = 1; $kk <= $jml_kk_rt; $kk++) {
                    // ================================================================================================
                    // kepala keluarga jika rt = 1 maka jadi ketua rw dan yg kedua jadi ketua rt
                    $tanggal_lahir = $faker->dateTimeBetween('-40 years', '1990-01-01 23:59:59');
                    $no_kk = str_pad($kk_counter++, 16, '0', STR_PAD_LEFT);;
                    $agama = $agamas();
                    $alamat = $faker->address();

                    $kepala = new Penduduk();
                    $kepala->nik = str_pad($nik_counter++, 16, '0', STR_PAD_LEFT);;
                    $kepala->nama = $faker->name('male');
                    $kepala->jenis_kelamin = 'LAKI-LAKI';
                    $kepala->tempat_lahir = $faker->city();
                    $kepala->tanggal_lahir = date_format($tanggal_lahir, 'Y-m-d');
                    $kepala->agama = $agama;
                    $kepala->pendidikan = $pendidikans();
                    $kepala->pekerjaan = $pekerjaans();
                    $kepala->status_kawin = 'KAWIN';
                    $kepala->no_kk = $no_kk;
                    $kepala->hub_dgn_kk = 'KEPALA KELUARGA';
                    $kepala->hub_dgn_kk_urutan = 1;
                    $kepala->warga_negara = 'WNI';
                    $kepala->negara_nama = 'INDONESIA';
                    $kepala->rt_id = $rt->id;
                    $kepala->alamat = $alamat;
                    $kepala->penduduk_ada = 'Ada';
                    $kepala->created_by = 1;
                    $kepala->save();

                    // kepala user
                    $user = new User();
                    $user->name = $kepala->nama;
                    $user->nik = $kepala->nik;
                    $user->penduduk_id = $kepala->id;
                    $user->password = $password;
                    $user->active = 1;
                    $user->created_by = 1;
                    $user->save();
                    $user->assignRole(config('app.role_penduduk'));

                    // simpan ke penduduk masuk
                    $masuk = new Masuk();
                    $masuk->penduduk_id = $kepala->id;
                    $masuk->nama = 'Dibuat Untuk Testing';
                    $masuk->tanggal = date('Y-m-d');
                    $masuk->created_by = 1;
                    $masuk->save();

                    // ketua rw
                    if ($rt_no == 1 && $kk == 1) {
                        $ketua_rw = new KetuaRw();
                        $ketua_rw->rw_id = $rw->id;
                        $ketua_rw->penduduk_id = $kepala->id;
                        $ketua_rw->created_by = 1;
                        $ketua_rw->save();

                        $rw->created_by = 1;
                        $rw->save();
                        $user->assignRole(config('app.role_rw'));
                    }

                    // ketua rt
                    if ($kk == 2) {
                        $ketua_rt = new KetuaRt();
                        $ketua_rt->rt_id = $rt->id;
                        $ketua_rt->penduduk_id = $kepala->id;
                        $ketua_rt->created_by = 1;
                        $ketua_rt->save();

                        $rt->created_by = 1;
                        $rt->save();
                        $user->assignRole(config('app.role_rt'));
                    }

                    if ($kk > 2) {
                        if ($kepala_desa > 0) {
                            // set penduduk menjadi kepala desa
                            $pegawai = new Pegawai();
                            $pegawai->penduduk_id = $kepala->id;
                            // kepala desa
                            $pegawai->jabatan_id = 1;
                            $pegawai->created_by = 1;
                            $pegawai->save();
                            $user->assignRole(config('app.role_desa'));

                            $kepala_desa--;
                        } else if ($pegawai_desa > 0) {
                            // set penduduk jadi pegawai desa
                            $pegawai = new Pegawai();
                            $pegawai->penduduk_id = $kepala->id;
                            // pegawai desa
                            $pegawai->jabatan_id = $pegawai_desa + 1;
                            $pegawai->created_by = 1;
                            $pegawai->save();
                            $user->assignRole(config('app.role_desa'));

                            $pegawai_desa--;
                        }
                    }

                    // ================================================================================================
                    // istri
                    $tanggal_lahir = $faker->dateTimeBetween('-35 years', '1990-01-01 23:59:59');

                    $istri = new Penduduk();
                    $istri->nik = str_pad($nik_counter++, 16, '0', STR_PAD_LEFT);
                    $istri->nama = $faker->name('female');
                    $istri->jenis_kelamin = 'PEREMPUAN';
                    $istri->tempat_lahir = $faker->city();
                    $istri->tanggal_lahir = date_format($tanggal_lahir, 'Y-m-d');
                    $istri->agama = $agama;
                    $istri->pendidikan = $pendidikans('istri');
                    $istri->pekerjaan = $pekerjaans('istri');
                    $istri->status_kawin = 'KAWIN';
                    $istri->no_kk = $no_kk;
                    $istri->hub_dgn_kk = 'ISTRI';
                    $istri->hub_dgn_kk_urutan = 2;
                    $istri->warga_negara = 'WNI';
                    $istri->negara_nama = 'INDONESIA';
                    $istri->rt_id = $rt->id;
                    $istri->alamat = $alamat;
                    $istri->penduduk_ada = 'Ada';
                    $istri->created_by = 1;
                    $istri->save();

                    // istri user
                    $user = new User();
                    $user->name = $istri->nama;
                    $user->nik = $istri->nik;
                    $user->penduduk_id = $istri->id;
                    $user->password = $password;
                    $user->active = 1;
                    $user->save();
                    $user->assignRole(config('app.role_penduduk'));

                    // simpan ke penduduk masuk
                    $masuk = new Masuk();
                    $masuk->penduduk_id = $istri->id;
                    $masuk->nama = 'Dibuat Untuk Testing';
                    $masuk->tanggal = date('Y-m-d');
                    $masuk->created_by = 1;
                    $masuk->save();

                    // ================================================================================================
                    // anak
                    $tempat_lahir = $faker->city();
                    $jml_anak = $faker->randomElement([1, 2, 3, 4]);
                    for ($anak_ = 1; $anak_ <= $jml_anak; $anak_++) {
                        $gender = $faker->randomElement(['male', 'female']);
                        $tanggal_lahir = $faker->dateTimeBetween('-25 years', '2002-01-01 23:59:59');

                        $anak = new Penduduk();
                        $anak->nik = str_pad($nik_counter++, 16, '0', STR_PAD_LEFT);
                        $anak->nama = $gender == 'male' ? $faker->firstNameMale() : $faker->firstNameFemale();
                        $anak->jenis_kelamin = $gender == 'male' ? 'LAKI-LAKI' : 'PEREMPUAN';
                        $anak->tempat_lahir = $tempat_lahir;
                        $anak->tanggal_lahir = date_format($tanggal_lahir, 'Y-m-d');
                        $anak->agama = $agama;
                        $anak->pendidikan = $pendidikans('anak');
                        $anak->pekerjaan = $pekerjaans('anak');
                        $anak->status_kawin = 'BELUM KAWIN';
                        $anak->no_kk = $no_kk;
                        $anak->hub_dgn_kk = 'ANAK';
                        $anak->hub_dgn_kk_urutan = 3;
                        $anak->warga_negara = 'WNI';
                        $anak->negara_nama = 'INDONESIA';
                        $anak->rt_id = $rt->id;
                        $anak->alamat = $alamat;
                        $anak->penduduk_ada = 'Ada';
                        $anak->created_by = 1;
                        $anak->save();

                        // anak user
                        $user = new User();
                        $user->name = $anak->nama;
                        $user->nik = $anak->nik;
                        $user->penduduk_id = $anak->id;
                        $user->password = $password;
                        $user->active = 1;
                        $user->created_by = 1;
                        $user->save();
                        $user->assignRole(config('app.role_penduduk'));

                        // simpan ke penduduk masuk
                        $masuk = new Masuk();
                        $masuk->penduduk_id = $anak->id;
                        $masuk->nama = 'Dibuat Untuk Testing';
                        $masuk->tanggal = date('Y-m-d');
                        $masuk->created_by = 1;
                        $masuk->save();
                    }
                }

                $nomor_rt = (($rw_no * $jml_rt) - $jml_rt) + $rt_no;
                $persentase = (100 / ($jml_rt * $jml_rw)) * $nomor_rt;
                $persentase = str_contains($persentase, '.') ? number_format($persentase, 2, '.', ' ') : $persentase;
                $persentase =  str_pad("$persentase", 5, " ") . '%';

                $nik_counter_ =  str_pad("$nik_counter", 9, " ");

                $rw_pad = str_pad("$rw_no", 4, " ");
                $rt_pad = str_pad("$nomor_rt", 4, " ");

                echo ("  $persentase | $rw_pad RW | $rt_pad RT | $nik_counter_ PENDUDUK\n");
            }
        }

        $gender = $faker->randomElement(['male', 'female']);
        $tanggal_lahir = $faker->dateTimeBetween('-25 years', '2002-01-01 23:59:59');

        $me = new Penduduk();
        $me->nik = 1;
        $me->nama = 'Isep Lutpi Nur';
        $me->jenis_kelamin = 'LAKI-LAKI';
        $me->tempat_lahir = "Cianjur";
        $me->tanggal_lahir = '2000-08-10';
        $me->agama = "ISLAM";
        $me->pendidikan = 'SLTA / SEDERAJAT';
        $me->pekerjaan = 'PELAJAR/MAHASISWA';
        $me->status_kawin = 'BELUM KAWIN';
        $me->no_kk = '1';
        $me->hub_dgn_kk = 'ANAK';
        $me->hub_dgn_kk_urutan = 3;
        $me->warga_negara = 'WNI';
        $me->negara_nama = 'INDONESIA';
        $me->rt_id = 1;
        $me->alamat = 'Mekarwangi';
        $me->penduduk_ada = 'Ada';
        $me->created_by = 1;
        $me->save();

        // me user
        $user = new User();
        $user->name = $me->nama;
        $user->nik = $me->nik;
        $user->penduduk_id = $me->id;
        $user->password = $password;
        $user->active = 1;
        $user->created_by = 1;
        $user->save();
        $user->assignRole([config('app.role_super_admin'), config('app.role_penduduk')]);

        // simpan ke penduduk masuk
        $masuk = new Masuk();
        $masuk->penduduk_id = $me->id;
        $masuk->nama = 'Dibuat Untuk Testing';
        $masuk->tanggal = date('Y-m-d');
        $masuk->created_by = 1;
        $masuk->save();

        return true;
    }
}
