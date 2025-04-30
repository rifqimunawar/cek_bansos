@extends('mobile::layouts.layout')
@php
  use App\Helpers\Fungsi;
@endphp
@section('content-mobile')
  <!-- App Capsule -->
  <div id="appCapsule" class="bg-white">


    <div class="section mt-2">
      <h1 class="mb-4">
        Aplikasi Pencatatan Keuangan Sekolah – Solusi Modern untuk Administrasi Keuangan!
      </h1>

      <div class="lead">

      </div>
    </div>

    <div class="section mt-2">

      <figure>
        <img src="{{ asset('img/keuangan_yayasan.jpg') }}" alt="image" class="imaged img-fluid">
      </figure>

      <p>
        Mengelola keuangan sekolah kini lebih praktis dan efisien! Dengan aplikasi pencatatan keuangan sekolah ini,
        setiap transaksi seperti pembayaran <strong>SPP, uang kegiatan, dan administrasi lainnya</strong> bisa
        dicatat secara otomatis, menghindari kesalahan manusia, serta memberikan transparansi penuh kepada pihak sekolah
        dan orang tua siswa.
      </p>

      <h2>Kenapa Sekolah Anda Harus Menggunakannya?</h2>

      <p>
        Aplikasi ini dirancang untuk semua jenjang pendidikan, dari TK hingga SMA, bahkan perguruan tinggi.
        Tidak hanya mempermudah manajemen keuangan sekolah, tetapi juga memberikan kemudahan bagi orang tua dalam
        memantau pembayaran dan mendapatkan pemberitahuan secara real-time melalui <strong>notifikasi WhatsApp</strong>.
      </p>

      <h3>Fitur Unggulan</h3>
      <ul>
        <li>📲 <strong>Notifikasi WhatsApp</strong> – Kirim pengingat pembayaran langsung ke orang tua siswa.</li>
        <li>📊 <strong>Transparansi Keuangan</strong> – Pantau pemasukan dan pengeluaran dengan laporan otomatis.</li>
        <li>🔍 <strong>Monitoring Siswa</strong> – Lihat riwayat pembayaran dan status keuangan siswa kapan saja.</li>
        <li>🎨 <strong>Antarmuka Menarik & Mudah Digunakan</strong> – Desain modern dan intuitif.</li>
      </ul>

      <h3>Pilihan Pembayaran yang Fleksibel</h3>

      <p>
        Kami menyediakan fleksibilitas dalam pembelian, baik <strong>sekali bayar</strong> maupun sistem
        <strong>sewa</strong>,
        sehingga sekolah dapat memilih opsi yang paling sesuai dengan kebutuhan dan anggaran mereka.
      </p>

      <div class="testimoni">
        <p>
          "Kami sangat puas dengan aplikasi ini! Pengelolaan keuangan sekolah menjadi lebih transparan dan efisien.
          Orang tua siswa juga merasa lebih nyaman karena mendapatkan notifikasi pembayaran langsung melalui WhatsApp."
          <br><strong>— Yayasan Armaniyah</strong>
        </p>
      </div>

      <h3>Dapatkan Aplikasi Ini Sekarang!</h3>

      <p>
        Segera bergabung dengan ratusan sekolah lain yang sudah menggunakan aplikasi ini untuk meningkatkan efisiensi
        manajemen keuangan mereka. Hubungi kami sekarang melalui situs web resmi kami!
      </p>
    </div>

    <div class="section">
    </div>

    @include('mobile::layouts.footer')
  </div>
  <!-- * App Capsule -->
@endsection
