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
    Schema::create('kelurahans', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('kel_id');
      $table->bigInteger('kec_id');
      $table->bigInteger('kab_id');
      $table->bigInteger('prov_id');
      $table->string('kel_name');
      $table->bigInteger('kel_kode');
      $table->bigInteger('kec_kode');
      $table->bigInteger('kab_kode');
      $table->bigInteger('prov_kode');
      $table->string('kel_kode_pos')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void
  {
    Schema::dropIfExists('kelurahans');
  }
};
