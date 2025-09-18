@extends('master::layouts.master')
@php
  use App\Helpers\Fungsi;
  use App\Helpers\GetSettings;
@endphp
@section('module-content')
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Form Elements</div>
        </div>
        <div class="card-body">
          <div class="row">
            <form action="{{ route('parameter.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="col-md-12 col-lg-12">

                <div class="form-group mb-2">
                  <label for="kop_surat">Kop Surat</label>
                  <input type="file" class="form-control" required id="kop_surat" name="kop_surat" />

                  @if (!empty($data->kop_surat))
                    <p>File kop surat saat ini: {{ $data->kop_surat }}</p>
                    <img src="{{ GetSettings::getBaseUrl() . 'surat/' . $data->kop_surat }}" alt="Kop Surat"
                      style="width: 100%;">
                  @endif
                </div>

                <div class="form-group mb-2">
                  <label for="footer_surat">Footer Surat</label>
                  <input type="file" class="form-control" required id="footer_surat" name="footer_surat" />
                  @if (!empty($data->footer_surat))
                    <p>File kop surat saat ini: {{ $data->footer_surat }}</p>
                    <img src="{{ GetSettings::getBaseUrl() . 'surat/' . $data->footer_surat }}" alt="Kop Surat"
                      style="width: 100%;">
                  @endif
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
                  <input type="hidden" name="id" value="1">
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
  function formatCurrency(input, hiddenFieldId) {
    let value = input.value.replace(/[^0-9]/g, '');

    if (value.length > 0) {
      let formatted = parseInt(value, 10).toLocaleString('id-ID');
      input.value = `Rp ${formatted}`;
      document.getElementById(hiddenFieldId).value = value;
    } else {
      input.value = '';
      document.getElementById(hiddenFieldId).value = '';
    }
  }
</script>
