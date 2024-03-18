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
        Schema::table('my_classes', function (Blueprint $table) {
            //
            $table->string('semester')->comment('學期')->default('下')->change();
            $table->integer('academicYear')->comment('學年度')->default('113')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('my_classes', function (Blueprint $table) {
            //
        });
    }
};
