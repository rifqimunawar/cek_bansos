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
            <form action="{{ route('periode.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="col-md-12 col-lg-12">
                <div class="form-group mb-2">
                  <label for="nama_periode">Nama Periode</label>
                  <input type="text" class="form-control" required name="nama_periode" id="nama_periode"
                    placeholder="Januari 2025" />
                </div>
                <div class="form-group mb-2">
                  <label for="tanggal_mulai">Tanggal Mulai Periode</label>
                  <input type="date" class="form-control" name="tanggal_mulai" required id="tanggal_mulai"
                    placeholder="tanggal_mulai" />
                </div>
                <div class="form-group mb-2">
                  <label for="tanggal_akhir">Tanggal Akhir Periode</label>
                  <input type="date" class="form-control" name="tanggal_akhir" required id="tanggal_akhir"
                    placeholder="tanggal_akhir" />
                </div>

                <div class="card-action">
                  <input type="hidden" name="id">
                  <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                  <a href="{{ route('periode.index') }}" class="btn btn-warning btn-sm">Kembali</a>
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
