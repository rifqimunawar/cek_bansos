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
    Schema::create('karyawans', function (Blueprint $table) {
      $table->id();
      $table->string('nik');
      $table->string('nama_lengkap');
      $table->unsignedBigInteger('posisi_id');
      $table->unsignedBigInteger('jenis_kendaraan_id')->nullable();
      $table->string('merk_kendaraan')->nullable();
      $table->string('nopol_kendaraan')->nullable();

      $table->string('created_by')->default('unknown');
      $table->string('modified_by')->default('unknown');
      $table->string('deleted_by')->nullable();
      $table->softDeletes();
      $table->timestamps();

      $table->foreign('posisi_id')->references('id')->on('posisis')->onDelete('cascade');
      $table->foreign('jenis_kendaraan_id')->references('id')->on('jenis_kendaraans')->onDelete('cascade');
    });

  }

  /**
   * Reverse the migrations.
   */
  public function down() : void
  {
    Schema::dropIfExists('karyawans');
  }
};
