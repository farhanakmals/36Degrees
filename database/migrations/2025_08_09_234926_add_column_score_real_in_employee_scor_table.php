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
        Schema::table('employee_scores', function (Blueprint $table) {
            $table->decimal('score_real', 5, 2)->after('score')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_scores', function (Blueprint $table) {
            $table->dropColumn('score_real');
        });
    }
};
