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
    Schema::create('tagihan_rondas', function (Blueprint $table) {
      $table->id();
      $table->integer('ronda_id');
      $table->integer('warga_id');
      $table->date('tgl_absen_ronda');
      $table->unsignedBigInteger('nominal_tagihan');
      $table->smallInteger('status_denda')->default(0);

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
    Schema::dropIfExists('tagihan_rondas');
  }
};
