@php
    $getLogo = App\Helpers\GetSettings::getLogo();
    $getWebName = App\Helpers\GetSettings::getNamaWeb();
    $getEmail = App\Helpers\GetSettings::getEmail();
    $getTelp = App\Helpers\GetSettings::getTelp();
    $getAlamat = App\Helpers\GetSettings::getAlamat();
@endphp
<table width="100%">
    <tr>
        <!-- Kolom untuk gambar dan judul -->
        <td width="10%" align="center" style="text-align: center;">
            <img alt="logo" src="{{ $getLogo }}" height="70px" width="70px" style="margin-top: 20px">
        </td>

        <!-- Kolom untuk alamat -->
        <td width="40%" valign="top" style="padding-left: 10px;">
            <p style="margin: 5px 0 0; font-weight: bold; font-size:28px">{{ $getWebName }}</p>
            <p style="margin: 0;">
                {{ $getAlamat }} <br>
                {{ $getEmail }} <br>
                {{ $getTelp }} <br>
            </p>
        </td>

        {{-- <td class="table_td header_text" width="28%" align="center" colspan="2"
          style="font-weight: bold;vertical-align:middle">
          <label>
              <h2>BUKTI PEMBAYARAN</h2>
          </label>
      </td> --}}
        <td class=" header_text" width="25%">
            <table border="0" class="" width="100%">
                <tr>
                    <td>Ket</td>
                    <td>:</td>
                    <td>aaaaa</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<hr>
