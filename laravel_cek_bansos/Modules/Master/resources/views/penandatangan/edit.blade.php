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
            <form id="form-penandatangan" action="{{ route('penandatangan.store') }}" method="post"
              enctype="multipart/form-data">
              @csrf
              <div class="col-md-12 col-lg-12">
                <div class="form-group mb-2">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" name="nama" required id="nama" placeholder="nama"
                    value="{{ old('nama', $data->nama) }}" />
                </div>

                <div class="form-group mb-4">
                  <label for="jabatan">Jabatan</label>
                  <input type="text" class="form-control" required name="jabatan" id="jabatan" placeholder="Jabatan"
                    value="{{ old('jabatan', $data->jabatan) }}" />
                </div>

                <div class="mb-4">
                  <label class="block text-lg text-gray-700 font-medium mb-4">Tanda Tangan sebelumnya:</label>
                  <img src="{{ $data->sign }}" alt="" style="width: 8rem; height: 4rem; object-fit: cover;">
                  <br>
                  <label class="block text-lg text-gray-700 font-medium mb-2">Update Tanda tangan:</label>
                  <x-creagia-signature-pad name='sign' />
                </div>
                <div class="card-action d-flex justify-content-center gap-2">
                  <input type="hidden" name="id" value="{{ old('id', $data->id) }}">
                  <a href="{{ route('penandatangan.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                  <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('vendor/sign-pad/sign-pad.min.js') }}"></script>
  <script>
    document.getElementById("form-penandatangan").addEventListener("submit", function() {
      const canvas = document.querySelector(".e-signpad canvas");
      const signInput = document.querySelector(".e-signpad input[name='sign']");
      if (canvas && signInput) {
        signInput.value = canvas.toDataURL("image/png");
      }
    });

    function numberInput(input) {
      input.value = input.value.replace(/[^0-9]/g, '');
    }
  </script>
@endsection
