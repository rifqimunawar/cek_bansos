@extends('settings::layouts.master')

@section('module-content')
  <div class="row">
    <div class="col-md-6 mb-4">
      <div class="card">
        <div class="card-header">
          <div class="card-title">{{ $title }}</div>
        </div>
        <div class="card-body">
          <div class="row">
            <form action="{{ route('users.update', $data->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="col-md-12 col-lg-12">
                <div class="form-group mb-2">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" required name="name" id="name"
                    placeholder="Nama Lengkap" value="{{ old('name', $data->name) }}" />
                </div>

                <div class="form-group mb-2">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" required name="username" id="username"
                    placeholder="username untuk Login" value="{{ old('username', $data->username) }}" />
                </div>

                <div class="form-group mb-2">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" required name="email" id="email" placeholder="Email"
                    value="{{ old('email', $data->email) }}" />
                </div>

                <div class="form-group mb-2">
                  <label for="role_id">Role</label>
                  <select class="form-control" name="role_id" id="role_id" required>
                    <option value="">Pilih Role</option>
                    @foreach ($dataRoles as $role)
                      <option value="{{ $role->id }}" {{ $role->id == $data->role_id ? 'selected' : '' }}>
                        {{ $role->role_name }}
                      </option>
                    @endforeach
                  </select>
                </div>
                {{-- <div class="form-group mb-2">
                  <label for="warga_id">Warga</label>
                  <select class="default-select2 form-control" name="warga_id" id="warga_id" required>
                    <option value="">Pilih Warga</option>
                    @foreach ($dataWarga as $warga)
                      <option value="{{ $warga->id }}" {{ $warga->id == $data->warga_id ? 'selected' : '' }}>
                        {{ $warga->nama }}
                      </option>
                    @endforeach
                  </select>
                </div> --}}
                {{-- <div class="form-group mb-2">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Password (Leave blank if not changing)" />
                                </div> --}}

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
                  <button class="btn btn-success btn-sm" type="submit">Update</button>
                  <a href="{{ route('users.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">{{ $title }}</div>
        </div>
        <div class="card-body">
          <div class="row">
            <form action="{{ route('users.resetPass', $data->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="col-md-12 col-lg-12">
                <div class="form-group mb-2 d-flex justify-content-center">
                  <h3>Reset Password ke "Admin123"</h3>
                </div>

                <div class="card-action d-flex justify-content-center my-4">
                  <input type="hidden" class="form-control" required name="password" id="password" value="Admin123" />
                  <button data-confirm-reset="true" class="btn btn-danger btn-sm" type="submit">Reset
                    Password</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('[data-confirm-reset]').forEach(function(button) {
        button.addEventListener('click', function(event) {
          event.preventDefault();

          const alertConfig = {!! Session::pull('alert.config') !!};

          Swal.fire(alertConfig).then(function(result) {
            if (result.isConfirmed) {
              event.target.closest('form').submit();
            }
          });
        });
      });
    });
  </script>
@endpush
