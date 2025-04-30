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
    Schema::create('periode_umum', function (Blueprint $table) {
      $table->id();
      $table->foreignId('periode_id')
        ->constrained('periodes')
        ->onDelete('cascade');
      $table->foreignId('umum_id')
        ->constrained('umums')
        ->onDelete('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void
  {
    Schema::dropIfExists('periode_umum');
  }
};
