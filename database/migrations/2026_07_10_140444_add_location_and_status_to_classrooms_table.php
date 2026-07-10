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
        if (!Schema::hasColumn('classrooms', 'location')) {
            Schema::table('classrooms', function (Blueprint $table) {
                $table->string('location')->nullable()->after('name');
            });
        }
        
        if (!Schema::hasColumn('classrooms', 'status')) {
            Schema::table('classrooms', function (Blueprint $table) {
                $table->string('status')->default('disponible')->after('capacity');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('classrooms', function (Blueprint $table) {
            $table->dropColumn(['location', 'status']);
        });
    }
};
