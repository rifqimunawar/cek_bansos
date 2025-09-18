@extends('settings::layouts.master')

@section('module-content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{ $title }}</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('role.update', $data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf @method('put')
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group mb-2">
                                    <label for="role_name">Nama Role</label>
                                    <input type="text" class="form-control" required name="role_name" id="role_name"
                                        placeholder="Nama Role" value="{{ $data->role_name }}" />
                                </div>

                                <div class="card-action">
                                    <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                                    <a href="{{ route('role.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
