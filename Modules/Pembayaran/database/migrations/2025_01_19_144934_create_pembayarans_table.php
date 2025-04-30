<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up() : void
  {
    Schema::create('pembayarans', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('tagihan_id')->nullable();
      $table->unsignedBigInteger('periode_id')->nullable();
      $table->unsignedBigInteger('warga_id')->nullable();
      $table->unsignedBigInteger('nominal_dibayar')->default(0);
      $table->smallInteger('status')->nullable();
      $table->smallInteger('pembayaran_tipe')->nullable();

      $table->string('nama_warga')->nullable();
      $table->string('alamat_warga')->nullable();
      $table->string('telp_warga')->nullable();

      $table->string('tagihan_nama')->nullable();
      $table->string('periode_nama')->nullable();

      $table->unsignedBigInteger('pam_id')->nullable();
      $table->unsignedBigInteger('denda_ronda_id')->nullable();
      $table->unsignedBigInteger('parameter_pam')->nullable();
      $table->string('tgl_absen_ronda')->nullable();

      $table->string('id_qrcode')->nullable();
      $table->string('no_pembayaran')->nullable();
      $table->string('created_by')->default('unknown');
      $table->string('updated_by')->default('unknown');
      $table->string('deleted_by')->nullable();
      $table->softDeletes();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void
  {
    Schema::dropIfExists('pembayarans');
  }
};
