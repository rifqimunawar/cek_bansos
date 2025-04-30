@extends('ronda::layouts.master')

@section('module-content')
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Custom Ronda</div>
        </div>
        <div class="card-body">
          <div class="row">
            <form action="{{ route('jadwalkan.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="col-md-12 col-lg-12">
                <div class="form-group mb-2">
                  <label for="nama_tagihan">Tanggal Ronda</label>
                  <input type="date" class="form-control" required name="tanggal_ronda" id="tanggal_ronda" />
                </div>

                <div class="form-group mb-2">
                  <label for="nominal">Warga</label>

                  <div class="form-group row mb-2">
                    <select name="warga_id[]" class="multiple-select2 form-control" multiple>

                      @foreach ($data_warga as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                      @endforeach
                    </select>
                  </div>

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
                  <input type="hidden" name="id">
                  <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                  <a href="{{ route('jadwalkan.index') }}" class="btn btn-warning btn-sm">Kembali</a>
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
          <div class="card-title">Generate Jadwal Ronda</div>
        </div>
        <div class="card-body">
          <div class="row">
            <form action="{{ route('jadwalkan.generate') }}" method="post"
              id='formGenerate'enctype="multipart/form-data">
              @csrf
              <div class="col-md-12 col-lg-12">
                <div class="form-group mb-2">
                  <label for="tgl_awal">Tanggal Awal</label>
                  <input type="date" class="form-control" required name="tgl_awal" id="tgl_awal" />
                </div>
                <div class="form-group mb-2">
                  <label for="tgl_akhir">Tanggal Akhir</label>
                  <input type="date" class="form-control" required name="tgl_akhir" id="tgl_akhir" />
                </div>
                <div class="form-group mb-2">
                  <label for="jumlah_warga">jumlah warga pada masing-masing tanggal </label>
                  <input type="text" oninput="numberInput(this)" class="form-control" required name="jumlah_warga"
                    id="jumlah_warga" />
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
                  <input type="hidden" name="id">
                  {{-- <button class="btn btn-success btn-sm" type="submit" onclick="showLoading()">Generate</button> --}}
                  <button class="btn btn-success btn-sm" type="button"
                    onclick="showLoading(); submitPreview();">Generate</button>

                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Loading Overlay -->
  <div id="loadingOverlay" style="display: none;">
    <div class="loading-content">
      <div class="spinner"></div>
      <p>Generating jadwal... Mohon tunggu</p>
    </div>
  </div>


@endsection
<script>
  function numberInput(input) {
    input.value = input.value.replace(/[^0-9]/g, '');
  }

  function showLoading() {
    document.getElementById("loadingOverlay").style.display = "flex";
  }

  function formatRupiah(input) {
    let value = input.value.replace(/[^0-9]/g, '');
    let formatted = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
    }).format(value);
    input.value = formatted.replace('Rp', 'Rp ');
  }

  function cleanRupiah(value) {
    return value.replace(/[^0-9]/g, '');
  }

  function submitPreview() {
    const form = document.getElementById("formGenerate");
    form.action = "{{ route('jadwalkan.preview') }}";
    form.submit();
  }
</script>
