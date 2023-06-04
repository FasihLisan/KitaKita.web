<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('services', function (Blueprint $table) {
      $table->string('icon')->nullable()->change();
      $table->text('icon_background')->nullable()->change();
      $table->text('images')->nullable()->change();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('services', function (Blueprint $table) {
      $table->string('icon')->change();
      $table->text('icon_background')->change();
      $table->string('images')->change();
    });
  }
};
