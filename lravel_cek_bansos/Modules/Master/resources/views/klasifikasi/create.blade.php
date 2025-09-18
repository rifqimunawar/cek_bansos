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
            <form action="{{ route('klasifikasi.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="col-md-12 col-lg-12">
                <div class="form-group mb-2">
                  <label for="kode">Kode</label>
                  <input type="text" class="form-control" name="kode" required id="kode" placeholder="kode" />
                </div>

                <div class="form-group mb-2">
                  <label for="nama">Nama Klasifikasi</label>
                  <input type="text" class="form-control" required name="nama" id="nama"
                    placeholder="klasifikasi" />
                </div>

                <div class="card-action d-flex justify-content-center gap-2">
                  <input type="hidden" name="id">
                  <a href="{{ route('klasifikasi.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                  <button class="btn btn-success btn-sm" type="submit">Simpan</button>
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
