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
        Schema::table('subjects', function (Blueprint $table) {
            $table->string('description')->nullable();
            $table->string('identifier')->nullable();
            $table->string('modality')->nullable();
            $table->string('faculty')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->default('activa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn(['description', 'identifier', 'modality', 'faculty', 'type', 'status']);
        });
    }
};
