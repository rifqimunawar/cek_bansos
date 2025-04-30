@extends('settings::layouts.master')

@section('module-content')
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Form Elements</div>
        </div>
        <div class="card-body">
          <div class="row">
            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="col-md-12 col-lg-12">
                <div class="form-group mb-2">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" required name="name" id="name"
                    placeholder="Nama Lengkap" />
                </div>

                <div class="form-group mb-2">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" required name="username" id="username"
                    placeholder="username untuk Login" />
                </div>

                <div class="form-group mb-2">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" required name="email" id="email" placeholder="Email" />
                </div>

                <div class="form-group mb-2">
                  <label for="role_id">Role</label>
                  <select class="form-control" name="role_id" id="role_id" required>
                    <option value="">Pilih Role</option>
                    @foreach ($dataRoles as $role)
                      <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                    @endforeach
                  </select>
                </div>

                {{-- <div class="form-group mb-2">
                  <label for="warga_id">Warga</label>
                  <select class="default-select2 form-control" name="warga_id" id="warga_id" required>
                    <option value="">Pilih Warga</option>
                    @foreach ($dataWarga as $warga)
                      <option value="{{ $warga->id }}">{{ $warga->nama }}</option>
                    @endforeach
                  </select>
                </div> --}}

                <div class="form-group mb-2">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" required name="password" id="password"
                    placeholder="Password" />
                </div>

                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif

                <div class="card-action">
                  <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                  <a href="{{ route('users.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
