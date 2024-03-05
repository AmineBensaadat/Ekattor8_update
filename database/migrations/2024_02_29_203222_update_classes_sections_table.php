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
      Schema::table('classe_section', function (Blueprint $table) {
        $table->dropColumn('name');
        $table->integer('class_id');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('classe_section', function($table) {
        $table->string('name');
        $table->dropColumn('class_id');
    });
    }
};