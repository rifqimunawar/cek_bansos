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
                        <form action="{{ route('posisi.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group mb-2">
                                    <label for="posisi">Posisi / Jabatan</label>
                                    <input type="text" class="form-control" required name="posisi_nama" id="posisi"
                                        placeholder="Posisi / Jabatan" />
                                </div>

                                <div class="card-action">
                                    <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                                    <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                                    <a href="{{ route('posisi.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
