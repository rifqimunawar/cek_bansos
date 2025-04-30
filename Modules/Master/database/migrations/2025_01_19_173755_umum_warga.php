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
    Schema::create('umum_warga', function (Blueprint $table) {
      $table->id();
      $table->foreignId('umum_id')
        ->constrained('umums') // Menghubungkan dengan tabel 'umums'
        ->onDelete('cascade');
      $table->foreignId('warga_id')
        ->constrained('wargas') // Menghubungkan dengan tabel 'wargas'
        ->onDelete('cascade');
      $table->timestamps();
    });

  }

  /**
   * Reverse the migrations.
   */
  public function down()
  {
    Schema::dropIfExists('umum_warga');
  }

};
