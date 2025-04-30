@extends('profile::layouts.master')

@section('module-content')
  <div class="profile">
    <div class="profile-header">
      <div class="profile-header-cover"></div>
      <div class="profile-header-content">
        <div class="profile-header-img">
          <img src="{{ asset('img/' . Auth::user()->img) }}" alt="" />
        </div>
        <div class="profile-header-info">
          <h4 class="mt-0 mb-1">{{ Auth::user()->name }}</h4>
          <p class="mb-2">{{ Auth::user()->role->role_name }}</p>
          <a href="#" class="btn btn-xs btn-yellow">Edit Profile</a>
        </div>
      </div>
      <ul class="profile-header-tab nav nav-tabs">
        <li class="nav-item"><a href="#profile-post" class="nav-link active" data-bs-toggle="tab">&emsp;</a></li>
      </ul>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-xl-6">
      <div class="panel panel-inverse" data-sortable-id="form-stuff-11">
        <div class="panel-heading">
          <h4 class="panel-title">{{ $title }}</h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
                class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="panel-body">
          <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <fieldset>
              {{-- <legend class="mb-3">Pengaturan Profile</legend> --}}

              <div class="mb-3">
                <label class="form-label" for="name">Nama Lengkap</label>
                <input class="form-control" type="text" id="name" name="name" placeholder="Nama Lengkap"
                  required value="{{ $data->name }}" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input class="form-control @error('username') is-invalid @enderror" type="text" id="username"
                  name="username" placeholder="username" required value="{{ old('username', $data->username ?? '') }}" />
                @error('username')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" type="email" id="email"
                  name="email" placeholder="Email" value="{{ old('email', $data->email ?? '') }}" />
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="img">Profile</label>
                <input class="form-control @error('img') is-invalid @enderror" type="file" id="img"
                  name="img" placeholder="img" onchange="previewImage(event)" />
                @error('img')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" id="password"
                  name="password" placeholder="password" />
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="d-flex justify-content-center">
                <input type="hidden" name="id" value="{{ $data->id }}">
                <button type="submit" class="btn btn-primary w-100px">Simpan</button>
                {{-- <a href="javascript:history.back();" class="btn btn-default w-100px">Kembali</a> --}}
              </div>
            </fieldset>
          </form>

        </div>
        {{-- <div class="hljs-wrapper">
                    <pre><code class="html" data-url="../assets/data/form-elements/code-11.json"></code></pre>
                </div> --}}
      </div>
    </div>
    <div class="col-xl-6">
      <div class="mb-3">
        <img id="imgPreview" src="{{ $data->img ? asset('img/' . $data->img) : '' }}" alt="Image Preview"
          style="max-width: 80%; height: auto; display: {{ $data->img ? 'block' : 'none' }};" />
      </div>
    </div>
  </div>
@endsection
<script>
  function previewImage(event) {
    var preview = document.getElementById('imgPreview');
    var file = event.target.files[0];

    if (file) {
      var reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      }

      reader.readAsDataURL(file);
    } else {
      preview.style.display = 'none';
    }
  }
</script>
