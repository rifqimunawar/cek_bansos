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
    Schema::create('ronda_warga', function (Blueprint $table) {
      $table->id();
      $table->foreignId('ronda_id')
        ->constrained('rondas')
        ->onDelete('cascade');
      $table->foreignId('warga_id')
        ->constrained('wargas')
        ->onDelete('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void
  {
    Schema::dropIfExists('ronda_warga');
  }
};
