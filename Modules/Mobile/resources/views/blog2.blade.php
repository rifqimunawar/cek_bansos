@extends('mobile::layouts.layout')
@php
  use App\Helpers\Fungsi;
@endphp
@section('content-mobile')
  <!-- App Capsule -->
  <div id="appCapsule" class="bg-white">


    <div class="section mt-2">
      <h1 class="mb-4">
        SIMRT – Aplikasi Digital untuk Pengelolaan RT yang Lebih Mudah dan Efisien!
      </h1>

      <div class="lead">

      </div>
    </div>

    <div class="section mt-2">

      <figure>
        <img src="{{ asset('img/rtonline.jpg') }}" alt="image" class="imaged img-fluid">
      </figure>


      <p>
        Kini, pengelolaan data warga, pencatatan iuran, jadwal ronda, hingga pengumuman RT bisa dilakukan dalam satu
        aplikasi digital yang praktis dan mudah digunakan. Dengan <strong>SIMRT</strong>, pengurus RT dapat mengelola
        administrasi dengan lebih <strong>efisien, transparan, dan terorganisir</strong>.
      </p>

      <h2>Kenapa Harus Menggunakan SIMRT?</h2>

      <p>
        Tidak perlu lagi pencatatan manual yang rentan kesalahan! Dengan SIMRT, semua data penting terkait warga dan
        keuangan RT tersimpan secara digital dan dapat diakses kapan saja. Warga juga bisa menerima informasi terkini
        dari pengurus RT langsung melalui aplikasi atau <strong>notifikasi WhatsApp</strong>.
      </p>

      <h3>Fitur Unggulan</h3>
      <ul>
        <li>📋 <strong>Data Warga Terpusat</strong> – Simpan dan kelola informasi warga dengan lebih sistematis.</li>
        <li>💰 <strong>Pencatatan Iuran</strong> – Pantau pemasukan dan pengeluaran RT secara real-time.</li>
        <li>📅 <strong>Jadwal Ronda</strong> – Atur dan bagikan jadwal ronda dengan mudah.</li>
        <li>📢 <strong>Pengumuman Digital</strong> – Sampaikan informasi penting langsung ke warga.</li>
        <li>📲 <strong>Notifikasi WhatsApp</strong> – Kirim pengingat iuran atau informasi lainnya langsung ke warga.</li>
      </ul>

      <h3>Pilihan Berlangganan yang Fleksibel</h3>

      <p>
        Gunakan SIMRT sesuai kebutuhan RT Anda! Kami menyediakan opsi <strong>pembelian sekali bayar</strong> maupun
        <strong>sistem sewa</strong>, sehingga setiap RT bisa memilih solusi yang paling sesuai dengan anggarannya.
      </p>

      <div class="testimoni">
        <p>

        </p>
      </div>

      <h3>Segera Beralih ke SIMRT Sekarang!</h3>

      <p>
        Jangan biarkan pengelolaan RT menjadi ribet dan tidak efisien. Dengan SIMRT, semuanya jadi lebih mudah, cepat,
        dan transparan! Hubungi kami sekarang melalui website resmi kami untuk informasi lebih lanjut.
      </p>
    </div>

    <div class="section">
    </div>

    @include('mobile::layouts.footer')
  </div>
  <!-- * App Capsule -->
@endsection
