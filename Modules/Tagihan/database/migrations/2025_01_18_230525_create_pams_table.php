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
    Schema::create('pams', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('warga_id'); // Relasi ke tabel warga

      $table->date('tanggal_input');
      $table->integer('parameter');
      $table->integer('total_parameter')->default(0);

      $table->decimal('biaya_per_m3', 10);
      $table->decimal('nominal', 15);

      $table->string('deskripsi')->nullable(); // Keterangan opsional

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
    Schema::dropIfExists('pams');
  }
};
