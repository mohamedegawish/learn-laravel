<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('doctor_program', function (Blueprint $table) {
            $table->unique(["doctor_id", "program_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctor_program', function (Blueprint $table) {
            $table->dropunique(["doctor_id", "program_id"]);
        });
    }
};
