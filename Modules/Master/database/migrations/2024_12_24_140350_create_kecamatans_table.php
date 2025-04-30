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
    Schema::create('kecamatans', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('kec_id');
      $table->bigInteger('kab_id');
      $table->bigInteger('prov_id');
      $table->string('kec_name');
      $table->bigInteger('kec_kode');
      $table->bigInteger('kab_kode');
      $table->bigInteger('prov_kode');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void
  {
    Schema::dropIfExists('kecamatans');
  }
};
