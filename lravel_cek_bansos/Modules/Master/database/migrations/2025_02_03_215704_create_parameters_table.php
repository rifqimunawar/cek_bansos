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
    Schema::create('parameters', function (Blueprint $table) {
      $table->id();

      $table->string('kop_surat')->nullable();
      $table->string('footer_surat')->nullable();
      $table->string('nama_rt')->nullable();
      $table->unsignedBigInteger('biaya_pam')->nullable();
      $table->unsignedBigInteger('denda_ronda')->nullable();
      $table->string('latitude_ronda')->nullable();
      $table->string('longitude_ronda')->nullable();
      $table->string('jam_awal_ronda')->nullable();
      $table->string('jarak_lokasi_absen')->nullable();

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
    Schema::dropIfExists('parameters');
  }
};
