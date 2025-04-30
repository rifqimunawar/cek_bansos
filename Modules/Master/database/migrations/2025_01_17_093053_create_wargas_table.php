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
    Schema::create('wargas', function (Blueprint $table) {
      $table->id();

      $table->string('nama');
      $table->string('telp')->nullable();
      $table->text('alamat')->nullable();
      $table->text('nik')->nullable();
      $table->string('jk')->nullable();
      $table->string('kota_kelahiran')->nullable();
      $table->date('tgl_lahir')->nullable();
      $table->string('agama')->nullable();
      $table->decimal('pendapatan')->nullable();
      $table->string('pendidikan')->nullable();
      $table->string('pekerjaan')->nullable();
      $table->string('status_perkawinan')->nullable();
      $table->string('status_keluarga')->nullable();

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
    Schema::dropIfExists('wargas');
  }
};
