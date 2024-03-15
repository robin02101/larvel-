<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('my_classes', function (Blueprint $table) {
            $table->id();
            $table->string('className')->comment('課程名稱');
            $table->string('classIntroduce')->comment('課程簡介'); 
            $table->longtext('classImg')->comment('課程圖片')->nullable();
            $table->integer('semester')->comment('學期')->nullable();
            $table->integer('academicYear')->comment('學年度')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_classes');
    }
};
