@extends('templates.admin.master')
@section('content')
    <div class="card">
        <div class="card-header bg-info d-md-flex flex-row justify-content-between">
            <h3 class="card-title text-light">{{ $page_attr['title'] }}</h3>
            <a type="button" class="btn btn-rounded btn-gray btn-sm" href="{{ url()->previous() }}">
                <i class="fe fe-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="javascript:void(0)" id="MainForm" name="MainForm" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="{{ $surat->id }}">
                <input type="hidden" name="surat_detail_id" id="surat_detail_id" value="{{ $surat->nikah->id }}">
                <div class="row mb-3">
                    <label for="rw" class="col-sm-3 col-form-label">RT/RW
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-9 d-flex flex-row">
                        <span style="display: none;" id="rt_rw_text"></span>
                        <div class="w-100 me-2">
                            <input type="number" class="form-control" placeholder="Rukun Tetangga"
                                value="{{ $surat->rt->nomor }}" id="rt" name="rt"required>
                        </div>
                        <div class="w-100">
                            <input type="number" class="form-control" placeholder="Rukun Warga"
                                value="{{ $surat->rw->nomor }}" id="rw" name="rw"required>
                        </div>
                    </div>
                </div>

                <hr>
                {{-- calon a --}}
                <h4 class="card-title mb-1">Calon A</h4>
                <div class="ms-md-3 ms-sm-1">
                    <div class="row mb-3">
                        <label for="calon_a" class="col-sm-3 col-form-label">Calon
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Contoh: Mempelai Wanita" id="calon_a"
                                name="calon_a" value="{{ $surat->nikah->calon_a }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="anak_nik" class="col-sm-3 col-form-label">Nomor Induk Kependudukan
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9 d-flex flex-row justify-content-between">
                            <span style="display: none;" id="anak_nik_text">{{ $surat->nikah->anak_nik_text }}</span>
                            <div class="w-100">
                                <input type="number" class="form-control" placeholder="Nomor Induk Kependudukan"
                                    id="anak_nik" value="{{ $surat->nikah->anak_nik }}" name="anak_nik" required>
                            </div>
                            <div class="ms-2" id="btn_cari_anak_nik">
                                <button type="button" class="btn btn-primary" onclick="cek_nik('anak')">
                                    <i class="fas fa-search me-2"></i>Cari</button>
                            </div>
                            <div class="ms-2" id="btn_reset_anak_nik" style="display: none">
                                <button type="button" class="btn btn-danger" onclick="reset_form('anak')">
                                    <i class="fas fa-times me-2"></i>Reset</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="anak_no_kk" class="col-sm-3 col-form-label">No. Kartu Keluarga
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="No. Kartu Keluarga" id="anak_no_kk"
                                value="{{ $surat->nikah->anak_no_kk }}" name="anak_no_kk" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="anak_nama" class="col-sm-3 col-form-label">Nama Lengkap
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Nama Lengkap" id="anak_nama"
                                value="{{ $surat->nikah->anak_nama }}" name="anak_nama" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="anak_tempat_lahir" class="col-sm-3 col-form-label">Tempat, Tanggal lahir
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9 d-flex flex-row">
                            <div class="w-100  me-2">
                                <input type="text" class="form-control" placeholder="Tempat Lahir"
                                    id="anak_tempat_lahir" value="{{ $surat->nikah->anak_tempat_lahir }}"
                                    name="anak_tempat_lahir"required>
                            </div>
                            <div>
                                <input type="date" class="form-control date-input-str" placeholder="Tanggal Lahir"
                                    id="anak_tanggal_lahir" value="{{ $surat->nikah->anak_tanggal_lahir }}"
                                    name="anak_tanggal_lahir" required>
                            </div>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="anak_warga_negara" class="col-sm-3 col-form-label">Kewarganegaraan
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" id="anak_warga_negara" name="anak_warga_negara" required>
                                <option value="">Pilih Kewarganegaraan</option>
                                <option value="WNI" {{ $surat->nikah->anak_warga_negara == 'WNI' ? 'selected' : '' }}>
                                    Warga Negara Indonesia
                                </option>
                                <option value="WNA" {{ $surat->nikah->anak_warga_negara == 'WNA' ? 'selected' : '' }}>
                                    Warga Negara Asing
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="anak_negara_nama" class="col-sm-3 col-form-label">Nama Negara
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Negara Asal Penduduk"
                                id="anak_negara_nama" value="{{ $surat->nikah->anak_negara_nama }}"
                                name="anak_negara_nama" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="anak_agama" class="col-sm-3 col-form-label">Agama
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" id="anak_agama" name="anak_agama">
                                <option value="">Pilih Agama</option>
                                @foreach ($agamas as $agama)
                                    <option value="{{ $agama }}"
                                        {{ $surat->nikah->anak_agama == $agama ? 'selected' : '' }}>
                                        {{ $agama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="anak_status_kawin" class="col-sm-3 col-form-label">Status Perkawinan
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" id="anak_status_kawin" name="anak_status_kawin" required>
                                <option value="">Pilih Status Perkawinan</option>
                                <option value="KAWIN"
                                    {{ $surat->nikah->anak_status_kawin == 'KAWIN' ? 'selected' : '' }}>
                                    KAWIN
                                </option>
                                <option value="BELUM KAWIN"
                                    {{ $surat->nikah->anak_status_kawin == 'BELUM KAWIN' ? 'selected' : '' }}>
                                    BELUM KAWIN
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="anak_pendidikan" class="col-sm-3 col-form-label">Pendidikan
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" id="anak_pendidikan" name="anak_pendidikan" required>
                                <option value="">Pilih Pendidikan</option>
                                @foreach ($pendidikans as $pendidikan)
                                    <option value="{{ $pendidikan }}"
                                        {{ $surat->nikah->anak_pendidikan == $pendidikan ? 'selected' : '' }}>
                                        {{ $pendidikan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="anak_pekerjaan" class="col-sm-3 col-form-label">Pekerjaan
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" id="anak_pekerjaan" name="anak_pekerjaan" required>
                                <option value="">Pilih Pekerjaan</option>
                                @foreach ($pekerjaans as $pekerjaan)
                                    <option value="{{ $pekerjaan }}"
                                        {{ $surat->nikah->anak_pekerjaan ? 'selected' : '' }}>
                                        {{ $pekerjaan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="anak_alamat" class="col-sm-3 col-form-label">Alamat
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" placeholder="Alamat" id="anak_alamat" name="anak_alamat" required>{{ $surat->nikah->anak_alamat }}</textarea>
                        </div>
                    </div>
                </div>

                <hr>
                <h4 class="card-title mb-1">Orang Tua</h4>
                <small>Data diatas adalah betul anak kandung dari seorang <b>Ayah</b> dan <b>Ibu</b></small>

                {{-- ayah --}}
                <div class="ms-md-4 ms-sm-1">
                    <h4 class="card-title mb-1">Ayah</h4>

                    <div class="row mb-3">
                        <label for="ayah_nik" class="col-sm-3 col-form-label">Nomor Induk Kependudukan
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9 d-flex flex-row justify-content-between">
                            <span style="display: none;" id="ayah_nik_text">{{ $surat->nikah->ayah_nik_text }}</span>
                            <div class="w-100">
                                <input type="number" class="form-control" placeholder="Nomor Induk Kependudukan"
                                    id="ayah_nik" value="{{ $surat->nikah->ayah_nik }}" name="ayah_nik" required>
                            </div>
                            <div class="ms-2" id="btn_cari_ayah_nik">
                                <button type="button" class="btn btn-primary" onclick="cek_nik('ayah')">
                                    <i class="fas fa-search me-2"></i>Cari</button>
                            </div>
                            <div class="ms-2" id="btn_reset_ayah_nik" style="display: none">
                                <button type="button" class="btn btn-danger" onclick="reset_form('ayah')">
                                    <i class="fas fa-times me-2"></i>Reset</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ayah_nama" class="col-sm-3 col-form-label">Nama Ayah
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Nama Lengkap" id="ayah_nama"
                                value="{{ $surat->nikah->ayah_nama }}" name="ayah_nama" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ayah_tanggal_lahir" class="col-sm-3 col-form-label">Tanggal lahir
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control date-input-str" placeholder="Tanggal Lahir"
                                value="{{ $surat->nikah->ayah_tanggal_lahir }}" id="ayah_tanggal_lahir"
                                name="ayah_tanggal_lahir" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ayah_warga_negara" class="col-sm-3 col-form-label">Kewarganegaraan
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" id="ayah_warga_negara" name="ayah_warga_negara" required>
                                <option value="">Pilih Kewarganegaraan</option>
                                <option value="WNI" {{ $surat->nikah->ayah_warga_negara == 'WNI' ? 'selected' : '' }}>
                                    Warga Negara Indonesia
                                </option>
                                <option value="WNA" {{ $surat->nikah->ayah_warga_negara == 'WNA' ? 'selected' : '' }}>
                                    Warga Negara Asing
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ayah_negara_nama" class="col-sm-3 col-form-label">Nama Negara
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Negara Asal Penduduk"
                                id="ayah_negara_nama" value="{{ $surat->nikah->ayah_negara_nama }}"
                                name="ayah_negara_nama" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ayah_agama" class="col-sm-3 col-form-label">Agama
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" id="ayah_agama" name="ayah_agama">
                                <option value="">Pilih Agama</option>
                                @foreach ($agamas as $agama)
                                    <option value="{{ $agama }}"
                                        {{ $surat->nikah->ayah_agama == $agama ? 'selected' : '' }}>
                                        {{ $agama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ayah_pekerjaan" class="col-sm-3 col-form-label">Pekerjaan
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" id="ayah_pekerjaan" name="ayah_pekerjaan" required>
                                <option value="">Pilih Pekerjaan</option>
                                @foreach ($pekerjaans as $pekerjaan)
                                    <option value="{{ $pekerjaan }}"
                                        {{ $surat->nikah->ayah_pekerjaan ? 'selected' : '' }}>
                                        {{ $pekerjaan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ayah_alamat" class="col-sm-3 col-form-label">Alamat
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" placeholder="Alamat" id="ayah_alamat" name="ayah_alamat" required>{{ $surat->nikah->ayah_alamat }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- ibu --}}
                <div class="ms-md-4 ms-sm-1">
                    <h4 class="card-title mb-1">Ibu</h4>

                    <div class="row mb-3">
                        <label for="ibu_nik" class="col-sm-3 col-form-label">Nomor Induk Kependudukan
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9 d-flex flex-row justify-content-between">
                            <span style="display: none;" id="ibu_nik_text">{{ $surat->nikah->ibu_nik_text }}</span>
                            <div class="w-100">
                                <input type="number" class="form-control" placeholder="Nomor Induk Kependudukan"
                                    id="ibu_nik" value="{{ $surat->nikah->ibu_nik }}" name="ibu_nik" required>
                            </div>
                            <div class="ms-2" id="btn_cari_ibu_nik">
                                <button type="button" class="btn btn-primary" onclick="cek_nik('ibu')">
                                    <i class="fas fa-search me-2"></i>Cari</button>
                            </div>
                            <div class="ms-2" id="btn_reset_ibu_nik" style="display: none">
                                <button type="button" class="btn btn-danger" onclick="reset_form('ibu')">
                                    <i class="fas fa-times me-2"></i>Reset</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ibu_nama" class="col-sm-3 col-form-label">Nama Ibu
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Nama Lengkap" id="ibu_nama"
                                value="{{ $surat->nikah->ibu_nama }}" name="ibu_nama" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ibu_tanggal_lahir" class="col-sm-3 col-form-label">Tanggal lahir
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control date-input-str" placeholder="Tanggal Lahir"
                                value="{{ $surat->nikah->ibu_tanggal_lahir }}" id="ibu_tanggal_lahir"
                                name="ibu_tanggal_lahir" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ibu_warga_negara" class="col-sm-3 col-form-label">Kewarganegaraan
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" id="ibu_warga_negara" name="ibu_warga_negara" required>
                                <option value="">Pilih Kewarganegaraan</option>
                                <option value="WNI" {{ $surat->nikah->ibu_warga_negara == 'WNI' ? 'selected' : '' }}>
                                    Warga Negara Indonesia
                                </option>
                                <option value="WNA" {{ $surat->nikah->ibu_warga_negara == 'WNA' ? 'selected' : '' }}>
                                    Warga Negara Asing
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ibu_negara_nama" class="col-sm-3 col-form-label">Nama Negara
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Negara Asal Penduduk"
                                id="ibu_negara_nama" value="{{ $surat->nikah->ibu_negara_nama }}" name="ibu_negara_nama"
                                required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ibu_agama" class="col-sm-3 col-form-label">Agama
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" id="ibu_agama" name="ibu_agama">
                                <option value="">Pilih Agama</option>
                                @foreach ($agamas as $agama)
                                    <option value="{{ $agama }}"
                                        {{ $surat->nikah->ibu_agama == $agama ? 'selected' : '' }}>
                                        {{ $agama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ibu_pekerjaan" class="col-sm-3 col-form-label">Pekerjaan
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" id="ibu_pekerjaan" name="ibu_pekerjaan" required>
                                <option value="">Pilih Pekerjaan</option>
                                @foreach ($pekerjaans as $pekerjaan)
                                    <option value="{{ $pekerjaan }}"
                                        {{ $surat->nikah->ibu_pekerjaan ? 'selected' : '' }}>
                                        {{ $pekerjaan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ibu_alamat" class="col-sm-3 col-form-label">Alamat
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" placeholder="Alamat" id="ibu_alamat" name="ibu_alamat" required>{{ $surat->nikah->ibu_alamat }}</textarea>
                        </div>
                    </div>
                </div>


                <hr>
                <h4 class="card-title mb-1">Keterangan</h4>
                <small>Orang tersebut diatas akan melangsungkan pernikahan pada:</small>

                <div class="row mb-3">
                    <label for="tanggal" class="col-sm-3 col-form-label">Tanggal/Waktu
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-9 d-flex flex-row">
                        <div class="w-100 me-2">
                            <input class="form-control date-input-str" type="date" id="tanggal" name="tanggal"
                                value="{{ $surat->nikah->tanggal }}" required>
                        </div>
                        <div class="w-100">
                            <input class="form-control" type="time" id="waktu" name="waktu"
                                value="{{ $surat->nikah->waktu }}" required>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="dengan_seorang" class="col-sm-3 col-form-label">Dengan Seorang
                        <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <select class="form-control" id="dengan_seorang" name="dengan_seorang">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="LAKI-LAKI"
                                {{ $surat->nikah->dengan_seorang == 'LAKI-LAKI' ? 'selected' : '' }}>
                                LAKI-LAKI
                            </option>
                            <option value="PEREMPUAN"
                                {{ $surat->nikah->dengan_seorang == 'PEREMPUAN' ? 'selected' : '' }}>
                                PEREMPUAN
                            </option>
                        </select>
                    </div>
                </div>
                <hr>

                {{-- calon b --}}
                <h4 class="card-title mb-1">Calon B</h4>
                <div class="ms-md-3 ms-sm-1">
                    <div class="row mb-3">
                        <label for="calon_b" class="col-sm-3 col-form-label">Calon
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Contoh: Mempelai Wanita"
                                id="calon_b" name="calon_b" value="{{ $surat->nikah->calon_b }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="calon_nik" class="col-sm-3 col-form-label">Nomor Induk Kependudukan
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9 d-flex flex-row justify-content-between">
                            <span style="display: none;" id="calon_nik_text">{{ $surat->nikah->calon_nik_text }}</span>
                            <div class="w-100 me-2">
                                <input type="number" class="form-control" placeholder="Nomor Induk Kependudukan"
                                    id="calon_nik" value="{{ $surat->nikah->calon_nik }}" name="calon_nik" required>
                            </div>
                            <div class="ms-2" id="btn_cari_calon_nik">
                                <button type="button" class="btn btn-primary" onclick="cek_nik('calon')">
                                    <i class="fas fa-search me-2"></i>Cari</button>
                            </div>
                            <div class="ms-2" id="btn_reset_calon_nik" style="display: none">
                                <button type="button" class="btn btn-danger" onclick="reset_form('calon')">
                                    <i class="fas fa-times me-2"></i>Reset</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="calon_no_kk" class="col-sm-3 col-form-label">No. Kartu Keluarga
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="No. Kartu Keluarga" id="calon_no_kk"
                                value="{{ $surat->nikah->calon_no_kk }}" name="calon_no_kk" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="calon_nama" class="col-sm-3 col-form-label">Nama Lengkap
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Nama Lengkap" id="calon_nama"
                                value="{{ $surat->nikah->calon_nama }}" name="calon_nama" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="calon_tempat_lahir" class="col-sm-3 col-form-label">Tempat, Tanggal lahir
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9 d-flex flex-row">
                            <div class="w-100 me-2">
                                <input type="text" class="form-control" placeholder="Tempat Lahir"
                                    id="calon_tempat_lahir" value="{{ $surat->nikah->calon_tempat_lahir }}"
                                    name="calon_tempat_lahir"required>
                            </div>
                            <div>
                                <input type="date" class="form-control date-input-str" placeholder="Tanggal Lahir"
                                    id="calon_tanggal_lahir" value="{{ $surat->nikah->calon_tanggal_lahir }}"
                                    name="calon_tanggal_lahir" required>
                            </div>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="calon_warga_negara" class="col-sm-3 col-form-label">Kewarganegaraan
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" id="calon_warga_negara" name="calon_warga_negara" required>
                                <option value="">Pilih Kewarganegaraan</option>
                                <option value="WNI" {{ $surat->nikah->calon_warga_negara == 'WNI' ? 'selected' : '' }}>
                                    Warga Negara Indonesia
                                </option>
                                <option value="WNA" {{ $surat->nikah->calon_warga_negara == 'WNA' ? 'selected' : '' }}>
                                    Warga Negara Asing
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="calon_negara_nama" class="col-sm-3 col-form-label">Nama Negara
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Negara Asal Penduduk"
                                id="calon_negara_nama" value="{{ $surat->nikah->calon_negara_nama }}"
                                name="calon_negara_nama" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="calon_agama" class="col-sm-3 col-form-label">Agama
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" id="calon_agama" name="calon_agama">
                                <option value="">Pilih Agama</option>
                                @foreach ($agamas as $agama)
                                    <option value="{{ $agama }}"
                                        {{ $surat->nikah->calon_agama == $agama ? 'selected' : '' }}>
                                        {{ $agama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="calon_status_kawin" class="col-sm-3 col-form-label">Status Perkawinan
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" id="calon_status_kawin" name="calon_status_kawin" required>
                                <option value="">Pilih Status Perkawinan</option>
                                <option value="KAWIN"
                                    {{ $surat->nikah->calon_status_kawin == 'KAWIN' ? 'selected' : '' }}>
                                    KAWIN
                                </option>
                                <option value="BELUM KAWIN"
                                    {{ $surat->nikah->calon_status_kawin == 'BELUM KAWIN' ? 'selected' : '' }}>
                                    BELUM KAWIN
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="calon_pendidikan" class="col-sm-3 col-form-label">Pendidikan
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" id="calon_pendidikan" name="calon_pendidikan" required>
                                <option value="">Pilih Pendidikan</option>
                                @foreach ($pendidikans as $pendidikan)
                                    <option value="{{ $pendidikan }}"
                                        {{ $surat->nikah->calon_pendidikan == $pendidikan ? 'selected' : '' }}>
                                        {{ $pendidikan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="calon_pekerjaan" class="col-sm-3 col-form-label">Pekerjaan
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" id="calon_pekerjaan" name="calon_pekerjaan" required>
                                <option value="">Pilih Pekerjaan</option>
                                @foreach ($pekerjaans as $pekerjaan)
                                    <option value="{{ $pekerjaan }}"
                                        {{ $surat->nikah->calon_pekerjaan ? 'selected' : '' }}>
                                        {{ $pekerjaan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="calon_alamat" class="col-sm-3 col-form-label">Alamat
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" placeholder="Alamat" id="calon_alamat" name="calon_alamat" required>{{ $surat->nikah->calon_alamat }}</textarea>
                        </div>
                    </div>
                </div>


            </form>
        </div>
        <div class="card-footer">
            <div class="form-group">
                <button type="submit" class="btn btn-success" form="MainForm">
                    <li class="fas fa-save mr-1"></li> Simpan
                </button>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <!-- DATA TABLE JS-->
    <script src="{{ asset('assets/templates/admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    {{-- loading --}}
    <script src="{{ asset('assets/templates/admin/plugins/loading/loadingoverlay.min.js') }}"></script>

    {{-- sweetalert --}}
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        const nik_calon_ada = {{ $nik_calon_ada ? 'true' : 'false' }};
        const nik_anak_ada = {{ $nik_anak_ada ? 'true' : 'false' }};
        const nik_ibu_ada = {{ $nik_ibu_ada ? 'true' : 'false' }};
        const nik_ayah_ada = {{ $nik_ayah_ada ? 'true' : 'false' }};

        $(document).ready(function() {
            // setting kewarganegaraan
            const jenis_penduduk = ['anak', 'calon', 'ayah', 'ibu'];
            for (const jenis of jenis_penduduk) {
                $(`#${jenis}_warga_negara`).val('WNI');
                $(`#${jenis}_negara_nama`).val('INDONESIA');

                $(`#${jenis}_warga_negara`).change(function() {
                    if (this.value == "WNI") {
                        $(`#${jenis}_negara_nama`).val('INDONESIA');
                    } else {
                        $(`#${jenis}_negara_nama`).val('');
                    }
                });

                $(`#${jenis}_negara_nama`).keyup(function() {
                    if (String(this.value).toLocaleLowerCase() == 'indonesia') {
                        $(`#${jenis}_warga_negara`).val('WNI');
                    } else if (String(this.value).toLocaleLowerCase() == '') {
                        $(`#${jenis}_warga_negara`).val('');
                    } else {
                        $(`#${jenis}_warga_negara`).val('WNA');
                    }
                });
            }

            setTimeout(() => {
                if (nik_calon_ada) {
                    set_button_cari('calon', false);
                }
                if (nik_anak_ada) {
                    set_button_cari('anak', false);
                }
                if (nik_ibu_ada) {
                    set_button_cari('ibu', false);
                }
                if (nik_ayah_ada) {
                    set_button_cari('ayah', false);
                }
            }, 500);

            // simpan form ============================================================================================
            $('#MainForm').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('button[form=MainForm]', 'Simpan');
                $.ajax({
                    type: "POST",
                    url: "{{ route(h_prefix('perbaiki_simpan', 2)) }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data berhasil disimpan',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        setTimeout(() => {
                            window.location.href = "{{ route('penduduk.pelacakan') }}";
                        }, 2000);

                        $('#MainForm').trigger("reset");
                        for (const jenis of jenis_penduduk) {
                            reset_form(jenis);
                        }

                    },
                    error: function(data) {
                        const res = data.responseJSON ?? {};
                        errorAfterInput = [];
                        for (const property in res.errors) {
                            errorAfterInput.push(property);
                            setErrorAfterInput(res.errors[property], `#${property}`);
                        }
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res.message ?? 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        setBtnLoading('button[form=MainForm]',
                            '<li class="fas fa-save mr-1"></li> Simpan',
                            false);
                    }
                });
            });
        });

        function cek_nik(jenis) {
            const nik = $(`#${jenis}_nik`).val();
            $.LoadingOverlay("show");
            $.ajax({
                type: "GET",
                url: `{{ route(h_prefix('cari_penduduk', 4)) }}`,
                data: {
                    nik
                },
                success: (penduduk) => {
                    Swal.fire({
                        position: 'center',
                        icon: 'info',
                        title: `NIK ditemukan`,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    render_data_penduduk(jenis, penduduk);
                },
                error: function(err) {
                    Swal.fire({
                        position: 'center',
                        icon: err.status == 400 ? 'info' : 'error',
                        title: ((err.responseJSON) ? err.responseJSON.message :
                            'Something went wrong'),
                        showConfirmButton: false,
                        timer: 3000
                    })
                },
                complete: function() {
                    $.LoadingOverlay("hide");
                }
            });
        }

        function reset_form(jenis) {
            $(`#${jenis}_no_kk`).val('');
            $(`#${jenis}_nama`).val('');
            $(`#${jenis}_tempat_lahir`).val('');
            $(`#${jenis}_tanggal_lahir`).val('');
            $(`#${jenis}_warga_negara`).val('');
            $(`#${jenis}_negara_nama`).val('');
            $(`#${jenis}_agama`).val('');
            $(`#${jenis}_status_kawin`).val('');
            $(`#${jenis}_pendidikan`).val('');
            $(`#${jenis}_pekerjaan`).val('');
            $(`#${jenis}_alamat`).val('');

            // render nik
            const nik = $(`#${jenis}_nik`);
            const nik_text = $(`#${jenis}_nik_text`);
            const btn_cari_nik = $(`#btn_cari_${jenis}_nik`);
            const btn_reset_nik = $(`#btn_reset_${jenis}_nik`);
            nik.val('');
            nik.show();
            nik_text.html(nik.val());
            nik_text.hide();

            // nik
            btn_cari_nik.show();
            btn_reset_nik.hide();
            render_tanggal(`#${jenis}_tanggal_lahir`);

            $('.is-valid').removeClass('is-valid');
            $(`#${jenis}_warga_negara`).val('WNI');
            $(`#${jenis}_negara_nama`).val('INDONESIA');
        }

        function set_button_cari(jenis, set = false) {
            // render nik
            const nik = $(`#${jenis}_nik`);
            const nik_text = $(`#${jenis}_nik_text`);
            const btn_cari_nik = $(`#btn_cari_${jenis}_nik`);
            const btn_reset_nik = $(`#btn_reset_${jenis}_nik`);

            if (set) {
                nik.show();
                nik_text.html(nik.val());
                nik_text.hide();

                btn_cari_nik.show();
                btn_reset_nik.hide();
            } else {
                nik.hide();
                nik_text.html(nik.val());
                nik_text.show();

                btn_cari_nik.hide();
                btn_reset_nik.show();
            }
        }
    </script>
@endsection
