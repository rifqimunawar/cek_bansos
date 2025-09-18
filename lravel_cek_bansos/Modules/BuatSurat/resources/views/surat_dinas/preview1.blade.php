<!DOCTYPE html>
<html>
@php
  use App\Helpers\Fungsi;
  use App\Helpers\GetSettings;
@endphp

<head>
  <meta charset="UTF-8">
  <title>Preview Surat</title>
  <style>
    body {
      font-family: 'Times New Roman', sans-serif;
      padding: 20px;
      line-height: 1.6;
    }

    fieldset {
      border: 0px solid #fefefe !important;
      margin: 0;
      min-width: 0;
      padding: 10px;
      position: relative;
      border-radius: 4px;
      background-color: #fefefe;
      padding-left: 10px !important;
    }

    .kop img,
    .footer img {
      width: 100%;
      /* max-height: 150px; */
      object-fit: contain;
    }

    .isi-surat {
      margin-top: 30px;
    }

    .table_td {
      border-top: 1px solid gray;
      border-bottom: 1px solid gray;
      border-left: 1px solid gray;
      border-right: 1px solid gray;
    }
  </style>
</head>

<body>

  <fieldset>

    <div class="kop">
      @if (!empty($kop_surat))
        <img src="{{ $kop_surat }}" alt="Kop Surat">
      @endif
    </div>

    <div class="row">
      <table border="0" style="border-collapse: collapse" class="header" width="100%">

        <tr>
          <td class="" style="font-size: 24px;" width="22%" align="center" colspan="2"
            style="font-weight: bold;vertical-align:middle">
            <label>{{ $surat->nama_surat }}</label>
          </td>
        </tr>
        <tr>
          <td width="4%">
            Nomor
          </td>
          <td>
            : {{ $surat->nomor_surat }}
          </td>
        </tr>
        <tr>
          <td width="4%">
            Tanggal
          </td>
          <td>
            : {{ Fungsi::format_tgl($surat->tanggal_surat) }}
          </td>
        </tr>
        <tr>
          <td width="4%">
            Hal
          </td>
          <td>
            : {{ $surat->perihal }}
          </td>
        </tr>
        <tr>
          <td width="4%">
            Yth
          </td>
          <td>

          </td>
        </tr>
        <tr>
          <td width="4%">
            {{ $surat->tujuan }}
          </td>
        </tr>

        <tr>
          <td colspan="2">
            {!! $surat->isi_surat !!}
          </td>
        </tr>

      </table>

      <table width="100%" style="margin-top: 50px;">
        <tr>
          <td width=70%>&emsp;</td>
          <td style="text-align: right;">
            <div style="text-align: center;">
              <p>Hormat Kami,</p>
              @if ($surat->is_basah == 'on')
                @if (!empty($surat->penandatangan->sign))
                  <img src="{{ $surat->penandatangan->sign }}" height="100" alt="Tanda Tangan">
                @endif
              @else
                <div style="width: 150px; height: 100px;"></div> {{-- Placeholder kosong --}}
              @endif
              <br>
              <strong>{{ $surat->penandatangan->nama ?? '' }}</strong><br>
              <span style="text-decoration: underline;">{{ $surat->penandatangan->jabatan ?? '' }}</span>
            </div>
          </td>
        </tr>
      </table>
    </div>

    <div class="footer" style="margin-top: 30px;">
      @if (!empty($footer_surat))
        <img src="{{ $footer_surat }}" alt="Footer Surat">
      @endif
    </div>
  </fieldset>


  <script>
    window.onload = function() {
      window.print();
    };
  </script>

</body>

</html>
