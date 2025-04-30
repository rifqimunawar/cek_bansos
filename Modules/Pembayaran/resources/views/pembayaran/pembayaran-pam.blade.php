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
            <th>Tanggal</th>
            <th>Parameter</th>
            <th>Nominal</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ Fungsi::format_tgl($item->tanggal_input) }}</td>
              <td>{{ $item->parameter }} (m³)</td>
              <td>{{ Fungsi::rupiah($item->nominal) }}</td>
              <td>
                {{ $item->pembayaran->isNotEmpty() ? 'Lunas' : 'Belum Lunas' }}
              </td>
              <td>
                @if ($item->pembayaran->isNotEmpty())
                  @php
                    $pembayaranId = $item->pembayaran->first()->id;
                  @endphp
                  <a href="javascript:void(0);" onclick="printInvoice('{{ route('invoice', $pembayaranId) }}')"
                    class="btn btn-sm btn-success w-100px">
                    <i class="fas fa-file-invoice"></i> Lunas
                  </a>
                @else
                  <a href="#modal-dialog" data-bs-toggle="modal" class="btn btn-sm btn-warning w-100px open-modal"
                    data-penggunaan="{{ $item->parameter }}" data-warga-id="{{ $item->warga_id }}"
                    data-pam-id="{{ $item->id }}" data-nominal="{{ $item->nominal }}">
                    <i class="fas fa-money-bill-wave"></i> Bayar
                  </a>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <a href="{{ route('pembayaran.index') }}" class="btn btn-sm btn-warning">Kembali</a>
    </div>
  </div>

  <!-- #modal-dialog -->
  <div class="modal fade" id="modal-dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <form action="{{ route('pembayaran.storePam') }}" method="post" enctype="multipart/form-data">
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
                    <input type="text" name="nama_warga" value="{{ $data->first()->warga->nama ?? '' }}" readonly
                      id="nama_warga" class="form-control is-valid" />
                  </div>
                </div>
              </div>
            </div>

            <div class="row form-group mb-2">
              <label class="form-label col-form-label col-md-3">Alamat</label>
              <div class="col-md-9">
                <div class="col-md-6">
                  <div class="input-group">
                    <input type="text" name="alamat_warga" value="{{ $data->first()->warga->alamat ?? '' }}" readonly
                      id="alamat_warga" class="form-control is-valid" />
                  </div>
                </div>
              </div>
            </div>

            <div class="row form-group mb-2">
              <label class="form-label col-form-label col-md-3">Kontak</label>
              <div class="col-md-9">
                <div class="col-md-6">
                  <div class="input-group">
                    <input type="text" name="telp_warga" value="{{ $data->first()->warga->telp ?? '' }}" readonly
                      id="kontak_warga" class="form-control is-valid" />
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

            <div class="row form-group mb-2">
              <label class="form-label col-form-label col-md-3">Tagihan</label>
              <div class="col-md-9">
                <div class="col-md-6">
                  <div class="input-group">
                    <input type="text" name="tagihan_nama" value="Pam" readonly id="nama_tagihan"
                      class="form-control is-valid" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row form-group mb-2">
              <label class="form-label col-form-label col-md-3">Penggunaan</label>
              <div class="col-md-9">
                <div class="col-md-6">
                  <div class="input-group">
                    <input type="text" name="parameter_pam" readonly id="penggunaan"
                      class="form-control is-valid" />
                    <span style="margin-top:2px; padding-top:2px"> &emsp;(m³) </span>
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
            <input type="hidden" name="pam_id" id="pams_id">
            <input type="hidden" name="tagihan_id" id="tagihans_id">
            <input type="hidden" name="warga_id" id="warga_id">
            <input type="hidden" name="periode_id" id="periode_id">
            <input type="hidden" name="status" value="1">
            <input type="hidden" name="pembayaran_tipe" value="2">
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
        let pamId = this.getAttribute("data-pam-id");
        let tagihanId = this.getAttribute("data-tagihan-id");
        let wargaId = this.getAttribute("data-warga-id");
        let periodeId = this.getAttribute("data-periode-id");
        let nominalTagihan = this.getAttribute("data-nominal");
        let namaTagihan = this.getAttribute("data-nama-tagihan");
        let penggunaan = this.getAttribute("data-penggunaan");

        // Masukkan nilai ke input form
        document.getElementById("pams_id").value = pamId;
        document.getElementById("penggunaan").value = penggunaan;
        document.getElementById("nama_tagihan").value = 'Pam Swadaya';
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
