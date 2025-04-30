@extends('master::layouts.master')

@section('module-content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Form Elements</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('karyawan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group mb-2">
                                    <label for="nama_lengkap">Nama</label>
                                    <input type="text" class="form-control" required name="nama_lengkap"
                                        id="nama_lengkap" placeholder="Nama" />
                                </div>
                                <div class="form-group mb-2">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control" required name="nik" id="nik"
                                        placeholder="NIK" oninput="numberInput(this)" />
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group mb-2">
                                        <label for="posisi_id">Posisi / Jabatan</label>
                                        <select class="default-select2 form-control" name="posisi_id" required>
                                            <option value="" selected disabled>Pilih</option>
                                            @foreach ($data['posisi'] as $item)
                                                <option value="{{ $item->id }}">{{ $item->posisi_nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group mb-2">
                                        <label for="jenis_kendaraan_id">Jenis kendaraan yang digunakan</label>
                                        <select class="default-select2 form-control" name="jenis_kendaraan_id" required>
                                            <option value="" selected disabled>Pilih</option>
                                            @foreach ($data['jenisKendaraan'] as $item)
                                                <option value="{{ $item->id }}">{{ $item->jenis_kendaraan }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="card-action">
                                    <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                                    <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                                    <a href="{{ route('karyawan.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function numberInput(input) {
        input.value = input.value.replace(/[^0-9]/g, '');
    }
</script>
