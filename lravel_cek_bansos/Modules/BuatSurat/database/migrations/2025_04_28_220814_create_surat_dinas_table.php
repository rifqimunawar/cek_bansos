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
    Schema::create('surat_dinas', function (Blueprint $table) {
      $table->id();
      $table->string('nama_surat')->nullable();
      $table->string('nomor_surat')->nullable();
      $table->date('tanggal_surat')->nullable();
      $table->string('tujuan')->nullable();
      $table->string('sifat_surat')->nullable();
      $table->string('perihal')->nullable();
      $table->foreignId('klasifikasi_surat_id')->nullable();
      $table->text('ringkasan')->nullable();
      $table->longText('isi_surat')->nullable();
      $table->foreignId('penandatangan_id')->nullable();
      $table->string('is_basah')->nullable();
      $table->string('action')->nullable();

      $table->string('lampiran_1')->nullable();
      $table->string('lampiran_2')->nullable();
      $table->string('lampiran_3')->nullable();
      $table->string('lampiran_4')->nullable();
      $table->string('lampiran_5')->nullable();
      $table->enum('status', ['draft', 'dikirim'])->default('draft');

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
    Schema::dropIfExists('surat_dinas');
  }
};
