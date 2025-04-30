@extends('ronda::layouts.master')
@php
  use App\Helpers\Fungsi;
@endphp
@section('module-content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Form Elements</div>
        </div>
        <div class="card-body">
          <div class="row">
            <form action="{{ route('jadwalkan.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="col-md-12 col-lg-12">
                <div class="form-group mb-2">
                  <label for="nama_tagihan">Tanggal Ronda</label>
                  <input type="date" class="form-control" required value="{{ $data->tanggal_ronda }}"
                    name="tanggal_ronda" id="tanggal_ronda" />
                </div>
                <div class="form-group mb-2">
                  <label for="warga_id">Warga</label>
                  <div class="form-group row mb-2">
                    <select name="warga_id[]" class="multiple-select2 form-control" multiple>
                      @foreach ($data_warga as $item)
                        <option value="{{ $item->id }}" @if (in_array($item->id, old('warga_id', $selected_wargas ?? []))) selected @endif>
                          {{ $item->nama }}
                        </option>
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
                  <input type="hidden" value="{{ $data->id }}" name="id">
                  <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                  <a href="{{ route('jadwalkan.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                </div>
              </div>
            </form>


          </div>
        </div>
      </div>
    </div>
    {{-- Absen --}}
    {{-- <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">{{ Fungsi::format_tgl($data->tanggal) }}</div>
        </div>
        <div class="card-body">
          <div class="row">
            <form action="{{ route('absen.ronda') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="col-md-12 col-lg-12">
                <table id="data-table-default" width="100%"
                  class="table table-striped table-bordered align-middle text-nowrap">
                  <thead>
                    <th>Nama</th>
                    <th>Absen</th>
                  </thead>
                  <tbody>
                    @forelse ($cek_absen as $item)
                      <tr>
                        <td>{{ $item->warga['nama'] ?? '' }}</td>
                        <td>
                          <input type="radio" name="absen[{{ $item['warga_id'] }}]" value="2"
                            class="form-check-input" @if ($item['absen'] == 2) checked @endif>
                          <label class="form-check-label">Hadir</label>

                          <input type="radio" name="absen[{{ $item['warga_id'] }}]" value="1"
                            class="form-check-input" @if ($item['absen'] == 1) checked @endif>
                          <label class="form-check-label">Tidak</label>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="2" class="text-center">Data Kosong</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
                <div class="card-action d-flex justify-content-center">
                  <input type="hidden" name="ronda_id" value="{{ $data->id }}">
                  <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> --}}
  </div>
@endsection
<script>
  function numberInput(input) {
    input.value = input.value.replace(/[^0-9]/g, '');
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
  $(document).ready(function() {
    $('.multiple-select2').select2({
      placeholder: "Pilih Warga",
      allowClear: true
    });
  });
</script>
