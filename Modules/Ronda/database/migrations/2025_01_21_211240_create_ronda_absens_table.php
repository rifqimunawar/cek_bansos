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
    Schema::create('ronda_absens', function (Blueprint $table) {
      $table->id();
      $table->foreignId('ronda_id')->constrained('rondas')->onDelete('cascade');
      $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
      $table->integer('absen')->default(1);
      $table->timestamp('waktu_absen')->nullable();
      $table->text('catatan')->nullable();
      $table->string('latitude')->nullable();
      $table->string('longitude')->nullable();
      $table->string('img')->nullable();

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
    Schema::dropIfExists('ronda_absens');
  }
};
