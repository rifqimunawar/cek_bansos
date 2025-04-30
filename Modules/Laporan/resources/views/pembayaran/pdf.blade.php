<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    h3 {
      text-align: center;
      margin-top: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
    }

    /* table,
        th,
        td {
            border: 1px solid #000;
        } */

    th,
    td {
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>

  {{-- @include('tagihan::layouts.kopSurat') --}}

  <div style="text-align:center;">
    <h3>{{ $title }}</h3>
  </div>

  <!-- ISI KONTEN -->
  <table>
    <thead>
      <tr>
        <th>No.</th>
        <th>Nama Lengkap</th>
        <th>Kontak</th>
        <th>Jenis Pembayaran</th>
        <th>Nominal</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->nama_warga }}</td>
          <td>{{ $item->telp_warga }}</td>
          <td>{{ $item->tagihan_nama }}</td>
          <td>{{ $item->nominal_dibayar }}</td>
          <td>
            @php
              $keterangan = '';
              if (!empty($item->periode_nama)) {
                  $keterangan .= 'Periode ' . $item->periode_nama;
              }
              if (!empty($item->tgl_absen_ronda)) {
                  $keterangan .= ($keterangan ? ' | ' : '') . 'Absen Ronda ' . $item->tgl_absen_ronda;
              }
              if (!empty($item->parameter_pam)) {
                  $keterangan .= ($keterangan ? ' | ' : '') . 'Pam ' . $item->parameter_pam . ' m³';
              }
            @endphp
            {{ $keterangan }}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>
