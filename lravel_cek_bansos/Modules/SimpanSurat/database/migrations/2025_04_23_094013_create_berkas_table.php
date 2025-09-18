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
    Schema::create('berkas', function (Blueprint $table) {
      $table->id();

      $table->string('nama_berkas')->nullable();
      $table->string('kode_berkas')->nullable();
      $table->foreignId('klasifikasi_surat_id')->nullable();
      $table->text('deskripsi')->nullable();
      $table->string('lampiran_1')->nullable();
      $table->string('lampiran_2')->nullable();
      $table->string('lampiran_3')->nullable();
      $table->string('lampiran_4')->nullable();
      $table->string('lampiran_5')->nullable();
      $table->date('tanggal_upload')->nullable();

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
    Schema::dropIfExists('berkas');
  }
};
