@extends('pembayaran::layouts.master')
@php
  use App\Helpers\Fungsi;
@endphp
@section('module-content')
  <!-- BEGIN panel -->
  <div class="panel panel-inverse">
    <!-- BEGIN panel-heading -->
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
    <div
      style="display: flex; justify-content: space-between; align-items: center; margin-right: 15px;margin-top:10px;margin-left:15px">
      {{-- <a href="{{ route('umum.create') }}" class="btn btn-primary btn-sm">Tambah &ensp;<i class="fa fa-plus-square"
          aria-hidden="true" style="font-size: 12px"></i></a> --}}
      <div style="display: flex; gap: 10px;">
        {{-- <a href="{{ route('umum.export') }}" class="btn btn-warning btn-sm">
          <i class="fa fa-file-excel" style="font-size: 12px"></i> Export XLS
        </a> --}}

        {{-- <a href="javascript:void(0)" class="btn btn-warning btn-sm"
                onclick="printPage('{{ route('role.print') }}', )">
                <i class="fa fa-print" aria-hidden="true"></i> Print
            </a>

            <a href="{{ route('role.print') }}" class="btn btn-danger btn-sm">
                <i class="fa fa-print" style="font-size: 12px"></i> Print
            </a> --}}

        {{-- <a href="{{ route('umum.pdf') }}" class="btn btn-warning btn-sm">
          <i class="fa fa-file-pdf" style="font-size: 12px"></i> Export PDF
        </a> --}}

      </div>
    </div>

    {{-- @dd($data) --}}

    <!-- END panel-heading -->
    <!-- BEGIN panel-body -->
    {{-- @dd($data) --}}
    <div class="panel-body">
      <table id="data-table-default" width="100%" class="table table-striped table-bordered align-middle text-nowrap">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Tagihan</th>
            <th>Nominal</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @if (!empty($data->tagihans) && $data->tagihans->isNotEmpty())
            @foreach ($data->tagihans->unique('id') as $index => $tagihan)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $tagihan->nama_tagihan }}</td>
                <td>{{ Fungsi::rupiah($tagihan->nominal) }} <p style="display: none" id="nominal_pembayaran">
                    {{ $tagihan->nominal }}</p>
                </td>
                <td>
                  @php
                    $isLunas = $tagihan->pembayaran
                        ->where('periode_id', $tagihan->pivot->periode_id)
                        ->where('status', 1)
                        ->isNotEmpty();
                  @endphp
                  @if ($isLunas)
                    Lunas
                  @else
                    Belum Lunas
                  @endif
                </td>
                <td>
                  @php
                    $isLunas = $tagihan->pembayaran
                        ->where('periode_id', $tagihan->pivot->periode_id)
                        ->where('status', 1)
                        ->isNotEmpty();

                    $pembayaranId = optional($tagihan->pembayaran->first())->id ?? null;
                  @endphp

                  @if ($isLunas)
                    <a href="javascript:void(0);" onclick="printInvoice('{{ route('invoice', $pembayaranId) }}')"
                      class="btn btn-sm btn-success w-100px">
                      <i class="fas fa-file-invoice"></i> Lunas
                    </a>
                  @else
                    <a href="#modal-dialog" data-bs-toggle="modal" data-tagihan-id="{{ $tagihan->id }}"
                      data-warga-id="{{ $tagihan->pivot->warga_id }}" data-periode-id="{{ $tagihan->pivot->periode_id }}"
                      data-nominal="{{ $tagihan->nominal }}" data-nama-tagihan="{{ $tagihan->nama_tagihan }}"
                      data-nama-periode="{{ $tagihan->periodes[0]->nama_periode ?? 'Tidak Diketahui' }}"
                      class="btn btn-sm btn-warning w-100px open-modal"
                      style="font-size: 14px; text-decoration: none; border: solid 1px; border-radius: 3px;">
                      <i class="fas fa-money-bill-wave"></i> Bayar
                    </a>
                  @endif
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="5" class="text-center">Data tidak tersedia</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
  <div class="d-flex justify-content-center align-items-center">
    <a href="{{ route('pembayaran.index') }}" class="btn btn-sm btn-warning">Kembali</a>
  </div>

  <!-- #modal-dialog -->
  <div class="modal fade" id="modal-dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <form action="{{ route('pembayaran.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-header">
            <h4 class="modal-title">Bayar Sekarang</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
          </div>
          <div class="modal-body">

            <div class="row form-group mb-2">
              <label class="form-label col-form-label col-md-3">Nama</label>
              <div class="col-md-9">
                <div class="col-md-6">
                  <div class="input-group">
                    <input type="text" name="nama_warga" value="{{ $data->nama ?? '' }}" readonly id="nama_warga"
                      class="form-control is-valid" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row form-group mb-2">
              <label class="form-label col-form-label col-md-3">Alamat</label>
              <div class="col-md-9">
                <div class="col-md-6">
                  <div class="input-group">
                    <input type="text" name="alamat_warga" value="{{ $data->alamat ?? '' }}" readonly id="nama_warga"
                      class="form-control is-valid" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row form-group mb-2">
              <label class="form-label col-form-label col-md-3">Kontak</label>
              <div class="col-md-9">
                <div class="col-md-6">
                  <div class="input-group">
                    <input type="text" name="telp_warga" value="{{ $data->telp ?? '' }}" readonly id="nama_warga"
                      class="form-control is-valid" />
                  </div>
                </div>
              </div>
            </div>

            <div class="row form-group mb-2">
              <label class="form-label col-form-label col-md-3">Tanggal Pembayaran</label>
              <div class="col-md-9">
                <div class="col-md-6">
                  <div class="input-group">
                    <input type="date" name="" readonly id="tanggal" class="form-control is-valid" />
                  </div>
                </div>
              </div>
            </div>

            {{-- <div class="row form-group mb-2">
              <label class="form-label col-form-label col-md-3">Periode</label>
              <div class="col-md-9">
                <div class="col-md-6">
                  <div class="input-group">
                    <input type="text" name="periode_nama" readonly id="periode_nama"
                      class="form-control is-valid" />
                  </div>
                </div>
              </div>
            </div> --}}

            <div class="row form-group mb-2">
              <label class="form-label col-form-label col-md-3">Tagihan</label>
              <div class="col-md-9">
                <div class="col-md-6">
                  <div class="input-group">
                    <input type="text" name="tagihan_nama" readonly id="nama_tagihan"
                      class="form-control is-valid" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row form-group">
              <label class="form-label col-form-label col-md-3">Nominal Pembayaran</label>
              <div class="col-md-9">
                <div class="col-md-6">
                  <div class="input-group">
                    <input type="text" name="nominal_dibayar" readonly id="nominal_pembayaran_input"
                      oninput="validasiNominal(this, this.value)" class="form-control is-invalid" />
                    <div class="valid-tooltip">Nominal sudah sesuai!</div>
                    <div class="invalid-tooltip">Nominal harus sesuai dengan tagihan.</div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="mt-4">
            <input type="hidden" name="tagihan_id" id="tagihans_id">
            <input type="hidden" name="warga_id" id="warga_id">
            <input type="hidden" name="periode_id" id="periode_id">
            <input type="hidden" name="status" value="1">
            <input type="hidden" name="pembayaran_tipe" value="1">
          </div>
          <div class="modal-footer">
            <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
            <button data-bs-dismiss="modal" class="btn btn-success btn-sm" type="submit">Bayar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var inputTanggal = document.getElementById("tanggal");

    if (inputTanggal) {
      var today = new Date();
      var yyyy = today.getFullYear();
      var mm = String(today.getMonth() + 1).padStart(2, '0');
      var dd = String(today.getDate()).padStart(2, '0');

      var formattedDate = yyyy + "-" + mm + "-" + dd;
      inputTanggal.value = formattedDate;
    }
  });

  document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".open-modal").forEach(function(button) {
      button.addEventListener("click", function() {
        let tagihanId = this.getAttribute("data-tagihan-id");
        let wargaId = this.getAttribute("data-warga-id");
        let periodeId = this.getAttribute("data-periode-id");
        let nominalTagihan = this.getAttribute("data-nominal");
        let namaTagihan = this.getAttribute("data-nama-tagihan");
        let namaPeriode = this.getAttribute("data-nama-periode");

        // Masukkan nilai ke input form
        // document.getElementById("periode_nama").value = namaPeriode;
        document.getElementById("nama_tagihan").value = namaTagihan;
        document.getElementById("tagihans_id").value = tagihanId;
        document.getElementById("warga_id").value = wargaId;
        document.getElementById("periode_id").value = periodeId;
        let nominalInput = document.getElementById("nominal_pembayaran_input");
        nominalInput.value = nominalTagihan;

        // Validasi nominal pembayaran
        validasiNominal(nominalInput, nominalTagihan);
      });
    });
  });

  // Fungsi validasi nominal
  function validasiNominal(input, nominalTagihan) {
    let validTooltip = input.nextElementSibling;
    let invalidTooltip = validTooltip.nextElementSibling;

    if (parseInt(input.value) === parseInt(nominalTagihan)) {
      input.classList.remove("is-invalid");
      input.classList.add("is-valid");
      validTooltip.style.display = "block";
      invalidTooltip.style.display = "none";
    } else {
      input.classList.remove("is-valid");
      input.classList.add("is-invalid");
      validTooltip.style.display = "none";
      invalidTooltip.style.display = "block";
    }
  }


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
