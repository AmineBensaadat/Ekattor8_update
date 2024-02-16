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
      Schema::create('student_package', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->float('price');
        $table->string('package_type');
        $table->string('interval');
        $table->integer('days');
        $table->integer('status');
        $table->string('description');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('student_package');
    }
};
