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
                        <form action="{{ route('jenis_kendaraan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group mb-2">
                                    <label for="jenis_kendaraan">Jenis Kendaraan</label>
                                    <input type="text" class="form-control" required name="jenis_kendaraan"
                                        id="jenis_kendaraan" placeholder="Jenis kendaraan" />
                                </div>

                                <div class="card-action">
                                    <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                                    <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                                    <a href="{{ route('jenis_kendaraan.index') }}"
                                        class="btn btn-warning btn-sm">Kembali</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
