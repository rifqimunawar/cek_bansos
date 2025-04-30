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
    Schema::create('warga_tagihan_periode', function (Blueprint $table) {
      $table->id();
      $table->foreignId('warga_id')->constrained()->onDelete('cascade');
      $table->foreignId('umum_id')->constrained()->onDelete('cascade');
      $table->foreignId('periode_id')->constrained()->onDelete('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void
  {
    Schema::dropIfExists('warga_tagihan_periode');
  }
};
