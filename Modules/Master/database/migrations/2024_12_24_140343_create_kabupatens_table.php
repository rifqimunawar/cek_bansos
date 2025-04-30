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
    Schema::create('kabupatens', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('kab_id');
      $table->bigInteger('prov_id');
      $table->string('kab_name');
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
    Schema::dropIfExists('kabupatens');
  }
};
